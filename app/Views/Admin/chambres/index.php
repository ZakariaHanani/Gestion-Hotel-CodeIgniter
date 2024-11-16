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
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Numéro</th>
                    <th>Prix (€)</th>
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
