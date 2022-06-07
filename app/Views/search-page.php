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
                        <div class="col-md-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="<?= base_url() ?>/home">Home</a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        Library
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="header-actions">
                            <!-- <button class="btn btn-ghost grey-dark font-weight-bold">
                                <i class="las la-share-alt"></i>
                                <span>Share</span>
                            </button>
                            <button class="btn btn-ghost grey-dark like-button font-weight-bold">
                                <i class="las la-hand-holding-heart"></i>
                                <span>150 Likes</span>
                            </button>
                            <button class="btn btn-ghost grey-dark font-weight-bold">
                                <i class="las la-bookmark"></i>
                                <span><span>Save for Later</span></span>
                            </button> -->

                            <!---->
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-3">
                        <!-- edit in partials -->
                        <div class="sidebar-widget">
                            <div class="row">
                                <div class="col-12">
                                    <form action="<?= base_url() ?>/produk" method="GET">
                                        <span class="sidebar-widget-title--sm">Keyword</span>
                                        <div class="input-group mb-4">
                                            <input type="text" placeholder="Search ..." value="<?=(isset($_GET['search']))?$_GET['search']:''?>" class="form-control" name="search">
                                            <span class="input-group-append"> <button class="btn btn-primary"> <i class="las la-search"></i></button></span>
                                        </div>
                                        <hr>
                                        <span class="sidebar-widget-title--sm">Category</span>
                                        <!-- Category -->
                                        <?php
                                        $i = 0;
                                        foreach ($kategori as $val) {
                                        ?>
                                            <div class="custom-control custom-checkbox mb-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheck<?= $i ?>" value="<?= $val->category_name ?>" name="kategori[]"
                                                <?php if(isset($_GET['kategori'])){
                                                    for($x = 0; $x < count($_GET['kategori']); $x++){
                                                        echo ($_GET['kategori'][$x] == $val->category_name)?'checked':'';
                                                    }
                                                }?>
                                                >
                                                <label class="custom-control-label w-100" for="customCheck<?= $i ?>">
                                                    <?= $val->category_name ?>
                                                    <span class="badge badge-light float-right"></span>
                                                </label>
                                            </div>
                                        <?php $i++;
                                        } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-9">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- edit in partials -->
                                <!-- <header class="mb-3">
                                    <div class="form-inline">
                                        <strong class="mr-md-auto">32 Items found </strong>
                                        <select class="mr-2 form-control">
                                            <option>Latest items</option>
                                            <option>Trending</option>
                                            <option>Most Popular</option>
                                            <option>Cheapest</option>
                                        </select>
                                        <div class="btn-group">
                                            <a href="search-page-list.html" class="btn btn-white" data-toggle="tooltip" title="" data-original-title="List view">
                                                <i class="las la-list"></i></a>
                                            <a href="search-page.html" class="btn btn-white" data-toggle="tooltip" title="" data-original-title="Grid view">
                                                <i class="las la-border-all"></i></a>
                                            <a href="#" class="btn btn-white" data-toggle="tooltip" title="" data-original-title="Price Down">
                                                <i class="las la-sort-amount-down"></i></a>


                                        </div>
                                    </div>
                                </header> -->
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($l_produk as $row) {
                            ?>
                                <div class="col-md-4">
                                    <!-- edit in partials -->
                                    <div class="card item-card h-100 border-0">
                                        <div class="item-card__image rounded">
                                            <a href="produk/id/<?= $row->idproduk ?>">
                                                <img src="<?= base_url() ?>/uploads/user/umkm/user<?= $row->iduser ?>/prd/<?= $row->product_main_pic ?>" class="img-fluid rounded" alt="">
                                            </a>
                                            <div class="hover-icons">
                                                <ul class="list-unstyled">
                                                    <li><a href="produk/id/<?= $row->idproduk ?>" data-toggle="tooltip" data-placement="left" title="Demo"><i class="las la-desktop"></i></a></li>
                                                    <li><a href="produk/id/<?= $row->idproduk ?>" data-toggle="tooltip" data-placement="left" title="Bookmark"><i class="lar la-bookmark"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- end: Item card image -->
                                        <div class="card-body px-0 pt-3">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="item-title">
                                                    <a href="#">
                                                        <h3 class="h5 mb-0 text-truncate"><?= $row->product_name ?></h3>
                                                    </a>
                                                </div>
                                                <div class="item-price">
                                                    <span>$14</span>
                                                </div>
                                            </div>
                                            <!-- end: Card info -->
                                            <div class="d-flex justify-content-between align-items-center item-meta">
                                                <div class="short-description mb-0">
                                                    <p class="mb-0 extension-text"><a href="#"><?= $row->category_name ?></a><span class="ml-1">in</span> <a href="#"><?= $row->umkm_name ?></a> </p>
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
                        <hr class="divider divider-fade" />
                        <!-- edit in partials -->
                        <nav aria-label="pagin">
                            <ul class="pagination pagination-sm">
                                <?php if ($l_page == 1) { ?>
                                    <li class="page-item"><a class="btn page-link disabled" href="#">Previous</a></li>

                                <?php } else {
                                    $linkPrev = ($l_page > 1) ? $l_page - 1 : 1;
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= base_url() ?>/produk?page=<?= $linkPrev ?>">Previous</a></li>
                                <?php }
                                $jumlahNumber = 1;
                                $startNumber = ($l_page > $jumlahNumber) ? $l_page - $jumlahNumber : 1;
                                $endNumber = ($l_page < ($jumlahPage - $jumlahNumber)) ? $l_page + $jumlahNumber : $jumlahPage;
                                for ($i = $startNumber; $i <= $endNumber; $i++) {
                                    $linkActive = ($l_page == $i) ? 'active' : '';

                                ?>
                                    <li class="page-item <?= $linkActive ?>"><a class="page-link" href="<?= base_url() ?>/produk?page=<?= $i ?>"><?= $i ?></a></li>
                                <?php
                                }
                                if ($l_page == $jumlahPage) {
                                ?>
                                    <li class="page-item"><a class="btn page-link disabled" href="#">Next</a></li>
                                <?php } else {
                                    $linkNext = ($l_page < $jumlahPage) ? $l_page + 1 : $jumlahPage;
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= base_url() ?>/produk?page=<?= $linkNext ?>">Next</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <?= $this->include('homepage_partial/footer') ?>

    <?= $this->include('homepage_partial/foot-js') ?>

    <!-- endbuild -->

</body>

</html>