<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<div class="row mb-4 g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white p-2">
            <div class="card-body">
                <small class="opacity-75">Total Fokus</small>
                <h3 class="fw-bold mb-0"><?= $total_tugas; ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-white p-2 border-start border-warning border-4">
            <div class="card-body">
                <small class="text-muted">Pending</small>
                <h3 class="fw-bold mb-0"><?= $tugas_pending; ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-white p-2 border-start border-success border-4">
            <div class="card-body">
                <small class="text-muted">Selesai</small>
                <h3 class="fw-bold mb-0"><?= $tugas_completed; ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-3">
        <div class="row g-3 align-items-center">
            <div class="col-md-4 d-flex align-items-center">
                <h4 class="fw-bold m-0 me-3">Tugas</h4>
                <button class="btn btn-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#modalTambah">+ Baru</button>
            </div>
            <div class="col-md-4 text-center">
                <div class="nav nav-pills nav-fill bg-light p-1 rounded-pill border small">
                    <a class="nav-link py-1 rounded-pill <?= (!$current_filter) ? 'active' : 'text-secondary'; ?>" href="/tasks">Semua</a>
                    <a class="nav-link py-1 rounded-pill <?= ($current_filter == 'pending') ? 'active' : 'text-secondary'; ?>" href="/tasks?status=pending">Pending</a>
                    <a class="nav-link py-1 rounded-pill <?= ($current_filter == 'completed') ? 'active' : 'text-secondary'; ?>" href="/tasks?status=completed">Selesai</a>
                </div>
            </div>
            <div class="col-md-4">
                <form action="/tasks" method="get">
                    <?php if ($current_filter) : ?><input type="hidden" name="status" value="<?= $current_filter; ?>"><?php endif; ?>
                    <div class="input-group">
                        <input type="text" name="search" class="form-control form-control-sm rounded-start-pill ps-3" placeholder="Cari..." value="<?= $keyword; ?>">
                        <button class="btn btn-primary btn-sm rounded-end-pill px-3" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success border-0 shadow-sm mb-4 alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    <?php if(empty($semua_tugas)): ?>
        <div class="col text-center py-5"><p class="text-muted italic">Tidak ada tugas ditemukan.</p></div>
    <?php else: ?>
        <?php foreach ($semua_tugas as $t) : ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100 border-0 card-task" style="border-top: 3px solid #0d6efd !important;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="fw-bold text-dark mb-0"><?= $t['judul']; ?></h6>
                            <span class="badge rounded-pill <?= ($t['status'] == 'completed') ? 'bg-success bg-opacity-10 text-success' : 'bg-warning bg-opacity-10 text-warning'; ?>" style="font-size: 0.7rem;">
                                <?= ucfirst($t['status']); ?>
                            </span>
                        </div>
                        <p class="text-muted small mb-0"><?= $t['deskripsi']; ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0 d-flex justify-content-end gap-2 pb-3">
                        <?php if ($t['status'] == 'pending') : ?>
                            <a href="/tasks/complete/<?= $t['id']; ?>" class="btn btn-sm btn-success rounded-pill px-2"><i class="fas fa-check"></i></a>
                        <?php endif; ?>
                        <a href="/tasks/edit/<?= $t['id']; ?>" class="btn btn-sm btn-outline-info rounded-pill px-2"><i class="fas fa-edit"></i></a>
                        <a href="/tasks/delete/<?= $t['id']; ?>" class="btn btn-sm btn-outline-danger rounded-pill px-2" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content border-0 shadow">
        <form action="/tasks/store" method="post"><?= csrf_field(); ?>
            <div class="modal-header bg-primary text-white"><h5 class="modal-title fw-bold">Buat Tugas Baru</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
            <div class="modal-body p-4">
                <div class="mb-3"><label class="fw-bold mb-2 small text-secondary">JUDUL TUGAS</label><input type="text" name="judul" class="form-control border-2" required></div>
                <div class="mb-0"><label class="fw-bold mb-2 small text-secondary">DETAIL</label><textarea name="deskripsi" class="form-control border-2" rows="3"></textarea></div>
            </div>
            <div class="modal-footer bg-light border-0"><button type="submit" class="btn btn-primary px-5 rounded-pill shadow-sm">Simpan Fokus</button></div>
        </form>
    </div></div>
</div>
<?= $this->endSection(); ?>