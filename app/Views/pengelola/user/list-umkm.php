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
                                    <li class="breadcrumb-item active">List UMKM</li>
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
                                <p class="card-title-desc">UMKM yang terdaftar pada PojokUMKM</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <div style="margin-bottom: 15px">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserUmkm">
                                        Tambah UMKM
                                    </button>
                                </div>
                                <table class="table dtable table-bordered dt-responsive table-sm nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="7%">No.</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $c = 1;?>
                                        <?php foreach ($l_umkm as $a) {?>
                                        <tr>
                                            <td><?=$c?></td>
                                            <td><?=$a->umkm_name?></td>
                                            <td><?=$a->username?></td>
                                            <td><?=$a->email?></td>
                                            <td>
                                            <?php if($a->flag == 1){?>
                                                Aktif    
                                            <?php }else{?>
                                                Tidak Aktif    
                                            <?php }?>    
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2">
                                                    <div class="btn-group">
                                                        <?php if($a->iduser != session()->get('iduser')){?>
                                                        <a href="<?=base_url()?>/pengelola/umkm/detail/<?=$a->iduser?>" class="btn btn-sm btn-outline-info">Detail</a> 
                                                        <?php }else{ ?>
                                                        <a href="<?=base_url()?>/pengelola/profile" class="btn btn-sm btn-outline-info">Detail</a> 
                                                        <?php } ?>
                                                        <?php if($a->flag == 1){?>
                                                        <a class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#switchConfirm" data-id="<?=$a->iduser?>">
                                                            Nonaktifkan
                                                        </a>
                                                        <?php }else{?>
                                                        <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#switchConfirm" data-id="<?=$a->iduser?>">
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

<div id="switchConfirm" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="fetched-data"></div>
        </div>
    </div>
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="addUserUmkm" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah UMKM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirAdd" action="<?=base_url()?>/pengelola/umkm/add_proc" method="post">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" pattern=".{8,}" title="min. 8 characters" required>
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
    $(document).ready(function() {
        $('#switchConfirm').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>/pengelola/umkm/konfirSwitch',
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