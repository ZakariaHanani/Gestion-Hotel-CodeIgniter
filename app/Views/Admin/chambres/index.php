<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Chambres</title>
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
                <h1 class="m-0">Liste des chambres</h1>
            </div>
            <div class="col-sm-6 text-end">
                <a href="/admin/chambres/create" class="btn btn-primary">Ajouter une Chambre</a>
            </div>
        </div>

        <!-- Formulaire de filtrage -->
        <div class="row mb-4">
            <form method="get" action="<?= base_url('/admin/chambres') ?>" class="row g-3 align-items-center">
                <div class="col-auto">
                    <input type="text" name="numero" class="form-control" placeholder="Numéro de chambre" 
                           value="<?= esc($filters['numero'] ?? '') ?>">
                </div>
                <div class="col-auto">
                    <select name="statut" class="form-select">
                        <option value="">-- Statut --</option>
                        <option value="disponible" <?= isset($filters['statut']) && $filters['statut'] == 'disponible' ? 'selected' : '' ?>>Disponible</option>
                        <option value="occupé" <?= isset($filters['statut']) && $filters['statut'] == 'occupé' ? 'selected' : '' ?>>Occupé</option>
                    </select>
                </div>
                <div class="col-auto">
                    <select name="type" class="form-select">
                        <option value="">-- Type de chambre --</option>
                        <?php foreach ($types as $type): ?>
                            <option value="<?= $type['id'] ?>" <?= isset($filters['type']) && $filters['type'] == $type['id'] ? 'selected' : '' ?>><?= esc($type['nom']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Numéro</th>
                    <th>Prix (MAD)</th>
                    <th>Statut</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chambres as $chambre): ?>
                    <tr>
                        <td><?= $chambre['numero'] ?></td>
                        <td><?= $chambre['prix'] ?></td>
                        <td>
                            <span class="badge <?= $chambre['statut'] === 'disponible' ? 'bg-success' : 'bg-danger' ?>">
                                <?= ucfirst($chambre['statut']) ?>
                            </span>
                        </td>
                        <td><?= $chambre['type_nom'] ?></td>
                        <td><?= $chambre['type_description'] ?>, <?= $chambre['description'] ?></td>
                        <td>
                            <?php foreach ($chambre['images'] as $image): ?>
                                <img src="<?= base_url('uploads/' . $image['image_path']) ?>" alt="Room Image" class="img-thumbnail" width="100">
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <a href="/admin/chambres/edit/<?= $chambre['id'] ?>" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="/admin/chambres/delete/<?= $chambre['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?')">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
