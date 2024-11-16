<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<h1>Modifier les informations du Client</h1>

<form action="/admin/clients/update/<?= $client['user_id'] ?>" method="post">
    <?= csrf_field() ?>
    
    <!-- Nom -->
    <div class="form-group">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= $client['nom'] ?>" required class="form-control">
    </div>

    <!-- Prénom -->
    <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= $client['prenom'] ?>" required class="form-control">
    </div>

    <!-- Adresse -->
    <div class="form-group">
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" id="adresse" value="<?= $client['adresse'] ?>" required class="form-control">
    </div>

    <!-- Téléphone -->
    <div class="form-group">
        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" value="<?= $client['telephone'] ?>" required class="form-control">
    </div>

    <!-- Boutons -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a href="/admin/clients" class="btn btn-secondary">Annuler</a>
    </div>
</form>
<?= $this->endSection() ?>
