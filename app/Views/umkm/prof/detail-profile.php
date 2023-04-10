<?php 
    use App\Models\M_umkm;
    $this->m_umkm = new M_umkm();
    
    $hitung_link = $this->m_umkm->countLinkUmkmByIdUmkm($detail_user->idumkm)[0]->hitung;
    if ($hitung_link > 0) {
        $l_link_umkm = $this->m_umkm->getLinkUmkmByIdUmkm($detail_user->idumkm);
    }
?>

<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

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
                                    <li class="breadcrumb-item"><a href="<?=base_url()?>/umkm/dashboard">PojokUMKM</a></li>
                                    <li class="breadcrumb-item active">Profil</li>
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
                                                    <?php if($detail_user->umkm_pic != 'image.jpg'){?>
                                                    <img src="<?=base_url()?>/uploads/user/umkm/user<?=$detail_user->iduser?>/<?=$detail_user->umkm_pic?>" alt="" class="img-fluid rounded-circle d-block">
                                                    <?php }else{?>
                                                    <img src="<?=base_url()?>/uploads/user/umkm/image.jpg" alt="" class="img-fluid rounded-circle d-block">
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <div>
                                                    <h5 class="font-size-16 mb-1"><?=$detail_user->umkm_name?></h5>
                                                    <p class="text-muted font-size-13">UMKM</p>

                                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?=$detail_user->phone?></div>
                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?=$detail_user->email?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom card-header-tabs border-top mt-4" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Detail Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#about" role="tab">Ubah Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-3" data-bs-toggle="tab" href="#cpass" role="tab">Ubah Password</a>
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
                                            <div class="pb-1">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nama UMKM / Usaha:</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_user->umkm_name?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-1">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Email :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_user->email?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-1">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Alamat :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_user->address?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="py-1">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Nomor Telp. :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_user->phone?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-1">
                                                <div class="row">
                                                    <h5 class="font-size-15">Link :</h5>        
                                                </div>
                                                <div class="row">
                                                    <?php if ($hitung_link > 0){?>
                                                    <?php foreach($l_link_umkm as $li){?>
                                                    <div class="py-1">
                                                        <div class="row">
                                                            <div class="col-xl-2">
                                                                <div>
                                                                    <?php if ($li->umkm_link_name == "twitter") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/twitter.png" width="18">
                                                                            Twitter
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "facebook") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/facebook.png" width="18">
                                                                            Facebook
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "instagram") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/instagram.png" width="18">
                                                                            Instagram
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "dcreativ") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/dcreativ.png" width="18">
                                                                            D'Creativ
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "tokopedia") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/tokopedia.png" width="18">
                                                                            Tokopedia
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "bukalapak") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/bukalapak.png" width="18">
                                                                            Bukalapak
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "shopee") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/shopee.png" width="18">
                                                                            Shopee
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "lazada") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/lazada.png" width="18">
                                                                            Lazada
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "blibli") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/blibli.png" width="18">
                                                                            Blibli
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "zalora") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/zalora.png" width="18">
                                                                            Zalora
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "jdid") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/jdid.png" width="18">
                                                                            JD.id
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "bhinneka") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/bhinneka.png" width="18">
                                                                            Bhinneka
                                                                        </h5>
                                                                    <?php }elseif ($li->umkm_link_name == "olx") {?>
                                                                        <h5 class="font-size-15">
                                                                            <img src="<?=base_url()?>/assets/minia/assets/images/brands/olx.png" width="18">
                                                                            OLX
                                                                        </h5>
                                                                    <?php }?>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-auto">
                                                                <div class="text-muted">
                                                                    <a href="<?=prep_url($li->umkm_link_address)?>" target="_blank">
                                                                        <?=$li->umkm_link_address?>
                                                                    </a>
                                                                </div>
                                                            </div>  
                                                            <div class="col-xl">
                                                                <a href="<?=base_url()?>/umkm/profile/del_link/<?=$detail_user->iduser?>/<?=$li->idumkmlink?>">
                                                                    <span class="fa fa-trash text-danger"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }} ?>

                                                    <div class="py-1">
                                                        <div class="row">
                                                            <div>
                                                                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#addLink">
                                                                    Tambah Link <span class="fa fa-plus"></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="py-1">
                                                <div class="row">
                                                    <div class="col-xl-2">
                                                        <div>
                                                            <h5 class="font-size-15">Deskripsi :</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl">
                                                        <div class="text-muted">
                                                            <?=$detail_user->description?>
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
                            <div class="tab-pane" id="about" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mt-4 mt-lg-0">
                                            <h5 class="font-size-14 mb-4">Edit Profil UMKM</h5>
                                            <form action="<?=base_url()?>/umkm/profile/update_proc/<?=$detail_user->iduser?>" method="post" enctype="multipart/form-data">
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Nama UMKM / Usaha <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama" value="<?=$detail_user->umkm_name?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" value="<?=$detail_user->email?>" class="form-control" required>
                                                        <input type="email" name="old_email" value="<?=$detail_user->email?>" class="form-control" hidden>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="alamat" value="<?=$detail_user->address?>" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Nomor Telpon <span class="text-danger">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="notelp" value="<?=$detail_user->phone?>" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Deskripsi UMKM</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="description" id="editor" class="form-control"><?=$detail_user->description?></textarea>
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
                            <div class="tab-pane" id="cpass" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mt-4 mt-lg-0">
                                            <h5 class="font-size-14 mb-4">Ubah Password</h5>
                                            <form action="<?=base_url()?>/umkm/profile/update_pass/<?=$detail_user->iduser?>" method="post">

                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Password Lama</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="old_pass" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Password Baru</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="new_pass" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <label class="col-sm-3 col-form-label">Ulang Password Baru</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" name="auth_pass" class="form-control">
                                                    </div>
                                                </div>

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


<?= $this->include('partials/right-sidebar') ?>

<!-- sample modal content -->
<div id="addLink" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirAdd" action="<?=base_url()?>/umkm/profile/add_link/<?=$detail_user->iduser?>" method="post">
                  <div class="form-group">
                    <label>Media Platform</label>
                    <select class="form-select" name="link_name" required>
                        <option value="twitter">Twitter</option>
                        <option value="dcreativ">D'Creativ</option>
                        <option value="instagram">Instagram</option>
                        <option value="facebook">Facebook</option>
                        <option value="tokopedia">Tokopedia</option>
                        <option value="bukalapak">Bukalapak</option>
                        <option value="shopee">Shopee</option>
                        <option value="lazada">Lazada</option>
                        <option value="blibli">Blibli</option>
                        <option value="zalora">Zalora</option>
                        <option value="jdid">JD.id</option>
                        <option value="bhinneka">Bhinneka</option>
                        <option value="olx">OLX</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Link</label>
                    <input type="text" name="link_address" class="form-control" required>
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


<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<script src="<?=base_url()?>/assets/minia/assets/js/app.js"></script>

<!-- ckeditor -->
<script src="<?=base_url()?>/assets/minia/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

<script type="text/javascript">
  $('#fileupload1').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
    $(this).next('.custom-file-label').html(cleanFileName);
  });
ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'bold', 'italic', 'link', 'undo', 'redo', 'numberedList', 'bulletedList' ]
    } )
    .catch( error => {
        console.log( error );
    } );
</script>

</body>

</html>