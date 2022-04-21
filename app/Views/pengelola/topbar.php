<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?=base_url()?>/pengelola/dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url()?>/assets/minia/assets/images/favicon.ico" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url()?>/assets/minia/assets/images/logo-sm.svg" alt="" height="50">
                    </span>
                </a>

                <a href="<?=base_url()?>/pengelola/dashboard" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url()?>/assets/minia/assets/images/favicon.ico" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url()?>/assets/minia/assets/images/logo-sm.svg" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url()?>/uploads/user/pengelola/image.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">
                        <?php 
                        if (isset($detail_user->name)) {
                            echo $detail_user->name;
                        }else{
                            echo $detail_user->username;
                        }?>
                            
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?=base_url()?>/pengelola/profile"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> <?= lang('Files.Profile') ?></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url()?>/logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> <?= lang('Files.Logout') ?></a>
                </div>
            </div>

        </div>
    </div>
</header>