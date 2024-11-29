<?= $this->extend('Client\home') ?>

<?= $this->section('contents') ?>
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-size: cover; background-position: center;">
    <div class="login-box p-4 shadow-lg rounded-4 bg-white" style="width: 600px;">
        <div class="text-center mb-4">
            <h3 class="text-primary fw-bold">Inscription</h3>
            <p class="text-muted">Créez votre compte </p>
        </div>

        <form action="/store" method="post">
            <?= csrf_field() ?>


            <div class="mb-3">
                <label for="email" class="form-label fw-bold text-muted">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-secondary"><i class="fa fa-envelope"></i></span>
                    <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="Entrez votre email"
                            value="<?= old('email') ?>"
                            required>
                </div>
                <?php if (isset($validation) && $validation->hasError('email')): ?>
                    <div class="text-danger"><?= $validation->getError('email') ?></div>
                <?php endif; ?>
            </div>


            <div class="mb-3">
                <label for="nom" class="form-label fw-bold text-muted">Nom</label>
                <input
                        type="text"
                        name="nom"
                        id="nom"
                        class="form-control"
                        placeholder="Entrez votre nom"
                        value="<?= old('nom') ?>"
                        required>
                <?php if (isset($validation) && $validation->hasError('nom')): ?>
                    <div class="text-danger"><?= $validation->getError('nom') ?></div>
                <?php endif; ?>
            </div>


            <div class="mb-3">
                <label for="prenom" class="form-label fw-bold text-muted">Prénom</label>
                <input
                        type="text"
                        name="prenom"
                        id="prenom"
                        class="form-control"
                        placeholder="Entrez votre prénom"
                        value="<?= old('prenom') ?>"
                        required>
                <?php if (isset($validation) && $validation->hasError('prenom')): ?>
                    <div class="text-danger"><?= $validation->getError('prenom') ?></div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label fw-bold text-muted">Pays</label>
                <select name="adresse" id="country" class="form-select" required>
                    <option value="">Sélectionnez votre pays</option>

                </select>
                <?php if (isset($validation) && $validation->hasError('adresse')): ?>
                    <div class="text-danger"><?= $validation->getError('adresse') ?></div>
                <?php endif; ?>
            </div>



            <div class="mb-3">
                <label for="telephone" class="form-label fw-bold text-muted">Téléphone</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-secondary"><i class="fa fa-phone"></i></span>
                    <input
                            type="text"
                            name="telephone"
                            id="telephone"
                            class="form-control <?= isset($validation) && $validation->hasError('telephone') ? 'is-invalid' : '' ?>"
                            placeholder="Entrez votre téléphone"
                            value="<?= old('telephone') ?>"
                            required>
                </div>
                <?php if (isset($validation) && $validation->hasError('telephone')): ?>
                    <div class="text-danger"><?= $validation->getError('telephone') ?></div>
                <?php endif; ?>
            </div>


            <div class="mb-3">
                <label for="password" class="form-label fw-bold text-muted">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-secondary"><i class="fa fa-lock"></i></span>
                    <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Entrez votre mot de passe"
                            required>
                </div>
                <?php if (isset($validation) && $validation->hasError('password')): ?>
                    <div class="text-danger"><?= $validation->getError('password') ?></div>
                <?php endif; ?>
            </div>


            <div class="mb-3">
                <label for="password_confirm" class="form-label fw-bold text-muted">Confirmez le mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-secondary"><i class="fa fa-lock"></i></span>
                    <input
                            type="password"
                            name="password_confirm"
                            id="password_confirm"
                            class="form-control"
                            placeholder="Confirmez votre mot de passe"
                            required>
                </div>
                <?php if (isset($validation) && $validation->hasError('password_confirm')): ?>
                    <div class="text-danger"><?= $validation->getError('password_confirm') ?></div>
                <?php endif; ?>
            </div>


            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">S'inscrire</button>
            </div>
        </form>

        <div class="text-center">
            <p class="mb-1">
                <a href="<?= base_url('login') ?>" class="text-decoration-none text-muted">Vous avez déjà un compte ?</a>
            </p>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    async function fetchCountries() {
        try {
            const response = await fetch('https://restcountries.com/v3.1/all?fields=name,flags');
            if (!response.ok) {
                throw new Error(`Erreur HTTP ${response.status} : ${response.statusText}`);
            }

            const countries = await response.json();
            const sortedCountries = countries.sort((a, b) =>
                a.name.common.localeCompare(b.name.common)
            );

            const select = document.getElementById('country');
            if (!select) {
                throw new Error("Élément select non trouvé !");
            }

            sortedCountries.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.textContent = country.name.common;
                select.appendChild(option);
            });
        } catch (error) {
            console.error("Erreur : ", error.message);
        }
    }

    // Attendre que le DOM soit prêt avant d'exécuter la fonction
    document.addEventListener('DOMContentLoaded', fetchCountries);
</script>


<?= $this->endSection() ?>
