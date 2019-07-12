<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="author" content="<?= $author ?>">

    <title><?= $title ?></title>

    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/Rounded-Hewks-Logo.png">

    <!-- Main styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/pnotify/css/pnotify.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/pnotify/css/pnotify.mobile.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/pnotify/css/pnotifybrighttheme.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendor/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/BackSurface/main-styles.css">

    <?= $links ?>

</head>

<body>

    <div class="bs-total-page-loader" id="bs-total-page-loader">
        <img src="<?= base_url() ?>assets/images/spinning-circles-1.svg" alt="Gif de carga">
    </div>

    <!-- Full page wrapper -->
    <div class="bs-full-page-wrapper" id="full-page-wrapper">