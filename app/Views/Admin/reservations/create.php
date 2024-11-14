<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Nouvelle Réservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?= $this->extend('layouts/Admin') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Créer une Nouvelle Réservation</h3>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/reservations/store') ?>" method="post">
                <!-- Client Selection -->
                <div class="form-group">
                    <label for="client_id">Client:</label>
                    <select name="client_id" id="client_id" class="form-control" required>
                        <option value="">Sélectionnez un client</option>
                        <?php foreach ($clients as $client): ?>
                            <option value="<?= $client['user_id'] ?>"><?= $client['nom'] . ' ' . $client['prenom'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Room Selection -->
                <div class="form-group">
                    <label for="chambre_id">Chambre:</label>
                    <select name="chambre_id" id="chambre_id" class="form-control" required>
                        <option value="">Sélectionnez une chambre</option>
                        <?php foreach ($chambres as $chambre): ?>
                            <option value="<?= $chambre['id'] ?>">Chambre #<?= $chambre['numero'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Date Start -->
                <div class="form-group">
                    <label for="date_debut">Date de Début:</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control" required>
                </div>

                <!-- Date End -->
                <div class="form-group">
                    <label for="date_fin">Date de Fin:</label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control" required>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Enregistrer la Réservation</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
