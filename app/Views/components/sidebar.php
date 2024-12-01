<aside class="main-sidebar sidebar-dark-yellow elevation-4" style="background-color: #121202">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url() ?>template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Hotel </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar " >
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>


        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <?php if (session()->get('logged_in') &&session()->get('role')==='client'): ?>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>client/profile" class="nav-link">
                            <i class="fas fa-user"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('client/MesReservation') ?>" class="nav-link">
                            <i class="fas fa-calendar-check"></i>
                            <p>Mes Reservation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>/logout" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Log out</p>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="<?= base_url() ?>login" class="nav-link">
                            <i class="fas fa-sign-in-alt"></i>
                            <p>Login</p>
                        </a>
                    </li>
                    <li class="nav-item">

                        <a href="<?= base_url() ?>register" class="nav-link">
                            <i class="fas fa-user-plus"></i>
                            <p>Register</p>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>