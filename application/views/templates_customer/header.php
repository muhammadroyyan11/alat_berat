<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title>Sewa Alat Berat </title>

    <!--=== Bootstrap CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/plugins/vegas.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="<?php echo base_url() ?>assets/assets_shop/css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="<?php echo base_url() ?>assets/assets_shop/img/preloader.gif" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        <a href="<?php echo base_url('customer/dashboard') ?>" class="">
                            <!-- <h3 class="text-light ">SEWA ALAT BERAT</h3> -->
                            <img src="<?= base_url() ?>assets/img/logo.png" style="max-width: 50%;" max alt="">
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class=""><a href="<?php echo base_url('customer/dashboard') ?>">Beranda</a>
                                </li>
                                <?php if ($this->session->userdata('nama')) { ?>
                                    <li><a href="<?php echo base_url('customer/data_alat_berat') ?>">Alat Berat</a></li>
                                    <li><a href="<?php echo base_url('customer/transaksi') ?>">Transaksi</a></li>
                                    <li><a href="<?php echo base_url('customer/About') ?>">About</a></li>
                                    <!-- <li><a href="<?php echo base_url('customer/About') ?>"> -->
                                    <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bell-o"></i></a>
                                    </li> -->
                                    <li class="nav-item">
                                        <span class="badge badge-pill badge-primary" style="float:right;margin-bottom:-10px;">1</span> <!-- your badge -->
                                        <a class="nav-link" href="messages" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bell-o"></i></a>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <!-- Left Side Of Navbar -->
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item ml-2 mr-2">
                                                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="nav-item ml-2 mr-2">
                                                    <a class="nav-link" href="messages">Messages <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="nav-item ml-2 mr-2">
                                                    <a class="nav-link" href="#">People <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="nav-item ml-2 mr-2">
                                                    <a class="nav-link" href="#">Photos <span class="sr-only">(current)</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    </li>
                                    <li><a href="<?php echo base_url('Auth/logout') ?>">Welcome <?php echo $this->session->userdata('nama') ?> <span> | Logout</span></a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo base_url('customer/About') ?>">About</a></li>
                                    <li><a href="<?php echo base_url('Register') ?>">Register</a></li>
                                    <li><a href="<?php echo base_url('Auth/login') ?>">Login</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->