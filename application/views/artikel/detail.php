<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
/* === CSS DETAIL ARTIKEL SESUAI DESAIN === */
.detail-container {
    max-width: 900px;
    margin: auto;
    padding: 30px 15px;
}


/* Breadcrumb */
.breadcrumb-custom {
    font-size: 0.85rem;
    color: #6c757d;
    margin-bottom: 20px;
}

.breadcrumb-custom a {
    color: #6c757d;
    text-decoration: none;
}

.breadcrumb-custom a:hover {
    color: #159f46;
}

/* Back Button */
.back-button {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    border: 1px solid #159f46;
    color: #159f46;
    text-decoration: none;
    border-radius: 6px;
    font-size: 0.85rem;
    margin-bottom: 25px;
    transition: all 0.3s;
}

.back-button:hover {
    background-color: #159f46;
    color: white;
    text-decoration: none;
}

/* Tag Badge */
.tag-badge {
    background-color: #159f46;
    color: white;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 15px;
}

/* Detail Header */
.detail-header {
    margin-bottom: 20px;
}

.detail-header h1 {
    font-size: 1.8rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 15px;
    line-height: 1.3;
}

.detail-info {
    font-size: 0.85rem;
    color: #6c757d;
    margin-bottom: 20px;
}

.detail-info i {
    margin-right: 4px;
    color: #999;
}

.detail-info strong {
    font-weight: 400;
    color: #495057;
}

/* Share Button */
.share-button {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    background-color: white;
    color: #159f46;
    text-decoration: none;
    border-radius: 6px;
    font-size: 0.85rem;
    border: 1px solid #159f46;
    cursor: pointer;
    float: right;
    transition: all 0.3s;
}

.share-button:hover {
    background-color: #f0fdf4;
    color: #159f46;
    text-decoration: none;
}

/* Thumbnail */
.detail-thumbnail {
    width: 100%;
    max-height: 450px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 30px;
}

/* Content - Versi Perbaikan Jarak Rapat */
.detail-content {
    font-size: 0.95rem;
    line-height: 1.6; /* Sedikit dirapatkan dari 1.8 */
    color: #333;
}

.detail-content h2 {
    font-size: 1.4rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-top: 20px; /* Dikurangi dari 30px */
    margin-bottom: 10px; /* Dikurangi dari 15px */
}

.detail-content h3 {
    font-size: 1.2rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-top: 18px; /* Dikurangi dari 25px */
    margin-bottom: 8px; /* Dikurangi dari 12px */
}

.detail-content p {
    line-height: 1.5 !important;    /* Jarak antar baris lebih rapat */
    margin-bottom: 4px !important;  /* Jarak antar paragraf sangat tipis */
    margin-top: 0 !important;       /* Memastikan tidak ada tarikan ke atas */
    text-align: justify;
    color: #495057;
}

.detail-content ul, .detail-content ol {
    padding-left: 20px;
    margin-bottom: 15px;
}

.detail-content li {
    margin-bottom: 4px; /* Dari 8px jadi 4px */
    line-height: 1.5;
}

/* Tambahan: Menghilangkan margin di paragraf terakhir agar tidak ada space kosong di bawah */
.detail-content p:last-child {
    margin-bottom: 0;
}

.detail-content p:empty {
    display: none;
}

/* Artikel Terkait */
.artikel-rekomendasi {
    margin-top: 60px;
    padding-top: 40px;
    border-top: 1px solid #e9ecef;
}

.artikel-rekomendasi h5 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 25px;
}

.rekomendasi-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

/* Card Artikel Terkait */
.artikel-terkait-card {
    display: block;
    text-decoration: none;
    color: #343a40;
    transition: transform 0.3s;
}

.artikel-terkait-card:hover {
    transform: translateY(-5px);
    text-decoration: none;
}

.artikel-terkait-card img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 12px;
}

.artikel-terkait-card .tag-small {
    font-size: 0.75rem;
    color: #6c757d;
    display: block;
    margin-bottom: 6px;
}

.artikel-terkait-card h6 {
    font-size: 0.95rem;
    font-weight: 600;
    color: #1a1a1a;
    line-height: 1.4;
    margin-bottom: 8px;
}

.artikel-terkait-card:hover h6 {
    color: #159f46;
}

.artikel-terkait-card small {
    font-size: 0.8rem;
    color: #999;
}

/* Responsive */
@media (max-width: 768px) {
    .detail-header h1 {
        font-size: 1.5rem;
    }
    
    .rekomendasi-grid {
        grid-template-columns: 1fr;
    }
    
    .share-button {
        float: none;
        display: block;
        text-align: center;
        margin-top: 10px;
    }
}
</style>

<div class="detail-container">
    <?php $a = $artikel; ?>
    
    <!-- Breadcrumb -->
    <p class="breadcrumb-custom">
        <a href="<?= site_url() ?>">Beranda</a> / 
        <a href="<?= site_url('artikel') ?>">Artikel</a> / 
        <?= html_escape($a['judul']) ?>
    </p>
    
    <!-- Back Button -->
    <a href="<?= site_url('artikel') ?>" class="back-button">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar
    </a>
    
    <div class="detail-header">
        <!-- Tag Badge -->
        <span class="tag-badge"><?= html_escape($a['tag']) ?></span>
        
        <!-- Title -->
        <h1><?= html_escape($a['judul']) ?></h1>
        
        <!-- Info & Share -->
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div class="detail-info">
                <i class="far fa-user"></i> <strong><?= html_escape($a['penulis']) ?></strong> 
                | <i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($a['tanggal_publish'])) ?>
                | <i class="far fa-clock"></i> 5 menit baca
            </div>
        </div>
    </div>
    
    <!-- Thumbnail -->
    <img src="<?= base_url('assets/img/artikel/' . html_escape($a['thumbnail'])) ?>" 
         alt="<?= html_escape($a['judul']) ?>" class="detail-thumbnail">
    
    <!-- Content -->
    <div class="detail-content">
        <?= nl2br($a['konten']) ?> 
    </div>
    
    <!-- Artikel Terkait -->
    <div class="artikel-rekomendasi">
        <h5>Artikel Terkait</h5>
        
        <div class="rekomendasi-grid mt-4">
            <?php if (!empty($artikel_terkait)): ?>
                <?php foreach ($artikel_terkait as $related): ?>
                    <a href="<?= site_url('artikel/detail/' . $related['id_artikel']) ?>" class="artikel-terkait-card">
                        <img src="<?= base_url('assets/img/artikel/' . html_escape($related['thumbnail'])) ?>" 
                             alt="<?= html_escape($related['judul']) ?>">
                        <span class="tag-small"><?= html_escape($related['tag']) ?></span>
                        <h6><?= html_escape($related['judul']) ?></h6>
                        <small><?= date('d M Y', strtotime($related['tanggal_publish'])) ?></small>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="col-12">Tidak ada artikel terkait yang ditemukan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>