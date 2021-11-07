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
            <div class="in-slideshow uk-visible-toggle" data-uk-slideshow>
                <ul class="uk-slideshow-items">
                     <?php foreach ($slider as $key => $value) { ?> 
                    <li>
                        <div class="uk-container">
                            <div class="uk-grid" data-uk-grid>
                                <div class="uk-width-1-2@m">
                                    <div class="uk-overlay">
                                        <h1><span class="in-highlight"><?= $value->title ?></span> <?= $value->subtitle ?></h1>
                                        <p class="uk-text-lead uk-visible@m"><?= htmlspecialchars_decode($value->content); ?></p>
                                    </div>
                                </div>
                                <div class="uk-position-center">
                                    <img class="uk-animation-slide-top-small" src="img/in-lazy.svg" data-src="<?php echo(site_url()); ?>content/uploads/<?= $value->picture ?>" alt="slideshow-image" width="862" height="540" data-uk-img>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                    
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-previous data-uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" data-uk-slidenav-next data-uk-slideshow-item="next"></a>
                <div class="uk-container in-slideshow-feature uk-visible@m">
                    <div class="uk-grid uk-flex uk-flex-center">
                        <div class="uk-width-3-4@m">
                            <div class="uk-child-width-1-4" data-uk-grid>
                                <div class="uk-flex uk-flex-middle">
                                    <div class="uk-margin-small-right">
                                        <i class="fas fa-drafting-compass in-icon-wrap small circle uk-box-shadow-small"></i>
                                    </div>
                                    <div>
                                        <p class="uk-text-bold uk-margin-remove">Enhanced Tools</p>
                                    </div>
                                </div>
                                <div class="uk-flex uk-flex-middle">
                                    <div class="uk-margin-small-right">
                                        <i class="fas fa-book in-icon-wrap small circle uk-box-shadow-small"></i>
                                    </div>
                                    <div>
                                        <p class="uk-text-bold uk-margin-remove">Trading Guides</p>
                                    </div>
                                </div>
                                <div class="uk-flex uk-flex-middle">
                                    <div class="uk-margin-small-right">
                                        <i class="fas fa-bolt in-icon-wrap small circle uk-box-shadow-small"></i>
                                    </div>
                                    <div>
                                        <p class="uk-text-bold uk-margin-remove">Fast execution</p>
                                    </div>
                                </div>
                                <div class="uk-flex uk-flex-middle">
                                    <div class="uk-margin-small-right">
                                        <i class="fas fa-percentage in-icon-wrap small circle uk-box-shadow-small"></i>
                                    </div>
                                    <div>
                                        <p class="uk-text-bold uk-margin-remove">0% Commission</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slideshow content end -->
         <!-- section content begin -->
        <div class="uk-section uk-section-muted uk-padding-large in-padding-large-vertical@s in-profit-15">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center" data-uk-grid>
                    <div class="uk-width-1-1 uk-width-5-6@m">
                        <p class="uk-text-lead uk-margin-remove-bottom uk-text-center in-offset-top-10">Start trading with LinggaFX Company.</p>
                        <h2 class="uk-margin-small-top uk-text-center">Fast account opening in 3 simple steps</h2>
                        <div class="uk-grid-large uk-child-width-1-3@m uk-text-center uk-margin-medium-top" data-uk-grid>
                            <?php foreach ($step_regist as $key => $value) { ?>
                                <div>
                                    <span class="in-icon-wrap circle large"><?= $value['title'] ?></span>
                                    <h4 class="uk-margin-top"><?= $value['subtitle'] ?></h4>
                                    <?= html_entity_decode($value['information']) ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section uk-padding-large in-padding-large-vertical@s in-profit-13">
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center" data-uk-grid>
                    <div class="uk-width-5-6@m uk-text-center in-margin-top-20@s">
                        <p class="uk-text-lead uk-margin-remove-bottom">Trade with confidence</p>
                        <h2 class="uk-margin-small-top">Complete package for every traders</h2>
                    </div>
                </div>
                <div class="uk-child-width-1-3@s uk-child-width-1-3@m uk-margin-medium-top uk-margin-bottom" data-uk-grid>
                    <?php foreach ($product as $p) { ?>
                    <div>
                        <div class="in-pricing-1">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header">
                                    <h3 class="uk-margin-remove-bottom"><?php echo $p->title;?> </h3>
                                    <p class="uk-text-muted uk-margin-remove-top"><!-- <?php echo $p->subtitle;?> --></p>
                                </div>
                                <div class="uk-card-body uk-background-contain uk-background-bottom-right" data-src="<?php echo(site_url()); ?>content/uploads/<?= $p->picture ?>" data-uk-img>
                                    <?php echo htmlspecialchars_decode($p->content); ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                     <?php } ?>
                    <!-- <div>
                        <div class="in-pricing-1">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header">
                                    <h3 class="uk-margin-remove-bottom">ECN account</h3>
                                    <p class="uk-text-muted uk-margin-remove-top">Receive even tighter spreads and commissions</p>
                                </div>
                                <div class="uk-card-body uk-background-contain uk-background-bottom-right" data-src="img/in-section-profit-13b.png" data-uk-img>
                                    <ul class="uk-list uk-list-bullet uk-margin-bottom">
                                        <li>Wide range of charting tools</li>
                                        <li>Fast, automated excecution</li>
                                        <li>Competitive spreads</li>
                                        <li>Tax-free spread betting profits</li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-secondary uk-border-rounded uk-margin-small-top">Open an account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="in-pricing-1">
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-header">
                                    <h3 class="uk-margin-remove-bottom">VIP account</h3>
                                    <p class="uk-text-muted uk-margin-remove-top">Receive even tighter spreads and commissions</p>
                                </div>
                                <div class="uk-card-body uk-background-contain uk-background-bottom-right" data-src="img/in-section-profit-13b.png" data-uk-img>
                                    <ul class="uk-list uk-list-bullet uk-margin-bottom">
                                        <li>Wide range of charting tools</li>
                                        <li>Fast, automated excecution</li>
                                        <li>Competitive spreads</li>
                                        <li>Tax-free spread betting profits</li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-secondary uk-border-rounded uk-margin-small-top">Open an account</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="uk-grid uk-flex uk-flex-center" data-uk-grid>
                    <div class="uk-width-5-6@m">
                        <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-3@m" data-uk-grid>
                            <div class="uk-flex uk-flex-center">
                                <div class="uk-margin-small-right">
                                    <i class="fas fa-drafting-compass fa-2x in-icon-wrap small transparent"></i>
                                </div>
                                <div>
                                    <p class="uk-text-bold">Enhanced Tools</p>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-center">
                                <div class="uk-margin-small-right">
                                    <i class="fas fa-book fa-2x in-icon-wrap small transparent"></i>
                                </div>
                                <div>
                                    <p class="uk-text-bold">Trading Guides</p>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-center">
                                <div class="uk-margin-small-right">
                                    <i class="fas fa-bolt fa-2x in-icon-wrap small transparent"></i>
                                </div>
                                <div>
                                    <p class="uk-text-bold">Fast execution</p>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-center">
                                <div class="uk-margin-small-right">
                                    <i class="fas fa-percentage fa-2x in-icon-wrap small transparent"></i>
                                </div>
                                <div>
                                    <p class="uk-text-bold">0% Commission</p>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-center">
                                <div class="uk-margin-small-right">
                                    <i class="fas fa-university fa-2x in-icon-wrap small transparent"></i>
                                </div>
                                <div>
                                    <p class="uk-text-bold">Globally licensed</p>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-center">
                                <div class="uk-margin-small-right">
                                    <i class="fas fa-shield-alt fa-2x in-icon-wrap small transparent"></i>
                                </div>
                                <div>
                                    <p class="uk-text-bold">Fund security‏</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
                <!-- section content begin -->
        <div class="uk-section uk-section-secondary uk-padding-large uk-background-contain uk-background-bottom-center in-padding-large-vertical@s in-profit-3" data-src="<?php echo $this->CI->theme_asset('img/in-section-profit-3.png');?> " data-uk-img>
            <div class="uk-container uk-margin-small-bottom">
                <div class="uk-grid-large" data-uk-grid>
                    <div class="uk-width-1-2@m">
                        <h2>We are committed to meeting your CFD and FX trading needs</h2>
                        <p class="uk-text-lead">Excepteur occaeca cupidata non proident fugiat nulla pariatur quasi architecto beatae, sunt in culpa quila officia deserunt mollit anim id est aute laborum.</p>
                    </div>
                    <div class="tradingview-widget-container">
                      <div class="tradingview-widget-container__widget"></div>
                      <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                      {
                      "width": 1100,
                      "height": 512,
                      "defaultColumn": "overview",
                      "defaultScreen": "general",
                      "market": "forex",
                      "showToolbar": true,
                      "colorTheme": "light",
                      "locale": "en"
                    }
                      </script>
                    </div>
                    <div class="uk-width-1-1">
                        <div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-margin-small-top" data-uk-grid>
                            <div>
                                <h1 class="uk-heading-bullet">
                                    <span class="count" data-counter-end="250">0</span>M+
                                </h1>
                                <p>Lorem ipsum dolor sit odin amet consectetur adipisicing elit.</p>
                            </div>
                            <div>
                                <h1 class="uk-heading-bullet">
                                    <span class="count" data-counter-end="90">0</span>%
                                </h1>
                                <p>Lorem ipsum dolor sit odin amet consectetur adipisicing elit.</p>
                            </div>
                            <div>
                                <h1 class="uk-heading-bullet">
                                    <span class="count" data-counter-end="131">0</span>M+
                                </h1>
                                <p>Lorem ipsum dolor sit odin amet consectetur adipisicing elit.</p>
                            </div>
                            <div>
                                <h1 class="uk-heading-bullet">
                                    <span class="count" data-counter-end="35">0</span>M+
                                </h1>
                                <p>Lorem ipsum dolor sit odin amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
       
        <!-- section content begin -->
        <div class="uk-section uk-padding-large in-padding-large-vertical@s uk-background-contain in-profit-2" data-src="img/in-profit-decor-3.svg" data-uk-img>
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-1@m uk-text-center">
                        <h2>Experience more than Trading.</h2>
                        <p class="uk-text-lead">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse nihil molestiae consequatu vel illum qui dolorem.</p>
                        <i class="fas fa-chevron-down uk-text-primary"></i>
                    </div>
                    <div class="uk-width-5-6@m">
                        <div class="uk-child-width-1-2@s uk-child-width-1-2@m uk-margin-medium-top" data-uk-grid>
                            <div>
                                <div class="in-pricing-1">
                                    <div class="uk-card uk-card-default uk-box-shadow-medium">
                                        <div class="uk-card-media-top">
                                            <img class="uk-width-1-1 uk-align-center" src="img/in-lazy.svg" data-src="<?php echo $this->CI->theme_asset('img/in-profit-content-1.jpg');?>" data-width data-height alt="sample-image" data-uk-img>
                                            <span></span>
                                        </div>
                                        <div class="uk-card-body">
                                            <div class="in-heading-extra in-card-decor-1">
                                                <h2 class="uk-margin-remove-bottom">Economic</h2>
                                                <p class="uk-text-lead">Analysis</p>
                                            </div>
                                            <p class="uk-margin-small-top">Stay ahead of the markets with world-leading market analysis through daily webinars by industry experts.</p>
                                            <div class="uk-margin-medium-top">
                                                <a class="uk-button uk-button-link uk-text-uppercase uk-text-small" href="#">Read analysis<i class="fas fa-caret-square-right uk-margin-small-left"></i></a>
                                                <span class="uk-label uk-border-pill uk-align-right">Weekly Update</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="in-pricing-1">
                                    <div class="uk-card uk-card-default uk-box-shadow-medium">
                                        <div class="uk-card-media-top">
                                            <img class="uk-width-1-1 uk-align-center" src="img/in-lazy.svg" data-src="<?php echo $this->CI->theme_asset('img/in-profit-content-2.jpg');?>" data-width data-height alt="sample-image" data-uk-img>
                                            <span></span>
                                        </div>
                                        <div class="uk-card-body">
                                            <div class="in-heading-extra in-card-decor-2">
                                                <h2 class="uk-margin-remove-bottom">Technical</h2>
                                                <p class="uk-text-lead">Analysis</p>
                                            </div>
                                            <p class="uk-margin-small-top">Access the financial markets with an account catered to your needs and benefit from good conditions.</p>
                                            <div class="uk-margin-medium-top">
                                                <a class="uk-button uk-button-link uk-text-uppercase uk-text-small" href="#">Read analysis<i class="fas fa-caret-square-right uk-margin-small-left"></i></a>
                                                <span class="uk-label uk-border-pill uk-align-right">Daily Update</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1">
                                <div class="uk-card uk-card-default uk-card-body in-profit-appcard">
                                    <div class="uk-child-width-1-2@m" data-uk-grid>
                                        <div>
                                            <div data-uk-margin>
                                                <a href="#" class="uk-button in-button-app uk-margin-small-right">
                                                    <i class="fab fa-google-play fa-2x"></i>
                                                    <span class="wrapper">Download from<span>Play Store</span></span>
                                                </a>
                                                <a href="#" class="uk-button in-button-app">
                                                    <i class="fab fa-apple fa-2x"></i>
                                                    <span class="wrapper">Download from<span>App Store</span></span>
                                                </a>
                                            </div>
                                            <hr>
                                            <p>Trade on <span class="uk-text-bold uk-text-primary">world class platform</span> without a doubt.</p>
                                        </div>
                                        <div class="uk-visible@m">
                                            <img src="img/in-lazy.svg" data-src="<?php echo $this->CI->theme_asset('img/in-profit-mockup-1.png');?>  "width="450" height="203" alt="profit-mockup" data-uk-img>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-1-1">
                                <div class="uk-grid uk-grid-divider uk-grid-match in-profit-tradestatus" data-uk-grid>
                                    <div class="uk-width-1-1 uk-width-auto@m">
                                        <div class="uk-flex uk-flex-left uk-flex-center@m">
                                            <div class="uk-grid uk-grid-small uk-flex-middle">
                                                <div class="uk-width-auto">
                                                    <i class="fas fa-chart-line fa-2x in-icon-wrap circle primary-color"></i>
                                                </div>
                                                <div class="uk-width-expand">
                                                    <h1 class="uk-margin-remove-bottom">324,978,126</h1>
                                                    <p class="uk-text-uppercase uk-text-primary uk-text-small uk-margin-remove-top">Trades Opened at Profit</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-1-1 uk-width-expand@m uk-flex-middle">
                                        <p class="uk-text-lead">Trade & Invest in Stocks, Currencies, Indices, and Commodities (CFDs).</p>
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
        <div class="uk-section uk-section-secondary uk-padding-large in-padding-large-vertical@s uk-background-contain uk-background-bottom-center in-profit-11" data-src="img/in-section-profit-11.png" data-uk-img>
            <div class="uk-container">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-5-6@m">
                        <div class="uk-grid" data-uk-grid>
                            <div class="uk-width-1-2@m">
                                <span class="uk-label uk-text-small uk-text-uppercase uk-border-pill uk-margin-small-bottom">Announcing</span>
                                <h2 class="uk-margin-small-top"><span class="uk-heading-small">$5</span> online stocks, currencies &amp; commodities trades</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt labore dolore magna aliqua.</p>
                                <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-margin-top">Learn more</a>
                            </div>
                            <div class="uk-width-1-2@m">
                                <div class="uk-card uk-card-primary uk-border-rounded ">
                                    <div class="uk-card-body">
                                        <h3 class="uk-margin-bottom">Ready to trade? Start here.</h3>
                                        <form action="home" method="POST" class="uk-grid-small" data-uk-grid>
                                            <div class="uk-width-1-1">
                                                <input class="uk-input uk-border-rounded" name="name" type="text" placeholder="Fullname">
                                            </div>
                                            <div class="uk-width-1-1">
                                                <input class="uk-input uk-border-rounded" name="username" type="text" placeholder="Username" minlength="6">
                                            </div>
                                            <div class="uk-width-1-1">
                                                <input class="uk-input uk-border-rounded" name="phone" type="number" placeholder="Phone Number">
                                            </div>
                                            <div class="uk-width-1-1">
                                                <input class="uk-input uk-border-rounded" name="email" type="email" placeholder="Email Address">
                                            </div>
                                            <div class="uk-width-1-1">
                                                <input class="uk-input uk-border-rounded" name="password" type="password" placeholder="Password" minlength="6">
                                            </div>
                                            <div class="uk-width-1-1">
                                                <input class="uk-input uk-border-rounded" name="password2" value="" type="password" placeholder="Retype Password">
                                            </div>
                                            <div class="uk-width-1-1 uk-margin-small uk-width-auto uk-text-small">
                                                <label><input class="uk-checkbox uk-border-rounded" type="checkbox" required>  I declare that I have carefully read, fully understood and accept the <a href=""> Client Aggrement</a> </label>
                                            </div>
                                            <div class="uk-width-1-1 uk-margin-small uk-width-auto uk-text-small">
                                                <label><input class="uk-checkbox uk-border-rounded" type="checkbox" required> I agree to receive promotions, newsletters and marketing communications.  </label>
                                            </div>
                                            <?= $this->session->userdata('nama_referral') ?>
                                            <div class="uk-margin-small uk-width-1-1">
                                                <button class="uk-button uk-width-1-1 uk-button-primary uk-border-rounded uk-float-left" type="submit" name="submit">Sign up</button>
                                            </div>
                                            <span id="translations-customerssay">Registration takes only 40 seconds!</span>
                                        </form>
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
        <div class="uk-section uk-padding-large in-padding-large-vertical@s in-profit-4">
            <div class="uk-container uk-margin-small-top uk-margin-medium-bottom">
                <div class="uk-grid uk-flex uk-flex-center " data-uk-grid>
                    <div class="uk-width-5-6@m">
                        <div class="uk-grid uk-flex-middle" data-uk-grid>
                            <div class="uk-width-expand@m">
                                <h2>Connect to global capital markets</h2>
                            </div>
                            <div class="uk-width-3-5@m">
                                <p class="uk-text-lead">Earn income potencial and professional asset management on award-winning platforms.</p>
                            </div>
                        </div>
                    </div>
                    

                    <div class="uk-width-5-6@m">
                        <div class="uk-grid-large uk-flex-middle" data-uk-grid>
                            <div class="uk-width-auto@m">
                                <h4 class="uk-margin-remove-bottom uk-text-primary">Ready to join Partnership?</h4>
                                <p class="uk-margin-remove-top">Get rebate and pasif income potencial.</p>
                            </div>
                            <div class="uk-width-expand@m">
                                <a href="#" class="uk-button uk-button-primary uk-border-rounded">Join partnership now</a>
                                <a href="#" class="uk-button uk-button-default uk-border-rounded uk-margin-small-left">Discover our platform</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <div class="uk-section in-offset-bottom-40 in-profit-trustpilot">
            <div class="uk-container">
                <div class="uk-grid" data-uk-grid>
                    <div class="uk-width-1-1">
                        <div class="trustpilot-widget" data-locale="en-GB" data-template-id="5406e65db0d04a09e042d5fc" data-businessunit-id="561d886b0000ff0005844fd6" data-style-height="28px" data-style-width="100%" data-theme="light">
                            <a href="https://uk.trustpilot.com/review/pepperstone.com" target="_blank" rel="noopener noreferrer">Trustpilot</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>




<!-- End Content -->
<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php $this->CI->render_view('footer'); ?>
