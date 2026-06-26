<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        // Pastikan Anda juga load library 'session' di autoload.php atau di sini
        $this->load->library('session'); 
    }

    // =========================================================================
    // LOGIN
    // =========================================================================

    public function login() {
        // Jika sudah login, redirect sesuai role
        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('role') == 'admin') {
                // Gunakan base_url() agar lebih robust
                redirect(base_url('admin/dashboard')); 
            } else {
                redirect(base_url('/'));
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            // Langsung load view utama, tanpa partials
            $this->load->view('auth/login'); 
        } else {
            $this->_login_process();
        }
    }

    private function _login_process() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Auth_model->getUser($email);

        if ($user) {
            // Cek password.
            if (password_verify($password, $user->password)) { 
                $session_data = array(
                    'id_user'   => $user->id_user,
                    'nama'      => $user->nama_lengkap,
                    'email'     => $user->email,
                    'role'      => $user->role, // 'admin' atau 'user'
                    'logged_in' => TRUE
                );
                
                $this->session->set_userdata($session_data);

                // Arahkan sesuai Role
                if ($user->role == 'admin') {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Selamat datang, Admin!</div>');
                    redirect(base_url('admin/dashboard')); // Redirect ke Admin
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-success">Selamat datang kembali!</div>');
                    redirect(base_url('/')); // Redirect ke User Home
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Password salah.</div>');
                redirect(base_url('auth/login'));
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Email belum terdaftar.</div>');
            redirect(base_url('auth/login'));
        }
    }

    // =========================================================================
    // REGISTRASI
    // =========================================================================

    public function register() {
        // Jika sudah login, redirect ke Home
        if ($this->session->userdata('logged_in')) {
            redirect(base_url('/'));
        }
        
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'Email ini sudah terdaftar.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[confirm_password]', [
            'matches' => 'Konfirmasi Password tidak sama.',
            'min_length' => 'Password minimal 6 karakter.'
        ]);
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register');
        } else {
            $data = [
                'nama_lengkap'  => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT), 
                'role'          => 'user'
            ];

            $this->Auth_model->registerUser($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Akun berhasil dibuat! Silakan masuk.</div>');
            redirect(base_url('auth/login'));
        }
    }

    // =========================================================================
    // LOGOUT
    // =========================================================================
    
    public function logout() {
        // Hapus data sesi spesifik (optional, tapi disarankan)
        $this->session->unset_userdata(['id_user', 'nama', 'email', 'role', 'logged_in']);
        
        // Hancurkan seluruh sesi
        $this->session->sess_destroy();
        
        // Arahkan ke halaman beranda atau login
        redirect(base_url('/')); 
    }
}
/* End of file Auth.php */