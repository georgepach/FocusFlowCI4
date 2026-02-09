<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h4"><?= $title; ?></h2>
            <a href="/tasks/create" class="btn btn-primary"> + Tambah Tugas</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($semua_tugas as $t) : ?>
                        <tr>
                            <td class="ps-3"><?= $i++; ?></td>
                            <td class="fw-bold"><?= $t['judul']; ?></td>
                            <td><?= $t['deskripsi']; ?></td>
                            <td>
                                <span class="badge <?= ($t['status'] == 'completed') ? 'bg-success' : 'bg-warning text-dark'; ?>">
                                    <?= ucfirst($t['status']); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="/tasks/edit/<?= $t['id']; ?>" class="btn btn-sm btn-outline-info">Edit</a>
                                <a href="/tasks/delete/<?= $t['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus tugas ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>