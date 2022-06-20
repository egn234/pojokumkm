<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <link href="<?=base_url()?>/assets/minia/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('pengelola/menu') ?>

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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/pengelola/dashboard">PojokUMKM</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="my-5 pt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center mb-5">
                                    <h1 class="display-1 fw-semibold">WELCOME!</h1>
                                    <h4 class="text-uppercase">Selamat datang di Panel User</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->
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
<script src="<?=base_url()?>/assets/minia/assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="<?=base_url()?>/assets/minia/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>/assets/minia/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="<?=base_url()?>/assets/minia/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?=base_url()?>/assets/minia/assets/js/app.js"></script>
</body>

</html>