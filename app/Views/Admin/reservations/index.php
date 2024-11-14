<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Réservations</title>
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
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <p>Bienvenue dans votre tableau de bord administrateur.</p>
        <a href="<?= site_url('admin/reservations/create') ?>">Nouvelle Réservation</a>
    
    <?php if (session()->getFlashdata('message')): ?>
        <p><?= session()->getFlashdata('message') ?></p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>Client</th>
                <th>Chambre</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= $reservation['client']['nom'] ?? 'Client inconnu' ?></td>
                    <td><?= $reservation['chambre']['numero'] ?? 'Chambre inconnue' ?></td>
                    <td><?= $reservation['date_debut'] ?></td>
                    <td><?= $reservation['date_fin'] ?></td>
                    <td>
                        <a href="<?= site_url('admin/reservations/edit/' . $reservation['id']) ?>">Modifier</a> |
                        <a href="<?= site_url('admin/reservations/delete/' . $reservation['id']) ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
<?= $this->endSection() ?>


   
</body>
</html>
