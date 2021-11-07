<!DOCTYPE html>
<html>

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $this->settings->website('web_title'); ?></title>

    <meta name="description" content="<?php echo $this->CI->meta_description; ?>">
    <meta name="keywords" content="<?php echo $this->CI->meta_keywords; ?>">
    <meta name="author" content="<?php echo $this->settings->website('web_name'); ?>">
    <meta http-equiv="Copyright" content="<?php echo $this->settings->website('web_name'); ?>" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="language" content="<?php echo $this->_language; ?>" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo favicon(); ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo favicon(); ?>">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
    <!-- Web Fonts  -->
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('vendor/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/animate.compat.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('simple-line-icons/css/simple-line-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/magnific-popup.min.css'); ?>">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/theme.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/theme-elements.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/theme-blog.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/theme-shop.css'); ?>">
    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/default.css'); ?>">
    <!-- Head Libs -->
    <script src=" <?php echo $this->CI->theme_asset('js/modernizr.min.js'); ?>"></script>
    <style>
        .efekbayangan {
            box-shadow: -1px 4px 35px -7px rgba(0, 0, 0, 0.74);
            -webkit-box-shadow: -1px 4px 35px -7px rgba(0, 0, 0, 0.74);
            -moz-box-shadow: -1px 4px 35px -7px rgba(0, 0, 0, 0.74);
        }

        .cekung {
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body class="one-page alternative-font-5" data-target="#header" data-spy="scroll" data-offset="100">
    <div class="body">

        <header id="header" class="header-transparent header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
            <div class="header-body border-top-0 bg-dark box-shadow-none">
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-logo">
                                    <a href="<?php echo base_url(); ?>">
                                        <img alt="LinggaFX" width="125" src="<?php echo favicon('logo') . '?' . strtotime(date('Ymd')); ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <div class="header-nav header-nav-links header-nav-dropdowns-dark header-nav-light-text order-2 order-lg-1">
                                    <div class="header-nav-main header-nav-main-mobile-dark header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                        <nav class="collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <li>
                                                    <a class="nav-link active" href="#home" data-hash>
                                                        HOME
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="#whychooseus" data-hash data-hash-offset="62">
                                                        KENAPA HARUS MKP PROMAX
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="#account" data-hash data-hash-offset="62">
                                                        PILIH PAKET
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="#platform" data-hash>
                                                        PLATFORM TRADING
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="nav-link" href="#hubungikami" data-hash>
                                                        HUBUNGI KAMI
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>

                                    </div>

                                    <a href="<?php echo base_url('l-member') ?>" class="btn btn-3d btn-primary btn-sm mb-2" data-hash> LOGIN</a>

                                    <a href="<?php echo base_url('l-member/register') ?>" class="btn btn-3d btn-light btn-sm mb-2" data-hash style="margin-left: 5px;">REGISTER</a>

                                    <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                        <i class="fas fa-bars"></i>
                                    </button>


                                </div>
                                <div class="order-1 order-lg-2">
                                    <div class="d-inline-flex">
                                        <!-- <ul class="header-social-icons social-icons custom-social-icons-style-1 _white d-none d-sm-block" style="display: none;">
                                                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-square"></i></a></li>
                                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter-square"></i></a></li>
                                                <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                            </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>