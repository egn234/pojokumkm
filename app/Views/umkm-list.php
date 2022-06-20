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
                                        List UMKM
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
                        <h1>LIST UMKM TERDAFTAR</h1>
                    </div>
                </div>
                <div class="row">
                <?php foreach ($l_umkm as $a) {?>
                    <a href="<?=base_url()?>/seller?id=<?= $a->idumkm ?>" class="bordered">
                        <div class="card m-2">
                            <div class="card item-card">
                                <div class="px-3 py-2 item-card__image rounded">
                                    <div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
                                        <img src="<?=base_url()?>/uploads/user/umkm/user<?= $a->iduser ?>/<?= $a->umkm_pic ?>" class="img-lg rounded-circle" alt="profile image">
                                        <div class="ml-sm-3 ml-md-0 ml-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
                                            <h6 class="mb-1"><?= $a->umkm_name ?></h6>
                                            <p class="text-muted mb-1"><?= $a->email ?></p>
                                            <p class="mb-0 text-primary font-weight-bold small">Toko</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
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