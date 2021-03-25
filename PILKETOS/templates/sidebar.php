<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-wallet"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KAS OSIS</div>
    </a>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu
    </div>
    <li class="nav-item <?= $title_page == 'Pengumuman' ? 'active' : '' ?> <?= isset($_COOKIE['login_admin']) | isset($_COOKIE['login_user']) ? '' : 'd-none' ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Pengumuman</span></a>
    </li>
    <li class="nav-item <?= $title_page == 'Tambah Calon' ? 'active' : '' ?><?= isset($_COOKIE['login_admin']) ? '' : 'd-none' ?>">
        <a class="nav-link" href="tambahcalon.php">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Tambah Calon</span></a>
    </li>
    <li class="nav-item <?= $title_page == 'Halaman Voting' ? 'active' : '' ?> <?= isset($_COOKIE['login_user']) ? '' : 'd-none' ?>">
        <a class="nav-link" href="voting.php">
            <i class="fas fa-fw fa-edit"></i>
            <span>Halaman Voting</span></a>
    </li>
    <li class="nav-item <?= isset($_COOKIE['login_admin']) | isset($_COOKIE['login_user']) ? '' : 'd-none' ?>">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <li class="nav-item <?= $title_page == 'Quick Count' ? 'active' : '' ?> <?= isset($_COOKIE['login_admin']) | isset($_COOKIE['login_user']) ? 'd-none' : '' ?>">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Quick Count</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>