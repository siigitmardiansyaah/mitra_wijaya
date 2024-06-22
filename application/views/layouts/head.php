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
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/assets/vendor/css/pages/app-academy-details.css" />
    <!-- Page Styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/assets/vendor/libs/plyr/plyr.css" />
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
<link rel="stylesheet" href="<?php echo base_url()?>assets/assets/vendor/libs/dropzone/dropzone.css" />

</head>