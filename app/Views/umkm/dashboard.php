<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <link href="<?= base_url() ?>/assets/minia/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('umkm/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18"><?= $title ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/umkm/dashboard">PojokUMKM</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Produk</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?= $jumlah_produk ?>">0</span>
                                        </h4>
                                    </div>

                                    <!-- <div class="col-6">
                                        <div id="mini-chart1" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div> -->
                                </div>
                                <div class="text-nowrap">
                                    <a href="<?= base_url() ?>/umkm/produk/list" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    <!-- <span class="badge bg-soft-danger text-danger">-29 Trades</span> -->
                                    <!-- <span class="ms-1 text-muted font-size-13">Since last week</span> -->
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Kategori Produk</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?= $jml_kat_produk ?>">0</span>
                                        </h4>
                                    </div>
                                    <!-- <div class="col-6">
                                    </div> -->
                                </div>
                                <div class="text-nowrap">
                                    <a href="<?= base_url() ?>/umkm/produk/list" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    <!-- <span class="badge bg-soft-danger text-danger">-29 Trades</span> -->
                                    <!-- <span class="ms-1 text-muted font-size-13">Since last week</span> -->
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col-->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Voucher Iklan</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?= $jml_voucher ?>">0</span>
                                        </h4>
                                    </div>
                                    <!-- <div class="col-6">
                                        <div id="mini-chart3" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div> -->
                                </div>
                                <div class="text-nowrap">
                                    <a href="<?= base_url() ?>/umkm/Iklan/list" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    <!-- <span class="badge bg-soft-danger text-danger">-29 Trades</span> -->
                                    <!-- <span class="ms-1 text-muted font-size-13">Since last week</span> -->
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Produk Diiklankan</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?= $jml_produk_ads ?>">0</span>
                                        </h4>
                                    </div>
                                    <!-- <div class="col-6">
                                        <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                    </div> -->
                                </div>
                                <div class="text-nowrap">
                                    <a href="<?= base_url() ?>/umkm/produk/list" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ms-1"></i></a>
                                    <!-- <span class="badge bg-soft-danger text-danger">-29 Trades</span> -->
                                    <!-- <span class="ms-1 text-muted font-size-13">Since last week</span> -->
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row-->
                <!-- start here dashboard -->
                <div class="row">
                    <div class="col-xl-5">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex flex-wrap align-items-center mb-4">
                                    <h5 class="card-title me-2">UMKM INFO</h5>
                                    <!-- <div class="ms-auto">
                                        <div>
                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                ALL
                                            </button>
                                            <button type="button" class="btn btn-soft-primary btn-sm">
                                                1M
                                            </button>
                                            <button type="button" class="btn btn-soft-secondary btn-sm">
                                                6M
                                            </button>
                                            <button type="button" class="btn btn-soft-secondary btn-sm active">
                                                1Y
                                            </button>
                                        </div>
                                    </div> -->
                                </div>

                                <div class="row align-items-center">
                                    <h5 class="card-title">Hi UMKM <?= $detail_user->umkm_name; ?></h5>

                                    <div class="col-sm">
                                        <?php if ($detail_user->umkm_pic != 'image.jpg') { ?>
                                            <img class="card-img-top" src="<?= base_url() ?>/uploads/user/umkm/user<?= $detail_user->iduser ?>/<?= $detail_user->umkm_pic ?>" alt="Header Avatar">
                                        <?php } else { ?>
                                            <img class="card-img-top" src="<?= base_url() ?>/uploads/user/umkm/image.jpg" alt="Header Avatar">
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm align-self-center">
                                        <div class="mt-4 mt-sm-0">
                                            <div>
                                                <p class="mb-2">Nama UMKM</p>
                                                <h6><?= $detail_user->umkm_name; ?></h6>
                                            </div>
                                            <div>
                                                <p class="mb-2">Alamat</p>
                                                <h6><?= $detail_user->address; ?></h6>
                                            </div>
                                            <div>
                                                <p class="mb-2">Telepon</p>
                                                <h6><?= $detail_user->phone; ?></h6>
                                            </div>
                                            <div>
                                                <a href="<?= base_url() ?>/umkm/produk/list" class="btn btn-primary btn-sm">View Produk<i class="mdi mdi-arrow-right ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                    <!-- end col -->
                </div> <!-- end row-->


                <!-- end row-->


                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/right-sidebar') ?>
        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/vendor-scripts') ?>

<!-- apexcharts -->
<script src="<?= base_url() ?>/assets/minia/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="<?= base_url() ?>/assets/minia/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>/assets/minia/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="<?= base_url() ?>/assets/minia/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?= base_url() ?>/assets/minia/assets/js/app.js"></script>
</body>

</html>