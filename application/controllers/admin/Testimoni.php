<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Testimoni_model');
    }

    public function index()
    {
        $data['review'] = $this->Testimoni_model->admin_get_all();
        $data['total_review']     = $this->Testimoni_model->count_all();
        $data['pending_review']   = $this->Testimoni_model->count_pending();
        $data['rating_rata2']     = round($this->Testimoni_model->avg_rating(), 1);
        $this->load->view('admin/testimoni/index', $data);
    }

    public function approve($id_review)
    {
        $this->Testimoni_model->update_status($id_review, "approved");

        $review = $this->db->get_where('review', ['id_review' => $id_review])->row();
        
        if ($review) {
            $id_p = $review->id_produk;

            $this->db->select('AVG(rating) as avg_rating, COUNT(*) as total_review');
            $this->db->where(['id_produk' => $id_p, 'status' => 'approved']);
            $stats = $this->db->get('review')->row();

            $this->db->where('id_produk', $id_p);
            $this->db->update('produk', [
                'rating' => ($stats->avg_rating ?? 0),
                'jumlah_review' => ($stats->total_review ?? 0)
            ]);
        }

        redirect('admin/testimoni');
    }

    public function reject($id_review)
    {
        $this->Testimoni_model->update_status($id_review, "rejected");
        redirect('admin/testimoni');
    }

    /* ================================
       TAMBAHAN: HAPUS TESTIMONI
       ================================ */
    public function delete($id_review)
    {
        if (!$id_review) {
            redirect('admin/testimoni');
        }

        $this->Testimoni_model->delete($id_review);

        $this->session->set_flashdata('success', 'Testimoni berhasil dihapus');

        redirect('admin/testimoni');
    }
}