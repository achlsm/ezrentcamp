<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function get_all_admin() {
        return $this->db
            ->select('transaksi.*, users.nama_lengkap, produk.nama_produk')
            ->from('transaksi')
            ->join('users', 'users.id_user = transaksi.id_user')
            ->join('produk', 'produk.id_produk = transaksi.id_produk')
            ->order_by('transaksi.created_at', 'DESC')
            ->get()->result();
    }

    public function insert($data) {
        return $this->db->insert('transaksi', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_transaksi', $id)
                        ->update('transaksi', $data);
    }

    public function delete($id) {
        return $this->db->where('id_transaksi', $id)
                        ->delete('transaksi');
    }

    public function getByUser($id_user)
    {
        $this->db->select('transaksi.*, produk.nama_produk');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk');
        return $this->db
            ->where('transaksi.id_user', $id_user)
            ->order_by('transaksi.created_at', 'DESC')
            ->get('transaksi')
            ->result();
    }

    public function getDetail($id)
    {
        $this->db->select('transaksi.*, produk.nama_produk, produk.harga');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk');
        return $this->db
            ->where('id_transaksi', $id)
            ->get('transaksi')
            ->row();
    }

    public function get_detail_user($id_transaksi, $id_user)
    {
        return $this->db
            ->select('transaksi.*, produk.nama_produk, produk.harga')
            ->from('transaksi')
            ->join('produk', 'produk.id_produk = transaksi.id_produk')
            ->where('transaksi.id_transaksi', $id_transaksi)
            ->where('transaksi.id_user', $id_user)
            ->get()
            ->row();
    }

}