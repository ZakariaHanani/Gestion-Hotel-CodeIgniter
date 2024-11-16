<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Profil du Client</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Nom d'utilisateur:</strong> <?= $client['nom'] ?></p>
            <p><strong>Prénom d'utilisateur:</strong> <?= $client['prenom'] ?></p>
            <p><strong>Téléphone:</strong> <?= $client['telephone'] ?></p>
            <p><strong>Adresse:</strong> <?= $client['adresse'] ?></p>
            <p><strong>Email:</strong> <?= $client['email'] ?></p>
        </div>
    </div>
    <a href="/admin/clients" class="btn btn-secondary mt-3">Retour à la liste des clients</a>
</div>
<?= $this->endSection() ?>
