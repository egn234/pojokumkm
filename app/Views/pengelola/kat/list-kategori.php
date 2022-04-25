<?php 
    use App\Models\M_produk;
    $this->m_produk = new M_produk();
?>

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
                                    <li class="breadcrumb-item active">List Kategori</li>
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
                                <p class="card-title-desc">Daftar Kategori Produk</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <div style="margin-bottom: 15px">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addKategori">
                                        Tambah Kategori
                                    </button>
                                </div>
                                <table class="table table-sm table-striped dtable align-middle table-bordered">
                                    <thead>
                                        <th width="3%">No.</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th width="15%">Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1;?>
                                        <?php foreach ($l_kategori as $a) {?>
                                        <?php $hitung = $this->m_produk->countProdukByIdKategori($a->idkategori)[0]->hitung?>
                                        <tr>
                                            <td><?=$c?></td>
                                            <td><?=$a->category_name?></td>
                                            <td>
                                                <?php 
                                                $trimmed = explode("</p><p>", $a->category_description);
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
                                                <?php if($a->category_status == "on"){?>
                                                    Aktif 
                                                <?php }else{?>
                                                    Tidak Aktif
                                                <?php }?>
                                                
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <div class="btn-group">
                                                        <a class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#editConfirm" data-id="<?=$a->idkategori?>">Edit</a>
                                                        <?php if($hitung == 0){?>
                                                        <a class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delConfirm" data-id="<?=$a->idkategori?>">Hapus</a>
                                                        <?php }?>
                                                        <?php if($a->category_status == 'on'){?>
                                                        <a class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#switchConfirm" data-id="<?=$a->idkategori?>">
                                                            Nonaktifkan
                                                        </a>
                                                        <?php }else{?>
                                                        <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#switchConfirm" data-id="<?=$a->idkategori?>">
                                                            Aktifkan
                                                        </a>
                                                        <?php }?>
                                                    </div>
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
<!-- sample modal content -->

<div id="addKategori" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirAdd" action="<?=base_url()?>/pengelola/kategori/add" method="post">
                  <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="category_name" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label>Deskripsi Singkat</label>
                    <input type="text" name="category_description" class="form-control" required>
                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="konfirAdd" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="editConfirm" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="fetched-data"></span>
        </div>
    </div>
</div><!-- /.modal -->

<div id="delConfirm" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <span class="fetched-data"></span>
        </div>
    </div>
</div><!-- /.modal -->

<div id="switchConfirm" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="fetched-data"></div>
        </div>
    </div>
</div><!-- /.modal -->

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?=base_url()?>/assets/minia/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/minia/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?=base_url()?>/assets/minia/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>/assets/minia/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript">
    $('.dtable').DataTable();
    $(document).ready(function() {
        $('#editConfirm').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/pengelola/kategori/konfirEdit',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });
        $('#delConfirm').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/pengelola/kategori/konfirDel',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });
        $('#switchConfirm').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/pengelola/kategori/konfirSwitch',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
</script>

<script src="<?=base_url()?>/assets/minia/assets/js/app.js"></script>

</body>

</html>