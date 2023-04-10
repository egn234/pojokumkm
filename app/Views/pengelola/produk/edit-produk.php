<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <!-- choices css -->
    <link href="<?=base_url()?>/assets/minia/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />

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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/pengelola/produk/list">List Produk</a></li>
                                    <li class="breadcrumb-item active">Tambah Produk</li>
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
                                <p class="card-title-desc">Tambah Produk Baru</p>
                            </div>
                            <div class="card-body">
                                <?=session()->getFlashdata('notif');?>
                                <form id="addPesanan" action="<?=base_url()?>/pengelola/produk/edit_proc/<?=$l_detail->idproduk?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="choices-single-default" class="form-label">UMKM</label>
                                                <select class="js-choices form-control" data-trigger name="idumkm" placeholder="This is a search placeholder" disabled>
                                                    <option value="">Pilih UMKM...</option>
                                                    <?php foreach ($l_umkm as $c) { ?>
                                                        <option value="<?=$c->idumkm?>"
                                                            <?php 
                                                                if ($c->idumkm == $l_detail->idumkm) {
                                                                    echo 'selected';
                                                                }
                                                            ?> 
                                                        >
                                                            <?=$c->umkm_name?> 
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="product_name" value="<?=$l_detail->product_name?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Pilih Jenis Produk <span class="text-danger">*</span></label>
                                                <select class="form-select" name="idkategori" required>
                                                    <option value="0">Pilih</option>
                                                    <?php foreach ($katprod as $b) { ?>
                                                    <option value="<?=$b->idkategori?>"
                                                        <?php 
                                                            if ($b->idkategori == $l_detail->idkategori) {
                                                                echo 'selected';
                                                            }
                                                        ?> 
                                                    >
                                                        <?=$b->category_name?>
                                                    </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Foto Utama Produk</label>
                                                        <div class="col-sm-12">
                                                          <input type="file" name="main_img" class="form-control fileupload" accept="image/jpg, image/jpeg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Foto Tambahan 1</label>
                                                        <div class="col-sm-12">
                                                          <input type="file" name="foto1" class="form-control fileupload" accept="image/jpg, image/jpeg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Foto Tambahan 2</label>
                                                        <div class="col-sm-12">
                                                          <input type="file" name="foto2" class="form-control fileupload" accept="image/jpg, image/jpeg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Foto Tambahan 3</label>
                                                        <div class="col-sm-12">
                                                          <input type="file" name="foto3" class="form-control fileupload" accept="image/jpg, image/jpeg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Deskripsi Produk</label>
                                                <textarea name="description" id="editor" class="form-control">
                                                    <?=$l_detail->description?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="<?=base_url()?>/pengelola/produk/list" class="btn btn-secondary">Kembali</a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#konfirmasi" class="btn btn-primary">Simpan</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
<div id="konfirmasi" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ubah Produk?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="addPesanan" class="btn btn-primary">Ubah</button>
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

<!-- choices js -->
<script src="<?=base_url()?>/assets/minia/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function () {
    var genericExamples = document.querySelectorAll('[data-trigger]');
    for (i = 0; i < genericExamples.length; ++i) {
      var element = genericExamples[i];
      new Choices(element, {
        placeholderValue: '',
        searchPlaceholderValue: 'Cari UMKM',
      });
    }
});
</script>

<!-- ckeditor -->
<script src="<?=base_url()?>/assets/minia/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script type="text/javascript">
ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'bold', 'italic', 'link', 'undo', 'redo', 'numberedList', 'bulletedList' ]
    } )
    .catch( error => {
        console.log( error );
    } );

</script>

<script src="<?=base_url()?>/assets/minia/assets/js/app.js"></script>

</body>

</html>