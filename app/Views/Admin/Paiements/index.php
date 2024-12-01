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

        <!-- Formulaire de filtre -->
        <form method="get" action="<?= site_url('admin/paiements') ?>" class="row g-3 mb-3">
            <div class="col-md-3">
                <input type="text" name="reservation_id" class="form-control" placeholder="ID Réservation"
                       value="<?= esc($filters['reservation_id'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <select name="methode" class="form-select">
                    <option value="">-- Méthode de Paiement --</option>
                    <option value="carte" <?= isset($filters['methode']) && $filters['methode'] === 'carte' ? 'selected' : '' ?>>Carte</option>
                    <option value="paypal" <?= isset($filters['methode']) && $filters['methode'] === 'paypal' ? 'selected' : '' ?>>PayPal</option>
                    <option value="especes" <?= isset($filters['methode']) && $filters['methode'] === 'especes' ? 'selected' : '' ?>>Espèces</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="statut" class="form-select">
                    <option value="">-- Statut --</option>
                    <option value="effectue" <?= isset($filters['statut']) && $filters['statut'] === 'effectue' ? 'selected' : '' ?>>Effectué</option>
                    <option value="en_attente" <?= isset($filters['statut']) && $filters['statut'] === 'en_attente' ? 'selected' : '' ?>>En attente</option>
                    <option value="echoue" <?= isset($filters['statut']) && $filters['statut'] === 'echoue' ? 'selected' : '' ?>>Echoue</option>

                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            </div>
        </form>

        <!-- Table des paiements -->
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
                        <th>Action</th>
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
                            <td><a href="<?= site_url('admin/paiements/edit_statut/' . $paiement['id']) ?>" class="btn btn-sm btn-warning">Modifier Statut</a></td>
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
