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
                                UI assets for startup owners &amp; busy designers
                            </h1>
                            <p class="lead">
                                Find the perfect creative asset to <br />
                                bring your project to life
                            </p>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control border-0 bg-white" placeholder="Search assets ..." aria-label="search" aria-describedby="basic-addon2" />
                                        <div class="input-group-append">
                                            <a href="search-page.html" class="btn btn-primary" type="button"><i class="las la-search"></i></a>
                                        </div>
                                    </div>
                                    <ul class="nav search-links">
                                        <li class="nav-item">
                                            <a class="nav-link text-body-color" href="search-page.html">Try all:</a>
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
                <div class="row mb-4 mt-5 d-flex justify-content-between align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-0">Popular items</h5>
                    </div>
                    <div class="col-md-4"> <a class="btn btn-link float-right" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Refine Search <i class="las la-plus"></i> </a> </div>
                </div>
                <div class="collapse multi-collapse refine-search-wrap" id="multiCollapseExample1">
                    <form class="card">
                        <div class="card-body">
                            <div class="card border-0">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h6>File Types</h6>

                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label w-100" for="customCheck1">PSD<span class="badge badge-light float-right">9</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label w-100" for="customCheck2">HTML <span class="badge badge-light float-right">49</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label w-100" for="customCheck3">JS <span class="badge badge-light float-right">142</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label w-100" for="customCheck4">CSS <span class="badge badge-light float-right">457</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                            <label class="custom-control-label w-100" for="customCheck5">Vector <span class="badge badge-light float-right">27</span></label>
                                        </div>

                                    </div>
                                    <!--end: col -->
                                    <div class="col-md-3">
                                        <h6>File Category</h6>

                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck10">
                                            <label class="custom-control-label w-100" for="customCheck10">HTML template<span class="badge badge-light float-right">875</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck11">
                                            <label class="custom-control-label w-100" for="customCheck11">WordPress Theme <span class="badge badge-light float-right">1485</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck12">
                                            <label class="custom-control-label w-100" for="customCheck12">eCommerce<span class="badge badge-light float-right">626</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck13">
                                            <label class="custom-control-label w-100" for="customCheck13">Magento <span class="badge badge-light float-right">58</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck14">
                                            <label class="custom-control-label w-100" for="customCheck14">UI kits <span class="badge badge-light float-right">114</span></label>
                                        </div>

                                    </div>
                                    <!--end: col -->

                                    <div class="col-md-3">
                                        <h6>Tags</h6>

                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck15">
                                            <label class="custom-control-label w-100" for="customCheck15">HTML template<span class="badge badge-light float-right">1321</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck16">
                                            <label class="custom-control-label w-100" for="customCheck16">WordPress Theme <span class="badge badge-light float-right">525</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck17">
                                            <label class="custom-control-label w-100" for="customCheck17">eCommerce<span class="badge badge-light float-right">487</span></label>
                                        </div>
                                        <hr>
                                        <h6 class="mt-4">Sales</h6>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck18">
                                            <label class="custom-control-label w-100" for="customCheck18">Magento <span class="badge badge-light float-right">521</span></label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck19">
                                            <label class="custom-control-label w-100" for="customCheck19">UI kits <span class="badge badge-light float-right">987</span></label>
                                        </div>

                                    </div>
                                    <!--end: col -->

                                    <div class="col-md-3">
                                        <h6>Select Pricing range</h6>

                                        <div class="form-row d-flex align-items-center justify-content-center"></div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padding0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="text" id="price-min-input" name="price-min" data-toggle="dropdown" class="form-control" placeholder="Min" value="">
                                                    <ul id="price-min" class="dropdown-menu">
                                                        <li><a href="#" data-value="5" data-toggle="dropdown">Min Price</a></li>
                                                        <li><a href="#" data-value="10" data-toggle="dropdown">10</a></li>
                                                        <li><a href="#" data-value="50" data-toggle="dropdown">50</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1 text-center padding0">
                                                <p> - </p>
                                            </div>

                                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padding0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="text" id="price-max-input" name="price-max" data-toggle="dropdown" class="form-control" placeholder="Max" value="">
                                                    <ul id="price-max" class="dropdown-menu">
                                                        <li><a href="#" data-value="500" data-toggle="dropdown">Max Price</a></li>
                                                        <li><a href="#" data-value="50" data-toggle="dropdown">50</a></li>
                                                        <li><a href="#" data-value="100" data-toggle="dropdown">100</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>

                                        <hr>
                                        <button type="button" class="btn btn-outline-primary">Refine search</button>
                                    </div>
                                    <!-- end: col-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                    <!-- end: col -->
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                    <!-- end: col -->
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                    <!-- end: col -->
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                                            <h3 class="h5 mb-0 text-truncate">Entire Store Bundle</h3>
                                        </a>
                                    </div>
                                    <div class="item-price">
                                        <span>$14</span>
                                    </div>
                                </div>
                                <!-- end: Card info -->
                                <div class="d-flex justify-content-start align-items-center item-meta">
                                    <div class="short-description mb-0">
                                        <p class="mb-0 extension-text"><a href="#">PSD</a><span class="ml-1">in</span> <a href="#">Landing page</a> </p>
                                    </div>
                                </div>
                                <!-- end: Card meta -->
                            </div>
                            <!-- edn:Card body -->
                        </div>
                        <!-- end: Card -->
                    </div>
                    <!-- end: col -->
                </div>
                <hr class="divider divider-fade">
                <div class="row mb-4 mt-3 d-flex justify-content-between align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-0">HTML Templates</h5>
                    </div>
                    <div class="col-md-4"> <a href="#" class="btn btn-link float-right">Explore all <i class="las la-long-arrow-alt-right"></i> </a> </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                                            <h3 class="h5 mb-0 text-truncate">Magazine Mockup Kit</h3>
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
                    <!-- end: col -->
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                                            <h3 class="h5 mb-0 text-truncate">Resume Template / CV</h3>
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
                            <!-- end:Card body -->

                        </div>
                        <!-- end: Card -->
                    </div>
                    <!-- end: col -->
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                                            <h3 class="h5 mb-0 text-truncate">Media/Press Kit</h3>
                                        </a>
                                    </div>
                                    <div class="item-price">
                                        <span>$14</span>
                                    </div>
                                </div>
                                <!-- end: Card info -->
                                <div class="d-flex justify-content-start align-items-center item-meta">
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
                    <!-- end: col -->
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                                            <h3 class="h5 mb-0 text-truncate">Box Mockup Vol.3</h3>
                                        </a>
                                    </div>
                                    <div class="item-price">
                                        <span>$14</span>
                                    </div>
                                </div>
                                <!-- end: Card info -->
                                <div class="d-flex justify-content-start align-items-center item-meta">
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
                    <!-- end: col -->
                </div>
                <hr class="divider divider-fade">
                <div class="row mb-4 mt-3 d-flex justify-content-between align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-0">HTML Templates</h5>
                    </div>
                    <div class="col-md-4"> <a href="#" class="btn btn-link float-right">Explore all <i class="las la-long-arrow-alt-right"></i> </a> </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
                                </a>
                                <div class="hover-icons">
                                    <ul class="list-unstyled">
                                        <li><a href="javascript:void(0)"><i class="las la-desktop"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="lar la-bookmark"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end: Item card image -->
                            <div class="card-body px-0 pt-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="item-title">
                                        <a href="#">
                                            <h3 class="h5 mb-0 text-truncate">Complete Pack</h3>
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
                    <!-- end: col -->
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                                            <h3 class="h5 mb-0 text-truncate">Gift Boxes and Bags</h3>
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
                            <!-- end:Card body -->
                        </div>
                        <!-- end: Card -->
                    </div>
                    <!-- end: col -->
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html" class="swap-link">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt="">
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
                                            <h3 class="h5 mb-0 text-truncate">Minimal mock-ups</h3>
                                        </a>
                                    </div>
                                    <div class="item-price">
                                        <span>$14</span>
                                    </div>
                                </div>
                                <!-- end: Card info -->
                                <div class="d-flex justify-content-start align-items-center item-meta">
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
                    <!-- end: col -->
                    <div class="col-md-3">
                        <div class="card item-card h-100 border-0">
                            <div class="item-card__image rounded">
                                <a href="single-product.html">
                                    <img src="<?=base_url()?>/assets/marketspot/assets/img/520x400.png" class="img-fluid rounded" alt=""> </a>
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
                                            <h3 class="h5 mb-0 text-truncate">Noonic - Brand Identity & Style Guide</h3>
                                        </a>
                                    </div>
                                    <div class="item-price"> <span>$14</span> </div>
                                </div>
                                <!-- end: Card info -->
                                <div class="d-flex justify-content-start align-items-center item-meta">
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
                    <!-- end: col -->
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-7 text-center mt-3"> <a href="#" class="btn btn-white "><i class="las la-redo-alt mr-2"></i>Load more...</a> </div>
                </div>
            </div>
            <section class="pt-7 pb-sm-3">
                <div class="container">
                    <div class="client-logos-1 d-none d-sm-block text-center">
                        <div class="container">
                            <h2 class="text-center h5 mb-5 text-gray font-weight-light">Featured in:</h2>
                            <div class="row d-flex align-items-center justify-content-md-center flex-wrap justify-content-sm-between">
                                <div class="col-sm-3 col-md-2">
                                    <img class="mx-auto img-fluid" src="<?=base_url()?>/assets/marketspot/assets/img/120x50.png" alt="Image description">
                                </div>
                                <div class="col-sm-3 col-md-2">
                                    <img class="mx-auto img-fluid" src="<?=base_url()?>/assets/marketspot/assets/img/120x50.png" alt="Image description">
                                </div>
                                <div class="col-sm-3 col-md-2">
                                    <img class="mx-auto img-fluid" src="<?=base_url()?>/assets/marketspot/assets/img/120x50.png" alt="Image description">
                                </div>
                                <div class="col-sm-3 col-md-2">
                                    <img class="mx-auto img-fluid" src="<?=base_url()?>/assets/marketspot/assets/img/120x50.png" alt="Image description">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section">
                <div class="container">
                    <div class="customer-review-section p-4">
                        <div class="row justify-content-around align-items-center flex-md-row-reverse">
                            <div class="col-md col-lg-6 space-2-bottom">
                                <div class="d-flex mb-4"> <i class="icon_star_alt text-warning mr-1"></i>
                                    <i class="las la-star text-success mr-1"></i>
                                    <i class="las la-star text-success mr-1"></i>
                                    <i class="las la-star text-success mr-1"></i>
                                    <i class="las la-star text-success mr-1"></i>
                                </div>
                                <!-- end: Rating icons -->
                                <span class="h2 d-block">“Their skill and expertise in digital design and development is self evident.A true partnership that's taken our digital business to the next level..”</span>
                                <footer class="step-up h5">
                                    <span class="text-primary">Gavin Feilding – Digital Manager, dusk Australia</span>
                                </footer>
                            </div>
                            <div class="col-4 mt-md-4 mt-lg-0">
                                <div class="image-wrap">
                                    <img class="d-none d-md-block img-fluid postion-relative mr-auto" src="<?=base_url()?>/assets/marketspot/assets/img/08.png" alt="Image">
                                </div>
                                <!-- end:Image wrap -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="info-box p-4">
                                <h6 class="text-primary">Get paid for your work</h6>
                                <h3>
                                    Sell your work to a global community of art lovers
                                </h3>
                                <p class="lead">Create your MarketSpot account and start selling your your work today.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-box p-4">
                                <h6 class="text-primary">Customers</h6>
                                <h3>
                                    UI assets for startup owners & busy designers
                                </h3>
                                <p class="lead">Find the perfect creative asset to
                                    bring your project to life.</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-box p-4">
                                <h6 class="text-primary">Partnership</h6>
                                <h3>
                                    Earn up to 75% selling your work with us !
                                </h3>
                                <p class="lead">We pay commissions to our partners for over 7 years already.</p>
                            </div>
                        </div>
                    </div>
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
                                <h3 class="h1">Empowering creative people to make a living doing what they love!</h3>
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