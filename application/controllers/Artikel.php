<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
        $this->load->library('pagination');
        $this->load->helper('url');
    }

    public function index()    {
        // 1. Ambil Parameter Input (Gunakan empty string jika null)
        $params['cari'] = $this->input->get('cari', TRUE) ?? '';
        $params['tag']  = $this->input->get('tag', TRUE) ?? '';
        
        // 2. Konfigurasi Pagination Manual
        $limit = 6; // Jumlah artikel per halaman
        $page  = ($this->uri->segment(3)) ? (int)$this->uri->segment(3) : 0;
        $total_rows = $this->Artikel_model->count_all_artikel($params);
        
        // 3. Ambil Data
        $data['artikel_list'] = $this->Artikel_model->get_artikel_list($limit, $page, $params);
        $data['all_tags']     = $this->Artikel_model->get_all_tags();
        $data['active_tag']   = $params['tag'];
        $data['total_result'] = $total_rows;

        // 4. LOGIKA PAGINATION MANUAL (Sama seperti katalog)
        $total_pages = ceil($total_rows / $limit);
        $current_page = ($page / $limit) + 1;
        
        $pagination_html = '<div class="pagination-container"><ul class="pagination">';
        
        // Bangun Query String untuk Link (agar filter cari/tag tidak hilang)
        $query_args = array_filter($_GET);
        
        for ($i = 1; $i <= $total_pages; $i++) {
            $offset = ($i - 1) * $limit;
            $active_class = ($current_page == $i) ? 'active' : '';
            
            // Buat URL
            $query_args['page'] = $offset; // temporary
            $link_url = site_url('artikel/index/' . $offset) . '?' . http_build_query(array_filter($_GET));
            
            if ($current_page == $i) {
                $pagination_html .= '<li class="'.$active_class.'"><span>'.$i.'</span></li>';
            } else {
                $pagination_html .= '<li><a href="'.$link_url.'">'.$i.'</a></li>';
            }
        }
        $pagination_html .= '</ul></div>';
        
        $data['pagination_links'] = ($total_rows > $limit) ? $pagination_html : '';

        // 5. Load Views
        $this->load->view('frontend/header', $data);
        $this->load->view('artikel/index', $data);
        $this->load->view('frontend/footer', $data);
    }
    

    public function detail($id_artikel = NULL)
    {
        if ($id_artikel === NULL) {
            show_404();
        }

        $data['artikel'] = $this->Artikel_model->get_artikel_detail($id_artikel);

        if (empty($data['artikel'])) {
            show_404();
        }
        
        $artikel = $data['artikel'];

        // Ambil Artikel Terkait menggunakan fungsi rekomendasi
        $data['artikel_terkait'] = $this->Artikel_model->get_artikel_terkait(
            $artikel['id_artikel'], 
            $artikel['tag'], 
            $artikel['judul'],
            3 // Kita hanya menampilkan 3 artikel terkait
        );

        // --- Load View ---
        $this->load->view('frontend/header', $data);
        $this->load->view('artikel/detail', $data);
        $this->load->view('frontend/footer', $data);
    }

}