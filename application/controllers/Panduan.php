<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panduan extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Panduan Sewa';
        $this->load->view('frontend/header', $data);
        $this->load->view('panduan/index', $data);
        $this->load->view('frontend/footer', $data);
    }
}