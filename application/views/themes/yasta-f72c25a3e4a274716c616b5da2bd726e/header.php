<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $this->CI->meta_description; ?>">
    <meta name="keywords" content="<?php echo $this->CI->meta_keywords; ?>">
    <meta name="author" content="<?php echo $this->settings->website('web_name'); ?>">
    <meta http-equiv="Copyright" content="<?php echo $this->settings->website('web_name'); ?>" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="language" content="<?php echo $this->_language; ?>" />
    <meta name="revisit-after" content="7" />
    <meta name="webcrawlers" content="all" />
    <meta name="rating" content="general" />
    <meta name="spiders" content="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#e9e8f0" />
    <!-- Site Properties -->
    <title><?php echo $this->CI->meta_title; ?></title>
    <!-- Critical preload -->
    <link rel="preload" href="<?php echo $this->CI->theme_asset('js/vendors/uikit.min.js'); ?> " as="script">
    <link rel="preload" href="<?php echo $this->CI->theme_asset('css/vendors/uikit.min.css'); ?>" as="style">
    <link rel="preload" href="<?php echo $this->CI->theme_asset('css/style.css'); ?>" as="style">
    <!-- Icon preload -->
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/fa-brands-400.woff2'); ?> " as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/fa-solid-900.woff2'); ?> " as="font" type="font/woff2" crossorigin>
    <!-- Font preload -->
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/rubik-v9-latin-500.woff2'); ?> " as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/rubik-v9-latin-300.woff2'); ?> " as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/rubik-v9-latin-regular.woff2'); ?> " as="font" type="font/woff2" crossorigin>
    <!-- Favicon and apple icon -->
    <link rel="shortcut icon" href="href=" <?php echo favicon(); ?>" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/vendors/uikit.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/style.css'); ?>">
    <style>
        .in-slideshow .uk-slideshow-items li span {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgb(94 94 94 / 35%);
        }

        .uk-button-primary {
            background-color: #1f6848;
            color: #fff;
        }

        .uk-text-primary {
            color: #1f6848 !important;
        }
    </style>
</head>

<body>
    <!-- preloader begin -->
    <div class="in-loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- preloader end -->
    <header>
        <!-- header content begin -->
        <div class="uk-section uk-padding-remove-vertical in-header-home ">
            <!-- module navigation begin -->
            <nav class="uk-navbar-container uk-navbar-transparent" data-uk-sticky="show-on-up: true; top: 80; animation: uk-animation-fade;">
                <div class="uk-container" data-uk-navbar>
                    <div class="uk-navbar-left uk-width-auto">
                        <div class="uk-navbar-item">
                            <!-- module logo begin -->
                            <a class="uk-logo" href="<?php echo base_url() ?>">
                                <img class="uk-margin-small-right in-offset-top-10" src="img/in-lazy.gif" data-src="<?php echo favicon('logo') . '?' . strtotime(date('Ymd')); ?>" alt="wave" width="134" height="23" data-uk-img>
                            </a>
                            <!-- module logo begin -->
                        </div>
                    </div>
                    <div class="uk-navbar-right uk-width-expand uk-flex uk-flex-right">
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url('pages/company'); ?>">Company</a></li>
                            <!-- <li><a href="<?php echo base_url('pages/market'); ?>">Markets</a></li> -->
                            <li><a href="<?php echo base_url('pages/trading-platform'); ?>">Trading Platform</a></li>
                            <li><a href="<?php echo base_url('pages/education'); ?>">Education</a></li>
                            <li><a href="<?php echo base_url('pages/contact-us'); ?>">Get in Touch</a></li>
                        </ul>
                        <div class="uk-navbar-item uk-visible@m in-optional-nav">
                            <a href="<?php echo base_url('l-member'); ?>" class="uk-button uk-button-text"><i class="fas fa-user-circle uk-margin-small-right"></i>Log in</a>
                            <a href="<?php echo base_url('l-member/register'); ?>" class="uk-button uk-button-primary uk-button-small uk-border-pill">Sign up</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- module navigation end -->
            <!-- <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <div class="uk-card uk-card-secondary uk-card-small uk-card-body uk-border-rounded">
                            <div class="uk-grid uk-text-small" data-uk-grid>
                                <div class="uk-width-3-4@m uk-visible@m">
                                    <p>Trading involves substantial risk and may result in the loss of your invested/greater that your invested capital, respectively. </p>
                                </div>
                                <div class="uk-width-expand@m uk-text-center uk-text-right@m">
                                    <a class="uk-margin-right" href="#"><i class="fas fa-comment-alt uk-margin-small-right"></i>Live Chat</a>
                                    <a href="#"><i class="fas fa-phone-alt uk-margin-small-right uk-margin-small-left"></i>+51231233</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- header content end -->
    </header>