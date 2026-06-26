<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    /* === METHOD YANG SUDAH ADA (TIDAK DIUBAH) === */

    public function get_all_user()
    {
        return $this->db->get('users')->result();
    }

    public function get_all()
    {
        // Alias dari get_all_user()
        return $this->get_all_user();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('users', ['id_user' => $id])->row();
    }

    /* === METHOD TAMBAHAN UNTUK ADMIN === */

    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->delete('users');
    }

    public function change_role($id)
    {
        $user = $this->get_by_id($id);

        if (!$user) {
            return false;
        }

        // Toggle role: user <-> admin
        $new_role = ($user->role == 'admin') ? 'user' : 'admin';

        $this->db->where('id_user', $id);
        return $this->db->update('users', [
            'role' => $new_role
        ]);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_user', $id)->update('users', $data);
    }

}