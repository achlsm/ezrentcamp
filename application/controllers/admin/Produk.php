<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }

        $this->load->model([
            'Produk_model',
            'Kategori_model',
            'Foto_produk_model'
        ]);

        $this->load->library('upload');
    }

    /* ================== LIST ================== */
    public function index()
    {
        $produk = $this->Produk_model->get_all();

        foreach ($produk as $p) {
            $p->foto = $this->Foto_produk_model->get_first_foto($p->id_produk);
        }

        $data['produk']   = $produk;
        $data['kategori'] = $this->Kategori_model->get_with_count();

        $this->load->view('admin/produk/index', $data);
    }

    /* ================== TAMBAH ================== */
    public function tambah()
    {
        $this->load->view('admin/produk/tambah', [
            'kategori' => $this->Kategori_model->get_with_count()
        ]);
    }

    public function simpan()
    {
        $stok = (int)$this->input->post('stok');

        $data = [
            'id_kategori'   => $this->input->post('id_kategori'),
            'kode_produk'   => $this->input->post('kode_produk'),
            'nama_produk'   => $this->input->post('nama_produk'),
            'deskripsi'     => $this->input->post('deskripsi'),
            'spesifikasi'   => $this->input->post('spesifikasi'),
            'harga'         => $this->input->post('harga'),
            'stok'          => $stok,
            'stok_tersedia' => $stok,
            'kondisi'       => $this->input->post('kondisi'),
            'status'        => $this->input->post('status'),
            'is_recommended'=> 0,
            'created_at'    => date('Y-m-d H:i:s')
        ];

        $id_produk = $this->Produk_model->insert($data);

        if (!empty($_FILES['foto']['name'][0])) {
            $this->_upload_foto($id_produk);
        }

        redirect('admin/produk');
    }

    /* ================== EDIT ================== */
    public function edit($id)
    {
        $this->load->view('admin/produk/edit', [
            'produk'   => $this->Produk_model->get_by_id($id),
            'kategori' => $this->Kategori_model->get_all(),
            'foto'     => $this->Foto_produk_model->get_by_produk($id)
        ]);
    }

    public function update($id)
    {
        $data = [
            'id_kategori' => $this->input->post('id_kategori'),
            'kode_produk' => $this->input->post('kode_produk'),
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi'   => $this->input->post('deskripsi'),
            'spesifikasi' => $this->input->post('spesifikasi'),
            'harga'       => $this->input->post('harga'),
            'stok'        => $this->input->post('stok'),
            'kondisi'     => $this->input->post('kondisi'),
            'status'      => $this->input->post('status'),
            'updated_at'  => date('Y-m-d H:i:s')
        ];

        $this->Produk_model->update($id, $data);

        if (!empty($_FILES['foto']['name'][0])) {
            $this->_upload_foto($id);
        }

        redirect('admin/produk');
    }

    /* ================== HAPUS ================== */
    public function hapus($id)
    {
        $fotos = $this->Foto_produk_model->get_by_produk($id);

        foreach ($fotos as $f) {
            $path = './assets/img/produk/' . $f->nama_file;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->Foto_produk_model->delete_by_produk($id);
        $this->Produk_model->delete($id);

        redirect('admin/produk');
    }

    /* ================== HELPER ================== */
    private function _upload_foto($id_produk)
    {
        $files = $_FILES['foto'];
        $count = count($files['name']);

        $config = [
            'upload_path'   => './assets/img/produk/',
            'allowed_types' => 'jpg|jpeg|png|webp',
            'encrypt_name'  => true,
            'max_size'      => 2048
        ];

        for ($i = 0; $i < $count; $i++) {
            $_FILES['file']['name']     = $files['name'][$i];
            $_FILES['file']['type']     = $files['type'][$i];
            $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['file']['error']    = $files['error'][$i];
            $_FILES['file']['size']     = $files['size'][$i];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $this->Foto_produk_model->insert([
                    'id_produk' => $id_produk,
                    'nama_file' => $this->upload->data('file_name'),
                    'created_at'=> date('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
