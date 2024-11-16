<!DOCTYPE html>
<html>
<head>
    <title>Modifier Réservation</title>
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
                    <h1 class="m-0">Modifier Réservation</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="/admin/reservations/update/<?= $reservation['id'] ?>" method="post" class="card p-4 shadow-sm">
                <div class="mb-3">
                    <label for="client_id" class="form-label">Client:</label>
                    <select name="client_id" id="client_id" class="form-select" required>
                        <?php foreach ($clients as $client): ?>
                            <option value="<?= $client['user_id'] ?>" <?= ($client['user_id'] == $reservation['client_id']) ? 'selected' : '' ?>>
                                <?= $client['nom'] ?> <?= $client['prenom'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="chambre_id" class="form-label">Chambre:</label>
                    <input type="text" id="numero" class="form-control" value="#<?= $chambre['numero'] ?>" disabled>       
                    <input type="hidden" name="chambre_id" value="<?= $reservation['chambre_id'] ?>">
                </div>

                <div class="mb-3">
                    <label for="date_debut" class="form-label">Date Début:</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control" value="<?= $reservation['date_debut'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="date_fin" class="form-label">Date Fin:</label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control" value="<?= $reservation['date_fin'] ?>" required>
                </div>

                <div class="mb-3">
                    <label for="statut" class="form-label">Statut :</label>
                    <select name="statut" id="statut" class="form-select" required>
                        <option value="en attente" <?= $reservation['statut'] == 'en attente' ? 'selected' : '' ?>>En attente</option>
                        <option value="confirmée" <?= $reservation['statut'] == 'confirmée' ? 'selected' : '' ?>>Confirmée</option>
                        <option value="terminée" <?= $reservation['statut'] == 'terminée' ? 'selected' : '' ?>>Terminée</option>
                        <option value="annulée" <?= $reservation['statut'] == 'annulée' ? 'selected' : '' ?>>Annulée</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="<?= site_url('admin/reservations') ?>" class="btn btn-secondary">Retour</a>
                </div>
            </form>
        </div>
    </div>

    <?= $this->endSection() ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('reservationForm').addEventListener('submit', function(e) {
        const dateDebut = new Date(document.getElementById('date_debut').value);
        const dateFin = new Date(document.getElementById('date_fin').value);
        const today = new Date();

        if (dateDebut < today) {
            e.preventDefault();
            alert("La date de début ne peut pas être dans le passé.");
        } else if (dateFin <= dateDebut) {
            e.preventDefault();
            alert("La date de fin doit être après la date de début.");
        }
    });
</script>
</body>
</html>
