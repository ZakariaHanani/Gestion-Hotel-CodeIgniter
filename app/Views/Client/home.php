<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Home') ?></title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>template/plugins/summernote/summernote-bs4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?= $this->include('components/navbar'); ?>

    <?= $this->include('components/sidebar') ?>
    <div class="content-wrapper">

        <?= $this->renderSection('contents') ?>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
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
