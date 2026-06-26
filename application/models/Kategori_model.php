<?php
class Kategori_model extends CI_Model {

   public function get_with_count_home()
    {
        return $this->db->select('kategori.id_kategori, kategori.nama_kategori, kategori.gambar, COUNT(produk.id_produk) AS jumlah_produk')
        ->from('kategori')
        ->join('produk', 'produk.id_kategori = kategori.id_kategori', 'left')
        ->where('kategori.status', 'aktif')
        ->group_by('kategori.id_kategori')
        ->get()
        ->result(); // OBJECT
    }

    public function get_with_count()
    {
        return $this->db->select('kategori.*, COUNT(produk.id_produk) AS jumlah_produk')
        ->from('kategori')
        ->join('produk', 'produk.id_kategori = kategori.id_kategori', 'left')
        ->group_by('kategori.id_kategori')
        ->get()->result();
    }
    public function insert($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori');
    }

    public function get_by_id($id)
    {
        return $this->db->where('id_kategori', $id)->get('kategori')->row();
    }

    public function update($id, $data)
    {
        return $this->db->where('id_kategori', $id)->update('kategori', $data);
    }

}