<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Chambre</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?= $this->extend('layouts/Admin') ?>
    <?= $this->section('content') ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center mb-4">Ajouter une Chambre</h1>
                <form action="/admin/chambres/store" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="numero" class="form-label">Numéro de Chambre</label>
                        <input type="number" name="numero" id="numero" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control" placeholder="Entrez la description de la chambre ici..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="statut" class="form-label">Statut</label>
                        <select name="statut" id="statut" class="form-select" required>
                            <option value="disponible" <?= isset($chambre) && $chambre['statut'] == 'disponible' ? 'selected' : '' ?>>Disponible</option>
                            <option value="occupe" <?= isset($chambre) && $chambre['statut'] == 'occupe' ? 'selected' : '' ?>>Occupée</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" name="prix" id="prix" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="type_chambre_id" class="form-label">Type de Chambre</label>
                        <select name="type_chambre_id" id="type_chambre_id" class="form-select" required>
                            <?php foreach ($types_chambre as $type) : ?>
                                <option value="<?= $type['id'] ?>"><?= $type['nom'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Images</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Ajouter Chambre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            const prix = document.getElementById('prix').value;
            if (isNaN(prix) || prix <= 0) {
                alert("Le prix doit être un nombre positif.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
