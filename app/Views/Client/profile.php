<?= $this->extend('Client\home') ?>

<?= $this->section('contents') ?>
<div class="container py-5">
    <?php if (session()->has('seccuss')): ?>
        <div class="alert alert-success text-center fadeInDown">
            <?= esc(session('seccuss')) ?>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10 animate__animated animate__backInUp" >
            <div class="card shadow-lg border-0 rounded">
                <div class="card-header text-center py-2 bg-primary text-white rounded-top">
                    <h2 class="mb-0">Mon Profil</h2>
                </div>

                <div class="card-body p-4 bg-light">
                    <div class="d-flex flex-column align-items-center">
                        <div class=" w-100">
                            <p class="mb-4 fadeInLeft"><i class="fas fa-user me-2 text-primary"></i><strong>Nom :</strong> <?= $client['nom'] ?? '<span class="text-muted">Non renseigné</span>' ?></p>
                            <p class="mb-4 fadeInLeft"><i class="fas fa-user-tag me-2 text-primary"></i><strong>Prénom :</strong> <?= $client['prenom'] ?? '<span class="text-muted">Non renseigné</span>' ?></p>
                            <p class="mb-4 fadeInLeft"><i class="fas fa-map-marker-alt me-2 text-primary"></i><strong>Adresse :</strong> <?= $client['adresse'] ?? '<span class="text-muted">Non renseignée</span>' ?></p>
                            <p class="mb-4 fadeInLeft"><i class="fas fa-phone me-2 text-primary"></i><strong>Téléphone :</strong> <?= $client['telephone'] ?? '<span class="text-muted">Non renseigné</span>' ?></p>
                        </div>
                    </div>
                </div>

                <!-- Pied de carte avec boutons -->
                <div class="card-footer bg-white d-flex justify-content-around py-3">
                    <button class="btn btn-outline-primary animate__animated animate__fadeIn animate__delay-1s" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="fas fa-user-edit"></i> Modifier
                    </button>
                    <form action="<?= base_url('deleteAccount') ?>" method="get" class="d-inline-block" id="deleteAccountForm">
                        <?= csrf_field() ?>
                        <button type="button" class="btn btn-outline-danger animate__animated animate__fadeIn animate__delay-2s" id="deleteAccountButton">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modifier Profil -->
<div class="modal fade <?= session('errors') ? 'show' : '' ?>" id="editProfileModal" tabindex="-1"
     aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered animate__animated animate__zoomIn">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editProfileModalLabel">Modifier mon profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <form action="<?= base_url('updateProfile') ?>" method="post">
                <div class="modal-body bg-light">
                    <!-- Formulaire de modification -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom"
                               class="form-control <?= session('errors.nom') ? 'is-invalid' : '' ?>"
                               value="<?= old('nom', $client['nom'] ?? '') ?>">
                        <?php if (session('errors.nom')): ?>
                            <div class="invalid-feedback">
                                <?= esc(session('errors.nom')) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" name="prenom" id="prenom"
                               class="form-control <?= session('errors.prenom') ? 'is-invalid' : '' ?>"
                               value="<?= old('prenom', $client['prenom'] ?? '') ?>">
                        <?php if (session('errors.prenom')): ?>
                            <div class="invalid-feedback">
                                <?= esc(session('errors.prenom')) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" name="adresse" id="adresse"
                               class="form-control <?= session('errors.adresse') ? 'is-invalid' : '' ?>"
                               value="<?= old('adresse', $client['adresse'] ?? '') ?>">
                        <?php if (session('errors.adresse')): ?>
                            <div class="invalid-feedback">
                                <?= esc(session('errors.adresse')) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="text" name="telephone" id="telephone"
                               class="form-control <?= session('errors.telephone') ? 'is-invalid' : '' ?>"
                               value="<?= old('telephone', $client['telephone'] ?? '') ?>">
                        <?php if (session('errors.telephone')): ?>
                            <div class="invalid-feedback">
                                <?= esc(session('errors.telephone')) ?>
                            </div>
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

<!-- Script JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (<?= json_encode(session('errors') !== null) ?>) {
            var modal = new bootstrap.Modal(document.getElementById('editProfileModal'));
            modal.show();
        }
    });

    document.getElementById('deleteAccountButton').addEventListener('click', function () {
        const confirmation = confirm("Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.");
        if (confirmation) {
            document.getElementById('deleteAccountForm').submit();
        }
    });
</script>

<?= $this->endSection() ?>
