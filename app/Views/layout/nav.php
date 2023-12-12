<div class="nav-header">
    <a href="<?= base_url('/dashboard') ?>" class="brand-logo">
        <i class="fas fa-book logo-abbr"></i>
        <p class="brand-title mt-3">E-ARSIP</p>
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">

                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-item">
                                <i class="fas fa-user"></i>
                                <span class="ml-2"><?= session()->get('nama_user') ?></span>
                            </div>
                            <hr>
                            <a href="<?= base_url("/logout") ?>" class="dropdown-item">
                                <i class="fa-solid fa-sign-out"></i>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="<? $menu == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('/dashboard') ?>" aria-expanded="false"><i class="fas fa-home"></i><span class="nav-text">Home</span></a>
            </li>
            <li>
                <a class="<? $menu == 'user' ? 'active' : '' ?>" href="<?= base_url('/user') ?>" aria-expanded="false"><i class="fas fa-user"></i><span class="nav-text">User</span></a>
            </li>
            <li>
                <a class="<? $menu == 'departemen' ? 'active' : '' ?>" href="<?= base_url('/departemen') ?>" aria-expanded="false"><i class="fa-solid fa-building"></i><span class="nav-text">Departemen</span></a>
            </li>
            <li>
                <a class="<? $menu == 'kategori' ? 'active' : '' ?>" href="<?= base_url('/kategori') ?>" aria-expanded="false"><i class="fa-solid fa-layer-group"></i><span class="nav-text">Kategori</span></a>
            </li>
            <li>
                <a class="<? $menu == 'arsip' ? 'active' : '' ?>" href="<?= base_url('/arsip') ?>" aria-expanded="false"><i class="fa-solid fa-folder-open"></i><span class="nav-text">Arsip</span></a>
            </li>
        </ul>
    </div>
</div>