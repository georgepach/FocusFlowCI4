<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    <a href="/tasks/create"> + Tambah Tugas Baru</a>
<br><br>
    <table borders="1" cellpaddinp="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Tugas</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach ($semua_tugas as $t) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $t['judul']; ?></td>
                <td><?= $t['deskripsi']; ?></td>
                <td><?= $t['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <td>
    <a href="/tasks/edit/<?= $t['id']; ?>">Edit</a> | 
    <a href="/tasks/delete/<?= $t['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
</td>
</body>
</html>