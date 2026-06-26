<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni_model extends CI_Model {

    /* ==========================================================
       REVIEW UNTUK HALAMAN USER (HANYA YANG DISETUJUI ADMIN)
       ========================================================== */
    public function getAll()
    {
        return $this->db
            ->select('review.*, users.nama_lengkap, produk.nama_produk')
            ->from('review')
            ->join('users', 'users.id_user = review.id_user')
            ->join('produk', 'produk.id_produk = review.id_produk')
            ->where('review.status', 'approved')
            ->order_by('review.created_at', 'DESC')
            ->get()->result();
    }
    
    public function search($keyword)
    {
        return $this->db
            ->select('review.*, users.nama_lengkap, produk.nama_produk')
            ->from('review')
            ->join('users', 'users.id_user = review.id_user')
            ->join('produk', 'produk.id_produk = review.id_produk')
            ->where('review.status', 'approved')
            ->group_start()
                ->like('users.nama_lengkap', $keyword)
                ->or_like('review.isi_review', $keyword)
                ->or_like('produk.nama_produk', $keyword)
            ->group_end()
            ->order_by('review.created_at', 'DESC')
            ->get()
            ->result();
    }


    // Alias untuk getAll() (dipakai beberapa bagian)
    public function get_approved()
    {
        return $this->getAll();
    }

    /* ==========================================================
       STATISTIK
       ========================================================== */

    public function total_ulasan()
    {
        return $this->db->count_all('review');
    }

    public function count_all()
    {
        return $this->db->count_all('review');
    }

    public function count_pending()
    {
        return $this->db->where('status', 'pending')->count_all_results('review');
    }

    public function avg_rating()
    {
        $this->db->select_avg('rating');
        $res = $this->db->get('review')->row();
        return $res ? $res->rating : 0;
    }

    public function rating_rata_rata()
    {
        return $this->avg_rating();
    }

    // Fungsi baru: alias untuk controller frontend
    public function get_satisfaction_percent()
    {
        return $this->tingkat_kepuasan();
    }

    // Hitung persentase kepuasan: review dengan rating >= 4
    public function tingkat_kepuasan()
    {
        $this->db->where('rating >=', 4);
        $puas = $this->db->count_all_results('review');

        $total = $this->count_all();
        if ($total == 0) return 0;

        return round(($puas / $total) * 100);
    }

    /* ==========================================================
       REVIEW UNTUK ADMIN (SEMUA)
       ========================================================== */
    public function admin_get_all()
    {
        return $this->db
            ->select("review.*, users.nama_lengkap, produk.nama_produk")
            ->from("review")
            ->join("users", "users.id_user = review.id_user")
            ->join("produk", "produk.id_produk = review.id_produk")
            ->order_by("review.created_at", "DESC")
            ->get()->result();
    }

    /* ==========================================================
       UPDATE STATUS REVIEW
       ========================================================== */
    public function update_status($id_review, $status)
    {
        return $this->db->where('id_review', $id_review)
                        ->update('review', [
                            'status' => $status,
                            'updated_at' => date("Y-m-d H:i:s")
                        ]);
    }
}