<?php
/**
 * @var CodeIgniter\View\View $this
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une chambre</title>
</head>
<body>
<?= $this->extend('layouts/Admin') ?>
    <?= $this->section('content') ?>
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Modifier une chambre</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
    <form action="/admin/chambres/update/<?= $chambre['id'] ?>" method="post">
    <label for="numero">Numéro de Chambre</label>
    <input type="text" name="numero" id="numero" value="<?= $chambre['numero'] ?>" required><br>

    <label for="statut">Statut :</label>
    <select name="statut" id="statut" required>
    <option value="disponible" <?= isset($chambre) && $chambre['statut'] == 'disponible' ? 'selected' : '' ?>>Disponible</option>
    <option value="occupée" <?= isset($chambre) && $chambre['statut'] == 'occupée' ? 'selected' : '' ?>>Occupée</option>
    </select><br>

    
    <label for="description">Description :</label>
    <textarea name="description" id="description" rows="4" value="<?= $chambre['description'] ?>" placeholder="Entrez la description de la chambre ici..." ><?= $chambre['description'] ?></textarea><br>


    <label for="prix">Prix</label>
    <input type="number" name="prix" id="prix" value="<?= $chambre['prix'] ?>" required><br>

    <label for="type_chambre_id">Type de Chambre</label>
    <select name="type_chambre_id" id="type_chambre_id" required>
        <?php foreach ($types_chambre as $type) : ?>
            <option value="<?= $type['id'] ?>" <?= $type['id'] == $chambre['type_chambre_id'] ? 'selected' : '' ?>><?= $type['nom'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Mettre à jour</button>
</form>
</div>
</div>
    <?= $this->endSection() ?>
</body>
</html>

