<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('User_model');
        $this->load->model('Produk_model');
    }

    public function index() {
        $data['transaksi'] = $this->Transaksi_model->get_all_admin();
        $data['users']     = $this->User_model->get_all();
        $data['produk']    = $this->Produk_model->get_all();
        $this->load->view('admin/pemesanan/index', $data);
    }

    /* ================= TAMBAH ================= */
    public function tambah() {
        $id_produk = $this->input->post('id_produk'); // Ambil ID produknya

        $data = [
            'kode_transaksi' => 'TRX' . date('Ymd') . rand(1000, 9999),
            'id_user'        => $this->input->post('id_user'),
            'id_produk'      => $id_produk,
            'tanggal_mulai'  => $this->input->post('tanggal_mulai'),
            'tanggal_selesai'=> $this->input->post('tanggal_selesai'),
            'jumlah_unit'    => $this->input->post('jumlah_unit'),
            'durasi_hari'    => $this->input->post('durasi_hari'),
            'total_harga'    => $this->input->post('total_harga'),
            'status'         => 'pending',
            'created_at'     => date('Y-m-d H:i:s')
        ];
        $this->Transaksi_model->insert($data);
        // --- PROSES UPDATE STATISTIK (DIBERI PENGECEKAN AGAR TIDAK ERROR) ---
            if ($id_produk) {
                // Hitung yang statusnya 'selesai'
                $this->db->where(['id_produk' => $id_produk, 'status' => 'selesai']);
                $total_disewa = $this->db->count_all_results('transaksi');

                // Update ke tabel produk
                $this->db->where('id_produk', $id_produk);
                $this->db->update('produk', ['jumlah_disewa' => $total_disewa]);
            }

            // Pastikan redirect ke URL yang benar (sesuai route kamu)
            redirect('admin/transaksi'); 

    }

    /* ================= EDIT ================= */
    public function update() {
        $id = $this->input->post('id_transaksi');

        $data = [
            'status'        => $this->input->post('status'),
            'catatan_admin' => $this->input->post('catatan_admin'),
            'denda'         => $this->input->post('denda'),
            'updated_at'    => date('Y-m-d H:i:s')
        ];
        $this->Transaksi_model->update($id, $data);

        // --- UPDATE STATISTIK PRODUK ---
        $transaksi = $this->db->get_where('transaksi', ['id_transaksi' => $id])->row();

        if ($transaksi) {
            $id_p = $transaksi->id_produk;
            
            // Hitung ulang total yang statusnya SUDAH SELESAI
            $this->db->where('id_produk', $id_p);
            $this->db->where('status', 'selesai'); // Sesuaikan: 'selesai' atau 'lunas'
            $total_disewa = $this->db->count_all_results('transaksi');

            // Tembak langsung ke tabel produk supaya katalog lsg update
            $this->db->where('id_produk', $id_p);
            $this->db->update('produk', ['jumlah_disewa' => $total_disewa]);
        }

        redirect('admin/pemesanan');
    }

    /* ================= HAPUS ================= */
    public function hapus($id) {
        $this->Transaksi_model->delete($id);
        redirect('admin/pemesanan');
    }
}
