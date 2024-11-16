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
                <h1 class="m-0">Modifier une chambre</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <form action="/admin/chambres/update/<?= $chambre['id'] ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="numero" class="form-label">Numéro de Chambre</label>
                <input type="text" name="numero" id="numero" value="<?= $chambre['numero'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select name="statut" id="statut" class="form-select" required>
                    <option value="disponible" <?= isset($chambre) && $chambre['statut'] == 'disponible' ? 'selected' : '' ?>>Disponible</option>
                    <option value="occupe" <?= isset($chambre) && $chambre['statut'] == 'occupe' ? 'selected' : '' ?>>Occupée</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Entrez la description de la chambre ici..."><?= $chambre['description'] ?></textarea>
            </div>

            <div class="mb-3">
                <label for="prix" class="form-label">Prix</label>
                <input type="number" name="prix" id="prix" value="<?= $chambre['prix'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="type_chambre_id" class="form-label">Type de Chambre</label>
                <select name="type_chambre_id" id="type_chambre_id" class="form-select" required>
                    <?php foreach ($types_chambre as $type): ?>
                        <option value="<?= $type['id'] ?>" <?= $type['id'] == $chambre['type_chambre_id'] ? 'selected' : '' ?>><?= $type['nom'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Images Actuelles</label>
                <div class="d-flex flex-wrap gap-2">
                    <?php if (!empty($images)): ?>
                        <?php foreach ($images as $image): ?>
                            <div class="border p-2" style="width: 100px;">
                                <img src="<?= base_url($image['image_path']) ?>" alt="Image de la chambre" class="img-fluid rounded">
                                <small class="d-block text-truncate"><?= $image['image_path'] ?></small>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Aucune image disponible pour cette chambre.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Ajouter des nouvelles images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple>
            </div>

            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
