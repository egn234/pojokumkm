<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?= base_url() ?>/umkm/dashboard" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>/assets/minia/assets/images/logo-sm.svg" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>/assets/minia/assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">PojokUMKM</span>
                    </span>
                </a>

                <a href="<?= base_url() ?>/umkm/dashboard" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url() ?>/assets/minia/assets/images/logo-sm.svg" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url() ?>/assets/minia/assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">PojokUMKM</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if ($detail_user->umkm_pic != 'image.jpg') { ?>
                        <img class="rounded-circle header-profile-user" src="<?= base_url() ?>/uploads/user/umkm/user<?= $detail_user->iduser ?>/<?= $detail_user->umkm_pic ?>" alt="Header Avatar">
                    <?php } else { ?>
                        <img class="rounded-circle header-profile-user" src="<?= base_url() ?>/uploads/user/umkm/image.jpg" alt="Header Avatar">
                    <?php } ?>
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">
                        <?php
                        if (isset($detail_user->umkm_name)) {
                            echo $detail_user->umkm_name;
                        } else {
                            echo $detail_user->username;
                        } ?>

                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="/" target="_blank"><i class="mdi mdi-home font-size-16 align-middle me-1"></i> Homepage</a>
                    <a class="dropdown-item" href="<?= base_url() ?>/umkm/profile"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url() ?>/logout"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>

        </div>
    </div>
</header>