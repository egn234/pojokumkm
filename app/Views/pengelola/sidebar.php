<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="<?= base_url() ?>/pengelola/dashboard">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url() ?>/pengelola/user/list" data-key="t-user-grid">
                                <span data-key="t-authentication">User Baru</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/pengelola/pengelola/list" data-key="t-user-grid">
                                <span data-key="t-authentication">Pengelola</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/pengelola/umkm/list" data-key="t-user-grid">
                                <span data-key="t-authentication">UMKM</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url() ?>/pengelola/produk/list">
                        <i data-feather="box"></i>
                        <span data-key="t-produk">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/pengelola/kategori/list">
                        <i data-feather="tag"></i>
                        <span data-key="t-kategori">Kategori Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/pengelola/iklan/list">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-kategori">Paket Iklan</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/pengelola/order/list">
                        <i data-feather=""></i>
                        <span data-key="t-kategori">Orderan</span>
                    </a>
                </li>
                <!--
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="dollar-sign"></i>
                        <span data-key="t-authentication">Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url() ?>/pengelola/report" data-key="t-user-grid">
                                <span data-key="t-authentication">Summary</span>
                            </a>
                        </li>
                        <li>                    
                            <a href="<?= base_url() ?>/pengelola/withdraw" data-key="t-user-grid">
                                <span data-key="t-authentication">Riwayat Withdraw</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/pengelola/withdraw/requested" data-key="t-user-grid">
                                <span data-key="t-authentication">Permohonan Withdraw</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-authentication">Transaksi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url() ?>/pengelola/transaksi/list" data-key="t-user-grid">
                                <span data-key="t-authentication">List Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/pengelola/pesanan2/list" data-key="t-user-grid">
                                <span data-key="t-authentication">Riwayat Transaksi Batal</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url() ?>/pengelola/discount/list">
                        <i data-feather="percent"></i>
                        <span data-key="t-pages">Kelola Kode Diskon</span>
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() ?>/pengelola/bank/list">
                        <i data-feather="credit-card"></i>
                        <span data-key="t-pages">Kelola Info Bank</span>
                    </a>
                </li>
                
                <li class="menu-title mt-2" data-key="t-menu"><?= lang('Files.Layout') ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="layout"></i>
                        <span data-key="t-authentication"><?= lang('Files.Frontpage') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url() ?>/pengelola/frontpage/home" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Home') ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/pengelola/frontpage/contact" data-key="t-user-grid">
                                <span data-key="t-authentication"><?= lang('Files.Contact') ?></span>
                            </a>
                        </li>
                    </ul>
                </li> -->
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->