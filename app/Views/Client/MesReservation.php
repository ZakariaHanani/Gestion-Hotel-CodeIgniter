<?= $this->extend('Client/home') ?>

<?= $this->section('contents') ?>
<div class="container py-5">
    <h2 class="text-center mb-5 animate__animated animate__fadeInDown">Mes Réservations</h2>

    <?php if (!empty($reservations)): ?>
        <div class="row">
            <?php foreach ($reservations as $reservation): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-lg border-light h-100 animate__animated animate__pulse animate__zoomIn">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">Chambre <?= esc($reservation['chambre_id']) ?></h5>
                            <p class="card-text"><strong>Date de Réservation :</strong> <?= esc($reservation['date_debut']) ?></p>
                            <p class="card-text"><strong>Date d'Arrivée :</strong> <?= esc($reservation['date_fin']) ?></p>

                            <p class="card-text mt-auto">
                                <strong>Statut :</strong>
                                <?php
                                $statut = esc($reservation['statut']);
                                $badgeClass = $statut == 'confirmée' ? 'bg-success' : ($statut == 'Annulée' ? 'bg-danger' : 'bg-warning');
                                ?>
                                <span class="badge <?= $badgeClass ?>"><?= $statut ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center animate__animated animate__bounceIn">
            <i class="fas fa-info-circle"></i> Aucune réservation effectuée pour le moment.
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
