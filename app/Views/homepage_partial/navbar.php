    <header class="nav-wrap bg-dark fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark px-lg-0">
                <a class="navbar-brand mr-3 swap-link" href="<?= base_url() ?>">Pojok<span class="text-light font-weight-bold">UMKM</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item swap-link <?= ($title == 'Home') ? 'active' : '' ?>"> <a href="<?= base_url() ?>/home" class="nav-link">Home</a> </li>
                        <li class="nav-item swap-link <?= ($title == 'List Produk') ? 'active' : '' ?>"> <a href="<?= base_url() ?>/produk" class="nav-link">Produk</a> </li>
                        <!-- <li class="nav-item swap-link <?= ($title == 'List Produk Rekomendasi') ? 'active' : '' ?>"> <a href="<?= base_url() ?>/produk/recom" class="nav-link">Produk Rekomendasi</a> </li> -->
                        <li class="nav-item swap-link <?= ($title == 'List Umkm') ? 'active' : '' ?>"> <a href="<?= base_url() ?>/home/umkm" class="nav-link">UMKM</a> </li>
                        <li class="nav-item swap-link <?= ($title == 'List Kategori') ? 'active' : '' ?>"> <a href="<?= base_url() ?>/kategori" class="nav-link">Kategori</a> </li>
                        <li class="nav-item swap-link <?= ($title == 'Contact Us') ? 'active' : '' ?>"> <a href="<?= base_url() ?>/home/contact_us" class="nav-link">Contact Us</a> </li>
                    </ul>
                    <ul class="navbar-nav">
                        <?php if (session()->get('logged_in') == TRUE) { ?>
                            <li class="nav-item dropdown megamenu">
                                <a class="nav-link dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <i class="las la-user mr-2" style="font-size:22px;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <?php if (session()->get('idgroup') == 1) { ?>
                                        <a class="dropdown-item font-weight-bold swap-link" href="<?= base_url() ?>/pengelola/profile"><i class="las la-user bg-info-alt p-1 rounded text-info"></i> Profile</a>
                                        <a class="dropdown-item swap-link" href="<?= base_url() ?>/pengelola/dashboard"><i class="las la-sign-out-alt bg-warning-alt text-warning p-1 rounded"></i> Dashboard</a>
                                        <a class="dropdown-item swap-link" href="<?= base_url() ?>/logout"><i class="las la-sign-out-alt bg-danger-alt text-danger p-1 rounded"></i> Logout</a>
                                    <?php } else { ?>
                                        <a class="dropdown-item font-weight-bold swap-link" href="<?= base_url() ?>/umkm/profile"><i class="las la-user bg-info-alt p-1 rounded text-info"></i> Profile</a>
                                        <a class="dropdown-item swap-link" href="<?= base_url() ?>/umkm/dashboard"><i class="las la-sign-out-alt bg-warning-alt text-warning p-1 rounded"></i> Dashboard</a>
                                        <a class="dropdown-item swap-link" href="<?= base_url() ?>/logout"><i class="las la-sign-out-alt bg-danger-alt text-danger p-1 rounded"></i> Logout</a>
                                    <?php } ?>
                                </div>
                            </li>
                        <?php } ?>
                        <li class="nav-item d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary swap-link text-white" href="<?= base_url() ?>/register">Sign up</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>