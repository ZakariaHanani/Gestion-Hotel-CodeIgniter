
<nav class="main-header navbar navbar-expand navbar-light bg-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- Sidebar toggle button-->
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">Tableau de Bord</a>
        </li>
    </ul>

    <!-- Search Form -->
    <form class="form-inline ml-3" action="<?= base_url('admin/search') ?>" method="get">
        <div class="input-group input-group-sm">
            <input 
                class="form-control form-control-navbar" 
                type="text" 
                name="query" 
                placeholder="Rechercher..." 
                aria-label="Search" 
                required
            >
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
    
        <!-- User Profile Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="<?= base_url('admin/profile') ?>" class="dropdown-item">
                    <i class="fas fa-user-circle mr-2"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('logout') ?>" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                </a>
            </div>
        </li>
    </ul>
</nav>
