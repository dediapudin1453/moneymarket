<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta name="description" content="<?php echo $this->CI->meta_description;?>">
    <meta name="keywords" content="<?php echo $this->CI->meta_keywords;?>">
    <meta name="author" content="<?php echo $this->settings->website('web_name');?>">
    <meta http-equiv="Copyright" content="<?php echo $this->settings->website('web_name');?>"/>
    <meta http-equiv="imagetoolbar" content="no"/>
    <meta name="language" content="<?php echo $this->_language;?>"/>
    <meta name="revisit-after" content="7"/>
    <meta name="webcrawlers" content="all"/>
    <meta name="rating" content="general"/>
    <meta name="spiders" content="all"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#e9e8f0" />
    <!-- Site Properties -->
    <title><?php echo $this->CI->meta_title;?></title>
    <!-- Critical preload -->
    <link rel="preload" href="<?php echo $this->CI->theme_asset('js/vendors/uikit.min.js');?> " as="script">
    <link rel="preload" href="<?php echo $this->CI->theme_asset('css/vendors/uikit.min.css');?>" as="style">
    <link rel="preload" href="<?php echo $this->CI->theme_asset('css/style.css');?>" as="style">
    <!-- Icon preload -->
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/fa-brands-400.woff2');?> " as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/fa-solid-900.woff2');?> " as="font" type="font/woff2" crossorigin>
    <!-- Font preload -->
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/lato-v16-latin-700.woff2');?> " as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/lato-v16-latin-regular.woff2');?> " as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo $this->CI->theme_asset('fonts/montserrat-v14-latin-600.woff2');?> " as="font" type="font/woff2" crossorigin>
    <!-- Favicon and apple icon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/vendors/uikit.min.css');?>">
    <link rel="stylesheet" href="<?php echo $this->CI->theme_asset('css/style.css');?>">
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
        <div class="uk-section uk-padding-small in-profit-ticker">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <div data-uk-slider="autoplay: true; autoplay-interval: 5000">
                            <ul class="uk-grid-large uk-slider-items uk-child-width-1-3@s uk-child-width-1-6@m uk-text-center" data-uk-grid>
                                <li>
                                    <i class="fas fa-angle-up in-icon-wrap small circle up"></i> XAUUSD <span class="uk-text-success">1478.81</span>
                                </li>
                                <li>
                                    <i class="fas fa-angle-down in-icon-wrap small circle down"></i> GBPUSD <span class="uk-text-danger">1.3191</span>
                                </li>
                                <li>
                                    <i class="fas fa-angle-down in-icon-wrap small circle down"></i> EURUSD <span class="uk-text-danger">1.1159</span>
                                </li>
                                <li>
                                    <i class="fas fa-angle-up in-icon-wrap small circle up"></i> USDJPY <span class="uk-text-success">109.59</span>
                                </li>
                                <li>
                                    <i class="fas fa-angle-up in-icon-wrap small circle up"></i> USDCAD <span class="uk-text-success">1.3172</span>
                                </li>
                                <li>
                                    <i class="fas fa-angle-up in-icon-wrap small circle up"></i> USDCHF <span class="uk-text-success">0.9776</span>
                                </li>
                                <li>
                                    <i class="fas fa-angle-down in-icon-wrap small circle down"></i> AUDUSD <span class="uk-text-danger">0.67064</span>
                                </li>
                                <li>
                                    <i class="fas fa-angle-up in-icon-wrap small circle up"></i> GBPJPY <span class="uk-text-success">141.91</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-section uk-padding-remove-vertical">
            <!-- module navigation begin -->
            <nav class="uk-navbar-container uk-navbar-transparent" data-uk-sticky="show-on-up: true; top: 80; animation: uk-animation-fade;">
                <div class="uk-container" data-uk-navbar>
                    <div class="uk-navbar-left uk-width-auto">
                        <div class="uk-navbar-item">
                            <!-- module logo begin -->
                            <a class="uk-logo" href="index.html">
                                <img class="in-offset-top-10" src="img/in-lazy.svg" data-src="img/in-logo-1.svg" alt="logo" width="130" height="36" data-uk-img>
                            </a>
                            <!-- module logo begin -->
                        </div>
                    </div>
                    <div class="uk-navbar-right uk-width-expand uk-flex uk-flex-right">
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="index.html">Home</a>
                            <li><a href="markets.html">Markets</a></li>
                            <li><a href="#">Company</a>
                            </li>
                            <li><a href="education.html">Education</a></li>
                            <li><a href="#">Resources</a>
                            </li>
                        </ul>
                        <div class="uk-navbar-item uk-visible@m in-optional-nav">
                            <div>
                                <a href="signin.html" class="uk-button uk-button-text">Login</a>
                                <a href="#" class="uk-button uk-button-text">Sign up</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- module navigation end -->
        </div>
        <!-- header content end -->
    </header>