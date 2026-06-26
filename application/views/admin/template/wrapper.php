<?php
// Di sini, semua key dari array $data sudah menjadi variabel mandiri.
// Kita hanya perlu memastikan kita mengirim data jika view yang dimuat membutuhkannya.
// Karena semua views membutuhkan data, kita akan menggunakan array kosong/variabel yang sudah ada.

$this->load->view('admin/layout/header'); // Menggunakan variabel mandiri di dalamnya (e.g., $title)
$this->load->view('admin/layout/sidebar'); // Menggunakan variabel mandiri di dalamnya (e.g., $user_login)
$this->load->view($content); // $content sudah didefinisikan sebagai 'admin/dashboard/list'
$this->load->view('admin/layout/footer');