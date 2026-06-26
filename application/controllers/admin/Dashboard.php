<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // Pastikan hanya admin yang boleh mengakses
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }

        // Load model dashboard
        $this->load->model('Dashboard_model');
    }

    /**
     * Index - tampilkan halaman dashboard admin
     */
    public function index()
    {
        // Data user dari session
        $data['user'] = [
            'nama' => $this->session->userdata('nama')
        ];

        // Statistik utama
        $data['stats'] = $this->Dashboard_model->get_stats();

        // Pemesanan terbaru (dari tabel transaksi)
        $data['recent_orders'] = $this->Dashboard_model->get_recent_orders();

        // Produk terpopuler
        $data['popular'] = $this->Dashboard_model->produk_terpopuler();

       //pendapatan perbulan
       $pendapatan_bulanan = $this->Dashboard_model->pendapatan_per_bulan();

        $bulan_ini = date('Y-m');
        $pendapatan_bulan_ini = 0;

        foreach ($pendapatan_bulanan as $row) {
            if ($row->bulan == $bulan_ini) {
                $pendapatan_bulan_ini = $row->total;
                break;
            }
        }

        $data['pendapatan_bulan_ini'] = $pendapatan_bulan_ini;


        // Load view
        $this->load->view('admin/dashboard/index', $data);
    }
}