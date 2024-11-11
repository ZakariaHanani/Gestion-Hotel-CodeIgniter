<!-- app/Views/Admin/chambres/index.php -->
<h1>Liste des Chambres</h1>

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
