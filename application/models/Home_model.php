<?php
class Home_model extends CI_Model {

    public function getKategori() {
        $this->db->select('kategori.*, COUNT(produk.id_produk) AS total_produk');
        $this->db->from('kategori');
        $this->db->join('produk', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->group_by('kategori.id_kategori');
        return $this->db->get()->result();
    }

    public function getProdukPopuler($limit = 4) {
        $this->db->select('produk.*, foto_produk.nama_file');
        $this->db->from('produk');
        $this->db->join('foto_produk', 'foto_produk.id_produk = produk.id_produk', 'left');
        $this->db->order_by('produk.jumlah_disewa', 'DESC');
        $this->db->group_by('produk.id_produk');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function getTestimoni($limit = 3) {
        $this->db->select('review.*, users.nama_lengkap, produk.nama_produk');
        $this->db->from('review');
        $this->db->join('users', 'review.id_user = users.id_user');
        $this->db->join('produk', 'review.id_produk = produk.id_produk');
        $this->db->order_by('review.created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function searchProduk($keyword) {
        $this->db->like('nama_produk', $keyword);
        $this->db->or_like('deskripsi', $keyword);
        $this->db->or_like('spesifikasi', $keyword);
        return $this->db->get('produk')->result();
    }
}