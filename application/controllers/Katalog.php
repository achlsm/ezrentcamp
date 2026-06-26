<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Memuat Model yang berisi logika database
        $this->load->model('Produk_model'); 
        $this->load->helper('form');
    }

   public function index()
{
    // Supaya error "ctype_digit" hilang di PHP 8 (Wajib ditaruh paling atas)
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

    // 1. Load library pagination
    $this->load->library('pagination');


    // 2. Ambil data filter (Logika asli kamu tetap)
    $cari = $this->input->get('cari', true);
    $sort = $this->input->get('sort', true);
    $ketersediaan = $this->input->get('ketersediaan', true) ?: 'semua';
    
    $max_harga = $this->input->get('max_harga', true);
    if ($max_harga === null) {
        $max_harga = $this->input->get('max_harga_mobile', true);
    }
    if ($max_harga === null || $max_harga === '') {
        $max_harga = 100000; 
    }

    $kategori = $this->input->get('kategori');
    if ($kategori === null) {
        $kategori = $this->input->get('kategori_mobile');
    }
    $kategori_fix = is_array($kategori) ? $kategori : ($kategori ? [$kategori] : []);

    $params = [
        'cari'         => $cari,
        'kategori'     => $kategori_fix,
        'sort'         => $sort,
        'ketersediaan' => $ketersediaan,
        'min_harga'    => $this->input->get('min_harga') ?: 0,
        'max_harga'    => $max_harga,
    ];

    // --- LOGIKA PAGINATION ---

    $total_rows = $this->Produk_model->count_produk_katalog($params); 

    // FIX PHP 8: Memastikan $_GET['per_page'] tidak NULL saat dibaca library
    if (!$this->input->get('per_page')) {
        $_GET['per_page'] = '0';
    }

    $config['base_url']             = site_url('katalog/index');
    $config['total_rows']           = $total_rows;
    $config['per_page']             = 9; // Ganti sesuai kebutuhan
    $config['page_query_string']    = TRUE;
    $config['query_string_segment'] = 'per_page';
    $config['reuse_query_string']   = TRUE; // Biar filter cari & kategori otomatis ikut

    // Styling Pagination
    $config['full_tag_open']    = '<ul class="pagination">';
    $config['full_tag_close']   = '</ul>';
    $config['num_tag_open']     = '<li>';
    $config['num_tag_close']    = '</li>';
    $config['cur_tag_open']     = '<li class="active"><span>';
    $config['cur_tag_close']    = '</span></li>';
    $config['prev_link']        = '&laquo;';
    $config['next_link']        = '&raquo;';
    $config['prev_tag_open']    = '<li>';
    $config['prev_tag_close']   = '</li>';
    $config['next_tag_open']    = '<li>';
    $config['next_tag_close']   = '</li>';
    $config['attributes']       = array('class' => 'page-link');

    $this->pagination->initialize($config);

    // Ambil offset untuk Query database
    $offset = (int) $this->input->get('per_page');

    // --- KONTEN DATA ---

    $data['kategori_list']    = $this->Produk_model->get_all_kategori();
    $data['produk_list']      = $this->Produk_model->get_produk_katalog($params, $config['per_page'], $offset);
    $data['jumlah_produk']    = $total_rows;
    $data['current_filter']   = $params;
    $data['pagination_links'] = $this->pagination->create_links();

    $this->load->view('frontend/header', $data); 
    $this->load->view('katalog/index', $data);
    $this->load->view('frontend/footer', $data); 
}




}