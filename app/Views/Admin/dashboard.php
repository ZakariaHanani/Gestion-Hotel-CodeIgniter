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

        <!-- Section des Statistiques -->
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Clients</h5>
                        <p class="card-text display-6"><?= $totalClients ?? 0 ?></p>
                        <a href="/admin/clients" class="btn btn-primary btn-sm">Voir les clients</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Chambres</h5>
                        <p class="card-text display-6"><?= $totalChambres ?? 0 ?></p>
                        <a href="/admin/chambres" class="btn btn-success btn-sm">Voir les chambres</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Chambres Disponibles</h5>
                        <p class="card-text display-6"><?= $disponibleChambres ?? 0 ?></p>
                        <a href="/admin/chambres" class="btn btn-success btn-sm">Voir les chambres</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Réservations Actives</h5>
                        <p class="card-text display-6"><?= $activeReservations ?? 0 ?></p>
                        <a href="/admin/reservations" class="btn btn-warning btn-sm">Voir les réservations</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Chiffre d'Affaires</h5>
                        <p class="card-text display-6">Pas encore MAD</p>
                        <a href="/admin/rapports" class="btn btn-info btn-sm">Voir les rapports</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section des Graphiques (optionnel) -->
        <div class="mt-5">
            <div class="card">
                <div class="card-header">
                    <h5>Statistiques des Réservations</h5>
                </div>
                <div class="card-body">
                <canvas id="reservationsChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Include Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include Chart.js for graphs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Vérification des données envoyées par PHP
    console.log(<?= json_encode($months ?? []) ?>);
    console.log(<?= json_encode($reservationData ?? []) ?>);

    const ctx = document.getElementById('reservationsChart').getContext('2d');
    const reservationsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($months ?? []) ?>, // Labels pour les mois
            datasets: [{
                label: 'Réservations',
                data: <?= json_encode($reservationData ?? []) ?>, // Données des réservations
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
    });
</script>

