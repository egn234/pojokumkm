<?php

use App\Models\M_produk;

$this->m_produk = new M_produk();

$hitung_link = $this->m_produk->countLinkProdukByIdProduk($l_detail->idproduk)[0]->hitung;
if ($hitung_link > 0) {
    $l_link_produk = $this->m_produk->getLinkProdukByIdProduk($l_detail->idproduk);
}
?>

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
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/umkm/produk/list">List Produk</a></li>
                                    <li class="breadcrumb-item active">Detail Produk</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <?= session()->getFlashdata('notif'); ?>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Foto & Gambar Produk</h4>
                                <h6 class="card-subtitle text-muted">&nbsp</h6>
                            </div>
                            <div class="card-img-top img-fluid">
                                <div id="productSlide" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <a href="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_main_pic ?>" class="image-popup">
                                                <img class="d-block img-fluid mx-auto" src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_main_pic ?>" alt="First slide">
                                            </a>
                                        </div>
                                        <?php if (!is_null($l_detail->product_extra_pic1)) { ?>
                                            <div class="carousel-item">
                                                <a href="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic1 ?>" class="image-popup">
                                                    <img class="d-block img-fluid mx-auto" src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic1 ?>" alt="Second slide">
                                                </a>
                                            </div>
                                        <?php }
                                        if (!is_null($l_detail->product_extra_pic2)) { ?>
                                            <div class="carousel-item">
                                                <a href="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic2 ?>" class="image-popup">
                                                    <img class="d-block img-fluid mx-auto" src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic2 ?>" alt="Third slide">
                                                </a>
                                            </div>
                                        <?php }
                                        if (!is_null($l_detail->product_extra_pic3)) { ?>
                                            <div class="carousel-item">
                                                <a href="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic3 ?>" class="image-popup">
                                                    <img class="d-block img-fluid mx-auto" src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic3 ?>" alt="Fourth slide">
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#productSlide" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#productSlide" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div><!-- end carousel -->
                            </div>
                        </div>

                    </div><!-- end col -->

                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <h4 class="card-title">Detail Produk</h4>
                                        <h6 class="card-subtitle text-muted">&nbsp</h6>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                                <a href="<?= base_url() ?>/umkm/produk/edit/<?= $l_detail->idproduk ?>" class="btn btn-soft-info"><i class="fa fa-edit"></i> Ubah Info Produk</a>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-soft-danger" data-bs-toggle="modal" data-bs-target="#delProduk"><i class="fa fa-trash"></i> Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="pb-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Nama Produk :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <?= $l_detail->product_name ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Kategori :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <?= $l_detail->category_name ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="py-1">
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div>
                                                <h5 class="font-size-15">Link Produk :</h5>
                                            </div>
                                        </div>
                                        <div class="col-xl">
                                            <div class="text-muted">
                                                <ul class="list-unstyled mb-0">
                                                    <?php if ($hitung_link > 0) { ?>
                                                        <?php foreach ($l_link_produk as $li) { ?>
                                                            <li class="py-1">
                                                                <a href="<?= prep_url($li->link_address) ?>" target="_blank">
                                                                    <?php if ($li->link_name == "twitter") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/twitter.png" width="18">
                                                                        Twitter
                                                                    <?php }elseif ($li->link_name == "facebook") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/facebook.png" width="18">
                                                                        Facebook
                                                                    <?php }elseif ($li->link_name == "instagram") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/instagram.png" width="18">
                                                                        Instagram
                                                                    <?php }elseif ($li->link_name == "dcreativ") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/dcreativ.png" width="18">
                                                                        D'Creativ
                                                                    <?php }elseif ($li->link_name == "tokopedia") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/tokopedia.png" width="18">
                                                                        Tokopedia
                                                                    <?php }elseif ($li->link_name == "bukalapak") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/bukalapak.png" width="18">
                                                                        Bukalapak
                                                                    <?php }elseif ($li->link_name == "shopee") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/shopee.png" width="18">
                                                                        Shopee
                                                                    <?php }elseif ($li->link_name == "lazada") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/lazada.png" width="18">
                                                                        Lazada
                                                                    <?php }elseif ($li->link_name == "blibli") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/blibli.png" width="18">
                                                                        Blibli
                                                                    <?php }elseif ($li->link_name == "zalora") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/zalora.png" width="18">
                                                                        Zalora
                                                                    <?php }elseif ($li->link_name == "jdid") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/jdid.png" width="18">
                                                                        JD.id
                                                                    <?php }elseif ($li->link_name == "bhinneka") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/bhinneka.png" width="18">
                                                                        Bhinneka
                                                                    <?php }elseif ($li->link_name == "olx") {?>
                                                                        <img src="<?=base_url()?>/assets/minia/assets/images/brands/olx.png" width="18">
                                                                        OLX
                                                                    <?php }?>
                                                                </a>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                                <a href="<?= base_url() ?>/umkm/produk/del_link/<?= $l_detail->idproduk ?>/<?= $li->idprodlink ?>">
                                                                    <span class="fa fa-trash text-danger"></span>
                                                                </a>
                                                            </li>
                                                    <?php }
                                                    } ?>
                                                    <li class="py-1">
                                                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#addLink">
                                                            Tambah Link <span class="fa fa-plus"></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (count($l_produk_ads) != 0) { ?>
                                    <div class="py-1">
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div>
                                                    <h5 class="font-size-15">Produk ini Diiklankan :</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <?= $l_produk_ads[0]->ads_date_start ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-1">
                                        <div class="row">
                                            <div class="col-xl-3">
                                                <div>
                                                    <h5 class="font-size-15">Iklan ini Berakhir :</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl">
                                                <div class="text-muted">
                                                    <?= $l_produk_ads[0]->ads_date_finished ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm order-2 order-sm-1">
                                        <h4 class="card-title">Status Iklan & Promote</h4>
                                    </div>
                                    <div class="col-sm-auto order-1 order-sm-2">
                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                            <div>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#setAds" class="btn btn-soft-success">
                                                    Iklankan Produk Ini!
                                                </a>
                                            </div>
                                        </div>
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
<div id="addLink" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirAdd" action="<?=base_url()?>/umkm/produk/add_link/<?=$l_detail->idproduk?>" method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Nama Link</label>
                                <div class="col-sm-12">
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
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Link Produk</label>
                                <div class="col-sm-12">
                                    <input type="text" name="product_link" class="form-control" required>
                                </div>
                            </div>
                        </div>
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

<!-- sample modal content -->
<div id="delProduk" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                PERHATIAN: Apakah anda ingin menghapus produk ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <a href="<?=base_url()?>/pengelola/produk/del_proc/<?=$l_detail->idproduk?>" class="btn btn-danger">Hapus</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="setAds" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Iklan Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="konfirAdd" action="<?= base_url() ?>/umkm/produk/use_ads/" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">List Voucher</label>
                                <div class="col-sm-12">
                                    <input type="text" name="idproduk" class="form-control" value="<?= $l_detail->idproduk ?>" hidden>
                                    <input type="text" name="idumkm" class="form-control" value="<?= $l_detail->idumkm ?>" hidden>
                                    <select class="js-choices form-control" name="voucher">
                                        <option value="">Pilih Voucher...</option>
                                        <?php foreach ($l_order as $row) { ?>
                                            <option value="<?= $row->idads; ?>-<?= $row->ads_amount; ?>-<?= $row->ads_duration; ?>"><?= $row->ads_name . '&nbsp-' . $row->ads_duration . '&nbspHari&nbsp-&nbspSisa Voucher :&nbsp' . $row->ads_amount; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" form="konfirAdd" class="btn btn-primary">Simpan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->


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