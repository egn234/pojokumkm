<!DOCTYPE html>
<html lang="en">

<head>
    <?= $title_meta ?>
    <?= $this->include('homepage_partial/head-css') ?>
</head>

<body>

    <?= $this->include('homepage_partial/navbar') ?>

    <main role="main">
        <div class="wrapper">

            <div class="breadcrumb-wrap">
                <div class="container py-3">
                    <div class="row d-flex justify-content-md-between justify-content-sm-center">
                        <div class="col-md-9">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="/home">Home</a></li>
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="/produk?search=&kategori%5B%5D=<?= $l_detail->category_name ?>"><?= $l_detail->category_name ?></a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        <?= $l_detail->product_name ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 col-lg-9">
                            <div class="product-info">

                                <!-- Item Img Slider -->
                                <div class="swiper-container rounded border">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_main_pic ?>" alt="">
                                        </div>
                                        <?php if (!is_null($l_detail->product_extra_pic1)) { ?>
                                            <div class="swiper-slide">
                                                <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic1 ?>" alt="">
                                            </div>
                                        <?php } elseif (!is_null($l_detail->product_extra_pic2)) { ?>
                                            <div class="swiper-slide">
                                                <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic2 ?>" alt="">
                                            </div>
                                        <?php } elseif (!is_null($l_detail->product_extra_pic3)) { ?>
                                            <div class="swiper-slide">
                                                <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic3 ?>" alt="">
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                            <!--
                            <div class="product-description-text pr-lg-2">
                                <h1 class="mt-4 mb-4"><?= $l_detail->product_name ?></h1>
                                <?= $l_detail->description ?>
                                <hr>
                                <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_main_pic ?>" alt="" class="img-fluid mt-5 rounded" />
                                <?php if (!is_null($l_detail->product_extra_pic1)) { ?>
                                <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic1 ?>" alt="" class="img-fluid my-5 rounded" />
                                <?php } elseif (!is_null($l_detail->product_extra_pic2)) { ?>
                                <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic2 ?>" alt="" class="img-fluid my-5 rounded" />
                                <?php } elseif (!is_null($l_detail->product_extra_pic3)) { ?>
                                <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $l_detail->iduser ?>/prd/<?= $l_detail->product_extra_pic3 ?>" alt="" class="img-fluid my-5 rounded" />
                                </div>
                                <?php } ?>
                            </div>
                            -->
                            <hr />
                            <section class="my-5">
                                <div class="row mb-4 d-flex justify-content-between">
                                    <div class="col-md-8">
                                        <h6 class="mb-2">Produk-produk ekslusif dari <?= $l_detail->umkm_name ?></h6>
                                        <p>Produk pada toko yang sama</p>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="<?=base_url()?>/seller?id=<?= $l_detail->idumkm ?>" class="btn btn-link float-right">Lihat Toko → </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php foreach ($see_also as $lp) { ?>
                                        <div class="col-md-4">
                                            <div class="card item-card h-100 border-0">
                                                <div class="item-card__image rounded">
                                                    <a href="<?=base_url()?>/produk/id/<?= $lp->idproduk ?>" class="swap-link">
                                                        <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $lp->iduser ?>/prd/<?= $lp->product_main_pic ?>" class="img-fluid rounded" alt="">
                                                    </a>
                                                    <div class="hover-icons">
                                                        <ul class="list-unstyled">
                                                            <li><a href=""><i class="las la-desktop"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end: Item card image -->
                                                <div class="card-body px-0 pt-3">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <div class="item-title">
                                                            <a href="#">
                                                                <h3 class="h5 mb-0 text-truncate"><?= $lp->product_name ?></h3>
                                                            </a>
                                                        </div>
                                                        <!-- <div class="item-price">
                                                            <span>$14</span>
                                                        </div> -->
                                                    </div>
                                                    <!-- end: Card info -->
                                                    <div class="d-flex justify-content-start align-items-center item-meta">
                                                        <div class="short-description mb-0">
                                                            <p class="mb-0 extension-text">
                                                                <a href="<?=base_url()?>/produk?search=&kategori[]=<?=$lp->category_name?>">
                                                                    <?= $lp->category_name ?>
                                                                </a>
                                                                <span class="ml-1">di</span> 
                                                                <a href="<?=base_url()?>/seller?id=<?= $lp->idumkm ?>">
                                                                    <?= $lp->umkm_name ?>
                                                                </a> 
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- end: Card meta -->
                                                </div>
                                                <!-- edn:Card body -->
                                            </div>
                                            <!-- end: Card -->
                                        </div>
                                        <!-- end: col -->
                                    <?php } ?>
                                </div>
                            </section>
                        </div>
                        <!-- edn: Col 9 -->
                        <div class="col-md-5 col-lg-3">
                            <div class="sidebar sticky-lg-top sticky-md-top">
                                <div class="sidebar-widget">
                                    <h3 class="mb-4"><?= $l_detail->product_name ?></h3>
                                    <hr />

                                    <span class="sidebar-widget-title--sm">Link Produk</span>
                                    <ul class="list-unstyled">
                                        <?php 
                                            $count = 1;
                                            foreach ($l_link as $li) {
                                        ?>
                                            <li>
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
                                                    <?php }else{?>
                                                        Link <?=$count?>
                                                    <?php }?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <hr />

                                    <span class="sidebar-widget-title--sm">Kategori</span>
                                    <div class="tags">
                                        <a href="#" class=""><?= $l_detail->category_name ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>


    <?= $this->include('homepage_partial/footer') ?>

    <?= $this->include('homepage_partial/foot-js') ?>

    <!-- endbuild -->

</body>

</html>