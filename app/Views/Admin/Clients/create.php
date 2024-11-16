<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Ajouter un Nouveau Client</h3>
        </div>
        <div class="card-body">
            <form action="<?= site_url('admin/clients/store') ?>" method="post">
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email :</label>
                    <div class="input-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                        <small class="text-danger"><?= $validation->getError('email'); ?></small>
                    <?php endif; ?>
                </div>

                <!-- Nom -->
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <div class="input-group">
                        <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('nom')): ?>
                        <small class="text-danger"><?= $validation->getError('nom'); ?></small>
                    <?php endif; ?>
                </div>

                <!-- Prénom -->
                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <div class="input-group">
                        <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Prénom" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('prenom')): ?>
                        <small class="text-danger"><?= $validation->getError('prenom'); ?></small>
                    <?php endif; ?>
                </div>

                <!-- Téléphone -->
                <div class="form-group">
                    <label for="telephone">Téléphone :</label>
                    <div class="input-group">
                        <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Téléphone" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('telephone')): ?>
                        <small class="text-danger"><?= $validation->getError('telephone'); ?></small>
                    <?php endif; ?>
                </div>

                <!-- Adresse -->
                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <div class="input-group">
                        <input type="text" name="adresse" id="adresse" class="form-control" placeholder="Adresse" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('adresse')): ?>
                        <small class="text-danger"><?= $validation->getError('adresse'); ?></small>
                    <?php endif; ?>
                </div>

                <!-- Mot de Passe -->
                <div class="form-group">
                    <label for="password">Mot de Passe :</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <small class="text-danger"><?= $validation->getError('password'); ?></small>
                    <?php endif; ?>
                </div>

                <!-- Confirmation Mot de Passe -->
                <div class="form-group">
                    <label for="password_confirm">Confirmez le Mot de Passe :</label>
                    <div class="input-group">
                        <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirmez le mot de passe" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('password_confirm')): ?>
                        <small class="text-danger"><?= $validation->getError('password_confirm'); ?></small>
                    <?php endif; ?>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
