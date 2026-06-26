<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {

    public function insert($data)
    {
        return $this->db->insert('review', $data);
    }

    public function cek_review($id_user, $id_produk)
    {
        return $this->db
            ->where('id_user', $id_user)
            ->where('id_produk', $id_produk)
            ->get('review')
            ->row();
    }

}

?>