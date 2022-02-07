<?php
    require_once "../config/functions.php";
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $_SESSION['judul']?></title>

        <link rel="icon" type="image/png" href="<?= base_url('assert/img/clinic.png') ?>">

        <link href="<?= base_url('assert/css/semua.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('assert/css/login.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('assert/css/nav.css') ?>" rel="stylesheet" />
        <link href="<?= base_url('assert/css/dashboard.css') ?>" rel="stylesheet" />

        <link href="<?= base_url('assert/css/popupmodal.css') ?>" rel="stylesheet" />
        <script src="<?= base_url('assert/js/polyfill.js') ?>"></script>
        <script src="<?= base_url('assert/js/popupmodal-min.js') ?>"></script>

        <!-- style font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- fa icon -->
        <script src="https://kit.fontawesome.com/bae67f6400.js" crossorigin="anonymous"></script>
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
