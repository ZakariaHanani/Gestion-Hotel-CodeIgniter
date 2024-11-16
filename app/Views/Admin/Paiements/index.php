<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Paiements</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?= $this->extend('layouts/Admin') ?>
<?= $this->section('content') ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Liste des Paiements</h1>
            </div>
            <div class="col-sm-6 text-end">
                <a href="<?= site_url('admin/paiements/add') ?>" class="btn btn-primary">Ajouter un Paiement</a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID Paiement</th>
                        <th>Réservation ID</th>
                        <th>Montant</th>
                        <th>Méthode</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($paiements as $paiement): ?>
                        <tr>
                            <td><?= $paiement['id'] ?></td>
                            <td><?= $paiement['reservation_id'] ?></td>
                            <td><?= $paiement['montant'] ?></td>
                            <td><?= $paiement['methode'] ?></td>
                            <td><?= $paiement['date'] ?></td>
                            <td>
                                <span class="badge bg-<?= $paiement['statut'] === 'effectue' ? 'success' : 'warning' ?>">
                                    <?= ucfirst($paiement['statut']) ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/paiements/edit/' . $paiement['id']) ?>" class="btn btn-sm btn-warning">Modifier</a>
                                <a href="<?= site_url('admin/paiements/delete/' . $paiement['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce paiement ?')">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
