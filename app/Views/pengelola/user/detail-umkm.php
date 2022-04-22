<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

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
                                    <li class="breadcrumb-item active">Detail UMKM</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <?=session()->getFlashdata('notif')?>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                            <div class="flex-shrink-0">
                                                <div class="avatar-xl me-3">
                                                    <?php if($detail_umkm->umkm_pic != 'image.jpg'){?>
                                                    <img src="<?=base_url()?>/uploads/user/umkm/user<?=$detail_umkm->iduser?>/<?=$detail_umkm->umkm_pic?>" alt="" class="img-fluid rounded-circle d-block">
                                                    <?php }else{?>
                                                    <img src="<?=base_url()?>/uploads/user/umkm/image.jpg" alt="" class="img-fluid rounded-circle d-block">
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-16 mb-1"><?=$detail_umkm->umkm_name?></h5>
                                                    <p class="text-muted font-size-13">UMKM</p>

                                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?=$detail_umkm->phone?></div>
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?=$detail_umkm->email?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                            <?php if($detail_umkm->flag == 0){?>
                                                <button type="button" class="btn btn-soft-success" data-bs-toggle="modal" data-bs-target="#aktifkanUser">
                                                    Aktifkan User
                                                </button>
                                            <?php }elseif($detail_umkm->flag == 1){?>
                                                <button type="button" class="btn btn-soft-danger" data-bs-toggle="modal" data-bs-target="#nonaktifkanUser">Nonaktifkan User</button>
                                            <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Detail Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#editprof" role="tab">Ubah Profil</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="tab-content">
                            <div class="tab-pane active" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Overview</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <div class="pb-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nama UMKM / Usaha:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_umkm->umkm_name?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Email :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_umkm->email?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Alamat :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_umkm->address?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nomor Telp. :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_umkm->phone?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-3">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Deskripsi :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_umkm->description?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="editprof" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mt-4 mt-lg-0">
                                            <h5 class="font-size-14 mb-4">Edit Profil</h5>
                                            <form action="<?=base_url()?>/pengelola/umkm/update_proc/<?=$detail_umkm->iduser?>" method="post" enctype="multipart/form-data">
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Nama UMKM / Usaha <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama" value="<?=$detail_umkm->umkm_name?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" value="<?=$detail_umkm->email?>" class="form-control" required>
                                                        <input type="email" name="old_email" value="<?=$detail_umkm->email?>" class="form-control" hidden>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="alamat" value="<?=$detail_umkm->address?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Nomor Telpon <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="notelp" value="<?=$detail_umkm->phone?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Deskripsi UMKM</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="description" class="form-control"><?=$detail_umkm->description?></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Foto Profil UMKM</label>
                                                    <div class="col-sm-9">
                                                      <input type="file" name="umkm_pic" id="fileupload1" class="form-control" accept=" image/jpg, image/jpeg">
                                                    </div>
                                                </div>
                                                <span class="text-xs text-danger">
                                                  *Tidak boleh dikosongkan
                                                </span>
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-9">
                                                        <div><button type="submit" class="btn btn-primary w-md">Submit</button></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->

                        </div>

                        <!-- end tab content -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- sample modal content -->
<?php if($detail_umkm->flag == 0){?>
<div id="aktifkanUser" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Aktifkan User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingin Mengaktifkan User?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/pengelola/umkm/flag_switch/<?=$detail_umkm->iduser?>" class="btn btn-primary">
                    Aktifkan
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php }elseif($detail_umkm->flag == 1){?>
<div id="nonaktifkanUser" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Aktifkan User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Ingin Nonaktifkan User?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/pengelola/umkm/flag_switch/<?=$detail_umkm->iduser?>" class="btn btn-primary">
                    Nonaktifkan
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php }?>


<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<script src="<?=base_url()?>/assets/minia/assets/js/app.js"></script>

</body>

</html>