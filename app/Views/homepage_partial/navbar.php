    <header class="nav-wrap bg-dark fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark px-lg-0">
                <a class="navbar-brand mr-3 swap-link" href="index.html">Market<span class="text-light font-weight-bold">Spot</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item swap-link"> <a href="<?=base_url()?>/home" class="nav-link">Home</a> </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Pages</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="search-page.html">Result grid</a>
                                <a class="dropdown-item" href="search-page-list.html">Resulst list</a>
                                <a class="dropdown-item" href="single-product.html">Single item</a>
                                <a class="dropdown-item" href="dashboard.html">Dashboard</a>
                                <a class="dropdown-item" href="cart.html">Cart</a>
                                <a class="dropdown-item" href="pricing.html">Pricing</a>
                                <a class="dropdown-item" href="faq.html">Faq</a>
                                <a class="dropdown-item" href="contact.html">Contact</a>
                                <a class="dropdown-item" href="signup.html">Sign up</a>
                                <a class="dropdown-item" href="author-signup.html">Author Sign-Up</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="documentation.html"><i class="las la-file-code bg-danger-alt text-danger p-1 rounded"></i> Documentation</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Blog</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item swap-link" href="blog-2.html">Blog V.1</a>
                                <a class="dropdown-item swap-link" href="blog.html">Blog V.2</a>
                                <a class="dropdown-item swap-link" href="blog-post.html">Blog post</a>
                            </div>
                        </li>
                        <li class="nav-item swap-link"> <a href="pricing.html" class="nav-link">Unlimited Access</a> </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown megamenu">
                            <a class="nav-link dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="las la-user mr-2" style="font-size:22px;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a class="dropdown-item font-weight-bold swap-link" href="dashboard.html"><i class="las la-user bg-info-alt p-1 rounded text-info"></i> Profile</a>
                                <a class="dropdown-item swap-link" href="dash-settings.html"><i class="las la-sign-out-alt bg-warning-alt text-warning p-1 rounded"></i> Settings</a>
                                <a class="dropdown-item swap-link" href="dash-downloads.html"><i class="las la-cloud-download-alt bg-success-alt text-success p-1 rounded"></i> Downloads</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item swap-link" href="dashboard.html"><i class="dropdown-icon"></i> Dashboard</a>
                                <a class="dropdown-item swap-link" href="dash-my-items.html"><i class="dropdown-icon"></i> My Items</a>
                                <a class="dropdown-item swap-link" href="dash-settings.html"><i class="dropdown-icon"></i> Settings
                                    <span class="badge badge-soft-success ml-2">25 New</span></a>
                                <a class="dropdown-item swap-link" href="dash-invoice.html"><i class="dropdown-icon"></i> Invoice</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item swap-link" href="javascript:void(0)"><i class="las la-sign-out-alt bg-danger-alt text-danger p-1 rounded"></i> Logout</a>
                            </div>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary swap-link text-white" href="<?=base_url()?>/register">Sign up</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>