<!-- app/Views/chambres/create.php -->
<h1>Ajouter une Chambre</h1>

<form action="/admin/chambres/store" method="post">
<?= csrf_field() ?>


    <label for="numero">Numéro de Chambre</label>
    <input type="number" name="numero" id="numero" required><br>

    <label for="description">Description :</label>
    <textarea name="description" id="description" rows="4" placeholder="Entrez la description de la chambre ici..."></textarea><br>

    <label for="statut">Statut :</label>
    <select name="statut" id="statut" required>
    <option value="disponible" <?= isset($chambre) && $chambre['statut'] == 'disponible' ? 'selected' : '' ?>>Disponible</option>
    <option value="occupée" <?= isset($chambre) && $chambre['statut'] == 'occupée' ? 'selected' : '' ?>>Occupée</option>
    </select><br>

    <label for="prix">Prix</label>
    <input type="number" name="prix" id="prix" required><br>

    <label for="type_chambre_id">Type de Chambre</label>
    <select name="type_chambre_id" id="type_chambre_id" required>
        <?php foreach ($types_chambre as $type) : ?>
            <option value="<?= $type['id'] ?>"><?= $type['nom'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Ajouter Chambre</button>
</form>

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
