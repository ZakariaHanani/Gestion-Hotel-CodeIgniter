<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <!-- Ajouter Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?= $this->extend('layouts/Admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="content-header">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Liste des Clients</h1>
            </div>
            <div class="col-sm-6 text-end">
                <a href="/admin/clients/create" class="btn btn-primary">Ajouter une Client</a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nombre de Réservations</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td><?= $client['nom'] ?></td>
                            <td><?= $client['prenom'] ?></td>
                            <td><?= $client['nombre_reseravtions'] ?></td>
                            <td>
                                <a href="/admin/clients/show/<?= $client['user_id'] ?>" class="btn btn-info btn-sm">Voir</a>
                                <a href="/admin/clients/edit/<?= $client['user_id'] ?>" class="btn btn-warning btn-sm">Éditer</a>
                                <a href="/admin/clients/delete/<?= $client['user_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<?= $this->endSection() ?>

<!-- Ajouter Bootstrap JS et jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
