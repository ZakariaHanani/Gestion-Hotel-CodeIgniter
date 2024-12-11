<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #2b2b30;">
    <div class="container">
        <!-- Logo et Nom -->
        <a href="<?= base_url() ?>" class="navbar-brand text-light mr-5">
            <strong>Hôtel</strong>
        </a>

        <!-- Bouton pour mobile -->
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu principal -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Liens principaux (toujours visibles) -->
            <ul class="navbar-nav me-auto ml-5">
                <li class="nav-item">
                    <a href="<?= base_url() ?>"
                       class="nav-link text-light <?= (current_url() == base_url()) ? 'active' : '' ?>">Home</a>
                </li>
                <?php if (session()->get('logged_in') && session()->get('role') === 'client'): ?>
                    <li class="nav-item ml-5">
                        <a href="<?= base_url() ?>#services"
                           class="nav-link text-light <?= (current_url() == base_url('#services')) ? 'active' : '' ?>">Nos services</a>
                    </li>
                    <li class="nav-item ml-5">
                        <a href="<?= base_url() ?>client/MesReservation"
                           class="nav-link text-light <?= (current_url() == base_url('client/MesReservation')) ? 'active' : '' ?>">Réservations</a>
                    </li>
                    <li class="nav-item ml-5">
                        <a href="<?= base_url() ?>#contact"
                           class="nav-link text-light <?= (current_url() == base_url('#contact')) ? 'active' : '' ?>">Contactez-nous</a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Section Droite : Connexion / Profil -->
            <ul class="navbar-nav ms-auto">
                <?php if (session()->get('logged_in') && session()->get('role') === 'client'): ?>
                    <!-- Menu pour utilisateur connecté -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-light" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i> <?= session()->get('nom') ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a href="<?= base_url() ?>client/profile" class="dropdown-item">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a href="<?= base_url() ?>/logout" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Log out</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- Menu pour utilisateur déconnecté -->
                    <?php if (uri_string() !== 'login'): ?>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>login" class="nav-link text-light">Login</a>
                        </li>
                    <?php endif; ?>
                    <?php if (uri_string() !== 'register'): ?>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>register" class="nav-link text-light">Register</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
