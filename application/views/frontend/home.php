<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EzRent Camp Jogja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* NAVBAR */
        .navbar {
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* HERO SECTION - Dipercantik */
        .hero {
            background: linear-gradient(135deg, #159f46 0%, #0d7a35 100%);
            padding: 120px 0 100px 0;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="white" opacity="0.1"/></svg>');
            opacity: 0.3;
        }

        .hero h6 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .hero h8 {
            font-size: 1.1rem;
            opacity: 0.95;
            display: block;
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
        }

        .hero form {
            position: relative;
            z-index: 1;
            max-width: 700px;
            margin: 0 auto;
        }

        .hero input {
            padding: 14px 24px;
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }

        .hero button {
            padding: 14px 32px;
            font-weight: 600;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }

        /* KATEGORI */
        .kategori-card {
            border-radius: 15px;
            padding: 24px 20px;
            background: white;
            transition: all 0.3s ease;
            border: 2px solid #f0f0f0;
            height: 100%;
        }

        .kategori-card:hover {
            transform: translateY(-8px);
            box-shadow: 0px 15px 30px rgba(0,0,0,0.12);
            border-color: #159f46;
        }

        .kategori-card img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        /* PRODUK CARD */
        .produk-card {
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: none;
            height: 100%;
        }

        .produk-card:hover {
            transform: translateY(-8px);
            box-shadow: 0px 15px 30px rgba(0,0,0,0.15);
        }

        .produk-card img {
            height: 200px;
            object-fit: cover;
        }

        /* REKOMENDASI PAKET - FULL WIDTH */
        .paket-section {
            background: linear-gradient(to bottom, #f8f9fa 0%, #e9ecef 100%);
            padding: 80px 0;
        }

        .paket-container {
            max-width: 100%;
            padding: 0;
        }

        .paket-card {
            border-radius: 20px;
            padding: 40px 30px;
            background: white;
            transition: all 0.3s ease;
            border: 2px solid #e9ecef;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .paket-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .paket-card.popular {
            background: linear-gradient(135deg, #159f46 0%, #0d7a35 100%);
            color: white;
            border: none;
            position: relative;
            box-shadow: 0 10px 30px rgba(21, 159, 70, 0.3);
        }

        .paket-card .fs-1 {
            font-size: 4rem !important;
            margin-bottom: 1.5rem;
        }

        .paket-card h5 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .paket-card ul {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
            flex-grow: 1;
        }

        .paket-card ul li {
            padding: 8px 0;
            font-size: 0.95rem;
        }

        .paket-card .fw-bold.fs-5 {
            font-size: 2rem !important;
            font-weight: 700;
            margin: 1.5rem 0;
        }

        .badge-popular {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        /* TESTIMONIAL */
        .testimonial-card {
            border-radius: 15px;
            padding: 24px;
            background: white;
            box-shadow: 0px 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .testimonial-card:hover {
            box-shadow: 0px 10px 30px rgba(0,0,0,0.15);
            transform: translateY(-5px);
        }

        /* SECTION */
        .section-grey {
            background-color: #f8f9fa;
            padding: 80px 0;
        }

        .section-white {
            padding: 80px 0;
        }

        /* CTA SECTION */
        .cta-section {
            background: linear-gradient(135deg, #159f46 0%, #0d7a35 100%);
            padding: 80px 0;
            color: white;
            text-align: center;
        }

        .cta-section h6 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-section h8 {
            font-size: 1.1rem;
            display: block;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        /* FOOTER */
        footer {
            background: #1a1a1a;
            color: #d0d0d0;
            padding: 60px 0 0 0;
        }

        footer h5, footer h6 {
            color: #159f46;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        footer p {
            line-height: 1.8;
            margin-bottom: 0.8rem;
        }

        footer ul {
            padding: 0;
            list-style: none;
        }

        footer ul li {
            margin-bottom: 0.8rem;
        }

        footer a {
            color: #d0d0d0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #159f46;
        }

        footer .btn-success {
            transition: all 0.3s ease;
        }

        footer .btn-success:hover {
            background: #0d7a35;
            transform: translateY(-2px);
        }

        footer .bi {
            transition: all 0.3s ease;
        }

        footer a .bi:hover {
            transform: scale(1.2);
        }

        footer hr {
            border-color: #333;
            margin: 40px 0 20px 0;
        }

        footer .text-center.text-secondary {
            padding: 20px 0;
        }

        /* UTILITIES */
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .hero h6 {
                font-size: 1.8rem;
            }

            .hero h8 {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .paket-card {
                margin-bottom: 20px;
            }

            .navbar-nav .nav-link:hover {
                color: #198754; /* hijau bootstrap */
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand text-success" href="#">
            <img src="assets/img/logo.png" alt="Logo" width="40" class="me-2">
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
                        Hai, <?php echo $this->session->userdata('nama'); ?>
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
    </div>
</nav>

<section class="hero">
    <h6>Sewa Perlengkapan Outdoor di Jogja</h6>
    <h8>Rental tenda, carrier, jaket, cooking set, dan peralatan camping berkualitas dengan harga terjangkau</h8>

<form action="<?= site_url('katalog'); ?>" method="GET"
      class="d-flex justify-content-center mt-4">

    <input type="text" name="cari"
           class="form-control w-50 rounded-pill"
           placeholder="Cari produk: tenda, carrier, sleeping bag..."
           autocomplete="off">

    <button type="submit"
            class="btn btn-light rounded-pill px-4 ms-2">
        <i class="bi bi-search"></i>
    </button>
</form>
</section>

<!-- KATEGORI PRODUK -->
<div class="section-grey">
    <div class="container my-5">
        <h4 class="text-center">Kategori Produk</h4>
        <p class="text-center text-muted">Pilih kategori peralatan yang Anda butuhkan</p>

        <div class="row justify-content-center mt-4 g-4">

        <?php if (!empty($kategori_list)): ?>
            <?php foreach ($kategori_list as $k): ?>
                <div class="col-md-2 col-6 text-center">
                    <a href="<?= base_url('katalog?kategori='.$k->id_kategori) ?>"
                       class="text-decoration-none text-dark d-block">

                        <div class="kategori-card">
                            <img src="<?= base_url('assets/img/kategori/'.($k->gambar ?: 'default.png')) ?>" width="60">
                            <h6><?= html_escape($k->nama_kategori) ?></h6>
                            <small><?= $k->jumlah_produk ?> produk</small>
                        </div>

                    </a>
                </div>

                         <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Kategori belum tersedia</p>
        <?php endif; ?>
        </div>
    </div>
</div>


<!-- PRODUK POPULER -->
<div class="container my-5">
    <div class="d-flex justify-content-between">
        <h4>Produk Populer</h4>
        <a href="<?php echo base_url('katalog'); ?>" class="btn btn-outline-success">Lihat Semua →</a>
    </div>
    <p>Peralatan paling sering disewa</p>

    <div class="row mt-4 g-4">
        <!-- DATA ASLI DARI PHP - Contoh static untuk demo -->
        <div class="col-md-3 col-12">
            <div class="card produk-card shadow-sm">
                <div class="position-relative">
                    <img src="assets/img/produk/tenda.jpg" class="card-img-top" height="180" style="object-fit: cover;">
                    <span class="badge bg-success position-absolute m-3">Tersedia</span>
                </div>
                <div class="card-body">
                    <h6>Tenda 4 Orang Waterproof</h6>
                    <div class="text-warning mb-1">⭐ 4.8</div>
                    <p class="text-success">Rp 50.000/hari</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="card produk-card shadow-sm">
                <div class="position-relative">
                    <img src="assets/img/produk/carrier.jpg" class="card-img-top" height="180" style="object-fit: cover;">
                    <span class="badge bg-success position-absolute m-3">Tersedia</span>
                </div>
                <div class="card-body">
                    <h6>Carrier 60L dengan Raincover</h6>
                    <div class="text-warning mb-1">⭐ 4.9</div>
                    <p class="text-success">Rp 35.000/hari</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="card produk-card shadow-sm">
                <div class="position-relative">
                    <img src="assets/img/produk/sleepbag.jpg" class="card-img-top" height="180" style="object-fit: cover;">
                    <span class="badge bg-success position-absolute m-3">Tersedia</span>
                </div>
                <div class="card-body">
                    <h6>Sleeping Bag Hangat</h6>
                    <div class="text-warning mb-1">⭐ 4.7</div>
                    <p class="text-success">Rp 20.000/hari</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-12">
            <div class="card produk-card shadow-sm">
                <div class="position-relative">
                    <img src="assets/img/produk/cooking.jpg" class="card-img-top" height="180" style="object-fit: cover;">
                    <span class="badge bg-success position-absolute m-3">Tersedia</span>
                </div>
                <div class="card-body">
                    <h6>Cooking Set Lengkap untuk 4 Orang</h6>
                    <div class="text-warning mb-1">⭐ 4.8</div>
                    <p class="text-success">Rp 25.000/hari</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- REKOMENDASI PAKET -->
<div class="section-grey">
    <div class="container">
        <h4 class="text-center">Rekomendasi Paket</h4>
        <p class="text-center text-muted">Paket lengkap untuk petualangan Anda</p>

        <div class="row mt-4 justify-content-center g-4">

            <!-- Paket Camping Basic -->
            <div class="col-md-4">
                <div class="card paket-card shadow-sm text-center">
                    <div class="fs-1 mb-2">⛺</div>
                    <h6 class="fw-bold">Paket Camping Basic</h6>
                    <ul class="text-start my-3 small">
                        <li>✔ Tenda 2–4 orang</li>
                        <li>✔ Sleeping bag 2 buah</li>
                        <li>✔ Matras 2 buah</li>
                        <li>✔ Senter LED</li>
                    </ul>
                    <p class="text-success fw-bold fs-4">Rp 100.000 <span class="small">/hari</span></p>
                </div>
            </div>

            <!-- Paket Hiking Complete (Popular) -->
            <div class="col-md-4">
                <div class="card paket-card popular shadow-lg text-center">
                    <div class="position-absolute top-0 end-0 badge bg-warning text-dark m-3">POPULAR</div>
                    <div class="fs-1 mb-2">🎒</div>
                    <h6 class="fw-bold">Paket Hiking Complete</h6>
                    <ul class="text-start my-3 small">
                        <li>✔ Carrier 60L</li>
                        <li>✔ Jaket gunung windproof</li>
                        <li>✔ Trekking pole</li>
                        <li>✔ Headlamp</li>
                        <li>✔ Kompas & Peta</li>
                    </ul>
                    <p class="fw-bold fs-4">Rp 85.000 <span class="small">/hari</span></p>
                </div>
            </div>

            <!-- Paket Cooking -->
            <div class="col-md-4">
                <div class="card paket-card shadow-sm text-center">
                    <div class="fs-1 mb-2">🍳</div>
                    <h6 class="fw-bold">Paket Cooking</h6>
                    <ul class="text-start my-3 small">
                        <li>✔ Kompor portable + gas</li>
                        <li>✔ Nesting (panci set)</li>
                        <li>✔ Peralatan makan 4 set</li>
                        <li>✔ Jerigen air 5L</li>
                    </ul>
                    <p class="text-success fw-bold fs-4">Rp 45.000 <span class="small">/hari</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- TESTIMONI PELANGGAN -->
<div class="container my-5">
    <div class="d-flex justify-content-between">
        <h4>Testimoni Pelanggan</h4>
        <a href="<?= base_url('testimoni'); ?>" class="btn btn-outline-success">Lihat Semua →</a>
    </div>
    <p>Apa kata mereka yang sudah sewa</p>

    <div class="row mt-4 g-4">
        <!-- DATA ASLI DARI PHP - Contoh static untuk demo -->
        <div class="col-md-4">
            <div class="testimonial-card">
                <div class="d-flex align-items-center mb-1">
                    <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center me-2"
                         style="width: 32px; height: 32px; font-size:14px;">
                        <i class="bi bi-person"></i>
                    </div>
                    <strong>Budi Santoso</strong>
                </div>
                <div class="text-warning mb-1">⭐ 5.0</div>
                <p class="mt-2">Pelayanan sangat memuaskan! Peralatan lengkap dan berkualitas. Proses booking via WhatsApp sangat cepat.</p>
                <div class="text-success small">Tenda 4 Orang Waterproof</div>
                <div class="text-muted small">15 Nov 2024</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-card">
                <div class="d-flex align-items-center mb-1">
                    <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center me-2"
                         style="width: 32px; height: 32px; font-size:14px;">
                        <i class="bi bi-person"></i>
                    </div>
                    <strong>Siti Rahma</strong>
                </div>
                <div class="text-warning mb-1">⭐ 4.8</div>
                <p class="mt-2">Harga terjangkau dan barangnya masih bagus semua. Owner responsif! Pasti sewa lagi kalau mau hiking!</p>
                <div class="text-success small">Carrier 60L dengan Raincover</div>
                <div class="text-muted small">10 Nov 2024</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-card">
                <div class="d-flex align-items-center mb-1">
                    <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center me-2"
                         style="width: 32px; height: 32px; font-size:14px;">
                        <i class="bi bi-person"></i>
                    </div>
                    <strong>Andi Wijaya</strong>
                </div>
                <div class="text-warning mb-1">⭐ 5.0</div>
                <p class="mt-2">Mantap! Carrier nyaman dibawa, cooking set lengkap. Overall bagus!</p>
                <div class="text-success small">Cooking Set Lengkap untuk 4 Orang</div>
                <div class="text-muted small">05 Nov 2024</div>
            </div>
        </div>
    </div>
</div>

<!-- CTA WHATSAPP -->
<section class="py-5 text-center" style="background: #159f46; color:white;">
    <h6>Siap Untuk Petualangan?</h6>
    <p><h8>Booking perlengkapan camping Anda sekarang melalui WhatsApp untuk proses cepat dan mudah</h8></p>
    <a href="<?= base_url('katalog'); ?>" class="btn btn-light rounded-pill px-4 me-2">Lihat Katalog</a>
    <a href="https://wa.me/6281234567890" class="btn btn-outline-light rounded-pill px-4">Hubungi via WhatsApp</a>
</section>

<!-- FOOTER -->
<style>
    .footer-full {
        background: #000;
        color: #e6e6e6;
        padding: 50px 0;
        font-weight: 300;
    }
    .footer-full h5 {
        color: #159f46;
        font-weight: 400;
    }
    .footer-full h6 {
        color: #ffffff;
        font-weight: 400;
    }
    .footer-full a, 
    .footer-full p, 
    .footer-full li {
        color: #e6e6e6 !important;
        opacity: 0.85;
        font-weight: 300;
    }
    .footer-full a:hover {
        color: #fff !important;
        opacity: 1;
    }
    .footer-full hr {
        border-color: #444;
    }
</style>

<footer class="full-bleed footer-full">
    <div class="container">
        <div class="row">

            <div class="col-md-3 mb-4">
                <h5>EzRent Camp Jogja</h5>
                <p>Platform rental perlengkapan outdoor terpercaya di Yogyakarta. Sewa peralatan camping & hiking berkualitas dengan harga terjangkau.</p>
            </div>

            <div class="col-md-3 mb-4">
                <h5>Tautan Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Katalog Produk</a></li>
                    <li><a href="#">Artikel</a></li>
                    <li><a href="#">Testimoni</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h5>Kontak</h5>
                <p><i class="bi bi-geo-alt"></i> Jl. Kaliurang KM 5, Yogyakarta</p>
                <p><i class="bi bi-telephone"></i> +62 812-3456-7890</p>
                <p><i class="bi bi-envelope"></i> info@ezrentcampjogja.com</p>
            </div>

            <div class="col-md-3 mb-4">
                <h5>Sewa Sekarang</h5>
                <p>Pesan perlengkapan camping Anda melalui WhatsApp untuk respon cepat!</p>

                <a href="https://wa.me/6281234567890" class="btn btn-success btn-sm w-100 mb-2">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
            </div>

        </div>

        <hr>

        <p class="text-center small mb-0">
            © <?= date('Y'); ?> EzRent Camp Jogja. All rights reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>