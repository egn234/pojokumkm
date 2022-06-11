<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                                    <li class="breadcrumb-item active">List Orderan</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">List Orderan Masuk</p>
                            </div>
                            <div class="card-body">
                                <?= session()->getFlashdata('notif'); ?>
                                <table class="table dtable table-striped table-sm table-bordered align-middle nowrap">
                                    <thead>
                                        <th>No.</th>
                                        <th>Nama UMKM</th>
                                        <th>Jumlah Voucher</th>
                                        <th>Tanggal Order</th>
                                        <th>Total Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1; ?>
                                        <?php foreach ($l_order as $a) { ?>
                                            <tr>
                                                <td><?= $c ?></td>
                                                <td><?= $a->umkm_name ?></td>
                                                <td><?= $a->item_amount ?></td>
                                                <td><?= $a->date_ordered ?></td>
                                                <td><?= $a->payment_amount ?></td>
                                                <?php if ($a->status == "Menunggu Bukti Transfer") { ?>
                                                    <td class="text-danger"><?= $a->status ?></td>
                                                <?php } elseif ($a->status == "Dalam Proses") { ?>
                                                    <td class="text-warning"><?= $a->status ?></td>
                                                <?php } else { ?>
                                                    <td class="text-success"><?= $a->status ?></td>
                                                <?php } ?>
                                                <td>
                                                    <!-- <?php if ($a->status == "Dalam Proses") { ?>
                                                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#accOrderan">Accept</button>
                                                    <?php } ?> -->
                                                    <a href="<?= base_url() ?>/pengelola/order/detail/<?= $a->idorder ?>" class="btn btn-outline-info btn-sm">Detail</a>
                                                </td>


                                            </tr>
                                            <?php $c++ ?>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
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
<!-- <div id="accOrderan" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Konfirmasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirAdd" action="<?= base_url() ?>/pengelola/umkm/add_proc" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="konfirAdd" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div> -->
<!-- /.modal -->

<?= $this->include('pengelola/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/minia/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script type="text/javascript">
    $('.dtable').DataTable();
</script>

<script src="<?= base_url() ?>/assets/minia/assets/js/app.js"></script>

</body>

</html>