<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Helper 'url' harus dimuat di Controller (misal: Katalog.php)
// $this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . ' | EzRent Camp Jogja' : 'EzRent Camp Jogja'; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/ezrentcamp.css'); ?>" rel="stylesheet">
</head>

<style>

.navbar-nav .nav-link:hover {
    color: #198754; /* hijau bootstrap */
}

</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand text-success" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" width="40" class="me-2">
            <span class="text-muted">EzRent Camp Jogja</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
           <ul class="navbar-nav align-items-center">
                <li class="nav-item mx-2"><a class="nav-link" href="<?= base_url(); ?>">Beranda</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="<?= base_url('katalog'); ?>">Katalog</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="<?= base_url('artikel'); ?>">Artikel</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="<?= base_url('testimoni'); ?>">Testimoni</a></li>
                <li class="nav-item mx-2"><a class="nav-link" href="<?= base_url('panduan'); ?>">Panduan Sewa</a></li>
            </ul>
        </div>

        <div class="d-flex">
            <?php if ($this->session->userdata('logged_in')): ?>
                <div class="dropdown">
                    <button class="btn btn-success rounded-pill dropdown-toggle" type="button" 
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i> 
                        Hai, <?php echo html_escape($this->session->userdata('nama')); ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                            <li><a class="dropdown-item" href="<?php echo site_url('admin/dashboard'); ?>">Dashboard Admin</a></li>
                        <?php else: ?>
                            <li><a class="dropdown-item" href="<?php echo site_url('user/profile'); ?>">Profil Saya</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('user/riwayat'); ?>">Riwayat Sewa</a></li>
                        <?php endif; ?>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="<?php echo site_url('auth/logout'); ?>">
                            <i class="bi bi-box-arrow-right"></i> Keluar
                        </a></li>
                    </ul>
                </div>
            <?php else: ?>
                <a href="<?php echo site_url('auth/login'); ?>" class="btn btn-success rounded-pill">
                    <i class="bi bi-person-circle me-1"></i> Masuk
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>