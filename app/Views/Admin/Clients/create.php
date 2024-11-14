<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<form action="<?= site_url('admin/clients/store') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <!-- Afficher l'erreur de validation de l'email -->
                <?php if(isset($validation) && $validation->hasError('email')): ?>
                    <div class="text-danger"><?= $validation->getError('email'); ?></div>
                <?php endif; ?>

                <div class="input-group mb-3">
                    <input type="text" name="nom" class="form-control" placeholder="Nom" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?php if(isset($validation) && $validation->hasError('nom')): ?>
                    <div class="text-danger"><?= $validation->getError('nom'); ?></div>
                <?php endif; ?>

                <div class="input-group mb-3">
                    <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?php if(isset($validation) && $validation->hasError('prenom')): ?>
                    <div class="text-danger"><?= $validation->getError('prenom'); ?></div>
                <?php endif; ?>

                <div class="input-group mb-3">
                    <input type="text" name="telephone" class="form-control" placeholder="Téléphone" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <?php if(isset($validation) && $validation->hasError('telephone')): ?>
                    <div class="text-danger"><?= $validation->getError('telephone'); ?></div>
                <?php endif; ?>

                <div class="input-group mb-3">
                    <input type="text" name="adresse" class="form-control" placeholder="Adresse" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-map-marker-alt"></span>
                        </div>
                    </div>
                </div>
                <?php if(isset($validation) && $validation->hasError('adresse')): ?>
                    <div class="text-danger"><?= $validation->getError('adresse'); ?></div>
                <?php endif; ?>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?php if(isset($validation) && $validation->hasError('password')): ?>
                    <div class="text-danger"><?= $validation->getError('password'); ?></div>
                <?php endif; ?>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirm" class="form-control" placeholder="Confirmez le mot de passe" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?php if(isset($validation) && $validation->hasError('password_confirm')): ?>
                    <div class="text-danger"><?= $validation->getError('password_confirm'); ?></div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                    </div>
                </div>
            </form>
<?= $this->endSection() ?>
