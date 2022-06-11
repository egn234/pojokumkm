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
                                    <li class="breadcrumb-item active">List Voucher Iklan</li>
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
                                <p class="card-title-desc">List Voucher Iklan yang dimiliki</p>
                            </div>
                            <div class="card-body">
                                <?= session()->getFlashdata('notif'); ?>
                                <div style="margin-bottom: 15px">
                                    <a href="<?= base_url() ?>/umkm/iklan/order" type="button" class="btn btn-info">
                                        Pesan Voucher Iklan
                                    </a>
                                </div>
                                <table class="table dtable table-striped table-bordered align-middle nowrap">
                                    <thead>
                                        <th>No.</th>
                                        <th>Paket Iklan</th>
                                        <th>Durasi</th>
                                        <th>Jumlah Voucher</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1; ?>
                                        <?php foreach ($l_order as $a) { ?>
                                            <tr>
                                                <td><?= $c ?></td>
                                                <td><?= $a->ads_name ?></td>
                                                <td><?= $a->ads_duration ?></td>
                                                <td><?= $a->item_amount ?></td>
                                                <td><?= $a->payment_amount ?></td>

                                                <?php if ($a->status == "Menunggu Bukti Transfer") { ?>
                                                    <td class="text-danger"><?= $a->status ?></td>
                                                <?php } elseif ($a->status == "Dalam Proses") { ?>
                                                    <td class="text-warning"><?= $a->status ?></td>
                                                <?php } else { ?>
                                                    <td class="text-success"><?= $a->status ?></td>
                                                <?php } ?>
                                                <td>
                                                    <div class="d-grid gap-2">
                                                        <a href="<?= base_url() ?>/umkm/iklan/detail/<?= $a->idorder ?>" class="btn btn-outline-info">Detail</a>
                                                    </div>
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

<?= $this->include('umkm/right-sidebar') ?>

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