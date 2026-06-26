<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_artikel extends CI_Model {

    public function get_all() {
        // Gabungkan dengan tabel users untuk mengambil nama penulis
        $this->db->select('artikel.*, users.nama_lengkap as nama_penulis');
        $this->db->from('artikel');
        $this->db->join('users', 'artikel.id_admin = users.id_user', 'left'); // Sesuaikan id_user jika nama kolom di tabel users beda
        $this->db->order_by('artikel.created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function simpan($data) {
        return $this->db->insert('artikel', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_artikel', $id);
        return $this->db->update('artikel', $data);
    }

    public function hapus($id) {
        $artikel = $this->db->get_where('artikel', ['id_artikel' => $id])->row();
        if ($artikel->thumbnail && file_exists('./assets/img/artikel/' . $artikel->thumbnail)) {
            unlink('./assets/img/artikel/' . $artikel->thumbnail);
        }
        return $this->db->delete('artikel', ['id_artikel' => $id]);
    }

    public function count_status($status) {
        return $this->db->get_where('artikel', ['status' => $status])->num_rows();
    }
}