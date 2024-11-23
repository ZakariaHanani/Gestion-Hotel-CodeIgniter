<?= $this->extend('Client\home') ?>

<?= $this->section('contents') ?>
<div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-image: url('/public/uploads/chambres/1731755335_9d7e260425044cb9d4a0.jpg'); background-size: cover; background-position: center;">

    <div class="login-box p-4 shadow-lg rounded-4 bg-white" style="width: 400px;">
        <div class="text-center mb-4">
            <h3 class="text-primary fw-bold">Bienvenue</h3>
            <p class="text-muted">Connectez-vous à votre compte</p>
        </div>
        <?php if (isset($error)): ?>
            <div class="text-danger text-center">
                <?= esc($error) ?>
            </div>
        <?php endif; ?>
        <form action="/connexion" method="post">
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
                <label for="password" class="form-label fw-bold text-muted">Mot de passe</label>
                <div class="input-group">
                    <span class="input-group-text bg-light text-secondary"><i class="fa fa-lock"></i></span>
                    <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Entrez votre mot de passe"
                            >
                </div>
                <?php if (isset($validation) && $validation->hasError('password')): ?>
                    <div class="text-danger"><?= $validation->getError('password') ?></div>
                <?php endif; ?>
            </div>

            <!-- Submit -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Se connecter</button>
            </div>
        </form>

        <div class="text-center">
            <p class="mb-1">
                <a href="<?= base_url('forgot-password') ?>" class="text-decoration-none text-muted">Mot de passe oublié ?</a>
            </p>
            <p>
                <a href="<?= base_url('register') ?>" class="text-decoration-none text-primary fw-bold">Créer un compte</a>
            </p>
        </div>
    </div>
</div>

<!-- Inclusion des dépendances Bootstrap et FontAwesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->endSection() ?>
