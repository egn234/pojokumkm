<?= $this->include('partials/head-main') ?>

<head>

    <?= $title_meta ?>

    <!-- choices css -->
    <link href="<?= base_url() ?>/assets/minia/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('pengelola/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18"><?= $title ?></h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/umkm/dashboard">PojokUMKM</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/umkm/iklan/list">List Order</a></li>
                                    <li class="breadcrumb-item active">Order</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title-desc">Order</p>
                            </div>
                            <div class="card-body">
                                <?= session()->getFlashdata('notif'); ?>
                                <form action="<?= base_url() ?>/umkm/iklan/add_order" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="choices-single-default" class="form-label">Voucher Iklan</label>
                                                <select class="js-choices form-control" id="voucher" onchange="change()" name="adsid" placeholder="This is a search placeholder">
                                                    <option value="">Pilih Voucher...</option>
                                                    <?php foreach ($l_voucher as $row) { ?>
                                                        <option value="<?= $row->idads; ?>" data-harga="<?= $row->ads_price; ?>"><?= $row->ads_name . '-' . $row->ads_price; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Jumlah Voucher <span class="text-danger">*</span></label>
                                                        <div class="col-sm-12">
                                                            <input type="number" id="jumlah" name="jmlh_voucher" class="form-control" value="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Harga</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="harga" name="harga" class="form-control" readonly>
                                                            <input type="text" name="idumkm" class="form-control" value="<?= $idumkm ?>" hidden>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Total</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="total" name="total" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <a href="<?= base_url() ?>/umkm/iklan/list" class="btn btn-secondary">Kembali</a>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?= $this->include('pengelola/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- Required datatable js -->
<script src="<?= base_url() ?>/assets/minia/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/assets/minia/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- choices js -->
<script src="<?= base_url() ?>/assets/minia/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>


<!-- ckeditor -->
<script src="<?= base_url() ?>/assets/minia/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script type="text/javascript">
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['bold', 'italic', 'link', 'undo', 'redo', 'numberedList', 'bulletedList']
        })
        .catch(error => {
            console.log(error);
        });

    function change() {
        let harga = $('select option:checked').attr('data-harga');
        let jumlah = document.getElementById("jumlah").value;
        let total = harga * jumlah;
        document.getElementById("harga").value = harga
        document.getElementById("total").value = total
    }
    $("#jumlah").on('keyup keypress click', function() {
        let harga = $('select option:checked').attr('data-harga');
        let jumlah = document.getElementById("jumlah").value;
        let total = harga * jumlah;
        document.getElementById("total").value = total
    });
</script>

<script src="<?= base_url() ?>/assets/minia/assets/js/app.js"></script>

</body>

</html>