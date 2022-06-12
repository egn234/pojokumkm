<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="<?= base_url() ?>/umkm/dashboard">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>/umkm/produk/list">
                        <i data-feather="box"></i>
                        <span data-key="t-produk">Produk</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-authentication">Iklan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url() ?>/umkm/order/list" data-key="t-user-grid">
                                <span data-key="t-authentication">Pesan Voucher Iklan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>/umkm/Iklan/list" data-key="t-user-grid">
                                <span data-key="t-authentication">Daftar Voucher</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->