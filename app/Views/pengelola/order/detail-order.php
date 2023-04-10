<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- glightbox css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/minia/assets/libs/glightbox/css/glightbox.min.css">

    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/pengelola/dashboard">PojokUMKM</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/pengelola/order/list">List Orderan</a></li>
                                    <li class="breadcrumb-item active">Detail Orderan</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <?= session()->getFlashdata('notif'); ?>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Foto Bukti Pembayaran</h4>
                                <h6 class="card-subtitle text-muted">&nbsp</h6>
                            </div>
                            <div class="card-img-top img-fluid">
                                <div id="productSlide" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <a href="<?= base_url() ?>/uploads/user/umkm/user<?= $detail_orderan->iduser ?>/ord/<?= $detail_orderan->payment_proof ?>" class="image-popup">
                                                <img class="d-block img-fluid mx-auto" src="<?= base_url() ?>/uploads/user/umkm/user<?= $detail_orderan->iduser ?>/ord/<?= $detail_orderan->payment_proof ?>" alt="Bukti">
                                            </a>
                                        </div>
                                    </div>
                                </div><!-- end carousel -->
                                <?php if ($detail_orderan->status == "Dalam Proses") { ?>
                                    <div class="col text-center">
                                        <button type="button" class="btn btn-success btn mx-auto mb-2" data-bs-toggle="modal" data-bs-target="#accOrderan">Terima Pembayaran</button>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div><!-- end col -->

                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <h4 class="card-title">Detail Produk</h4>
                                        <h6 class="card-subtitle text-muted">&nbsp</h6>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <div class="pb-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Nama UMKM :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <?= $detail_orderan->umkm_name ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Jumlah Voucher :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <?= $detail_orderan->item_amount ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Tanggal Pemesanan :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <?= $detail_orderan->date_ordered ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Total Pembayaran :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <?= $detail_orderan->payment_amount ?>
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
                                                <?= $detail_orderan->status ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="<?= base_url() ?>/pengelola/order/list" class="btn btn-secondary">Kembali</a>
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
<!-- start modal -->
<div id="accOrderan" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Terima Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="card-text"><b>PASTIKAN BUKTI PEMBAYARAN SUDAH SESUAI!!!</b></p>
                <form id="konfirAdd" action="<?= base_url() ?>/pengelola/order/update_status" method="post">
                    <div class="form-group">
                        <input type="text" name="idorder" class="form-control" value="<?= $detail_orderan->idorder ?>" hidden>
                        <input type="text" name="idumkm" class="form-control" value="<?= $detail_orderan->idumkm ?>" hidden>
                        <input type="text" name="idads" class="form-control" value="<?= $detail_orderan->idads ?>" hidden>
                        <input type="text" name="item_amount" class="form-control" value="<?= $detail_orderan->item_amount ?>" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="konfirAdd" class="btn btn-success">Terima</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- end modal -->
<?= $this->include('pengelola/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- glightbox js -->
<script src="<?= base_url() ?>/assets/minia/assets/libs/glightbox/js/glightbox.min.js"></script>

<!-- lightbox init -->
<script src="<?= base_url() ?>/assets/minia/assets/js/pages/lightbox.init.js"></script>

<script src="<?= base_url() ?>/assets/minia/assets/js/app.js"></script>

</body>

</html>