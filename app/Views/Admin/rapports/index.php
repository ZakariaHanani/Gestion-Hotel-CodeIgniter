<?php
/**
 * @var CodeIgniter\View\View $this
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapports</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?= $this->extend('layouts/Admin') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4">Rapports ( Pas encore )</h1>
    
    <div class="mb-4">
        <h3>Rapport de Fréquentation des Chambres</h3>
        <p><strong>Note:</strong> Cette fonctionnalité n'est pas encore implémentée.</p>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Mois</th>
                    <th>Nombre de Réservations</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example data or leave empty if not yet implemented -->
                <tr>
                    <td colspan="2" class="text-center text-warning">Cette section est en cours de développement.</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mb-4">
        <h3>Rapport Financier</h3>
        <p><strong>Chiffre d'Affaires Total:</strong> <?= isset($chiffreAffaires['montant']) ? $chiffreAffaires['montant'] : '<span class="text-warning">Non disponible</span>' ?> MAD</p>
        <p><strong>Note:</strong> Cette fonctionnalité n'est pas encore implémentée.</p>
    </div>

    <div class="mb-4">
        <h3>Paiements Mensuels</h3>
        <p><strong>Note:</strong> Cette fonctionnalité n'est pas encore implémentée.</p>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Mois</th>
                    <th>Total des Paiements</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example data or leave empty if not yet implemented -->
                <tr>
                    <td colspan="2" class="text-center text-warning">Cette section est en cours de développement.</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
