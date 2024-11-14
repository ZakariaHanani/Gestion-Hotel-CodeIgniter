<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<h1>Modifier les informations du Client</h1>

<form action="/admin/clients/update/<?= $client['user_id'] ?>" method="post">
    <?= csrf_field() ?>
    
    <div class="form-group">
        <label for="nom">Nom d'utilisateur:</label>
        <input type="text" name="nom" id="nom" value="<?= $client['nom'] ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="prenom">prenom d'utilisateur:</label>
        <input type="text" name="prenom" id="prenom" value="<?= $client['prenom'] ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" id="adresse" value="<?= $client['adresse'] ?>" required class="form-control">
    </div>

    <div class="form-group">
        <label for="telephone">Adresse :</label>
        <input type="text" name="telephone" id="telephone" value="<?= $client['telephone'] ?>" required class="form-control">
    </div>


    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    <a href="/admin/clients" class="btn btn-secondary">Annuler</a>
</form>
<?= $this->endSection() ?>
