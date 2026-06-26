<div class="bg-dark border-right" id="sidebar-wrapper">
    <div class="sidebar-heading bg-dark text-white text-center">
        <span class="text-success fw-bold">EzRent</span> Admin
    </div>

    <div class="list-group list-group-flush">

        <a href="<?php echo base_url('admin/dashboard'); ?>"
           class="list-group-item list-group-item-action <?php echo ($title == 'Dashboard Admin') ? 'active' : ''; ?>">
            <i class="bi bi-speedometer2 me-2"></i> Dashboard
        </a>

        <a href="#" class="list-group-item list-group-item-action">
            <i class="bi bi-box-seam me-2"></i> Kelola Produk
        </a>

        <a href="#" class="list-group-item list-group-item-action">
            <i class="bi bi-tag me-2"></i> Kelola Kategori
        </a>

        <a href="#" class="list-group-item list-group-item-action">
            <i class="bi bi-star me-2"></i> Kelola Review
        </a>

        <a href="#" class="list-group-item list-group-item-action">
            <i class="bi bi-book me-2"></i> Kelola Artikel
        </a>

        <a href="<?php echo base_url('auth/logout'); ?>"
           class="list-group-item list-group-item-action text-danger mt-3">
            <i class="bi bi-box-arrow-right me-2"></i> Keluar
        </a>
    </div>
</div>

<!-- PAGE CONTENT -->
<div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">

            <button class="btn btn-success" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="ms-auto d-flex align-items-center">
                <span class="me-3 text-dark">Hi, <?php echo $user_login; ?></span>
                <i class="bi bi-person-circle fs-4 text-secondary"></i>
            </div>

        </div>
    </nav>

    <div class="container-fluid p-4">
