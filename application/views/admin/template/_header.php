<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - <?php echo ucfirst($current_page); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Sidebar (Figma Style – Putih Bersih) */
        .sidebar {
            width: 260px;
            background-color: #ffffff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 25px;
            transition: 0.3s;
            z-index: 1000;
            border-right: 1px solid #e2e8f0; /* garis tipis elegan */
        }

        .sidebar.show { left: 0; }

        @media(max-width: 992px) {
            .sidebar { left: -300px; }
        }

        /* Judul Sidebar */
        .sidebar h4 {
            color: #159F46;
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
        }

        /* Menu di Sidebar */
        .nav-link {
            color: #1e293b !important;  /* teks gelap rapi */
            padding: 12px 22px;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 8px;
            margin: 4px 12px;
            transition: 0.2s ease;
        }

        .nav-link i {
            color: #159F46;  /* ikon hijau seperti Figma */
            font-size: 18px;
        }

        /* Hover */
        .nav-link:hover {
            background: #f1f5f9;  /* abu soft */
        }

        /* Active Menu */
        .nav-link.active {
            background: #e2f8ec;
            border-left: 4px solid #159F46;
            color: #159F46 !important;
            font-weight: 600;
        }

        /* Toggle Button */
        .toggle-btn {
            display: none;
            position: fixed;
            top: 18px;
            left: 18px;
            z-index: 1200;
            background: #159F46;
            padding: 8px 10px;
            border-radius: 8px;
            border: none;
            color: white;
            font-size: 22px;
        }
        @media(max-width: 992px) {
            .toggle-btn {
                display: inline-block;
            }
            .main-content {
                margin-left: 0 !important;
            }
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 30px;
        }
        
        /* Card & Button Styles */
        .card {
            border-radius: 18px !important;
            border: none !important;
            box-shadow: 0 6px 16px rgba(0,0,0,0.05);
        }
        
        /* Tombol Hijau Khas EzRent */
        .btn-ezrent {
            background-color: #159F46;
            border-color: #159F46;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            padding: 8px 15px;
        }
        .btn-ezrent:hover {
            background-color: #12883e;
            border-color: #12883e;
            color: white;
        }
        
        /* Override form-control default style */
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            padding: 10px 15px;
        }
        
        /* Modal Style (Hanya jika Anda menggunakan modal, tapi contoh gambar Anda adalah modal) */
        .modal-content {
            border-radius: 18px;
        }
        
        /* Tabel Style */
        .table > :not(caption)>*>* {
            padding: 1rem;
        }
        .table th {
            color: #64748b;
            text-transform: uppercase;
            font-size: 12px;
        }
    </style>
</head>

<body>

<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
</button>

<div class="sidebar" id="sidebar">
    <h4>EzRent Admin</h4>

    <nav class="nav flex-column">
        <a class="nav-link <?php echo $current_page == 'dashboard' ? 'active' : ''; ?>" href="<?php echo base_url('admin/dashboard'); ?>"><i class="bi bi-speedometer2"></i> Dashboard</a>
        <a class="nav-link <?php echo $current_page == 'produk' ? 'active' : ''; ?>" href="<?php echo base_url('admin/produk'); ?>"><i class="bi bi-box-seam"></i> Kelola Produk</a>
        <a class="nav-link <?php echo $current_page == 'kategori' ? 'active' : ''; ?>" href="<?php echo base_url('admin/kategori'); ?>"><i class="bi bi-tags"></i> Kelola Kategori</a>
        <a class="nav-link <?php echo $current_page == 'transaksi' ? 'active' : ''; ?>" href="<?php echo base_url('admin/transaksi'); ?>"><i class="bi bi-receipt"></i> Kelola Pemesanan</a>
        <a class="nav-link <?php echo $current_page == 'user' ? 'active' : ''; ?>" href="<?php echo base_url('admin/user'); ?>"><i class="bi bi-people"></i> Data User</a>
        <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>"><i class="bi bi-box-arrow-right"></i> Keluar</a>
    </nav>
</div>

<div class="main-content">