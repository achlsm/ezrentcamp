<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends CI_Controller {

    public function index()
    {
        $this->load->model('Testimoni_model');

        $keyword = $this->input->get('cari');

        if ($keyword) {
            $data['review'] = $this->Testimoni_model->search($keyword);
        } else {
            $data['review'] = $this->Testimoni_model->getAll();
        }

        $this->load->view('frontend/header', $data); 
        $this->load->view('review/index', $data);
        $this->load->view('frontend/footer', $data); 
    }

}