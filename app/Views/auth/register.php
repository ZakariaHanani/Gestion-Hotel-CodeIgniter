<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inscription | AdminLTE 3</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('template/plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template/dist/css/adminlte.min.css'); ?>">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Inscription</b></a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Créer un nouveau compte</p>

            <form action="/store" method="post">
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
                        <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                    </div>
                </div>
            </form>

            <p class="mt-3">
                <a href="/login" class="text-center">J'ai déjà un compte</a>
            </p>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= base_url('template/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('template/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('template/dist/js/adminlte.min.js'); ?>"></script>
</body>
</html>
