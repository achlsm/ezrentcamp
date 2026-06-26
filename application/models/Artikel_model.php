<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Mengambil daftar semua artikel berdasarkan filter, pencarian, dan paginasi
     * (Halaman Index Artikel)
     */
    public function get_artikel_list($limit, $start, $params = [])
    {
        $this->db->select('a.*, u.nama_lengkap AS penulis');
        $this->db->from('artikel a');
        $this->db->join('users u', 'a.id_admin = u.id_user', 'left');
        $this->db->where('a.status', 'published'); // Hanya tampilkan yang sudah terbit
        $this->db->where('a.tanggal_publish <=', date('Y-m-d H:i:s')); // Hanya yang tanggalnya sudah lewat

        // Filter Pencarian Judul/Konten
        if (!empty($params['cari'])) {
            $this->db->group_start();
            $this->db->like('a.judul', $params['cari']);
            $this->db->or_like('a.konten', $params['cari']);
            $this->db->group_end();
        }
        
        // Filter Tag (digunakan di menu filter)
        if (!empty($params['tag'])) {
            $this->db->where('a.tag', $params['tag']);
        }
        
        $this->db->order_by('a.tanggal_publish', 'DESC');
        $this->db->limit($limit, $start);
        
        return $this->db->get()->result_array();
    }

    /**
     * Menghitung total artikel yang memenuhi kriteria filter
     */
    public function count_all_artikel($params = [])
    {
        $this->db->from('artikel a');
        $this->db->where('a.status', 'published');
        $this->db->where('a.tanggal_publish <=', date('Y-m-d H:i:s'));
        
        // Filter Pencarian Judul/Konten
        if (!empty($params['cari'])) {
            $this->db->group_start();
            $this->db->like('a.judul', $params['cari']);
            $this->db->or_like('a.konten', $params['cari']);
            $this->db->group_end();
        }
        
        // Filter Tag
        if (!empty($params['tag'])) {
            $this->db->where('a.tag', $params['tag']);
        }

        return $this->db->count_all_results();
    }
    
    /**
     * Mengambil semua tag unik yang aktif
     */
    public function get_all_tags()
    {
        $this->db->select('tag');
        $this->db->where('status', 'published');
        $this->db->group_by('tag');
        $this->db->order_by('tag', 'ASC');
        return $this->db->get('artikel')->result_array();
    }

    /**
     * Mengambil detail satu artikel berdasarkan ID
     */
    public function get_artikel_detail($id_artikel)
    {
        $this->db->select('a.*, u.nama_lengkap AS penulis');
        $this->db->from('artikel a');
        $this->db->join('users u', 'a.id_admin = u.id_user', 'left');
        $this->db->where('a.id_artikel', $id_artikel);
        $this->db->where('a.status', 'published');
        return $this->db->get()->row_array();
    }

    /**
 * Mengambil artikel terkait (Content-Based) berdasarkan tag dan kata kunci judul/konten.
 */
public function get_artikel_terkait($current_id_artikel, $current_tag, $current_judul, $limit = 3)
{
    // 1. Ekstrak Kata Kunci dari Judul (Simulasi Tokenisasi)
    // Ubah Judul menjadi array kata kunci (membuang kata yang terlalu umum bisa ditambahkan di sini)
    $keywords = explode(' ', $current_judul);
    $keywords = array_filter($keywords, function($word) {
        return strlen($word) > 3; // Hanya ambil kata dengan panjang > 3 karakter
    });

    $this->db->select('a.*');
    $this->db->from('artikel a');
    
    // 2. Eksklusi Artikel Saat Ini
    $this->db->where('a.id_artikel !=', $current_id_artikel);
    $this->db->where('a.status', 'published');

    // 3. Logika Scoring/Matching (Implementasi Content-Based Similarity)
    // Mulai GROUP_START untuk kriteria OR
    $this->db->group_start();
    
    // Kriteria 1: Cocokkan TAG (Paling Prioritas)
    $this->db->or_where('a.tag', $current_tag);
    
    // Kriteria 2: Cocokkan Kata Kunci di Judul/Konten
    if (!empty($keywords)) {
        foreach ($keywords as $keyword) {
            $keyword = $this->db->escape_like_str($keyword);
            $this->db->or_like('a.judul', $keyword);
        }
    }
    
    $this->db->group_end();
    
    // 4. Batas dan Pengurutan
    $this->db->order_by('a.tanggal_publish', 'DESC'); // Urutkan berdasarkan tanggal terbaru
    $this->db->limit($limit);

    return $this->db->get()->result_array();
}

}