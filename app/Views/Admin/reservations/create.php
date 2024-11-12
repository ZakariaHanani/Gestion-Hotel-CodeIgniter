<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle Réservation</title>
</head>
<body>
    <h1>Créer une Nouvelle Réservation</h1>
    
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

    <a href="<?= site_url('admin/reservations') ?>">Retour à la liste des réservations</a>
</body>
</html>
