<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $link ?>2021">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-receipt"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $title_sidebar  ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= ($title_web == 'Tabel Kas Tahun 2021') ? 'active' : '' ?>">
        <a class="nav-link" href="<?= $link ?>2021/index.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tabel Kas</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= (isset($_COOKIE['ascnsansan'])) ? 'd-none' : '' ?>">
        <a class="nav-link" href="<?= $link ?>2021/login.php">
            <i class="fas fa-fw fa-sign-in-alt"></i>
            <span>Login</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= ($title_web == 'Tambah Data Tahun 2021') ? 'active' : '' ?> <?= (isset($_COOKIE['ascnsansan'])) ? '' : 'd-none' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-list"></i>
            <span>Tambah Kas</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tambah Kas:</h6>
                <a class="collapse-item" href="<?= $link ?>2021/tambahkas.php">Tahun 2021</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= (isset($_COOKIE['ascnsansan'])) ? '' : 'd-none' ?>">
        <a class="nav-link" href="<?= $link ?>2021/logout.php">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>