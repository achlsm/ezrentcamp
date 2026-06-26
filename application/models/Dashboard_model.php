<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    // =====================================================================
    // STATISTIK UTAMA DASHBOARD
    // =====================================================================

    public function get_stats()
    {
        return [
            'total_produk'   => $this->db->count_all('produk'),

            // hitung user bukan admin
            'total_penyewa'  => $this->db->where('role', 'user')->from("users")->count_all_results(),

            'total_review'   => $this->db->count_all('review'),

            // jumlah transaksi
            'produk_tersewa' => $this->db->count_all('transaksi')
        ];
    }

    // =====================================================================
    // PRODUK PALING SERING DISEWA
    // =====================================================================

    public function produk_terpopuler()
    {
        $this->db->select("
            produk.nama_produk,
            produk.harga,
            produk.jumlah_disewa,
            produk.stok
        ");
        $this->db->from("produk");
        $this->db->order_by("jumlah_disewa", "DESC");
        $this->db->limit(5);

        return $this->db->get()->result();
    }

    // =====================================================================
    // PENDAPATAN TOTAL
    // =====================================================================

    public function total_pendapatan()
    {
        $this->db->select_sum('total_harga');
        $result = $this->db->get('transaksi')->row();

        return $result->total_harga ?? 0;
    }

    // =====================================================================
    // DATA GRAFIK: PENYEWAAN PER BULAN
    // =====================================================================

    public function sewa_per_bulan()
    {
        $this->db->select("
            DATE_FORMAT(created_at, '%Y-%m') AS bulan,
            COUNT(*) AS total
        ");
        $this->db->from("transaksi");
        $this->db->group_by("bulan");
        $this->db->order_by("bulan", "ASC");

        return $this->db->get()->result();
    }

    // =====================================================================
    // DATA GRAFIK: PENDAPATAN PER BULAN
    // =====================================================================

    public function pendapatan_per_bulan()
    {
        $this->db->select("
            DATE_FORMAT(created_at, '%Y-%m') AS bulan,
            SUM(total_harga) AS total
        ");
        $this->db->from("transaksi");
        $this->db->group_by("bulan");
        $this->db->order_by("bulan", "ASC");

        return $this->db->get()->result();
    }

    // =====================================================================
    // PEMESANAN TERBARU
    // =====================================================================

    public function get_recent_orders() 
    {
        $this->db->select('transaksi.*, users.nama_lengkap, produk.nama_produk');
        $this->db->from('transaksi');
        $this->db->join('users', 'users.id_user = transaksi.id_user');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk');
        $this->db->order_by('transaksi.id_transaksi', 'DESC');
        $this->db->limit(5);

        return $this->db->get()->result();
    }

}