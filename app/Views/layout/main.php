<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .card-task { transition: 0.3s; border: none; border-left: 5px solid #0d6efd; }
        .card-task:hover { transform: translateY(-5px); shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .navbar-brand { font-weight: 800; letter-spacing: 1px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow mb-4">
    <div class="container">
        <a class="navbar-brand" href="/tasks"><i class="fas fa-bolt me-2"></i>FOCUSFLOW</a>
    </div>
</nav>

<div class="container">
    <?= $this->renderSection('content'); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>