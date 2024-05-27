<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>

<html lang="en" class="light-style layout-compact layout-navbar-fixed layout-menu-fixed     " dir="ltr" data-theme="theme-default" data-assets-path="<?php echo base_url() ?>assets/assets/" data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1" data-framework="laravel" data-template="vertical-menu-theme-default-light">


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Nov 2023 03:50:04 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $title ?></title>
    <meta name="description" content="Mitra Wijaya" />
    <meta name="keywords" content="Mitra Wijaya">
    <!-- laravel CRUD token -->
    <!-- Canonical SEO -->
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/assets/img/handshake.png" />

    <!-- Include Styles -->
    <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/fonts/boxiconsc4a7.css?id=87122b3a3900320673311cebdeb618da" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/fonts/fontawesome8a69.css?id=a2997cb6a1c98cc3c85f4c99cdea95b5" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/fonts/flag-icons80a8.css?id=121bcc3078c6c2f608037fb9ca8bce8d" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/css/rtl/corea8ac.css?id=55b2a9dfaa009c41df62ca8d16e913a8" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/css/rtl/theme-default4c4b.css?id=9182924a7b965439eca5e189ba43eba1" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/demob77a.css?id=69dfc5e48fce5a4ff55ff7b593cdf93d" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbare482.css?id=73d641bb8db2475ecafc6c68461ed01b" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/typeahead-js/typeahead05d2.css?id=de339ead5e9c9e36f12e46cbef7aaffd" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/animate-css/animate.css">
    <!-- Vendor Styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/apex-charts/apex-charts.css">
    <!-- Vendor Styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/datatables-select-bs5/select.bootstrap5.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/datatables-fixedcolumns-bs5/fixedcolumns.bootstrap5.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/datatables-fixedheader-bs5/fixedheader.bootstrap5.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/css/pages/app-academy-details.css" />
    <!-- Page Styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/plyr/plyr.css" />
    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
    <!-- laravel style -->
    <script src="<?php echo base_url() ?>assets/assets/vendor/js/helpers.js"></script>
    <!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="<?php echo base_url() ?>assets/assets/vendor/js/template-customizer.js"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?php echo base_url() ?>assets/assets/js/config.js"></script>
  <style>
    /* Menampilkan kursor tautan saat dihover */
    .dataTables_wrapper tbody td.clickable {
        cursor: pointer;
        color: #007bff; /* Warna biru yang lebih lembut */
    }
</style>
</head>

<body>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"><a href="javascript:void(0)">Daftar Harga
    </h4>
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">

                <div class="card-body">
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-warning d-flex mb-0" role="alert">
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center mb-1">Terjadi Kesalahan</h6>
                                <span><?php echo $this->session->flashdata('error') ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success d-flex mb-0" role="alert">
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center mb-1">Success</h6>
                                <span><?php echo $this->session->flashdata('success') ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="input-group input-group-merge">
                                        <div class="demo-inline-spacing">
                                            <button type="button" class="btn btn-outline-secondary" id="btnExport">
                                                <span class="tf-icons bx bx-download me-1"></span>Download
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br/>
                    <h4 style="text-transform: uppercase;font-weight: bold;">List Harga Produk</h4>
                    <div class="card-datatable table-responsive">
                        <table class="dt-advanced-search table border-top table" id="tableHarga">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- / Content -->
    <!-- JS -->
    <script src="<?php echo base_url() ?>assets/assets/vendor/libs/jquery/jquery1e84.js?id=0f7eb1f3a93e3e19e8505fd8c175925a"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/popper/popper0a73.js?id=baf82d96b7771efbcc05c3b77135d24c"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/js/bootstrapcfc4.js?id=4648227467e3fd3f4cf976cfb0e43aea"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar6188.js?id=44b8e955848dc0c56597c09f6aebf89a"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/hammer/hammer2de0.js?id=0a520e103384b609e3c9eb3b732d1be8"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/typeahead-js/typeahead60e7.js?id=f6bda588c16867a6cc4158cb4ed37ec6"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/js/menu2dc9.js?id=c6ce30ded4234d0c4ca0fb5f2a2990d8"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="<?php echo base_url() ?>assets/assets/js/maind63d.js?id=6bea3f2e092d5fe7327c226f3242f31b"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="<?php echo base_url() ?>assets/assets/js/dashboards-analytics.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 5000);
</script>

<!-- Vendors JS -->
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

<!-- Main JS -->
<!-- <script src="<?php echo base_url() ?>assets/assets/js/main.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/flatpickr/flatpickr.js"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/select2/select2.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
<!-- Page JS -->
<script src="<?php echo base_url() ?>assets/assets/js/tables-datatables-extensions.js"></script>

<script src="<?php echo base_url() ?>assets/assets/js/form-layouts.js"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<script src="<?php echo base_url() ?>assets/assets/js/forms-extras.js"></script>
<script src="<?php echo base_url() ?>assets/assets/vendor/libs/autosize/autosize.js"></script>
  <!-- Vendors JS -->
  <script src="<?php echo base_url() ?>assets/assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="<?php echo base_url() ?>assets/assets/js/charts-apex.js"></script>
  <script src="<?php echo base_url() ?>assets/assets/vendor/libs/chartjs/chartjs.js"></script>
  <script src="<?php echo base_url() ?>assets/assets/js/app-ecommerce-dashboard.js"></script>

<!-- Main JS -->


  <!-- Vendors JS -->
  <script src="<?php echo base_url() ?>assets/assets/vendor/libs/plyr/plyr.js"></script>

  <!-- Main JS -->
  

  <!-- Page JS -->
  <script src="<?php echo base_url() ?>assets/assets/js/app-academy-course-details.js"></script>
<!-- Page JS -->
<script src="<?php echo base_url() ?>assets/assets/js/charts-chartjs.js"></script>

<script>
    var produk = '<?php echo $produk ?>';
    var id = '<?php echo $id ?>';
    $(document).ready(function() {
        $('#tableHarga').DataTable({
            processing: true,
            serverSide: false, // Set to false for client-side processing
            ajax: {
                url: '<?php echo base_url('link/link_generate'); ?>',
                type: "POST", // Metode pengiriman data (POST)
                data: function(d) {
                    // Kirim parameter ke metode di Controller Anda
                    d.produk = produk.split(",");
                    d.id = id;
                },
                dataSrc: "" // Menentukan sumber data dari respons JSON (kosong karena data langsung dalam array)
            },
            columns: [{
                    data: "produk"
                },
                {
                    data: "kode",
                }, {
                    data: 'keterangan'
                },
                {
                    data: "harga",
                    render: function(data, type, row) {
                        // Ubah format nilai numerik menjadi format mata uang Indonesia
                        return formatCurrency(data);
                    }
                }, {
                    data: "status",
                    render: function(data, type, row) {
                        // Cek apakah tanggal_pembayaran null atau 01/01/1970 07:00, jika ya, kembalikan string kosong
                        if (data == 1) {
                            return '<span class="badge ' + getStatusStyle(data) + '">' + 'OPEN' + '</span>';
                        } else {
                            return '<span class="badge ' + getStatusStyle(data) + '">' + 'GANGGUAN' + '</span>';
                        }
                    }

                }
            ],
            paging: false, // Menonaktifkan paging
            order: [
                [0, 'desc'] // Mengurutkan kolom pertama secara descending
            ],
            buttons: [{
                extend: 'excelHtml5',
                text: 'Export to Excel',
                filename: 'Daftar Harga Produk',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                }
            }]
        });
    });

    function formatCurrency(amount) {
        // Fungsi untuk memformat nilai numerik menjadi format mata uang Indonesia
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        });
        return formatter.format(amount);
    }

    // Fungsi untuk mendapatkan style berdasarkan status
    function getStatusStyle(status) {
        switch (status) {
            case 0:
                return 'bg-label-danger'; // Warning
            case 1:
                return 'bg-label-success'; // Success
            default:
                return ''; // Default style
        }
    }

    $('#btnExport').on('click', function() {
        $('#tableHarga').DataTable().button('.buttons-excel').trigger();
    });
</script>
</body>

</html>