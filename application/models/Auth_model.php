<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function getUser($email) {
        // Ambil data user berdasarkan email
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row(); // Mengembalikan satu baris objek
    }

    public function registerUser($data) {
        // Simpan data user baru ke tabel users
        return $this->db->insert('users', $data);
    }
}