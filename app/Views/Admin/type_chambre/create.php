<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Type de Chambre</title>
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
                <h1 class="m-0">Ajouter un Type de Chambre</h1>
            </div>
            <div class="col-sm-6 text-end">
                <a href="/admin/chambre_type" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">Formulaire d'ajout</div>
                    <div class="card-body">
                        <form action="/admin/chambre_type/store" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom:</label>
                                <input type="text" name="nom" id="nom" class="form-control" value="<?= old('nom') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea name="description" id="description" class="form-control"><?= old('description') ?></textarea>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                                <a href="/admin/chambre_type" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
