<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    
<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="content" style="padding :20px">    
    <h1>Admin Profile</h1>
    <p><strong>Email:</strong> <?= $admin['email'] ?></p>
    <p><strong>Crée le:</strong> <?= $admin['created_at'] ?></p>
</div>
<?= $this->endSection() ?>

<
</body>
</html>

