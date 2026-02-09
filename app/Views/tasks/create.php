<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    
    <form action="/tasks/store" method="post">
        <?= csrf_field(); ?> <div>
            <label>Judul Tugas:</label><br>
            <input type="text" name="judul" required>
        </div>
        <br>
        <div>
            <label>Deskripsi:</label><br>
            <textarea name="deskripsi" rows="5"></textarea>
        </div>
        <br>
        <button type="submit">Simpan Tugas</button>
        <a href="/tasks">Batal</a>
    </form>
</body>
</html>