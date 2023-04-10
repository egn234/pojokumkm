<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="<?=base_url()?>/assets/minia/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>/assets/minia/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- glightbox css -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/minia/assets/libs/glightbox/css/glightbox.min.css">

    <!-- Responsive datatable examples -->
    <link href="<?=base_url()?>/assets/minia/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/pengelola/iklan/list">List Iklan</a></li>
                                    <li class="breadcrumb-item active">Detail Iklan</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <?=session()->getFlashdata('notif');?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <h4 class="card-title">Detail Paket</h4>
                                        <h6 class="card-subtitle text-muted">&nbsp</h6>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                                <a href="<?=base_url()?>/pengelola/iklan/edit/<?=$l_detail->idads?>" class="btn btn-soft-info"><i class="fa fa-edit"></i> Ubah Paket Iklan</a>
                                            </div>
                                            <div>
                                                <?php if($l_detail->ads_status == 'on'){?>
                                                    <button type="button" class="btn btn-soft-danger" data-bs-toggle="modal" data-bs-target="#switchIklan">Nonaktifkan</button>
                                                <?php }else{?>
                                                    <button type="button" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#switchIklan">Aktifkan</button>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="pb-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Nama Paket :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <?=$l_detail->ads_name?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Durasi Paket :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <?=$l_detail->ads_duration?> Hari
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Harga Paket :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                               Rp <?=number_format($l_detail->ads_price, 0, ',', '.')?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="py-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Status :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                               <?=($l_detail->ads_status == 'on')?'Aktif':'Nonaktif'?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Deskripsi Paket :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <?=$l_detail->ads_description?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- sample modal content -->
<div id="switchIklan" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?=($l_detail->ads_status == 'on')?'Nonaktifkan':'Aktifkan'?> Paket iklan ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <?php if ($l_detail->ads_status == 'on') {?>
                    <a href="<?=base_url()?>/pengelola/iklan/switch/<?=$l_detail->idads?>" class="btn btn-danger">Nonaktifkan</a>
                <?php }else{?>
                    <a href="<?=base_url()?>/pengelola/iklan/switch/<?=$l_detail->idads?>" class="btn btn-success">Aktifkan</a>
                <?php }?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?= $this->include('pengelola/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- glightbox js -->
<script src="<?=base_url()?>/assets/minia/assets/libs/glightbox/js/glightbox.min.js"></script>

<!-- lightbox init -->
<script src="<?=base_url()?>/assets/minia/assets/js/pages/lightbox.init.js"></script>

<script src="<?=base_url()?>/assets/minia/assets/js/app.js"></script>

</body>

</html>