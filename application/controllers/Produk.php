<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->helper('form');
    }

    /**
     * Menangani halaman detail produk (URL: /produk/detail/{id_produk})
     */
    public function detail($id_produk = null)
    {
        if (!$id_produk) {
            redirect('katalog'); 
        }

        // 1. Ambil detail produk
        $produk = $this->Produk_model->get_detail_produk($id_produk);

        if (!$produk) {
            show_404(); 
        }

        // 2. Ambil produk terkait (Similarity/TF-IDF)
        $produk_terkait = $this->Produk_model->get_produk_terkait($produk['id_produk']);

        $data['produk'] = $produk;
        $data['produk_terkait'] = $produk_terkait;
        $data['title'] = $produk['nama_produk']; 

        // 3. Muat View
        // Pastikan Anda sudah membuat file view: application/views/produk/detail.php
        $this->load->view('frontend/header', $data); 
        $this->load->view('produk/detail', $data); 
        $this->load->view('frontend/footer', $data); 
    }

    public function kirim_review()
    {
        // Cek apakah user sudah login (Opsional)
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Silahkan login untuk memberi review');
            redirect($_SERVER['HTTP_REFERER']); 
        }

        $data_review = [
            'id_produk'  => $this->input->post('id_produk'),
            'id_user'    => $this->session->userdata('id_user'),
            'rating'     => $this->input->post('rating'),
            'isi_review' => $this->input->post('isi_review'),
            'status'     => 'pending', // Langsung muncul, atau 'pending' jika butuh ACC admin
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->Produk_model->add_review($data_review);

        $this->session->set_flashdata('success', 'Terima kasih atas ulasannya!');
        redirect($_SERVER['HTTP_REFERER']); // Balik lagi ke halaman detail produk tadi
    }
}