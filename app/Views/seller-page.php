<!DOCTYPE html>
<html lang="en">

<head>
    <?= $title_meta ?>
    <?= $this->include('homepage_partial/head-css') ?>

    <style type="text/css">
        .profile-pic{
            background-image: url(<?= base_url() ?>/uploads/user/umkm/user<?= $dataUmkm[0]->iduser ?>/<?= $dataUmkm[0]->umkm_pic ?>);
            background-size: 100%;
            background-position: center center;
        }
    </style>
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
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="home">Home</a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        <?= $dataUmkm[0]->umkm_name ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-3">
                        <div class="card mb-4">
                            <div class="card-body px-3 py-2">
                                <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                                    <div class="img-lg mb-2 rounded-circle m-2 profile-pic"></div>
                                    <div class="ml-sm-3 ml-md-0 ml-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
                                        <h6 class="mb-1"><?= $dataUmkm[0]->umkm_name ?></h6>
                                        <p class="text-muted mb-1"><?= $dataUmkm[0]->email ?></p>
                                        <p class="mb-0 text-primary font-weight-bold small">Toko</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <div class="row">
                                <div class="card-body px-2 py-1">

                                </div>
                                <div class="col-12">
                                    <form action="<?= base_url() ?>/seller" method="GET">
                                        <input type="text" name="id" value="<?= $idumkm ?>" hidden>
                                        <span class="sidebar-widget-title--sm">Keyword</span>
                                        <div class="input-group mb-4">
                                            <input type="text" placeholder="Search ..." value="<?= (isset($_GET['search'])) ? $_GET['search'] : '' ?>" class="form-control" name="search">
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
                    <!-- end: left column -->
                    <div class="col-md-7 col-lg-9">
                        <div class="row">
                            <div class="col-md-12">
                                <header class="mb-3">
                                    <div class="form-inline">
                                        <strong class="mr-md-auto"><?= $jumlahProduk ?> Items found </strong>
                                        <!-- <select class="mr-2 form-control">
                                            <option>Latest items</option>
                                            <option>Trending</option>
                                            <option>Most Popular</option>
                                            <option>Cheapest</option>
                                        </select> -->
                                        <!-- <div class="btn-group">
                                            <a href="search-page-list.html" class="btn btn-white" data-toggle="tooltip" title="" data-original-title="List view">
                                                <i class="las la-list"></i></a>
                                            <a href="search-page.html" class="btn btn-white" data-toggle="tooltip" title="" data-original-title="Grid view">
                                                <i class="las la-border-all"></i></a>
                                            <a href="#" class="btn btn-white" data-toggle="tooltip" title="" data-original-title="Price Down">
                                                <i class="las la-sort-amount-down"></i></a>


                                        </div> -->
                                    </div>
                                </header>
                            </div>
                        </div>
                        <?php
                        foreach ($l_produk as $row) {
                        ?>
                            <article class="card card-product-list">
                                <div class="row no-gutters">
                                    <aside class="col-sm-12 col-lg-4">
                                        <img alt="bg image" class="bg-image" src="<?= base_url() ?>/uploads/user/umkm/user<?= $row->iduser ?>/prd/<?= $row->product_main_pic ?>">
                                        <!-- <a href="single-product.html" class="stretched-link swap-link"> <span class="badge badge-dark"> new </span> </a> -->
                                    </aside>
                                    <!-- col.// -->
                                    <div class="col-lg-5 col-sm-12">
                                        <div class="info-main p-4"> <a href="produk/id/<?= $row->idproduk ?>" class="h4 title"><?= $row->product_name ?> </a>
                                            <div class="d-flex justify-content-start align-items-center item-meta mt-2">
                                                <div class="short-description mb-0">
                                                    <p class="mb-0 extension-text text-small">
                                                        <a href="<?=base_url()?>/produk?search=&kategori[]=<?=$row->category_name?>">
                                                            <?= $row->category_name ?>
                                                        </a>
                                                        <span class="ml-1">di</span> 
                                                        <a href="<?=base_url()?>/seller?id=<?= $row->idumkm ?>">
                                                            <?= $row->umkm_name ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                            <ul class="list-unstyled mt-3">
                                            </ul>
                                        </div>
                                        <!-- info-main.// -->
                                    </div>
                                    <!-- col.// -->
                                    <aside class="col-lg-3 col-sm-12">
                                        <div class="info-aside text-center d-flex align-items-start flex-column p-4">
                                            <br> <a href="produk/id/<?= $row->idproduk ?>" class="btn btn-primary btn-block"> Detail Produk</a>
                                            <div class="btn-group btn-block">
                                            </div>
                                        </div>
                                        <!-- info-aside.// -->
                                    </aside>
                                    <!-- col.// -->
                                </div>
                                <!-- row.// -->
                            </article>
                        <?php } ?>
                        <hr>
                        <nav aria-label="pagin">
                            <ul class="pagination pagination-sm">
                                <?php if ($l_page == 1) { ?>
                                    <li class="page-item"><a class="btn page-link disabled" href="#">Previous</a></li>

                                <?php } else {
                                    $linkPrev = ($l_page > 1) ? $l_page - 1 : 1;
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= base_url() ?>/seller?id=<?= $idumkm ?>&&page=<?= $linkPrev ?>">Previous</a></li>
                                <?php }
                                $jumlahNumber = 1;
                                $startNumber = ($l_page > $jumlahNumber) ? $l_page - $jumlahNumber : 1;
                                $endNumber = ($l_page < ($jumlahPage - $jumlahNumber)) ? $l_page + $jumlahNumber : $jumlahPage;
                                for ($i = $startNumber; $i <= $endNumber; $i++) {
                                    $linkActive = ($l_page == $i) ? 'active' : '';

                                ?>
                                    <li class="page-item <?= $linkActive ?>"><a class="page-link" href="<?= base_url() ?>/seller?id=<?= $idumkm ?>&&page=<?= $i ?>"><?= $i ?></a></li>
                                <?php
                                }
                                if ($l_page == $jumlahPage) {
                                ?>
                                    <li class="page-item"><a class="btn page-link disabled" href="#">Next</a></li>
                                <?php } else {
                                    $linkNext = ($l_page < $jumlahPage) ? $l_page + 1 : $jumlahPage;
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= base_url() ?>/seller?id=<?= $idumkm ?>&&page=<?= $linkNext ?>">Next</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                    <!-- end: Right column -->
                </div>
                <!-- end:row -->
            </div>
        </div>
    </main>
    <?= $this->include('homepage_partial/footer') ?>

    <?= $this->include('homepage_partial/foot-js') ?>

    <!-- endbuild -->

</body>

</html>