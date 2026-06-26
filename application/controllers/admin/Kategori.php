<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['kategori'] = $this->Kategori_model->get_with_count();
        $this->load->view('admin/kategori/index', $data);
    }

    public function tambah()
    {
        $this->load->view('admin/kategori/tambah');
    }

    public function simpan()
    {
        // UPLOAD CONFIG
        $config['upload_path']   = './assets/img/kategori/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        $gambar = "";
        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data('file_name');
        }

        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi'     => $this->input->post('deskripsi'),
            'gambar'        => $gambar,
            'status'        => $this->input->post('status')
        ];

        $this->Kategori_model->insert($data);

        redirect('admin/kategori');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->Kategori_model->get_by_id($id);
        $this->load->view('admin/kategori/edit', $data);
    }

    public function update($id)
    {
        $config['upload_path']   = './assets/img/kategori/';
        $config['allowed_types'] = 'jpg|jpeg|png|webp';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        $gambar_lama = $this->input->post('gambar_lama');
        $gambar = $gambar_lama;

        // Jika user upload gambar baru
        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'deskripsi'     => $this->input->post('deskripsi'),
            'gambar'        => $gambar,
            'status'        => $this->input->post('status')
        ];

        $this->Kategori_model->update($id, $data);

        redirect('admin/kategori');
    }


    public function hapus($id)
    {
        $this->Kategori_model->delete($id);
        redirect('admin/kategori');
    }
}