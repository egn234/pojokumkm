<!DOCTYPE html>
<html lang="en">

<head>
    <?=$title_meta?>
    <?=$this->include('homepage_partial/head-css') ?>
</head>

<body>

    <?=$this->include('homepage_partial/navbar')?>

    <main role="main">
        <div class="wrapper">

            <div class="breadcrumb-wrap">
                <div class="container py-3">
                    <div class="row d-flex justify-content-md-between justify-content-sm-center">
                        <div class="col-md-9">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="#"><?=$l_detail->category_name?></a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        <?=$l_detail->product_name?>
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
                                            <img src="<?=base_url()?>/uploads/user/umkm/user<?=$l_detail->iduser?>/prd/<?=$l_detail->product_main_pic?>" alt="">
                                        </div>
                                        <?php if(!is_null($l_detail->product_extra_pic1)){?>
                                        <div class="swiper-slide">
                                            <img src="<?=base_url()?>/uploads/user/umkm/user<?=$l_detail->iduser?>/prd/<?=$l_detail->product_extra_pic1?>" alt="">
                                        </div>
                                        <?php }elseif(!is_null($l_detail->product_extra_pic2)){?>
                                        <div class="swiper-slide">
                                            <img src="<?=base_url()?>/uploads/user/umkm/user<?=$l_detail->iduser?>/prd/<?=$l_detail->product_extra_pic2?>" alt="">
                                        </div>
                                        <?php }elseif(!is_null($l_detail->product_extra_pic3)){?>
                                        <div class="swiper-slide">
                                            <img src="<?=base_url()?>/uploads/user/umkm/user<?=$l_detail->iduser?>/prd/<?=$l_detail->product_extra_pic3?>" alt="">
                                        </div>
                                        <?php }?>
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                            <!--
                            <div class="product-description-text pr-lg-2">
                                <h1 class="mt-4 mb-4"><?=$l_detail->product_name?></h1>
                                <?=$l_detail->description?>
                                <hr>
                                <img src="<?=base_url()?>/uploads/user/umkm/user<?=$l_detail->iduser?>/prd/<?=$l_detail->product_main_pic?>" alt="" class="img-fluid mt-5 rounded" />
                                <?php if(!is_null($l_detail->product_extra_pic1)){?>
                                <img src="<?=base_url()?>/uploads/user/umkm/user<?=$l_detail->iduser?>/prd/<?=$l_detail->product_extra_pic1?>" alt="" class="img-fluid my-5 rounded" />
                                <?php }elseif(!is_null($l_detail->product_extra_pic2)){?>
                                <img src="<?=base_url()?>/uploads/user/umkm/user<?=$l_detail->iduser?>/prd/<?=$l_detail->product_extra_pic2?>" alt="" class="img-fluid my-5 rounded" />
                                <?php }elseif(!is_null($l_detail->product_extra_pic3)){?>
                                <img src="<?=base_url()?>/uploads/user/umkm/user<?=$l_detail->iduser?>/prd/<?=$l_detail->product_extra_pic3?>" alt="" class="img-fluid my-5 rounded" />
                                </div>
                                <?php }?>
                            </div>
                            -->
                            <hr />
                            <section class="my-5">
                                <div class="row mb-4 d-flex justify-content-between">
                                    <div class="col-md-8">
                                        <h6 class="mb-2">Exclusive Icons &amp; Illustrations</h6>
                                        <p>Checkout our latest themes, templates and illustrations.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="btn btn-link float-right">Explore all → </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="card item-card h-100 border-0">
                                            <div class="item-card__image rounded">
                                                <a href="single-product.html">
                                                    <img src="assets/img/520x400.png" class="img-fluid rounded" alt="">
                                                </a>
                                                <div class="hover-icons">
                                                    <ul class="list-unstyled">
                                                        <li><a href="single-product.html" data-toggle="tooltip" data-placement="left" title="Demo"><i class="las la-desktop"></i></a></li>
                                                        <li><a href="#" data-toggle="tooltip" data-placement="left" title="Bookmark"><i class="lar la-bookmark"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end: Item card image -->
                                            <div class="card-body px-0 pt-3">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="item-title">
                                                        <a href="#">
                                                            <h3 class="h5 mb-0 text-truncate">Mockup Bundle Vol 3</h3>
                                                        </a>
                                                    </div>
                                                    <div class="item-price">
                                                        <span>$14</span>
                                                    </div>
                                                </div>
                                                <!-- end: Card info -->
                                                <div class="d-flex justify-content-between align-items-center item-meta">
                                                    <div class="short-description mb-0">
                                                        <p class="mb-0 extension-text"><a href="#">UI Kit</a><span class="ml-1">in</span> <a href="#">Corporate</a> </p>
                                                    </div>
                                                </div>
                                                <!-- end: Card meta -->
                                            </div>
                                            <!-- edn:Card body -->
                                        </div>
                                        <!-- end: Card -->
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card item-card h-100 border-0">
                                            <div class="item-card__image rounded">
                                                <a href="single-product.html" class="swap-link">
                                                    <img src="assets/img/520x400.png" class="img-fluid rounded" alt="">
                                                </a>
                                                <div class="hover-icons">
                                                    <ul class="list-unstyled">
                                                        <li><a href="single-product.html"><i class="las la-desktop"></i></a></li>
                                                        <li><a href="#"><i class="lar la-bookmark"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end: Item card image -->
                                            <div class="card-body px-0 pt-3">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="item-title">
                                                        <a href="#">
                                                            <h3 class="h5 mb-0 text-truncate">Font Bundle 99% OFF</h3>
                                                        </a>
                                                    </div>
                                                    <div class="item-price">
                                                        <span>$14</span>
                                                    </div>
                                                </div>
                                                <!-- end: Card info -->
                                                <div class="d-flex justify-content-start align-items-center item-meta">
                                                    <div class="short-description mb-0">
                                                        <p class="mb-0 extension-text"><a href="#">WordPress</a><span class="ml-1">in</span> <a href="#">Creative</a> </p>
                                                    </div>
                                                </div>
                                                <!-- end: Card meta -->
                                            </div>
                                            <!-- edn:Card body -->
                                        </div>
                                        <!-- end: Card -->
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card item-card h-100 border-0">
                                            <div class="item-card__image rounded">
                                                <a href="single-product.html" class="swap-link">
                                                    <img src="assets/img/520x400.png" class="img-fluid rounded" alt="">
                                                </a>
                                                <div class="hover-icons">
                                                    <ul class="list-unstyled">
                                                        <li><a href="single-product.html"><i class="las la-desktop"></i></a></li>
                                                        <li><a href="#"><i class="lar la-bookmark"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- end: Item card image -->
                                            <div class="card-body px-0 pt-3">
                                                <div class="d-flex justify-content-between align-items-start">
                                                    <div class="item-title">
                                                        <a href="#">
                                                            <h3 class="h5 mb-0 text-truncate">Retro Font</h3>
                                                        </a>
                                                    </div>
                                                    <div class="item-price">
                                                        <span>$14</span>
                                                    </div>
                                                </div>
                                                <!-- end: Card info -->
                                                <div class="d-flex justify-content-start align-items-center item-meta">
                                                    <div class="short-description mb-0">
                                                        <p class="mb-0 extension-text"><a href="#">HTML</a><span class="ml-1">in</span> <a href="#">Landing page</a> </p>
                                                    </div>
                                                </div>
                                                <!-- end: Card meta -->
                                            </div>
                                            <!-- edn:Card body -->
                                        </div>
                                        <!-- end: Card -->
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- edn: Col 9 -->
                        <div class="col-md-5 col-lg-3">
                            <div class="sidebar sticky-lg-top sticky-md-top">
                                <div class="sidebar-widget">
                                    <h3 class="mb-4"><?=$l_detail->product_name?></h3>
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select id="inputState" class="form-control">
                                                    <option selected="">Regular licence</option>
                                                    <option>Extended licence</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group text-md-right text-sm-center">
                                                <h2 class="item-widget-price">$28</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-12">
                                            <div class="custom-control custom-radio mt-3 mb-2 d-flex justify-content-between align-items-center">
                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" />
                                                <label class="custom-control-label" for="customRadio1">Install Theme</label>
                                                <div class="label-price">$15</div>

                                            </div>
                                            <div class="custom-control custom-radio mb-4 d-flex justify-content-between align-items-center">
                                                <input type="radio" checked="" id="customRadio2" name="customRadio" class="custom-control-input" />
                                                <label class="custom-control-label" for="customRadio2">+1 year Support</label>
                                                <div class="label-price">$49</div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="button">
                                        Purchase → <span class="price"> $77</span>
                                    </button>
                                </div>

                                <div class="sidebar-widget">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="sidebar-widget-title--sm">Link Produk</span>
                                            <ul class="list-unstyled">
                                                <li>
                                                    25 Illustrations
                                                </li>
                                                <li>
                                                    Bright & Modern Style
                                                </li>
                                                <li>
                                                    AI, SVG, PNG Sources
                                                </li>
                                            </ul>
                                            <hr />

                                            <span class="sidebar-widget-title--sm">Compatible Browsers</span>
                                            <ul class="list-unstyled">
                                                <li><i class="las la-check mr-2 text-success"></i>Chrome</li>
                                                <li><i class="las la-check mr-2 text-success"></i>Firefox</li>
                                                <li><i class="las la-check mr-2 text-success"></i>Edge</li>
                                            </ul>
                                            <hr />

                                            <span class="sidebar-widget-title--sm">Tags</span>
                                            <div class="tags">
                                                <a href="#" class="badge badge-soft-success text-success mb-1">CSS</a>
                                                <a href="#" class="badge badge-soft-success text-success mb-1">Bootstrap</a>
                                                <a href="#" class="badge badge-soft-success text-success mb-1">WordPress</a>
                                                <a href="#" class="badge badge-soft-success text-success mb-1">Digital</a>
                                            </div>
                                            <hr />

                                            <div class="col-12 p-0">
                                                <div class="d-flex flex-row justify-content-between">
                                                    <span class="small">File size</span>
                                                    <strong class="small text-dark">1 GB</strong>
                                                </div>
                                                <div class="d-flex flex-row justify-content-between">
                                                    <span class="small">Update</span>
                                                    <strong class="small text-dark">Januar 03, 2020</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    

    <?=$this->include('homepage_partial/footer')?>

    <?=$this->include('homepage_partial/foot-js')?>

    <!-- endbuild -->

</body>

</html>