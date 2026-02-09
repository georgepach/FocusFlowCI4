<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white">
            <div class="card-body py-3">
                <div class="d-flex align-items-center">
                    <i class="fas fa-tasks fa-2x me-3 opacity-50"></i>
                    <div>
                        <small class="opacity-75">Total Tugas</small>
                        <h3 class="fw-bold mb-0"><?= $total_tugas; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-white">
            <div class="card-body py-3">
                <div class="d-flex align-items-center text-warning">
                    <i class="fas fa-clock fa-2x me-3 opacity-50"></i>
                    <div>
                        <small class="text-muted">Pending</small>
                        <h3 class="fw-bold mb-0 text-dark"><?= $tugas_pending; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-white">
            <div class="card-body py-3">
                <div class="d-flex align-items-center text-success">
                    <i class="fas fa-check-circle fa-2x me-3 opacity-50"></i>
                    <div>
                        <small class="text-muted">Selesai</small>
                        <h3 class="fw-bold mb-0 text-dark"><?= $tugas_completed; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-dark m-0">Tugas Saya</h2>
    <button class="btn btn-primary shadow-sm px-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalTambah">
        <i class="fas fa-plus me-2"></i>Tambah Baru
    </button>
</div>

<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success border-0 shadow-sm mb-4 alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>
<div class="row mb-3">
    <div class="col">
        <ul class="nav nav-pills bg-white p-2 rounded shadow-sm d-inline-flex border">
            <li class="nav-item">
                <a class="nav-link <?= (!$current_filter) ? 'active' : 'text-secondary'; ?>" href="/tasks">
                    Semua <span class="badge bg-light text-dark ms-1 opacity-50"><?= $total_tugas; ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($current_filter == 'pending') ? 'active' : 'text-secondary'; ?>" href="/tasks?status=pending">
                    Pending <span class="badge bg-light text-dark ms-1 opacity-50"><?= $tugas_pending; ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($current_filter == 'completed') ? 'active' : 'text-secondary'; ?>" href="/tasks?status=completed">
                    Selesai <span class="badge bg-light text-dark ms-1 opacity-50"><?= $tugas_completed; ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="row">
    <?php if(empty($semua_tugas)): ?>
        <div class="col text-center py-5">
            <i class="fas fa-clipboard-list fa-3x text-light mb-3"></i>
            <p class="text-muted">Belum ada tugas hari ini.</p>
        </div>
    <?php else: ?>
        <?php foreach ($semua_tugas as $t) : ?>
            
            <div class="col-md-4 mb-4">
                <div class="card card-task shadow-sm h-100 border-0" style="border-top: 4px solid #0d6efd !important;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <h5 class="fw-bold text-truncate" style="max-width: 65%;"><?= $t['judul']; ?></h5>
                            <?php if ($t['status'] == 'completed'): ?>
                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3">Selesai</span>
                            <?php else: ?>
                                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 text-dark">Pending</span>
                            <?php endif; ?>
                        </div>
                        <p class="text-muted small"><?= $t['deskripsi']; ?></p>
                    </div>
                    <div class="card-footer bg-white border-0 d-flex justify-content-end gap-2 pb-3 pt-0">
    
    <?php if ($t['status'] == 'pending') : ?>
        <a href="/tasks/complete/<?= $t['id']; ?>" 
           class="btn btn-sm btn-success shadow-sm px-3" 
           title="Tandai Selesai">
            <i class="fas fa-check me-1"></i> Selesai
        </a>
    <?php endif; ?>

    <a href="/tasks/edit/<?= $t['id']; ?>" class="btn btn-sm btn-light text-info border"><i class="fas fa-edit"></i></a>
    <a href="/tasks/delete/<?= $t['id']; ?>" class="btn btn-sm btn-light text-danger border" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></a>
</div>
                </div>
            </div>

            

        <?php endforeach; ?>
    <?php endif; ?>
</div>
                                
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="/tasks/store" method="post">
                <?= csrf_field(); ?>
                <div class="modal-header bg-primary text-white border-0">
                    <h5 class="modal-title fw-bold">Buat Tugas Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="fw-bold mb-2 text-secondary small">JUDUL TUGAS</label>
                        <input type="text" name="judul" class="form-control form-control-lg border-2" placeholder="Apa fokus Anda?" required>
                    </div>
                    <div class="mb-0">
                        <label class="fw-bold mb-2 text-secondary small">DETAIL (OPSIONAL)</label>
                        <textarea name="deskripsi" class="form-control border-2" rows="3" placeholder="Tambahkan catatan..."></textarea>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0">
                    <button type="submit" class="btn btn-primary px-5 rounded-pill shadow-sm">Simpan Fokus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>