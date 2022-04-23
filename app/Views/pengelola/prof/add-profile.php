<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('pengelola/prof/menu2') ?>

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
                                    <li class="breadcrumb-item active">Profil</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xl me-3">
                                                    <img src="<?= base_url()?>/uploads/user/pengelola/image.jpg" alt="" class="img-fluid rounded-circle d-block">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-16 mb-1"><?=$detail_user->username?></h5>
                                                    <p class="text-muted font-size-13">Pengelola</p>

                                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>-</div>
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i>-</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#about" role="tab">Ubah Profil</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="tab-content">
                            <div class="tab-pane active" id="about" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mt-4 mt-lg-0">
                                            <h5 class="font-size-14 mb-4">Ubah Profil</h5>
                                            <form action="<?=base_url()?>/pengelola/profile/create_proc/<?=$detail_user->iduser?>" method="post">
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" value="<?=$detail_user->email?>" class="form-control"  disabled>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Alamat <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="alamat" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Nomor Telpon <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="notelp" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Nomor WhatsApp <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="whatsapp" class="form-control" required>
                                                    </div>
                                                </div>
                                                <span class="text-xs text-danger">
                                                  *Wajib Diisi
                                                </span>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-9">
                                                        <div><button type="submit" class="btn btn-primary w-md">Submit</button></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->
                        </div>

                        <!-- end tab content -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<script src="<?=base_url()?>/assets/minia/assets/js/app.js"></script>

</body>

</html>