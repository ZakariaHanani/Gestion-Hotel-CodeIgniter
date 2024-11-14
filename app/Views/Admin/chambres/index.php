<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
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
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
    <table>
    <thead>
        <tr>
            <th>Numéro de Chambre</th>
            <th>Prix</th>
            <th>Statut</th>
            <th>Type de Chambre</th>
            <th>Description </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($chambres as $chambre): ?>
        <tr>
            <td><?= $chambre['numero'] ?></td>
            <td><?= $chambre['prix'] ?> €</td>
            <td><?= $chambre['statut'] ?></td>
            <td><?= $chambre['type_nom'] ?></td>
            <td><?= $chambre['type_description'] ?> , <?= $chambre['description'] ?></td>
            <td>
                <a href="/admin/chambres/edit/<?= $chambre['id'] ?>">Modifier</a> |
                <a href="/admin/chambres/delete/<?= $chambre['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/admin/chambres/create" >Ajouter </a> 

</div>
</div>
    <?= $this->endSection() ?>


</body>
</html>



