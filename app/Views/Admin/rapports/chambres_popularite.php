<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Rapport des Types de Chambres les Plus Réservés</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Type de Chambre</th>
                <th>Description</th>
                <th>Nombre de Réservations</th>
                <th>Popularité (%)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $totalReservations = array_sum(array_column($statistiques, 'total')); // Calculer le total des réservations
            ?>
            <?php foreach ($statistiques as $stat): ?>
                <tr>
                    <td><?= esc($stat['type_chambre_nom'] ?? 'Non défini') ?></td>
                    <td><?= esc($stat['type_chambre_description'] ?? 'Non disponible') ?></td>
                    <td><?= $stat['total'] ?></td>
                    <td>
                        <?= $totalReservations > 0 
                            ? round(($stat['total'] / $totalReservations) * 100, 2) . '%' 
                            : 'N/A' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
