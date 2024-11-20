<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Résultats pour "<?= esc($query) ?>"</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <!-- Résultats des clients -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Clients</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($clients)): ?>
                    <ul class="list-group">
                        <?php foreach ($clients as $client): ?>
                            <li class="list-group-item">
                                <strong>Nom:</strong> <?= esc($client['nom']) ?><br>
                                <strong>Prénom:</strong> <?= esc($client['prenom']) ?><br>
                                <strong>Téléphone:</strong> <?= esc($client['telephone']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Aucun client trouvé.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Résultats des chambres -->
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Chambres</h3>
            </div>
            <div class="card-body">
                <?php if (!empty($chambres)): ?>
                    <ul class="list-group">
                        <?php foreach ($chambres as $chambre): ?>
                            <li class="list-group-item">
                                <strong>Numéro:</strong> <?= esc($chambre['numero']) ?><br>
                                <strong>Type:</strong> <?= esc($chambre['type_nom']) ?><br>
                                <strong>Prix par nuit:</strong> <?= esc($chambre['prix']) ?> MAD<br>
                                <strong>Description:</strong> <?= esc($chambre['description']) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Aucune chambre trouvée.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
