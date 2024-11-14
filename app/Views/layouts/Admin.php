<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('template/dist/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('template/plugins/fontawesome-free/css/all.min.css') ?>">  
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
    <?= $this->include('partials/navbar') ; ?>
    <?= $this->include('partials/sidebar') ?>
    

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <?= $this->renderSection('content') ?>
    </div>

    <?= $this->include('partials/footer') ?>
</div>

<!-- jQuery -->
<script src="<?= base_url('template/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
