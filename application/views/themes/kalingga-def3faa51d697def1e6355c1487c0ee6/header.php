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
    <link rel="shortcut icon" href="<?= content_url('favicon/'.$this->settings->website('favicon')); ?>" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="<?= content_url('favicon/'.$this->settings->website('favicon')); ?>">
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
        <div>
             <iframe src="https://fxpricing.com/fx-widget/ticker-tape-widget.php?id=1,2,5,14,20,41" width="150%" height="40" ></iframe> <div id="fx-pricing-widget-copyright"></div> <style type="text/css"> #fx-pricing-widget-copyright{ text-align: center; font-size: 13px; font-family: sans-serif; margin-top: -20px; margin-bottom: 10px; color: #9db2bd; } #fx-pricing-widget-copyright a{ text-decoration: unset; color: #bb3534; font-weight: 600; } </style>
        </div>
        <div class="uk-section uk-padding-remove-vertical">
            <!-- module navigation begin -->
            <nav class="uk-navbar-container uk-navbar-transparent" data-uk-sticky="show-on-up: true; top: 80; animation: uk-animation-fade;">
                <div class="uk-container" data-uk-navbar>
                    <div class="uk-navbar-left uk-width-auto">
                        <div class="uk-navbar-item">
                             <!-- module logo begin -->
                            <a class="uk-logo" href="<?php echo base_url() ?>">
                                <img class="in-offset-top-10" src="<?php echo $this->CI->theme_asset('img/in-lazy.svg');?>" data-src="<?= content_url('favicon/'.$this->settings->website('logo')); ?>" alt="logo" width="130" height="36" data-uk-img>
                            </a>
                            <!-- module logo begin -->
                        </div>
                    </div>
                    <div class="uk-navbar-right uk-width-expand uk-flex uk-flex-right">
                        <ul class="uk-navbar-nav uk-visible@m">
                            <?php 
                                $menu = $this->db->get_where('t_menu', array('group_id'=>'4'))->result_array();

                                foreach ($menu as $key => $value) { 
                                        $cek_url = substr_count($value['url'], ".");
                                        $href = ( $cek_url >= 1 ? $value['url'] : site_url($value['url']));
                                    ?>

                                    <li><a href="<?= $href ?>"><?= $value['title'] ?></a></li>
                                <?php } 
                            ?>
                        </ul>
                        <div class="uk-navbar-item uk-visible@m in-optional-nav">
                            <div>
                                <?php if (!empty($this->session->userdata('log_member'))) { ?>
                                    <a href="<?php echo base_url('l-member') ?>" class="uk-button uk-button-text">Dashboard</a>
                                    <a href="<?php echo base_url('l-member/logout') ?>" class="uk-button uk-button-text">Logout</a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url('l-member') ?>" class="uk-button uk-button-text">Login</a>
                                    <a href="<?php echo base_url('l-member/register') ?>" class="uk-button uk-button-text">Open Account</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- module navigation end -->
        </div>
        <!-- header content end -->
    </header>
    