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
    <li class="nav-item  <?= $title_page == 'Info Kas' ? 'active' : '' ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-money-check"></i>
            <span>Info Kas</span></a>
    </li>
    <li class="nav-item <?= $title_page == 'Kas Wajib' ? 'active' : '' ?><?= isset($_COOKIE['ascnsansan']) ? '' : 'd-none' ?>">
        <a class="nav-link" href="kaswajib.php">
            <i class="fas fa-fw fa-edit"></i>
            <span>Kas Wajib</span></a>
    </li>
    <li class="nav-item <?= $title_page == 'Kas Acara' ? 'active' : '' ?><?= isset($_COOKIE['ascnsansan']) ? '' : 'd-none' ?>">
        <a class="nav-link" href="kasacara.php">
            <i class="fas fa-fw fa-calendar-times"></i>
            <span>Kas Acara</span></a>
    </li>
    <li class="nav-item <?= isset($_COOKIE['ascnsansan']) ? 'd-none' : '' ?>">
        <a class="nav-link" href="login.php">
            <i class="fas fa-fw fa-sign-in-alt"></i>
            <span>Login</span></a>
    </li>
    <li class="nav-item <?= isset($_COOKIE['ascnsansan']) ? '' : 'd-none' ?>">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>