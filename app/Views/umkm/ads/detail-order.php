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
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/umkm/iklan/list">List Orderan Voucher</a></li>
                                    <li class="breadcrumb-item active">Detail Orderan</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <?= session()->getFlashdata('notif'); ?>

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
                                        <?php if ($detail_orderan->status == "Menunggu Bukti Transfer") { ?>
                                            <button type="button" class="btn btn-info btn" data-bs-toggle="modal" data-bs-target="#sendPicPayment">Upload Bukti Pembayaran</button>
                                        <?php } ?>
                                        <a href="<?= base_url() ?>/umkm/order/list" class="btn btn-secondary">Kembali</a>
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
<div id="sendPicPayment" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Upload Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addPic" action="<?= base_url() ?>/umkm/order/add_pic_payment" method="post" enctype="multipart/form-data">
                    <label class="form-label">Foto Bukti Pembayaran <span class="text-danger">*</span></label>
                    <div class="col-sm-12">
                        <input type="file" name="payment_img" class="form-control fileupload" accept="image/jpg, image/jpeg" required>
                        <input type="text" name="idorder" value="<?= $detail_orderan->idorder ?>" hidden>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="addPic" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?= $this->include('umkm/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- glightbox js -->
<script src="<?= base_url() ?>/assets/minia/assets/libs/glightbox/js/glightbox.min.js"></script>

<!-- lightbox init -->
<script src="<?= base_url() ?>/assets/minia/assets/js/pages/lightbox.init.js"></script>

<script src="<?= base_url() ?>/assets/minia/assets/js/app.js"></script>

</body>

</html>