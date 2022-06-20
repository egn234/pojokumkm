<?php
    $s = "";
    $k = [];
    $k1 = "";

    if (isset($_GET['search'])) {
        $s = "&search=".$_GET['search'];
    }

    if (isset($_GET['kategori'])) {
        for($x = 0; $x < count($_GET['kategori']); $x++ ){
            array_push($k, "&kategori%5B%5D=".$_GET['kategori'][$x]);
        }
        $k1 = implode("", $k);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $title_meta ?>
    <?= $this->include('homepage_partial/head-css') ?>

    <!-- choices css -->
    <link href="<?= base_url() ?>/assets/minia/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .product {
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
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="<?= base_url() ?>/home">Home</a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        Cari Produk
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
                        <!-- edit in partials -->
                        <div class="sidebar-widget">
                            <div class="row">
                                <div class="col-12">
                                    <form action="<?= base_url() ?>/produk" method="GET">
                                        <span class="sidebar-widget-title--sm">Keyword</span>
                                        <div class="input-group mb-4">
                                            <input type="text" placeholder="Search ..." value="<?= (isset($_GET['search'])) ? $_GET['search'] : '' ?>" class="form-control" name="search">
                                            <span class="input-group-append">
                                                <button class="btn btn-primary"> <i class="las la-search"></i></button>
                                            </span>
                                        </div>
                                        <hr>
                                        <span class="sidebar-widget-title--sm">Category</span>

                                        <!-- Category -->
                                        <div class="mb-3">
                                            <select class="form-select" name="kategori[]" id="choices-multiple-remove-button" placeholder="Pilih Kategori..." multiple>
                                                <option value="">Pilih Tag Kategori...</option>
                                                <?php
                                                $i = 0;
                                                foreach ($kategori as $val) {
                                                ?>
                                                    <option value="<?= $val->category_name ?>" <?php if (isset($_GET['kategori'])) {
                                                                                                    for ($x = 0; $x < count($_GET['kategori']); $x++) {
                                                                                                        echo ($_GET['kategori'][$x] == $val->category_name) ? 'selected' : '';
                                                                                                    }
                                                                                                } ?>>
                                                        <?= $val->category_name ?>
                                                    </option>
                                                <?php $i++;
                                                } ?>

                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-9">
                        <div class="row mb-3">
                            <div class="col-12 p-2 border border-5 border-warning rounded">
                                <span class="p-1"><b>Rekomendasi Produk</b></span>
                                <div class="row">
                                    <?php
                                    foreach ($l_Ads_Random as $row) {
                                    ?>
                                        <div class="col-md-4">
                                            <!-- edit in partials -->
                                            <div class="card item-card h-100 border-0">
                                                <div class="item-card__image rounded product" style="height: 250px; 
                                                    background-image: url(<?= base_url() ?>/uploads/user/umkm/user<?= $row->iduser ?>/prd/<?= $row->product_main_pic ?>);">
                                                    <a href="produk/id/<?= $row->idproduk ?>"></a>
                                                    <div class="hover-icons">
                                                        <ul class="list-unstyled">
                                                            <li><a href="produk/id/<?= $row->idproduk ?>" data-toggle="tooltip" data-placement="left" title="Demo"><i class="las la-desktop"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end: Item card image -->
                                                <div class="card-body px-0 pt-3">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <div class="item-title">
                                                            <a href="produk/id/<?= $row->idproduk ?>">
                                                                <h3 class="h5 mb-0 text-truncate"><?= $row->product_name ?></h3>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- end: Card info -->
                                                    <div class="d-flex justify-content-between align-items-center item-meta">
                                                        <div class="short-description mb-0">
                                                            <p class="mb-0 extension-text">
                                                                <a href="<?= base_url() ?>/produk?search=&kategori[]=<?= $row->category_name ?>"><?= $row->category_name ?></a>
                                                                <span class="ml-1">in</span>
                                                                <a href="seller?id=<?= $row->idumkm ?>"><?= $row->umkm_name ?></a>
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
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 p-2">
                                <span class="p-1"><b>Daftar Produk</b></span>
                                <div class="row">
                                    <?php
                                    foreach ($l_produk as $row) {
                                    ?>
                                        <div class="col-md-4">
                                            <!-- edit in partials -->
                                            <div class="card item-card h-100 border-0">
                                                <div class="item-card__image rounded product" style="height: 250px; 
                                                    background-image: url(<?= base_url() ?>/uploads/user/umkm/user<?= $row->iduser ?>/prd/<?= $row->product_main_pic ?>);">
                                                    <a href="produk/id/<?= $row->idproduk ?>"></a>
                                                    <div class="hover-icons">
                                                        <ul class="list-unstyled">
                                                            <li><a href="produk/id/<?= $row->idproduk ?>" data-toggle="tooltip" data-placement="left" title="Demo"><i class="las la-desktop"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- end: Item card image -->
                                                <div class="card-body px-0 pt-3">
                                                    <div class="d-flex justify-content-between align-items-start">
                                                        <div class="item-title">
                                                            <a href="produk/id/<?= $row->idproduk ?>">
                                                                <h3 class="h5 mb-0 text-truncate"><?= $row->product_name ?></h3>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- end: Card info -->
                                                    <div class="d-flex justify-content-between align-items-center item-meta">
                                                        <div class="short-description mb-0">
                                                            <p class="mb-0 extension-text">
                                                                <a href="<?= base_url() ?>/produk?search=&kategori[]=<?= $row->category_name ?>">
                                                                    <?= $row->category_name ?>
                                                                </a>
                                                                <span class="ml-1">di</span>
                                                                <a href="seller?id=<?= $row->idumkm ?>">
                                                                    <?= $row->umkm_name ?>
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
                            </div>
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
                                    <li class="page-item"><a class="page-link" href="<?= base_url() ?>/produk?page=<?= $linkPrev.$s.$k1 ?>">Previous</a></li>
                                <?php }
                                $jumlahNumber = 1;
                                $startNumber = ($l_page > $jumlahNumber) ? $l_page - $jumlahNumber : 1;
                                $endNumber = ($l_page < ($jumlahPage - $jumlahNumber)) ? $l_page + $jumlahNumber : $jumlahPage;
                                for ($i = $startNumber; $i <= $endNumber; $i++) {
                                    $linkActive = ($l_page == $i) ? 'active' : '';

                                ?>
                                    <li class="page-item <?= $linkActive ?>"><a class="page-link" href="<?= base_url() ?>/produk?page=<?= $i.$s.$k1 ?>"><?= $i ?></a></li>
                                <?php
                                }
                                if ($l_page == $jumlahPage) {
                                ?>
                                    <li class="page-item"><a class="btn page-link disabled" href="#">Next</a></li>
                                <?php } else {
                                    $linkNext = ($l_page < $jumlahPage) ? $l_page + 1 : $jumlahPage;
                                ?>
                                    <li class="page-item"><a class="page-link" href="<?= base_url() ?>/produk?page=<?= $linkNext.$s.$k1 ?>">Next</a></li>
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
    <!-- choices js -->
    <script src="<?= base_url() ?>/assets/minia/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var genericExamples = document.querySelectorAll('[data-trigger]');
            for (i = 0; i < genericExamples.length; ++i) {
                var element = genericExamples[i];
                new Choices(element, {
                    placeholderValue: 'This is a placeholder set in the config',
                    searchPlaceholderValue: 'This is a search placeholder',
                });
            }

            // multiple Remove CancelButton
            var multipleCancelButton = new Choices(
                '#choices-multiple-remove-button', {
                    removeItemButton: true,
                }
            );
        });
    </script>
    <!-- endbuild -->

</body>

</html>