<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier le Statut du Paiement</title>
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
                <h1 class="m-0">Modifier le Statut du Paiement</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <form action="<?= site_url('admin/paiements/update_statut/' . $paiement['id']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut du Paiement</label>
                <select name="statut" id="statut" class="form-select" required>
                    <option value="en_attente" <?= $paiement['statut'] === 'en_attente' ? 'selected' : '' ?>>En attente</option>
                    <option value="effectue" <?= $paiement['statut'] === 'effectue' ? 'selected' : '' ?>>Effectué</option>
                    <option value="echoue" <?= $paiement['statut'] === 'echoue' ? 'selected' : '' ?>>Échoué</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
