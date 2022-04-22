<!DOCTYPE html>
<html lang="en">

<head>
    <?=$title_meta?>
    <?= $this->include('homepage_partial/head-css') ?>
</head>

<body>

    <?=$this->include('homepage_partial/navbar')?>

    <main role="main">
        <div class="account-pages mt-7 mb-5 ">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="<?=base_url()?>/assets/marketspot/assets/images/logo-dark.png" alt="" height="22"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your username and password</p>
                                </div>
                                <?=session()->getFlashdata('notif_login')?>
                                <form action="<?=base_url()?>/auth/login_proc" method="POST">
                                    <div class="form-group mb-3">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter your username">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="Enter your password">
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="<?=base_url()?>/register" class="text-primary font-weight-medium ml-1">Sign Up</a></p>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    </main>

    <footer class="footer footer-alt text-center bg-dark text-white">
        <div class="container">
            2019 - 2020 © MarketSpot theme by <a href="" class="text-muted">Codenpixel</a>
        </div>
    </footer> <!-- build:js -->
    <script src="<?=base_url()?>/assets/marketspot/assets/vendor/js/jquery.js"></script>
    <script src="<?=base_url()?>/assets/marketspot/assets/vendor/js/popper.js"></script>
    <script src="<?=base_url()?>/assets/marketspot/assets/vendor/js/bootstrap.js"></script>
    <script src="<?=base_url()?>/assets/marketspot/assets/vendor/js/swiper.min.js"></script>
    <script src="<?=base_url()?>/assets/marketspot/assets/vendor/js/prism.min.js"></script>

    <script src="<?=base_url()?>/assets/marketspot/assets/js/custom.js"></script>

    <!-- endbuild -->

</body>

</html>