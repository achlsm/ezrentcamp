<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_artikel');
        // Proteksi login (Sesuaikan nama session login kamu)
        if(!$this->session->userdata('id_user')){
            redirect('auth');
        }
    }

    public function index() {
        $data['artikel'] = $this->M_artikel->get_all();
        $data['total_published'] = $this->M_artikel->count_status('published');
        $data['total_draft'] = $this->M_artikel->count_status('draft');
        $this->load->view('admin/artikel/index', $data);
    }

    public function simpan() {
        $id_artikel = $this->input->post('id_artikel');
        
        $config['upload_path']   = './assets/img/artikel/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);

        $konten = $this->input->post('konten');
        // Buat excerpt otomatis dari konten (buang tag HTML dan ambil 150 karakter)
        $excerpt = strip_tags(substr($konten, 0, 150)) . '...';

        $data = [
            'id_admin'   => $this->session->userdata('id_user'), // Mengambil ID dari session login
            'judul'      => $this->input->post('judul'),
            'konten'     => $konten,
            'excerpt'    => $excerpt,
            'tag'        => $this->input->post('tag'),
            'status'     => $this->input->post('status'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // Atur tanggal_publish jika statusnya published
        if($this->input->post('status') == 'published'){
            $data['tanggal_publish'] = date('Y-m-d H:i:s');
        }

        if ($this->upload->do_upload('thumbnail')) {
            $data['thumbnail'] = $this->upload->data('file_name');
            // Hapus file lama jika update
            if($id_artikel){
                $old = $this->db->get_where('artikel', ['id_artikel' => $id_artikel])->row();
                if($old->thumbnail && file_exists('./assets/img/artikel/'.$old->thumbnail)) unlink('./assets/img/artikel/'.$old->thumbnail);
            }
        }

        if ($id_artikel) {
            $this->M_artikel->update($id_artikel, $data);
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->M_artikel->simpan($data);
        }
        redirect('admin/artikel');
    }

    public function hapus($id) {
        $this->M_artikel->hapus($id);
        redirect('admin/artikel');
    }
}