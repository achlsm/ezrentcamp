<div class="container py-5">
    <h4>Profil Saya</h4>

    <!-- ✅ ALERT BERHASIL -->
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('home/update_profil') ?>" class="card p-4">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control"
                   value="<?= $user->nama_lengkap ?>">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?= $user->email ?>">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_telepon" class="form-control"
                   value="<?= $user->no_telepon ?>">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control"><?= $user->alamat ?></textarea>
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
