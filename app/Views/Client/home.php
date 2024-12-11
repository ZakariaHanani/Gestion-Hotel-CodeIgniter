<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Home') ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/summernote/summernote-bs4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            overflow-x: hidden;
            overflow-y:auto ;
            height: 100vh;
        }
        .hero {
            background: url('<?php echo base_url('uploads/hotel/hotel_image.jpg'); ?>') center center/cover no-repeat;
            height: 600px;
            color: #ffffff;
        }


        .hero .content {
            position: relative;
            z-index: 2; /* Au-dessus de l'overlay */
        }

        .hero .alert {
            max-width: 600px;
            margin: 10px auto;
            opacity: 0.9;
        }


        .hero h1, .hero p {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .navbar .nav-link {
            position: relative;
            text-decoration: none;
            color: #f8f9fa;
            transition: color 0.3s ease;
        }

        .navbar .nav-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 0;
            height: 2px;
            background-color: #4fa6f1;
            transition: width 0.3s ease;
        }

        .navbar .nav-link:hover::after,
        .navbar .nav-link.active::after {
            width: 100%;
        }

        .navbar .nav-link:hover {
            color: #4365d8;
        }


    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?= $this->include('components/navbar'); ?>
    <div class="">
        <?= $this->renderSection('contents') ?>
    </div>
    <?= $this->include('components/footer') ?>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url() ?>template/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url() ?>template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= base_url() ?>template/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?= base_url() ?>template/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>template/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?= base_url() ?>template/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/adminlte.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const loader = document.getElementById('loading');
        const mainContent = document.getElementById('main-content');
        setTimeout(() => {
            loader.style.display = 'none';
            mainContent.style.display = 'block';
        }, 2000);
    });
</script>
</body>
</html>
