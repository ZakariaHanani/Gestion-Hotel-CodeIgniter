<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle Réservation</title>
</head>
<body>
<?= $this->extend('layouts/Admin') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Créer une Nouvelle Réservation</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <form action="<?= site_url('admin/reservations/store') ?>" method="post">
        <label for="client_id">Client:</label>
        <select name="client_id" id="client_id" required>
            <?php foreach ($clients as $client): ?>
                <option value="<?= $client['user_id'] ?>"><?= $client['nom'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="chambre_id">Chambre:</label>
        <select name="chambre_id" id="chambre_id" required>
            <?php foreach ($chambres as $chambre): ?>
                <option value="<?= $chambre['id'] ?>"><?= $chambre['numero'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="date_debut">Date Début:</label>
        <input type="date" name="date_debut" id="date_debut" required>

        <label for="date_fin">Date Fin:</label>
        <input type="date" name="date_fin" id="date_fin" required>

        <button type="submit">Enregistrer</button>
    </form>
    </div>
</div>
<?= $this->endSection() ?>
</body>
</html>
