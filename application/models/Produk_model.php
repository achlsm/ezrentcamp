<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }



    public function get_kategori_with_count()
    {
        // Hapus 'k.icon_file' dari SELECT
        $this->db->select('k.id_kategori, k.nama_kategori, COUNT(p.id_produk) AS jumlah_produk'); 
        $this->db->from('kategori k');
        
        $this->db->join('produk p', 'k.id_kategori = p.id_kategori AND p.status = "tersedia"', 'left');
        
        $this->db->where('k.status', 'tersedia'); 
        
        // Hapus 'k.icon_file' dari GROUP BY
        $this->db->group_by('k.id_kategori, k.nama_kategori');
        $this->db->order_by('k.nama_kategori', 'ASC');
        
        return $this->db->get()->result_array();
    }

    /**
     * Mengambil daftar semua kategori tersedia
     * @return array
     * @param int $id_produk
     * @return array|null
     */
    public function get_all_kategori()
    {
        return $this->db
            ->select('id_kategori, nama_kategori')
            ->from('kategori')
            ->order_by('nama_kategori', 'ASC')
            ->get()
            ->result_array();
    }

    /**
     * Mengambil daftar produk berdasarkan filter dan sorting
     * @param array $params Parameter filter (cari, kategori, kondisi, min_harga, max_harga, sort)
     * @return array
     */
/**
 * Fungsi Internal Pembantu (Agar filter tidak perlu ditulis ulang)
 * Kita pakai private agar hanya bisa diakses di dalam model ini.
 */
private function _apply_filter($params)
{
    $this->db->from('produk p');
    $this->db->join('kategori k', 'p.id_kategori = k.id_kategori', 'left');
    
    // Filter Status (Sesuaikan dengan field database kamu, tadi di controller ada logika ketersediaan)
    if (!empty($params['ketersediaan']) && $params['ketersediaan'] !== 'semua') {
        if ($params['ketersediaan'] == 'tersedia') {
            $this->db->where('p.stok >', 0);
        } else {
            $this->db->where('p.stok <=', 0);
        }
    }
    $this->db->where('p.status', 'tersedia'); // Ini status aktif produk

    // Filter Search
    if (!empty($params['cari'])) {
        $this->db->group_start();
        $this->db->like('p.nama_produk', $params['cari']);
        $this->db->or_like('p.deskripsi', $params['cari']);
        $this->db->group_end();
    }

    // Filter Kategori
    if (!empty($params['kategori'])) {
        $this->db->where_in('p.id_kategori', $params['kategori']);
    }

    // Filter Harga
    $this->db->where('p.harga >=', $params['min_harga']);
    $this->db->where('p.harga <=', $params['max_harga']);
}

/**
 * 1. FUNGSI UTAMA AMBIL DATA (Dengan Limit & Offset untuk Pagination)
 */
public function get_produk_katalog($params = [], $limit = null, $offset = null)
{
    $this->db->select('p.*, k.nama_kategori');

    // Hitung rating rata-rata SEKALIGUS (Langsung dari tabel review)
    $this->db->select('(SELECT IFNULL(AVG(r.rating), 0) FROM review r WHERE r.id_produk = p.id_produk AND r.status = "approved") as rating');
    
    // Hitung jumlah review (Langsung dari tabel review)
    $this->db->select('(SELECT COUNT(*) FROM review r WHERE r.id_produk = p.id_produk AND r.status = "approved") as jumlah_review');
    
    // Hitung jumlah disewa (Langsung dari tabel transaksi)
    $this->db->select('(SELECT COUNT(*) FROM transaksi t WHERE t.id_produk = p.id_produk AND t.status = "selesai") as jumlah_disewa');
    
    // Panggil filter
    $this->_apply_filter($params);

    // Sorting Logic
    if (!empty($params['sort'])) {
        switch ($params['sort']) {
            case 'harga_terendah': $this->db->order_by('p.harga', 'ASC'); break;
            case 'harga_tertinggi': $this->db->order_by('p.harga', 'DESC'); break;
            case 'rating_tertinggi': $this->db->order_by('p.rating', 'DESC'); break;
            default: $this->db->order_by('p.id_produk', 'DESC'); break;
        }
    } else {
        $this->db->order_by('p.rating', 'DESC');
    }

    // Tambahkan Limit & Offset untuk Pagination
    if ($limit !== null) {
        $this->db->limit($limit, $offset);
    }

    $produk = $this->db->get()->result_array();

    // Tambahkan foto utama
    foreach ($produk as &$item) {
        $item['foto_utama'] = $this->get_foto_utama($item['id_produk']);
    }
    return $produk;
}

/**
 * 2. FUNGSI HITUNG TOTAL DATA (Tanpa Limit)
 * Ini dipakai pagination untuk tahu ada berapa halaman totalnya.
 */
public function count_produk_katalog($params = [])
{
    // Panggil filter yang sama persis
    $this->_apply_filter($params);
    return $this->db->count_all_results();
}
    
    public function get_foto_utama($id_produk)
    {
        $this->db->select('nama_file');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_foto', 'DESC');
        $this->db->limit(1);
        $result = $this->db->get('foto_produk')->row();
        
        return $result ? $result->nama_file : 'default.jpg'; 
    }

    /**
     * Mengambil detail lengkap satu produk berdasarkan ID
     */
    public function get_detail_produk($id_produk)
    {
        $this->db->select('p.*, k.nama_kategori');
        $this->db->from('produk p');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori', 'left');
        $this->db->where('p.id_produk', $id_produk);
        $produk = $this->db->get()->row_array();

        if ($produk) {
            $produk['foto_list'] = $this->get_semua_foto($id_produk);
            $produk['review_list'] = $this->get_reviews_by_produk($id_produk);
            
            // --- LOGIKA RATING OTOMATIS ---
            $this->db->select('AVG(rating) as rata_rata, COUNT(id_review) as total_ulasan');
            $this->db->where('id_produk', $id_produk);
            $this->db->where('status', 'approved');
            $stats = $this->db->get('review')->row_array();

            // Jika belum ada review, set rating ke 0
            $produk['rating'] = ($stats['rata_rata'] > 0) ? $stats['rata_rata'] : 0;
            $produk['jumlah_review'] = $stats['total_ulasan'];
        }

        return $produk;
    }

    /**
     * Mengambil daftar foto produk (lebih dari satu)
     */
    public function get_semua_foto($id_produk)
    {
        $this->db->select('nama_file');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_foto', 'DESC');
        return $this->db->get('foto_produk')->result_array();
    }
    
    /**
     * Mengambil review untuk halaman detail (maksimal 3)
     */
    public function get_reviews_by_produk($id_produk)
    {
        $this->db->select('r.rating, r.isi_review, r.created_at, u.nama_lengkap');
        $this->db->from('review r');
        $this->db->join('users u', 'r.id_user = u.id_user');
        $this->db->where('r.id_produk', $id_produk);
        $this->db->where('r.status', 'approved');
        $this->db->order_by('r.created_at', 'DESC');
        $this->db->limit(3); 
        return $this->db->get()->result_array();
    }
    
    // =========================================================================
    // FUNGSI REKOMENDASI (SIMULASI TF-IDF/SIMILARITY)
    // =========================================================================
    
    /**
     * Mengambil produk terkait menggunakan pendekatan Text Similarity
     * (Proxy sederhana untuk TF-IDF/Keyword Matching pada nama dan deskripsi)
     */
    public function get_produk_terkait($current_id_produk)
    {
        // 1. Ambil Teks Deskriptif dari Produk Saat Ini
        $this->db->select('nama_produk, deskripsi, spesifikasi');
        $this->db->where('id_produk', $current_id_produk);
        $current_produk = $this->db->get('produk')->row_array();

        if (!$current_produk) { return []; }

        $search_text = $current_produk['nama_produk'] . ' ' . $current_produk['deskripsi'] . ' ' . $current_produk['spesifikasi'];
        
        // Ekstraksi kata kunci penting (Simple Tokenization dan Filtering)
        $keywords = array_filter(preg_split('/\W+/', strtolower($search_text)));
        $unique_keywords = array_unique($keywords);
        $search_keywords = array_slice(array_values($unique_keywords), 0, 8); 

        // 2. Query Produk Lain yang Memiliki Kesamaan Kata Kunci
        $this->db->select('p.id_produk, p.nama_produk, p.harga, p.rating, p.is_recommended, p.stok_tersedia');
        $this->db->from('produk p');
        $this->db->where('p.id_produk !=', $current_id_produk); 
        $this->db->where('p.status', 'tersedia');

        $where_clause = '';
        foreach ($search_keywords as $key) {
            if (strlen($key) > 3) { 
                $key = $this->db->escape_like_str($key);
                $where_clause .= "(p.nama_produk LIKE '%{$key}%' OR p.deskripsi LIKE '%{$key}%') OR ";
            }
        }

        if (!empty($where_clause)) {
            $where_clause = substr($where_clause, 0, -4);
            $this->db->where("($where_clause)");
        }
        
        $this->db->order_by('p.rating', 'DESC'); 
        $this->db->limit(4);

        $produk_terkait = $this->db->get()->result_array();

        // Ambil foto utama
        foreach ($produk_terkait as &$item) {
            $item['foto_utama'] = $this->get_foto_utama($item['id_produk']);
        }
        
        return $produk_terkait;
    }

    public function add_review($data) {
        $data['status'] = 'pending';
        // 1. Masukkan review baru ke tabel review
        return $this->db->insert('review', $data);
        
        $id_produk = $data['id_produk'];

        // 2. Hitung statistik terbaru (Rata-rata rating & Total review)
        // Hanya menghitung yang statusnya 'approved'
        $this->db->select('AVG(rating) as avg_rating, COUNT(*) as total_review');
        $this->db->where('id_produk', $id_produk);
        $this->db->where('status', 'approved');
        $stats = $this->db->get('review')->row();

        // 3. UPDATE ke tabel produk agar kolom rating & jumlah_review di katalog sinkron
        $this->db->where('id_produk', $id_produk);
        return $this->db->update('produk', [
            'rating' => ($stats->avg_rating ?? 0),
            'jumlah_review' => ($stats->total_review ?? 0)
        ]);
    }




    // <--- BAGIAN KELOLA PRODUK (CRUD) --->
 
     protected $table = 'produk';

    /* ================== GET ================== */
    public function get_all()
    {
        $this->db->select('produk.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->order_by('produk.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, [
            'id_produk' => $id
        ])->row();
    }

    /* ================== INSERT ================== */
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /* ================== UPDATE ================== */
    public function update($id, $data)
    {
        $this->db->where('id_produk', $id);
        return $this->db->update($this->table, $data);
    }

    /* ================== DELETE ================== */
    public function delete($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->delete($this->table);
    }

    /* ================== FRONTEND ================== */
    public function get_by_kategori($id_kategori)
    {
        return $this->db->get_where($this->table, [
            'id_kategori' => $id_kategori,
            'status'      => 'tersedia'
        ])->result();
    }

    public function filter_harga($min, $max)
    {
        $this->db->where('harga >=', $min);
        $this->db->where('harga <=', $max);
        return $this->db->get($this->table)->result();
    }

    public function rekomendasi_by_kategori($id_kategori, $except_id)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->where('id_produk !=', $except_id);
        $this->db->limit(4);
        return $this->db->get($this->table)->result();
    }
}


