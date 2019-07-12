<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="googled4a964e8327492e9.html">
    <meta name="description" content="<?= $description ?>">
    <meta name="keywords" content="<?= $keywords ?>">
    <meta name="author" content="<?= $author ?>">
    <meta name="distribution" content="global"/>
    <meta http-equiv="Content-Language" content="es"/>
    <base href="https://www.hewks.net/" />
    <meta name="google-site-verification" content="o7lwrbGZqp7nEB5FbmDBpZVxvnkJYlUpDzpdBjaA44A" />

    <title><?= $title ?></title>

    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/Rounded-Hewks-Logo.png">

    <!-- Main styles -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/pnotify/css/pnotify.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/pnotify/css/pnotify.mobile.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/pnotify/css/pnotifybrighttheme.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/all-styles.css">

    <?= $links ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141593740-1"></script>
    <script async>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-141593740-1');
    </script>

</head>

<body>

    <div class="total-page-loader" id="total-page-loader">
        <div class="loader">
            <span>Hewks</span>
        </div>
        <!-- <img src="<?= base_url() ?>assets/images/loading-76.gif" alt="Gif de carga"> -->
    </div>

    <!-- Full page wrapper -->
    <div class="full-page-wrapper" id="full-page-wrapper">