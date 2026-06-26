<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        // OPTIONAL: proteksi halaman admin
        // if ($this->session->userdata('role') != 'admin') {
        //     redirect('auth/login');
        // }
    }

    public function index()
    {
        $data['title'] = 'Data User';
        $data['users'] = $this->User_model->get_all_user();

        $this->load->view('admin/user/index', $data);
    }

    public function delete($id)
    {
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus');
        redirect('admin/user');
    }

    public function change_role($id)
    {
        $this->User_model->change_role($id);
        $this->session->set_flashdata('success', 'Role user berhasil diubah');
        redirect('admin/user');
    }
}