<!DOCTYPE html>
<html>
<head>
    <title>Modifier Réservation</title>
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
        <form action="/admin/reservations/update/<?= $reservation['id'] ?>" method="post">
        <label for="client_id">Client:</label>
        <select name="client_id" id="client_id" required>
            <?php foreach ($clients as $client): ?>
                <option value="<?= $client['user_id'] ?>" <?= ($client['user_id'] == $reservation['client_id']) ? 'selected' : '' ?>><?= $client['nom'] ?>  <?= $client['prenom'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="chambre_id">Chambre:</label>
        <select name="chambre_id" id="chambre_id" required>
            <?php foreach ($chambres as $chambre): ?>
                <option value="<?= $chambre['id'] ?>" <?= ($chambre['id'] == $reservation['chambre_id']) ? 'selected' : '' ?>><?= $chambre['numero'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="date_debut">Date Début:</label>
        <input type="date" name="date_debut" id="date_debut" value="<?= $reservation['date_debut'] ?>" required>

        <label for="date_fin">Date Fin:</label>
        <input type="date" name="date_fin" id="date_fin" value="<?= $reservation['date_fin'] ?>" required>

        <label for="statut">Statut :</label>
        <select name="statut" id="statut" required>
        <option value="en attente" <?= isset($reservation) && $reservation['statut'] == 'en attente' ? 'selected' : '' ?>>En attente</option>
        <option value="confirmée" <?= isset($reservation) && $reservation['statut'] == 'confirmée' ? 'selected' : '' ?>>Confirmée</option>
        <option value="annulée" <?= isset($reservation) && $reservation['statut'] == 'annulée' ? 'selected' : '' ?>>Terminée</option>
        <option value="annulée" <?= isset($reservation) && $reservation['statut'] == 'annulée' ? 'selected' : '' ?>>Annulée</option>
        </select><br>

        <button type="submit">Mettre à jour</button>
        </form>
        <a href="<?= site_url('admin/reservations') ?>">Retour à la liste des réservations</a>
    </div>
</div>
    <?= $this->endSection() ?>
</body>
</html>
