<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <!-- DataTables -->
    <link href="<?=base_url()?>/assets/minia/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>/assets/minia/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
                                    <li class="breadcrumb-item active">List Produk</li>
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
                                <p class="card-title-desc">List Produk Terdaftar</p>
                            </div>
                            <div class="card-body">
                                <div style="margin-bottom: 15px">
                                    <a href="<?=base_url()?>/pengelola/produk/add" type="button" class="btn btn-info">
                                        Tambah Produk
                                    </a>
                                </div>
                                <?=session()->getFlashdata('notif');?>
                                <table class="table dtable table-striped table-sm table-bordered align-middle nowrap">
                                    <thead>
                                        <th>No.</th>
                                        <th>Nama Produk</th>
                                        <th>Penjual</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1;?>
                                        <?php foreach ($l_produk as $a) {?>
                                        <tr>
                                            <td><?=$c?></td>
                                            <td><?=$a->product_name?></td>
                                            <td><?=$a->umkm_name?></td>
                                            <td><?=$a->category_name?></td>
                                            <td>
                                                <?php if($a->product_status == 'on'){?>
                                                    Aktif
                                                <?php }else{?>
                                                    Tidak Aktif
                                                <?php }?>
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <a href="<?=base_url()?>/pengelola/produk/detail/<?=$a->idproduk?>" class="btn btn-outline-info btn-sm">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $c ++?>
                                        <?php }?>
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

<?= $this->include('pengelola/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?=base_url()?>/assets/minia/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/minia/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?=base_url()?>/assets/minia/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/assets/minia/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script type="text/javascript">
    $('.dtable').DataTable();
</script>

<script src="<?=base_url()?>/assets/minia/assets/js/app.js"></script>

</body>

</html>