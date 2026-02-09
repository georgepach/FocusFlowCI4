<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    
    <form action="/tasks/update/<?= $task['id']; ?>" method="post">
        <?= csrf_field(); ?>
        
        <div>
            <label>Judul Tugas:</label><br>
            <input type="text" name="judul" value="<?= $task['judul']; ?>" required>
        </div>
        <br>
        <div>
            <label>Deskripsi:</label><br>
            <textarea name="deskripsi" rows="5"><?= $task['deskripsi']; ?></textarea>
        </div>
        <br>
        <div>
            <label>Status:</label><br>
            <select name="status">
                <option value="pending" <?= ($task['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="completed" <?= ($task['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
            </select>
        </div>
        <br>
        <button type="submit">Simpan Perubahan</button>
        <a href="/tasks">Batal</a>
    </form>
</body>
</html>