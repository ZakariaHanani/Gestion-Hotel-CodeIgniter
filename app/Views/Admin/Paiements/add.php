<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un Paiement</title>
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
                <h1 class="m-0">Ajouter un Paiement</h1>
            </div>
            <div class="col-sm-6 text-end">
                <a href="<?= site_url('admin/paiements') ?>" class="btn btn-secondary">Retour à la Liste</a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <form action="<?= site_url('admin/paiements/add') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group mb-3">
                <label for="reservation_id">Réservation ID</label>
                <select name="reservation_id" class="form-control" required>
                    <?php foreach ($reservations as $reservation): ?>
                        <option value="<?= $reservation['id'] ?>"><?= $reservation['id'] ?> - <?= $reservation['client']['nom'] . ' ' . $reservation['client']['prenom'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="montant">Montant</label>
                <input type="number" name="montant" class="form-control" step="0.01" required>
            </div>

            <div class="form-group mb-3">
                <label for="methode">Méthode de Paiement</label>
                <input type="text" name="methode" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="date">Date du Paiement</label>
                <input type="datetime-local" name="date" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="statut">Statut</label>
                <select name="statut" class="form-control" required>
                    <option value="en_attente">En Attente</option>
                    <option value="effectue">Effectué</option>
                    <option value="echoue">Échoué</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter Paiement</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
