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
                                    <li class="breadcrumb-item mr-1 font-weight-bold"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item ml-1 font-weight-bold active" aria-current="page">
                                        Library
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="header-actions">
                            <button class="btn btn-ghost grey-dark font-weight-bold">
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
                            </button>

                            <!---->
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row d-flex align-items-stretch">
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="box-icon bg-info-alt text-info d-flex align-items-center justify-content-center">
                                    <i class="las la-phone-volume"></i>
                                </div>
                                <div class="content mt-3">
                                    <h4 class="title font-weight-bold">Phone</h4>
                                    <p class="text-muted">
                                        Start working with Landrick that can provide everything
                                    </p>
                                    <a href="tel:+387 252-25-331" class="text-primary">+152 534-468-854</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="box-icon bg-warning-alt text-warning d-flex align-items-center justify-content-center">
                                    <i class="las la-envelope-open"></i>
                                </div>
                                <div class="content mt-3">
                                    <h4 class="title font-weight-bold">Email</h4>
                                    <p class="text-muted">
                                        Start working with Landrick that can provide everything
                                    </p>
                                    <a href="mailto:contact@example.com" class="text-primary">contact@example.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="box-icon bg-danger-alt text-danger d-flex align-items-center justify-content-center">
                                    <i class="las la-map-signs"></i>
                                </div>
                                <div class="content mt-3">
                                    <h4 class="title font-weight-bold">Location</h4>
                                    <p class="text-muted">
                                        Start working with Landrick that can provide everything
                                    </p>
                                    <a href="#" class="text-primary">View on map</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card text-center">
                            <div class="card-body">
                                <div class="box-icon bg-success-alt text-success d-flex align-items-center justify-content-center">
                                    <i class="las la-street-view"></i>
                                </div>
                                <div class="content mt-3">
                                    <h4 class="title font-weight-bold">Street view</h4>
                                    <p class="text-muted">
                                        Start working with Landrick that can provide everything
                                    </p>
                                    <a href="#" class="text-primary">View on map</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>

            <div class="container">
                <div class="row my-6">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body py-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h4 class="card-title mb-0">Use this form for contact</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-3">
                                <form id="contact-form" class="mt-4" method="post" action="#" role="form">
                                    <div class="messages"></div>

                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_name">Firstname *</label>
                                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required." />
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_lastname">Lastname *</label>
                                                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required." />
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_email">Email *</label>
                                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." />
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_need">Please specify your need *</label>
                                                    <select id="form_need" name="need" class="form-control" required="required" data-error="Please specify your need.">
                                                        <option value=""></option>
                                                        <option value="Request quotation">Request quotation</option>
                                                        <option value="Request order status">Request order status</option>
                                                        <option value="Request copy of an invoice">Request copy of an invoice</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="form_message">Message *</label>
                                                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="submit" class="btn btn-primary btn-send" value="Send message" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-muted mt-3">
                                                    <strong>*</strong> These fields are required
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div id="faq-accordion" class="mb-5">
                            <div class="card mb-2 mb-md-3">
                                <a href="#accordion-1" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0 mr-2">How do I contact support?</h6>
                                        <i class="las la-arrow-right icon"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="accordion-1" data-parent="#faq-accordion">
                                    <div class="px-3 px-md-4 pb-3 pb-md-4">
                                        f you need help with the product, please contact the shop owner by
                                        visiting their shop profile and sending them a message. For
                                        anything else (licensing, billing, etc), please visit our Help
                                        Center.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2 mb-md-3">
                                <a href="#accordion-2" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0 mr-2">How can I unzip product files?</h6>
                                        <i class="las la-arrow-right icon"></i>
                                    </div>
                                </a>
                                <div class="collapse show" id="accordion-2" data-parent="#faq-accordion">
                                    <div class="px-3 px-md-4 pb-3 pb-md-4">
                                        PC: To extract a single file or folder, double-click the
                                        compressed folder to open it. Then, drag the file or folder from
                                        the compressed folder to a new location. To extract the entire
                                        contents of the compressed folder, right-click the folder, click
                                        Extract All, and then follow the instructions. Mac: Double click
                                        the .zip file, then search for the product folder or product file.
                                        If you continue to have trouble, check out this help file for more
                                        tips.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2 mb-md-3">
                                <a href="#accordion-3" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0 mr-2">
                                            What happens when my support expires?
                                        </h6>
                                        <i class="las la-arrow-right icon"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="accordion-3" data-parent="#faq-accordion">
                                    <div class="px-3 px-md-4 pb-3 pb-md-4">
                                        Cicero famously orated against his political opponent Lucius
                                        Sergius Catilina. Occasionally the first Oration against Catiline
                                        is taken for type specimens:
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2 mb-md-3">
                                <a href="#accordion-4" data-toggle="collapse" role="button" aria-expanded="false" class="p-3 p-md-4 collapsed">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0 mr-2">What payment option do we have?</h6>
                                        <i class="las la-arrow-right icon"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="accordion-4" data-parent="#faq-accordion">
                                    <div class="px-3 px-md-4 pb-3 pb-md-4">
                                        Cicero famously orated against his political opponent Lucius
                                        Sergius Catilina. Occasionally the first Oration against Catiline
                                        is taken for type specimens: Quo usque tandem abutere, Catilina,
                                        patientia nostra? Quam diu etiam furor iste tuus nos eludet? (How
                                        long, O Catiline, will you abuse our patience? And for how long
                                        will that madness of yours mock us?)
                                    </div>
                                </div>
                            </div>
                        </div>
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