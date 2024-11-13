<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>
<?= $this->extend('layouts/Admin') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tableau de Bord</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <p>Bienvenue dans votre tableau de bord administrateur.</p>
    </div>
</div>
<?= $this->endSection() ?>
