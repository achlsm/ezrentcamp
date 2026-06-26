<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // ===== LOAD MODEL =====
        $this->load->model('Home_model');
        $this->load->model('Produk_model');
        $this->load->model('Transaksi_model');
        $this->load->model('User_model');
        $this->load->model('Review_model');
        $this->load->model('Kategori_model');
    }

    public function index() {

        // ===== DATA HOME =====
        $data['kategori']       = $this->Home_model->getKategori();
        $data['populer']        = $this->Home_model->getProdukPopuler();
        $data['testimoni']      = $this->Home_model->getTestimoni();
        $data['kategori_list']  = $this->Kategori_model->get_with_count_home();

        $this->load->view('frontend/home', $data);
    }

    public function search() {
        $keyword = $this->input->get('q');

        $data['hasil']          = $this->Home_model->searchProduk($keyword);
        $data['kategori']       = $this->Home_model->getKategori();
        $data['kategori_list']  = $this->Kategori_model->get_with_count_home();

        $this->load->view('frontend/home', $data);
    }

    /* ================= REVIEW ================= */
    public function simpan_review() {
        $id_user      = $this->session->userdata('id_user');
        $id_produk    = $this->input->post('id_produk');
        $id_transaksi = $this->input->post('id_transaksi');

        $cek = $this->Review_model->cek_review($id_user, $id_produk);

        if ($cek) {
            $this->session->set_flashdata('error', 'Kamu sudah memberikan review.');
            redirect('home/detail_sewa/'.$id_transaksi);
        }

        $this->Review_model->insert([
            'id_user'    => $id_user,
            'id_produk'  => $id_produk,
            'rating'     => $this->input->post('rating'),
            'isi_review' => $this->input->post('komentar'),
            'status'     => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $this->session->set_flashdata('success', 'Review berhasil dikirim.');
        redirect('home/detail_sewa/'.$id_transaksi);
    }

    /* ================= PROFIL ================= */
    public function profil() {
        if(!$this->session->userdata('id_user')) redirect('/');

        $data['user'] = $this->User_model->get_by_id(
            $this->session->userdata('id_user')
        );

        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/profil', $data);
        $this->load->view('frontend/footer');
    }

    public function update_profil()
    {
        $id_user = $this->session->userdata('id_user');

        $data = [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'email'        => $this->input->post('email'),
            'no_telepon'   => $this->input->post('no_telepon'),
            'alamat'       => $this->input->post('alamat'),
        ];

        $this->User_model->update($id_user, $data);

        // ✅ FLASH MESSAGE
        $this->session->set_flashdata('success', 'Profil berhasil disimpan');

        redirect('home/profil');
    }

    public function riwayat()
    {
        $id_user = $this->session->userdata('id_user');

        $data['riwayat'] = $this->Transaksi_model->getByUser($id_user);

        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/riwayat', $data);
        $this->load->view('frontend/footer', $data);
    }


    public function detail_sewa($id_transaksi)
    {
        $id_user = $this->session->userdata('id_user');
         $detail = $this->Transaksi_model->get_detail_user($id_transaksi, $id_user);

        // ambil detail transaksi + produk
        $data['sudah_review'] = $this->Review_model
        ->cek_review($this->session->userdata('id_user'), $detail->id_produk);

        $data['detail'] = $this->Transaksi_model->get_detail_user($id_transaksi, $id_user);

        if (!$data['detail']) {
            show_404();
        }

        $this->load->view('frontend/header', $data);
        $this->load->view('frontend/detail_sewa', $data);
        $this->load->view('frontend/footer', $data);
    }


}
