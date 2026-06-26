<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_produk_model extends CI_Model {

    protected $table = 'foto_produk';

    public function get_by_produk($id_produk)
    {
        return $this->db->get_where($this->table, [
            'id_produk' => $id_produk
        ])->result();
    }

    public function get_first_foto($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete_by_produk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        return $this->db->delete($this->table);
    }
}
