<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapports</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
        }

        .table {
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
        }

        .table thead {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        h1, h3 {
            color: #343a40;
        }

        .btn-info, .btn-secondary {
            border-radius: 25px;
            padding: 10px 20px;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .text-warning {
            font-weight: bold;
        }

        .alert {
            background-color: #ffeeba;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<?= $this->extend('layouts/Admin') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="mb-4">Rapports (Pas encore)</h1>

    <!-- Actions Section - Moved to the top -->
    <div class="mt-4 mb-4">
        <h3>Actions</h3>
        <div class="mb-2">
            <a href="<?= base_url('admin/rapport/chambres-popularite') ?>" class="btn btn-info">Voir les chambres populaires</a>
        </div>
        <div>
            <?php
                $mois = date('m');
                $annee = date('Y'); 
            ?>
            <a href="<?= base_url("admin/rapport/revenus") ?>" class="btn btn-secondary">Télécharger les rapport des revenus PDF</a>
        </div>
    </div>

    <!-- Report Sections -->
    <div class="alert">
        <strong>Note:</strong> Certaines fonctionnalités ne sont pas encore implémentées.
    </div>

    <div class="mb-4">
        <h3>Rapport de Fréquentation des Chambres</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Mois</th>
                    <th>Nombre de Réservations</th>
                </tr>
            </thead>
            <tbody>
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
        <table class="table">
            <thead>
                <tr>
                    <th>Mois</th>
                    <th>Total des Paiements</th>
                </tr>
            </thead>
            <tbody>
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
