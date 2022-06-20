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
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="home">Home</a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        List Kategori
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>LIST KATEGORI PRODUK</h1>
                    </div>
                </div>
                <div class="row">
                <?php foreach ($l_kategori as $a) {?>
                    <div class="col-md-3">
                        <a href="<?=base_url()?>/produk?search=&kategori[]=<?=$a->category_name?>">
                            <?=$a->category_name?>
                        </a>
                    </div>
                <?php } ?>
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