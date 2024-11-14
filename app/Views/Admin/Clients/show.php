<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<h1>Profil du Client</h1>
<p><strong>Nom d'utilisateur:</strong> <?= $client['nom'] ?></p>
<p><strong>Prenom d'utilisateur:</strong> <?= $client['prenom'] ?></p>
<p><strong>Telephone:</strong> <?= $client['telephone'] ?></p>
<p><strong>adresse</strong> <?= $client['adresse'] ?></p>
<p><strong>Email:</strong> <?= $client['email'] ?></p>
<?= $this->endSection() ?>
