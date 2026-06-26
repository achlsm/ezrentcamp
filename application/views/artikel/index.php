<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
/* === CSS ARTIKEL SESUAI DESAIN === */
.artikel-jumbotron {
    background-color: #159f46;
    color: white;
    padding: 50px 0;
    text-align: left;
}

.artikel-jumbotron h1 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 6px;
}

.artikel-jumbotron p {
    font-size: 0.9rem;
    margin-bottom: 0;
    opacity: 0.95;
}

.artikel-container {
    padding: 40px 15px;
    max-width: 1200px;
    margin: auto;
}

/* Search Bar */
.search-filter-area {
    margin-bottom: 25px;
}

.search-filter-area .input-group {
    max-width: 400px;
}

.search-filter-area .form-control {
    border-radius: 8px 0 0 8px;
    border: 1px solid #e9ecef;
    padding: 10px 15px;
    font-size: 0.9rem;
    background-color: #f8f9fa;
}

.search-filter-area .form-control:focus {
    border-color: #159f46;
    background-color: white;
    box-shadow: none;
}

.search-filter-area .btn {
    border-radius: 0 8px 8px 0;
    background-color: #159f46;
    color: white;
    border: 1px solid #159f46;
    padding: 10px 20px;
    font-size: 0.9rem;
}

.search-filter-area .btn:hover {
    background-color: #128a3d;
}

/* Tag Buttons */
.tag-button {
    padding: 8px 16px;
    border-radius: 20px;
    margin-right: 8px;
    margin-bottom: 10px;
    display: inline-block;
    color: #6c757d;
    background-color: #f8f9fa;
    text-decoration: none;
    transition: all 0.3s;
    border: 1px solid #e9ecef;
    font-size: 0.85rem;
    font-weight: 500;
}

.tag-button:hover, .tag-button.active {
    background-color: #159f46;
    color: white;
    border-color: #159f46;
    text-decoration: none;
}

/* Featured Article */
.featured-article {
    border-radius: 12px;
    overflow: hidden;
    margin-bottom: 40px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    background-color: white;
}

.featured-article img {
    height: 350px;
    object-fit: cover;
    width: 100%;
}

.featured-content {
    padding: 30px;
}

.featured-tag {
    background-color: #159f46;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    display: inline-block;
    margin-bottom: 12px;
}

.featured-content h2 {
    font-size: 1.6rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 12px;
    line-height: 1.3;
}

.featured-content .text-muted {
    font-size: 0.95rem;
    color: #6c757d !important;
    line-height: 1.6;
    margin-bottom: 15px;
}

.artikel-info {
    font-size: 0.85rem;
    color: #999;
    margin-top: 12px;
}

.artikel-info strong {
    color: #495057;
    font-weight: 400;
}

.artikel-info i {
    margin-right: 5px;
}

.featured-content .btn-success {
    background-color: #159f46;
    border-color: #159f46;
    padding: 10px 24px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s;
}

.featured-content .btn-success:hover {
    background-color: #128a3d;
    border-color: #128a3d;
}

/* Section Title */
.artikel-container h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 20px;
    margin-top: 10px;
}

/* Article Cards */
.artikel-card {
    border-radius: 12px;
    overflow: hidden;
    height: 100%;
    box-shadow: 0 2px 10px rgba(0,0,0,0.06);
    text-decoration: none;
    color: #212529;
    background-color: white;
    transition: all 0.3s ease;
    display: block;
}

.artikel-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
    text-decoration: none;
    color: #212529;
}

.artikel-card .card-img-top {
    height: 200px;
    object-fit: cover;
    width: 100%;
    transition: transform 0.4s;
}

.artikel-card:hover .card-img-top {
    transform: scale(1.08);
}

.artikel-card .p-3 {
    padding: 18px !important;
}

.artikel-card .featured-tag {
    background-color: #6c757d;
    font-size: 0.7rem;
    padding: 4px 10px;
    margin-bottom: 8px;
}

.artikel-card h5 {
    font-size: 1rem;
    font-weight: 600;
    color: #1a1a1a;
    margin-top: 10px;
    margin-bottom: 10px;
    line-height: 1.4;
}

.excerpt-content {
    font-size: 0.85rem;
    color: #6c757d;
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 12px;
}

/* Grid Layout */
.row.g-4 {
    margin-right: -10px;
    margin-left: -10px;
}

.row.g-4 > div {
    padding-right: 10px;
    padding-left: 10px;
    margin-bottom: 20px;
}

/* No Result Message */
.text-center.w-100 {
    padding: 40px;
    color: #6c757d;
    font-size: 0.95rem;
}

.pagination-container {
    margin-top: 40px;
    display: flex;
    justify-content: center;
}
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    gap: 8px;
}
.pagination li a, .pagination li span {
    padding: 10px 18px;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    text-decoration: none;
    color: #495057;
    font-size: 0.9rem;
    background: white;
    transition: all 0.3s;
}
.pagination li.active span {
    background-color: #159f46;
    color: white;
    border-color: #159f46;
    font-weight: bold;
}
.pagination li a:hover {
    background-color: #f0fdf4;
    color: #159f46;
    border-color: #159f46;
}

/* Responsive */
@media (max-width: 768px) {
    .artikel-jumbotron h1 {
        font-size: 1.6rem;
    }
    
    .featured-article {
        display: block !important;
    }
    
    .featured-article .col-md-6 {
        width: 100%;
    }
    
    .featured-article img {
        height: 250px;
    }
    
    .featured-content {
        padding: 20px;
    }
    
    .featured-content h2 {
        font-size: 1.3rem;
    }
}
</style>

<div class="artikel-jumbotron">
    <div class="container">
        <h1>Artikel & Tips Outdoor</h1>
        <p>Panduan, tips, dan informasi seputar camping, hiking, dan aktivitas outdoor</p>
    </div>
</div>

<div class="artikel-container">

    <!-- Search Bar -->
    <div class="row search-filter-area">
        <div class="col-md-12">
            <form action="<?= site_url('artikel/index') ?>" method="GET" class="input-group">
                <input type="text" name="cari" class="form-control" placeholder="Cari artikel..." value="<?= html_escape($this->input->get('cari')) ?>">
                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>
    </div>

    <!-- Tag Filter -->
<div class="mb-4">
    <a href="<?= site_url('artikel') ?>" class="tag-button <?= empty($active_tag) ? 'active' : '' ?>">Semua</a>
    <?php 
    if (!empty($all_tags)) {
        foreach ($all_tags as $tag_item): 
            if (!empty($tag_item['tag'])) { // Pastikan tag tidak kosong
                $tag_name = html_escape($tag_item['tag']);
                $is_active = ($active_tag == $tag_name) ? 'active' : '';
    ?>
            <a href="<?= site_url('artikel?tag=' . urlencode($tag_name)) ?>" 
               class="tag-button <?= $is_active ?>">
                <?= $tag_name ?>
            </a>
    <?php 
            }
        endforeach; 
    }
    ?>
</div>
    
    <!-- Featured Article -->
    <?php if (!empty($artikel_list) && $this->uri->segment(3) === FALSE): 
        $featured = array_shift($artikel_list);
    ?>
    <div class="featured-article d-md-flex">
        <div class="col-md-6 p-0">
            <img src="<?= base_url('assets/img/artikel/' . html_escape($featured['thumbnail'])) ?>" 
                 alt="<?= html_escape($featured['judul']) ?>">
        </div>
        <div class="col-md-6 featured-content">
            <span class="featured-tag"><?= html_escape($featured['tag']) ?></span>
            <h2><?= html_escape($featured['judul']) ?></h2>
            <p class="text-muted"><?= html_escape($featured['excerpt']) ?></p>
            <div class="artikel-info">
                <i class="far fa-user"></i> <strong><?= html_escape($featured['penulis']) ?></strong> 
                | <i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($featured['tanggal_publish'])) ?>
            </div>
            <a href="<?= site_url('artikel/detail/' . $featured['id_artikel']) ?>" class="btn btn-success mt-3">Baca Selengkapnya</a>
        </div>
    </div>
    <?php endif; ?>

    <!-- Section Title -->
    <h4>Semua Artikel (Menampilkan <?= count($artikel_list) + (isset($featured) ? 1 : 0) ?> dari <?= $total_result ?>)</h4>
    
    <!-- Article Grid -->
    <div class="row g-4 mt-2">
        <?php 
        if (!empty($artikel_list)): 
            foreach ($artikel_list as $artikel):
        ?>
            <div class="col-md-4">
                <a href="<?= site_url('artikel/detail/' . $artikel['id_artikel']) ?>" class="artikel-card">
                    <img src="<?= base_url('assets/img/artikel/' . html_escape($artikel['thumbnail'])) ?>" 
                         class="card-img-top" alt="<?= html_escape($artikel['judul']) ?>">
                    <div class="p-3">
                        <span class="featured-tag"><?= html_escape($artikel['tag']) ?></span>
                        <h5><?= html_escape($artikel['judul']) ?></h5>
                        <p class="excerpt-content"><?= html_escape($artikel['excerpt']) ?></p>
                        <div class="artikel-info">
                            <i class="far fa-user"></i> <strong><?= html_escape($artikel['penulis']) ?></strong> 
                            | <i class="far fa-calendar-alt"></i> <?= date('d M Y', strtotime($artikel['tanggal_publish'])) ?>
                        </div>
                    </div>
                </a>
            </div>
        <?php 
            endforeach;
        else:
        ?>
        <p class="text-center w-100">Tidak ada artikel yang ditemukan untuk kriteria ini.</p>
        <?php endif; ?>
    </div>
    
   <div class="row">
        <div class="col-12">
            <div class="pagination-container">
                <?php echo $pagination_links; ?>
            </div>
        </div>
    </div>
   
</div>

</div>