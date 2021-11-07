<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- 
*******************************************************
	Include Header Template
******************************************************* 
-->
<?php $this->CI->render_view('header'); ?>
<!-- End Header -->

<!-- 
*******************************************************
	Insert Content
******************************************************* 
-->
<!-- Begin Content -->

    <main>
        <!-- slideshow content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <div class="uk-light in-slideshow uk-background-cover uk-background-top-center" style="background-image: url(<?php echo $this->CI->theme_asset('img/in-liquid-slide-bg.png');?>);" data-uk-slideshow>
                <ul class="uk-slideshow-items">
                    <li>
                        <div class="uk-container">
                            <div class="uk-grid-medium" data-uk-grid>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-overlay">
                                        <h1>Learn forex with our courses.</h1>
                                        <p class="uk-text-lead uk-visible@m">Trade forex, commodities, synthetic and stock indices from a single account</p>
                                        <a href="#" class="uk-button uk-button-default uk-border-rounded uk-visible@s">Join our webinar</a>
                                    </div>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <img class="in-slide-img" src="<?php echo $this->CI->theme_asset('img/in-lazy.gif');?>" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-slide-3.png');?> " alt="image-slide" width="500" height="400" data-uk-img>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-container">
                            <div class="uk-grid-medium" data-uk-grid>
                                <div class="uk-width-1-2@s">
                                    <div class="uk-overlay">
                                        <h1>Multi-regulated global broker.</h1>
                                        <p class="uk-text-lead uk-visible@m">A trusted destination for traders worldwide, Authorised by FCA, ASIC &amp; FSCA</p>
                                        <a href="#" class="uk-button uk-button-default uk-border-rounded uk-visible@s">Discover accounts</a>
                                    </div>
                                </div>
                                <div class="uk-width-1-2@s">
                                    <img class="in-slide-img" src="<?php echo $this->CI->theme_asset('img/in-lazy.gif');?>" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-slide-4.png');?>  " alt="image-slide" width="500" height="400" data-uk-img>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous data-uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next data-uk-slideshow-item="next"></a>
      
            </div>
        </div>
        <!-- slideshow content end -->
        <!-- section content begin -->
        <div class="uk-section uk-section-secondary in-liquid-1">
            <div class="uk-container uk-light">
                <div class="uk-grid uk-flex uk-flex-middle">
                    <div class="uk-width-1-2@m">
                        <h2>Save time. Get <span class="in-highlight">higher return</span>. Multiply wealth.</h2>
                    </div>
                    <div class="uk-width-1-2@m">
                        <a class="uk-button uk-button-default uk-border-rounded uk-align-right@m" href="#">Find out more<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div class="uk-child-width-1-3@m" data-uk-grid>
                    <div>
                        <div class="uk-card uk-card-secondary uk-border-rounded uk-cover-container">
                            <div class="uk-card-media-top">
                                <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-object-1.svg');?> " alt="sample-image" data-width data-height data-uk-img>
                            </div>
                            <div class="uk-card-body">
                                <h3>Various assets</h3>
                                <p>Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-secondary uk-border-rounded uk-cover-container">
                            <div class="uk-card-media-top">
                                <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-object-2.svg');?>" alt="sample-image" data-width data-height data-uk-img>
                            </div>
                            <div class="uk-card-body">
                                <h3>Market analysis</h3>
                                <p>Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-secondary uk-border-rounded uk-cover-container">
                            <div class="uk-card-media-top">
                                <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-object-3.svg');?>" alt="sample-image" data-width data-height data-uk-img>
                            </div>
                            <div class="uk-card-body">
                                <h3>Enhanced tools</h3>
                                <p>Duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <iframe src="https://fxpricing.com/fx-widget/forex-cross-rates.php?symbol=EUR/USD,USD/JPY,USD/INR,GBP/CHF,AED/PKR" width="100%" height="401" style="border: 1px solid #eee;"></iframe> <div id="fx-pricing-widget-copyright"> </div> <style type="text/css"> #fx-pricing-widget-copyright{ text-align: center; font-size: 13px; font-family: sans-serif; margin-top: 10px; margin-bottom: 10px; color: #9db2bd; } #fx-pricing-widget-copyright a{ text-decoration: unset; color: #bb3534; font-weight: 600; } </style>
        <!-- section content begin -->
        <div class="uk-section in-liquid-2">
            <div class="uk-container">
                <div class="uk-grid-large uk-child-width-1-2@m" data-uk-grid>
                    <div class="uk-flex uk-flex-left">
                        <div class="uk-margin-right">
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-icon-1.svg');?> " alt="sample-icon" width="128" height="128" data-uk-img>
                        </div>
                        <div>
                            <h3>Expert service</h3>
                            <p>Quis autem vel eum iure reprehenderit qui in voluptate velit esse quam nihil molestiae consequatur.</p>
                            <a class="uk-button uk-button-text" href="#">Learn more<i class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-left">
                        <div class="uk-margin-right">
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-icon-2.svg');?>" alt="sample-icon" width="128" height="128" data-uk-img>
                        </div>
                        <div>
                            <h3>Fully regulated</h3>
                            <p>Quis autem vel eum iure reprehenderit qui in voluptate velit esse quam nihil molestiae consequatur.</p>
                            <a class="uk-button uk-button-text" href="#">Learn more<i class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-left">
                        <div class="uk-margin-right">
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-icon-3.svg');?>" alt="sample-icon" width="128" height="128" data-uk-img>
                        </div>
                        <div>
                            <h3>Financial strength</h3>
                            <p>Quis autem vel eum iure reprehenderit qui in voluptate velit esse quam nihil molestiae consequatur.</p>
                            <a class="uk-button uk-button-text" href="#">Learn more<i class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-left">
                        <div class="uk-margin-right">
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-icon-4.svg');?>" alt="sample-icon" width="128" height="128" data-uk-img>
                        </div>
                        <div>
                            <h3>Integrated support</h3>
                            <p>Quis autem vel eum iure reprehenderit qui in voluptate velit esse quam nihil molestiae consequatur.</p>
                            <a class="uk-button uk-button-text" href="#">Learn more<i class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m uk-margin-medium-top">
                        <div class="uk-card uk-card-default uk-card-body uk-background-contain uk-background-top-left" style="background-image: url(<?php echo $this->CI->theme_asset('img/in-liquid-card-bg.png');?> );" data-uk-img>
                            <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-3@m uk-text-center" data-uk-grid>
                                <div class="uk-width-1-1">
                                    <h4><span>Simple steps to start trade.</span></h4>
                                </div>
                                <div>
                                    <span class="in-icon-wrap circle">1</span>
                                    <p>Register account</p>
                                </div>
                                <div>
                                    <span class="in-icon-wrap circle">2</span>
                                    <p>Fund your account</p>
                                </div>
                                <div>
                                    <span class="in-icon-wrap circle">3</span>
                                    <p>Start your trade</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
           <!-- section content begin -->
        <div class="uk-section uk-section-secondary in-liquid-10">
            <div class="uk-container uk-light">
                <div class="uk-grid-medium uk-child-width-1-4@m uk-flex uk-flex-middle" data-uk-grid>
                    <div>
                        <h2>Trade types</h2>
                        <p class="uk-text-lead">Explore different trade types to trade on your preferred market.</p>
                        <a class="uk-button uk-button-default uk-border-rounded uk-margin-top" href="#">Start trading<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                    </div>
                    <div>
                        <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded ">
                            <img class="uk-margin-small-bottom" src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-icon-16.svg');?> " alt="wave-award" width="72" height="72" data-uk-img>
                            <h3 class="uk-margin-top">ECN</h3>

                            <ul class="uk-list uk-list-bullet ">
                                <li>Min Lot 0,01</li>
                                <li>Max Lot 20</li>
                                <li>Spread Start From 2</li>
                                <li>SWAP</li>
                                <li>Fee Comission</li>
                                <li>Leverage 1:500</li>
                                <li>Minimum PO, TP & SL 30 points</li>
                            </ul>
                            <p><a href="#" class="uk-button uk-button-primary uk-border-rounded">Create Account</a></p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded ">
                            <img class="uk-margin-small-bottom" src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-icon-17.svg');?>" alt="wave-award" width="72" height="72" data-uk-img>
                            <h3 class="uk-margin-top">VIP</h3>
                            <ul class="uk-list uk-list-bullet ">
                                <li>Min Lot 0,01</li>
                                <li>Max Lot 20</li>
                                <li>Spread Start From 2</li>
                                <li>SWAP</li>
                                <li>Fee Comission</li>
                                <li>Leverage 1:500</li>
                                <li>Minimum PO, TP & SL 30 points</li>
                            </ul>
                            <p><a class="uk-button uk-button-default uk-border-rounded uk-margin-top" href="#">Start trading<i class="fas fa-angle-right uk-margin-small-left"></i></a></p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-secondary uk-card-body uk-border-rounded">
                            <img class="uk-margin-small-bottom" src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-icon-18.svg');?>" alt="wave-award" width="72" height="72" data-uk-img>
                            <h3 class="uk-margin-top">Standard</h3>
                            <ul class="uk-list uk-list-bullet">
                                <li>Min Lot 0,01</li>
                                <li>Max Lot 20</li>
                                <li>Spread Start From 2</li>
                                <li>SWAP</li>
                                <li>Fee Comission</li>
                                <li>Leverage 1:500</li>
                                <li>Minimum PO, TP & SL 30 points</li>
                            </ul>
                            <p><a href="#" class="uk-button uk-button-primary uk-border-rounded">Create Account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section uk-section-muted uk-padding-large in-liquid-3 uk-background-contain uk-background-center-center" style="background-image: url(<?php echo $this->CI->theme_asset('img/in-liquid-3-bg.png');?> );" data-uk-img>
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m uk-inline">
                        <div class="uk-grid-large uk-flex uk-flex-middle uk-flex-right" data-uk-grid>
                            <div class="uk-position-top-left">
                                <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-3-mockup.png');?> " alt="sample-images" width="650" height="469" data-uk-img>
                            </div>
                            <div class="uk-width-1-2@m">
                                <span class="uk-label in-liquid-label uk-margin-bottom">Available on multiple platform</span>
                                <h2 class="uk-margin-remove">World class platform<br>trade without a doubt.</h2>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum.</p>
                                <div class="uk-grid-small uk-child-width-1-3 uk-child-width-1-4@m uk-margin-medium-top uk-text-center" data-uk-grid>
                                    <div>
                                        <a class="uk-button-text" href="#">
                                        <i class="fab fa-apple in-icon-wrap"></i>
                                        <p class="uk-text-small"> MacOS</p></a>
                                    </div>
                                    <div>
                                        <a class="uk-button-text" href="#">
                                        <i class="fab fa-windows in-icon-wrap"></i>
                                        <p class="uk-text-small">Windows</p></a>
                                    </div>
                                    <div>
                                        <a class="uk-button-text" href="#">
                                        <i class="fab fa-google-play in-icon-wrap"></i>
                                        <p class="uk-text-small">Android</p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section in-liquid-4">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-middle">
                    <div class="uk-width-1-2@m">
                        <h2>Stay ahead of the curved.</h2>
                    </div>
                    <div class="uk-width-1-2@m uk-visible@m">
                        <a class="uk-button uk-button-text uk-align-right@m" href="#">Show all<i class="fas fa-angle-right uk-margin-small-left"></i></a>
                    </div>
                </div>
                <div class="uk-grid uk-child-width-1-2@s uk-child-width-1-3@m in-blog-4" data-uk-grid>
                    <div class="uk-flex uk-flex-left">
                        <div class="in-liquid-category">
                            <p class="uk-text-small uk-text-uppercase"><span>News</span></p>
                        </div>
                        <div>
                            <article class="uk-article">
                                <h5 class="uk-margin-remove-bottom">
                                    <a href="#">Wall Street cautious on 'frothy' stocks, warn bitcoin bubble</a>
                                </h5>
                                <p class="uk-text-small uk-text-muted uk-margin-top">
                                    By <a href="#">Reuters</a>
                                    <span class="uk-margin-small-left uk-margin-small-right">•</span>
                                    Jan 8, 2021
                                </p>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit ...</p>
                                <a class="uk-button uk-button-text uk-margin-top" href="#">Read more<i class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                            </article>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-left">
                        <div class="in-liquid-category">
                            <p class="uk-text-small uk-text-uppercase"><span>Analysis</span></p>
                        </div>
                        <div>
                            <article class="uk-article">
                                <h5 class="uk-margin-remove-bottom">
                                    <a href="#">Will AUD/USD Hit 0.8000 In The Foreseeable Future?</a>
                                </h5>
                                <p class="uk-text-small uk-text-muted uk-margin-top">
                                    By <a href="#">JFD Team</a>
                                    <span class="uk-margin-small-left uk-margin-small-right">•</span>
                                    Jan 4, 2021
                                </p>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit ...</p>
                                <a class="uk-button uk-button-text uk-margin-top" href="#">Read more<i class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                            </article>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-left uk-visible@m">
                        <div class="in-liquid-category">
                            <p class="uk-text-small uk-text-uppercase"><span>Education</span></p>
                        </div>
                        <div>
                            <article class="uk-article">
                                <h5 class="uk-margin-remove-bottom">
                                    <a href="#">How Can You Use Volatility to Your Advantage</a>
                                </h5>
                                <p class="uk-text-small uk-text-muted uk-margin-top">
                                    By <a href="#">Barry Norman</a>
                                    <span class="uk-margin-small-left uk-margin-small-right">•</span>
                                    Dec 16, 2020
                                </p>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit ...</p>
                                <a class="uk-button uk-button-text uk-margin-top" href="#">Read more<i class="fas fa-long-arrow-alt-right uk-margin-small-left"></i></a>
                            </article>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section uk-section-muted in-liquid-5 uk-background-contain uk-background-top-center in-offset-bottom-40" style="background-image: url(<?php echo $this->CI->theme_asset('img/in-liquid-5-bg.png');?> );">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m">
                        <div class="uk-text-center">
                            <h4>Payment methods.</h4>
                        </div>
                        <div class="uk-grid-collapse uk-child-width-1-2@s uk-child-width-1-6@m uk-text-center uk-margin-medium in-client-logo-6" data-uk-grid>
                            <div class="uk-tile">
                                <img class="uk-margin-remove" src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-payment-1.svg');?> " alt="payment-image" width="167" height="55" data-uk-img>
                            </div>
                            <div class="uk-tile">
                                <img class="uk-margin-remove" src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-payment-2.svg');?>" alt="payment-image" width="167" height="55" data-uk-img>
                            </div>
                            <div class="uk-tile">
                                <img class="uk-margin-remove" src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-payment-3.svg');?>" alt="payment-image" width="167" height="55" data-uk-img>
                            </div>
                            <div class="uk-tile">
                                <img class="uk-margin-remove" src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-payment-4.svg');?>" alt="payment-image" width="167" height="55" data-uk-img>
                            </div>
                            <div class="uk-tile">
                                <img class="uk-margin-remove" src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-payment-5.svg');?>" alt="payment-image" width="167" height="55" data-uk-img>
                            </div>
                            <div class="uk-tile">
                                <img class="uk-margin-remove" src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-liquid-payment-6.svg');?>" alt="payment-image" width="167" height="55" data-uk-img>
                            </div>
                        </div>
                        <div class="uk-text-center uk-text-small in-border-text">
                            <p><span>Don't see a payment methods that works for you?<br class="uk-hidden@m"> We have other options.<br class="uk-hidden@m"> <a class="uk-button uk-button-small uk-button-primary uk-border-rounded uk-margin-left" href="#">More options<i class="fas fa-angle-right uk-margin-small-left"></i></a></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
    </main>




<!-- End Content -->
<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php $this->CI->render_view('footer'); ?>
