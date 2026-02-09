<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="row justify-content-center py-5">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-white py-3 border-bottom">
                <h5 class="fw-bold mb-0 text-primary text-center">Update Fokus Anda</h5>
            </div>
            <div class="card-body p-4">
                <form action="/tasks/update/<?= $task['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted small">JUDUL TUGAS</label>
                        <input type="text" name="judul" class="form-control form-control-lg border-2" value="<?= $task['judul']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted small">DESKRIPSI</label>
                        <textarea name="deskripsi" class="form-control border-2" rows="4"><?= $task['deskripsi']; ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted small">STATUS PROGRES</label>
                        <select name="status" class="form-select form-select-lg border-2">
                            <option value="pending" <?= ($task['status'] == 'pending') ? 'selected' : ''; ?>>🕒 Masih Pending</option>
                            <option value="completed" <?= ($task['status'] == 'completed') ? 'selected' : ''; ?>>✅ Sudah Selesai</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm">Simpan Perubahan</button>
                        <a href="/tasks" class="btn btn-link text-muted">Batal & Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>