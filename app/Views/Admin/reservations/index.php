<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Réservations</title>
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
                <h1 class="m-0">Liste des Réservations</h1>
            </div>
            <div class="col-sm-6 text-end">
                <a href="<?= site_url('admin/reservations/create') ?>" class="btn btn-primary">Nouvelle Réservation</a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Client</th>
                        <th>Chambre</th>
                        <th>Date Début</th>
                        <th>Date Fin</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservations as $reservation): ?>
                        <tr>
                            <td><?= $reservation['client']['nom'] .' '. $reservation['client']['prenom'] ?? '<span class="text-danger">Client inconnu</span>' ?></td>
                            <td><?= $reservation['chambre']['numero'] ?? '<span class="text-danger">Chambre inconnue</span>' ?></td>
                            <td><?= $reservation['date_debut'] ?></td>
                            <td><?= $reservation['date_fin'] ?></td>
                            <td>
                                <span class="badge bg-<?= $reservation['statut'] === 'confirmée' ? 'success' : 'warning' ?>">
                                    <?= ucfirst($reservation['statut']) ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/reservations/edit/' . $reservation['id']) ?>" class="btn btn-sm btn-warning">Modifier</a>
                                <a href="<?= site_url('admin/reservations/delete/' . $reservation['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">Supprimer</a>
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
