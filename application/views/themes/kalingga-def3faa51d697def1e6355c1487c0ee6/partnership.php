<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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

                                foreach ($menu as $key => $value) { ?>
                                    <li><a href="<?= $value['url'] ?>"><?= $value['title'] ?></a></li>
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
     <!-- section content begin -->
        <div class="uk-section">
            <div class="uk-container">
                <div class="uk-grid-match uk-grid-medium uk-child-width-1-2@s uk-child-width-1-3@m in-card-10" data-uk-grid>
                    <div class="uk-width-1-1 uk-flex uk-flex-center">
                        <div class="uk-width-3-5@m uk-text-center">
                            <h1 class="uk-margin-remove">keuntungan join<span class="in-highlight">partnership</span></h1>
                            <p class="uk-text-lead uk-text-muted uk-margin-remove">Work with us the way you want.</p>
                            <p>Jadilah mitra perwakilan kami untuk mendapatkan kesempatan unik dan menyesuaikan promosi untuk membantu berbagi referal. Serta menjadi bagian dari kami, dan mendaptkan penghasilan tiap bulan (Gaji) Serta Bonus (Rebate) yang tak terbatas.</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-green">
                            <i class="fas fa-handshake  fa-lg in-icon-wrap circle uk-margin-bottom"></i>
                            <h4 class="uk-margin-top">
                                Sponsor dari company
                            </h4>
                            <hr>
                            <p>A wide selection of investment product to help build diversified portfolio</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-blue">
                            <i class="fas fa-chart-bar fa-lg in-icon-wrap circle uk-margin-bottom"></i>
                            <h4 class="uk-margin-top">
                                <a href="#">Trading<i class="fas fa-chevron-right uk-float-right"></i></a>
                            </h4>
                            <hr>
                            <p>Powerful trading tools, resources, insight and support</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-purple">
                            <i class="fas fa-chart-pie fa-lg in-icon-wrap circle uk-margin-bottom"></i>
                            <h4 class="uk-margin-top">
                                Pembagian Rebate Besar
                            </h4>
                            <hr>
                            <p>Kami memberikan skema pembagian rebate yang besar</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-navy">
                            <i class="fas fa-chalkboard-teacher fa-lg in-icon-wrap circle uk-margin-bottom"></i>
                            <h4 class="uk-margin-top">
                                <a href="#">Investment advisory<i class="fas fa-chevron-right uk-float-right"></i></a>
                            </h4>
                            <hr>
                            <p>A wide selection of investing strategies from seasoned portfolio managers</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-grey">
                            <i class="fas fa-funnel-dollar fa-lg in-icon-wrap circle uk-margin-bottom"></i>
                            <h4 class="uk-margin-top">
                                <a href="#">Smart portfolio<i class="fas fa-chevron-right uk-float-right"></i></a>
                            </h4>
                            <hr>
                            <p>A revolutionary, fully-automated investmend advisory services</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-light in-card-orange">
                            <i class="fas fa-seedling fa-lg in-icon-wrap circle uk-margin-bottom"></i>
                            <h4 class="uk-margin-top">
                                <a href="#">Mutual fund advisor<i class="fas fa-chevron-right uk-float-right"></i></a>
                            </h4>
                            <hr>
                            <p>Specialized guidance from independent local advisor for hight-net-worth investors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->

    <footer>
        <!-- footer content begin -->
        <div class="uk-section uk-section-primary uk-padding-large uk-padding-remove-horizontal uk-margin-medium-top">
            <div class="uk-container">
                <div class="uk-child-width-1-2@s uk-child-width-1-5@m uk-flex" data-uk-grid>
                    <div>
                        <h4 class="uk-heading-bullet">Overview</h4>
                        <ul class="uk-list uk-link-text">
                            <li><a href="#">Stock indices</a></li>
                            <li><a href="#">Commodities</a></li>
                            <li><a href="#">Forex</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="uk-heading-bullet">Company</h4>
                        <ul class="uk-list uk-link-text">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="uk-heading-bullet">Legal</h4>
                        <ul class="uk-list uk-link-text">
                            <li><a href="<?php echo base_url('pages/term-and-conditions'); ?>">Terms &amp; Conditions</a></li>
                            <li><a href="<?php echo base_url('pages/client-aggrement'); ?>">Client &amp; Aggrement</a></li>
                            <li><a href="<?php echo base_url('pages/client-aggrement'); ?>">Trading Rules</a></li>
                        </ul>
                    </div>
                    <div class="uk-visible@m">
                        <h4 class="uk-heading-bullet">Support</h4>
                        <ul class="uk-list uk-link-text">
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="uk-flex-first uk-flex-last@m">
                        <ul class="uk-list uk-link-text">
                            <li><img class="uk-margin-small-bottom" src="img/in-lazy.svg" data-src="img/in-logo-2.svg" alt="logo" width="130" height="36" data-uk-img></li>
                            <li><a href="#"><i class="fas fa-envelope uk-margin-small-right"></i><?php echo $this->CI->settings->website('web_email');?></a></li>
                            <li><a href="#"><i class="fas fa-map-marker-alt uk-margin-small-right"></i><?php echo htmlspecialchars_decode($this->CI->settings->website('address'));?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="uk-grid uk-flex uk-flex-center uk-margin-large-top" data-uk-grid>
                    <div class="uk-width-5-6@m uk-margin-bottom">
                        <div class="in-footer-warning in-margin-top-20@s">
                            <h5 class="uk-text-small uk-text-uppercase"><span>Risk Warning</span></h5>
                            <p class="uk-text-small">Seluruh konten di dalam website ini bersifat informatif. <?php echo $this->settings->website('web_name');?> tidak bertanggung jawab atas segala bentuk kerugian, baik langsung maupun tidak langsung, akibat penggunaan informasi yang tersedia di website ini. Sebelum Anda mulai trading, maka Anda harus benar – benar memahami risiko yang terlibat di dalam pasar uang, trading dengan margin, dan juga wajib mengetahui tingkat pengetahuan Anda.</p>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m in-copyright-text">
                        <p>© <?php echo $this->settings->website('web_name');?> <?php echo date("Y"); ?>. All rights reserved.</p>
                    </div>
                    <div class="uk-width-1-2@m uk-text-right@m in-footer-socials">
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer content end -->
        <!-- module totop begin -->
        <div class="uk-visible@m">
            <a href="#" class="in-totop fas fa-chevron-up" data-uk-scroll></a>
        </div>
        <!-- module totop begin -->
    </footer>
    <!-- Javascript -->
    <script src="<?php echo $this->CI->theme_asset('js/vendors/uikit.min.js');?> "></script>
    <script src="<?php echo $this->CI->theme_asset('js/vendors/indonez.min.js');?> "></script>
    <script src="https://widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" defer></script>
    <script src="<?php echo $this->CI->theme_asset('js/config-theme.js');?> "></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?= content_url('modjs/running-price.js')?> "></script>
</body>

</html>