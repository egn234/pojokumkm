<!DOCTYPE html>
<html lang="en">

<head>
    <?$title_meta?>
    <?= $this->include('homepage_partial/head-css') ?>
</head>

<body>

    <?=$this->include('homepage_partial/navbar')?>

    <main role="main">
        <div class="account-pages mt-7 mb-5">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card hover-box-shadow">
                            <div class="card-body px-auto">
                                <h4 class="card-title mt-3 text-center">Create Account</h4>
                                <p class="text-center">Get started with your free account</p>
                                <hr class="divider divider-fade">
                                <form>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="las la-user"></i> </span>
                                        </div>
                                        <input name="" class="form-control" placeholder="Full name" type="text">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="las la-envelope"></i> </span>
                                        </div>
                                        <input name="" class="form-control" placeholder="Email address" type="email">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="las la-key"></i> </span>
                                        </div>
                                        <input class="form-control" placeholder="Create password" type="password">
                                    </div>
                                    <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> <i class="las la-key"></i> </span>
                                        </div>
                                        <input class="form-control" placeholder="Repeat password" type="password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"> Create Account </button>
                                    </div>
                                    <p class="text-center">Have an account?
                                        <a href="<?=base_url()?>/auth">Log In</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
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
    </footer>

    <?=$this->include('homepage_partial/foot-js')?>

</body>

</html>