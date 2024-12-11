<?= $this->extend('Client\home') ?>

<?= $this->section('contents') ?>
<div class="py-5 mb-5 mt-2">
    <?php if (session()->has('seccuss')): ?>
        <div class="alert alert-success ml-5 mr-5 text-center animate__animated animate__fadeInDown">
            <i class="fas fa-check-circle me-2"></i> <?= esc(session('seccuss')) ?>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card border-0 shadow-lg rounded">

                <div class="card-header bg-light-subtle text-center rounded-top py-2">
                    <div class="text-center">
                        <img src="<?= base_url('assets/images/user.png') ?>" alt="Photo de profil" class="rounded-circle shadow h-25" width="100">
                    </div>
                </div>

                <div class="card-body bg-light p-5">
                    <div class=" gy-4">
                        <div class="col-md-6">
                            <p><strong class="text-primary">Nom :</strong><br> <?= $client['nom'] ?? '<span class="text-muted">Non renseigné</span>' ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong class="text-primary">Prénom :</strong> <br><?= $client['prenom'] ?? '<span class="text-muted">Non renseigné</span>' ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong class="text-primary">Téléphone :</strong> <br><?= $client['telephone'] ?? '<span class="text-muted">Non renseigné</span>' ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong class="text-primary">Adresse :</strong> <br><?= $client['adresse'] ?? '<span class="text-muted">Non renseignée</span>' ?></p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer bg-white d-flex justify-content-between py-3">
                    <button class="btn btn-outline-primary px-4" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fas fa-edit me-1"></i> Modifier Profil
                    </button>
                    <button class="btn btn-outline-danger px-4 ml-5" id="deleteAccountButton">
                        <i class="fas fa-trash-alt "></i> Supprimer Compte
                    </button>
                </div>
            </div>
        </div>
    </div>



</div>

<!-- Modal Modifier Profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="editProfileModalLabel">Modifier mon profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <form action="<?= base_url('updateProfile') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom"
                               class="form-control <?= session('errors.nom') ? 'is-invalid' : '' ?>"
                               value="<?= old('nom', $client['nom'] ?? '') ?>">
                        <?php if (session('errors.nom')): ?>
                            <div class="invalid-feedback"><?= esc(session('errors.nom')) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" name="prenom" id="prenom"
                               class="form-control <?= session('errors.prenom') ? 'is-invalid' : '' ?>"
                               value="<?= old('prenom', $client['prenom'] ?? '') ?>">
                        <?php if (session('errors.prenom')): ?>
                            <div class="invalid-feedback"><?= esc(session('errors.prenom')) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" name="adresse" id="adresse"
                               class="form-control <?= session('errors.adresse') ? 'is-invalid' : '' ?>"
                               value="<?= old('adresse', $client['adresse'] ?? '') ?>">
                        <?php if (session('errors.adresse')): ?>
                            <div class="invalid-feedback"><?= esc(session('errors.adresse')) ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" name="telephone" id="telephone"
                               class="form-control <?= session('errors.telephone') ? 'is-invalid' : '' ?>"
                               value="<?= old('telephone', $client['telephone'] ?? '') ?>">
                        <?php if (session('errors.telephone')): ?>
                            <div class="invalid-feedback"><?= esc(session('errors.telephone')) ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {

        const hasErrors = <?= session('errors') ? 'true' : 'false' ?>;
        if (hasErrors) {
            const editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'));
            editProfileModal.show(); // Affiche le modal
        }
    });
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('deleteAccountButton').addEventListener('click', function () {
            if (confirm("Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.")) {
                document.getElementById('deleteAccountForm').submit();
            }
        });
    });
</script>

<?= $this->endSection() ?>
