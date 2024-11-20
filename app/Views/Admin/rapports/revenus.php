

<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Rapport des Revenus</h2>
    <form method="get" action="<?= base_url('admin/rapport/revenus') ?>">
        <div class="row">
            <div class="col-md-3">
                <label for="mois">Mois :</label>
                <input type="number" name="mois" id="mois" class="form-control" value="<?= esc($mois) ?>" min="1" max="12">
            </div>
            <div class="col-md-3">
                <label for="annee">Année :</label>
                <input type="number" name="annee" id="annee" class="form-control" value="<?= esc($annee) ?>">
            </div>
            <div class="col-md-3 mt-4">
                <button type="submit" class="btn btn-primary">Générer</button>
                <a href="<?= base_url("admin/rapport/telechargerRevenusPDF/{$mois}/{$annee}") ?>" class="btn btn-secondary">Télécharger PDF</a>
            </div>
        </div>
    </form>

    <div class="mt-4">
        <h4>Revenus pour <?= $mois ?>/<?= $annee ?> : <?= number_format($revenus, 2) ?> €</h4>
    </div>
</div>

<?= $this->endSection() ?>
