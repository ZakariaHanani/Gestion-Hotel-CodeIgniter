<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4">Admin Profile</h1>
        </div>
        <div class="card-body">
            <p><strong>Email:</strong> <?= $admin['email'] ?></p>
            <p><strong>Créé le:</strong> <?= date('d/m/Y', strtotime($admin['created_at'])) ?></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<!-- Include Bootstrap JS Bundle (optional, for interactive features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
