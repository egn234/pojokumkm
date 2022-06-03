<!DOCTYPE html>
<html lang="en">

<head>
    <?=$title_meta?>
    <?=$this->include('homepage_partial/head-css') ?>
</head>

<body>

    <?=$this->include('homepage_partial/navbar')?>

    <main role="main">

        <div class="warpper">
            <div class="container">
                <div class="intro-2 poition-relative">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-8">
                            <h1 class="intro-title">
                                Katalog UMKM
                            </h1>
                            <p class="lead">
                                Daftar semua produk UMKM <br />
                                dalam satu pencarian
                            </p>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control border-0 bg-white" placeholder="Cari produk ..." aria-label="search" aria-describedby="basic-addon2" />
                                        <div class="input-group-append">
                                            <a href="search-page.html" class="btn btn-primary" type="button"><i class="las la-search"></i></a>
                                        </div>
                                    </div>
                                    <ul class="nav search-links">
                                        <li class="nav-item">
                                            <a class="nav-link text-body-color" href="search-page.html">Filter Kategori:</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="search-page.html">UI kits</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="search-page.html">Templates</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="search-page.html">WordPress</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-none d-sm-block">
                            <img class="card-img-top opacity-8" src="<?=base_url()?>/assets/marketspot/assets/img/theme-illustration.png" alt="image" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">

                <!-- POPULAR ITEMS -->

                <div class="row mb-4 mt-3 d-flex justify-content-between align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-0">Produk UMKM</h5>
                    </div>
                    <div class="col-md-4"> <a href="#" class="btn btn-link float-right">Explore all <i class="las la-long-arrow-alt-right"></i> </a> </div>
                </div>
                <div class="row">
                    <?php foreach($l_produk as $lp){?>
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/uploads/user/umkm/user<?=$lp->iduser?>/prd/<?=$lp->product_main_pic?>" class="img-fluid rounded" alt="">
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
                                            <h3 class="h5 mb-0 text-truncate"><?=$lp->product_name?></h3>
                                        </a>
                                    </div>
                                    <div class="item-price">
                                        <span>$14</span>
                                    </div>
                                </div>
                                <!-- end: Card info -->
                                <div class="d-flex justify-content-start align-items-center item-meta">
                                    <div class="short-description mb-0">
                                        <p class="mb-0 extension-text"><a href="#"><?=$lp->category_name?></a><span class="ml-1">di</span> <a href="#"><?=$lp->umkm_name?></a> </p>
                                    </div>
                                </div>
                                <!-- end: Card meta -->
                            </div>
                            <!-- edn:Card body -->
                        </div>
                        <!-- end: Card -->
                    </div>
                    <!-- end: col -->
                    <?php }?>
                </div>
                <hr class="divider divider-fade">
                <div class="row mb-4 mt-3 d-flex justify-content-between align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-0"><?=$kat_name?></h5>
                    </div>
                    <div class="col-md-4"> <a href="#" class="btn btn-link float-right">Explore all <i class="las la-long-arrow-alt-right"></i> </a> </div>
                </div>
                <div class="row">
                    <?php foreach($l_rand_produk as $lpk){?>
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/uploads/user/umkm/user<?=$lpk->iduser?>/prd/<?=$lpk->product_main_pic?>" class="img-fluid rounded" alt="">
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
                                            <h3 class="h5 mb-0 text-truncate"><?=$lpk->product_name?></h3>
                                        </a>
                                    </div>
                                    <div class="item-price">
                                        <span>$14</span>
                                    </div>
                                </div>
                                <!-- end: Card info -->
                                <div class="d-flex justify-content-start align-items-center item-meta">
                                    <div class="short-description mb-0">
                                        <p class="mb-0 extension-text"><a href="#"><?=$lpk->category_name?></a><span class="ml-1">di</span> <a href="#"><?=$lpk->umkm_name?></a> </p>
                                    </div>
                                </div>
                                <!-- end: Card meta -->
                            </div>
                            <!-- edn:Card body -->
                        </div>
                        <!-- end: Card -->
                    </div>
                    <!-- end: col -->
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="bg-dark">
            <section class="cta-big section">
                <div class="container">
                    <div class="cta-big-content bg-primary py-5 px-5 mt-4 rounded text-white position-relative">
                        <img alt="bg image" class="bg-image" src="<?=base_url()?>/assets/marketspot/assets/img/bg-3.png">
                        <div class="row d-flex align-items-center justify-content-center">
                            <div class="col-lg-8 col-md-7">
                                <h3 class="h1">Jadilah bagian dari kami dan daftarkan produk-produk dari UMKM anda!</h3>
                                <p class="subtitle">Sign-up today </p>
                            </div>
                            <div class="col-lg-3 offset-lg-1 col-md-5 align-self-center">
                                <img src="<?=base_url()?>/assets/marketspot/assets/img/illustrations/03.svg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?=$this->include('homepage_partial/footer')?>

    <?=$this->include('homepage_partial/foot-js')?>

</body>

</html>