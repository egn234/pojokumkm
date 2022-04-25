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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/umkm/dashboard">PojokUMKM</a></li>
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
                                <?=session()->getFlashdata('notif');?>
                                <div style="margin-bottom: 15px">
                                    <a href="<?=base_url()?>/umkm/produk/add" type="button" class="btn btn-info">
                                        Tambah Produk
                                    </a>
                                </div>
                                <table class="table dtable align-middle dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                    <thead>
                                        <th>No.</th>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1;?>
                                        <?php foreach ($l_produk as $a) {?>
                                        <tr>
                                            <td><?=$c?></td>
                                            <td>
                                            <?php if($a->idgrouporder == 1){?>
                                                Desain Logo
                                            <?php }elseif($a->idgrouporder == 2){?>
                                                Desain Kemasan
                                            <?php }elseif($a->idgrouporder == 3){?>
                                                Desain Logo & Kemasan
                                            <?php }?>
                                            </td>
                                            <td><?=$a->orderdate?></td>
                                            <td>
                                                <?php 
                                                $trimmed = explode("</p><p>", $a->description);
                                                $countDesc = count(explode(" ", $trimmed[0]));
                                                if ($countDesc > 12) {
                                                  $slice = array_slice(explode(" ", $trimmed[0]), 0, 12);
                                                  echo implode(" ", $slice)."....";
                                                } else {
                                                  echo $trimmed[0];
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <a href="<?=base_url()?>/umkm/pesanan/detail/<?=$a->idorder?>" class="btn btn-outline-info">Detail</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $c = $c+1; ?>
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