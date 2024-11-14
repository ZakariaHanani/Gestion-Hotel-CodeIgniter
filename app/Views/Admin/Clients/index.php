<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
</head>
<body>
<?= $this->extend('layouts/Admin') ?>
<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Liste des Clients</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
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
                    <a href="/admin/clients/show/<?= $client['user_id'] ?>">Voir</a> |
                    <a href="/admin/clients/edit/<?= $client['user_id'] ?>">Éditer</a> |
                    <a href="/admin/clients/delete/<?= $client['user_id'] ?>" onclick="return confirm('Confirmer la suppression ?');">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/admin/clients/create">Ajouter un nouveau client</a>
</div>
</div>
<?= $this->endSection() ?>
  
</body>
</html>