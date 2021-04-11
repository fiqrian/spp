<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title; ?></title>

    <!-- Site favicon -->

    <link rel="icon icon" type="image/png" href="<?php echo base_url('assets/vendors/images/BN666.png') ?>">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/core.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/icon-font.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/style.css') ?>">
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/src/plugins/fullcalendar/fullcalendar.css') ?>">
    <link rel="stylesheet" type="text/css" href=" <?php echo base_url('assets/src/plugins/jquery-steps/jquery.steps.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/dropzone/src/dropzone.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/sweetalert2/sweetalert2.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/jquery-asColorPicker/dist/css/asColorPicker.css') ?> ">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="<?php echo base_url('assets/vendors/images/Group 1.png'); ?>" alt=""></div>
            <div class='loader-progress' id="progress_div">
                <div class='bar' id='bar1'></div>
            </div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
                Tunggu...
            </div>
        </div>
    </div>
</head>