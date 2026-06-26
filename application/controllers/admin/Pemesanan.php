<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
         $this->load->model('User_model');
          $this->load->model('Produk_model');
        // cek login admin kalau ada middleware
    }

    public function index()
    {
        $data['transaksi'] = $this->Transaksi_model->get_all_admin();
        $data['users']     = $this->User_model->get_all();
        $data['produk']    = $this->Produk_model->get_all();

        $this->load->view('admin/pemesanan/index', $data);
    }


    public function konfirmasi($id)
    {
        $this->Transaksi_model->update($id, [
            'status' => 'dikonfirmasi',
            'tanggal_konfirmasi' => date('Y-m-d H:i:s')
        ]);

        redirect('admin/pemesanan');
    }

    public function selesai()
    {
        $id     = $this->input->post('id_transaksi');
        $denda  = $this->input->post('denda');

        $this->Transaksi_model->update($id, [
            'status' => 'selesai',
            'tanggal_selesai_real' => date('Y-m-d'),
            'denda' => $denda
        ]);

        redirect('admin/pemesanan');
    }
}
