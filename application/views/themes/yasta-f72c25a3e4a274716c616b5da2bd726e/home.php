<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
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
    <div class="uk-section uk-padding-remove-vertical">
        <div class="in-slideshow" data-uk-slideshow>
            <ul class="uk-slideshow-items uk-light">
                <?php foreach ($slider as $key => $value) { ?>
                    <li>
                        <div class="uk-position-cover">
                            <img src="img/in-lazy.gif" data-src="<?php echo (site_url()); ?>content/uploads/<?= $value->picture ?>" alt="slideshow-image" data-uk-cover width="1450" height="550" data-uk-img>
                        </div>
                        <span></span>
                        <div class="uk-container">
                            <div class="uk-grid" data-uk-grid>
                                <div class="uk-width-3-5@m">
                                    <div class="uk-overlay">
                                        <h1><?= $value->title ?> <?= $value->subtitle ?> </h1>
                                        <p class="uk-text-lead uk-visible@m"><?= htmlspecialchars_decode($value->content); ?></p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
            <div class="uk-container uk-light">
                <ul class="uk-slideshow-nav uk-dotnav uk-position-bottom-center"></ul>
            </div>
        </div>
    </div>
    <!-- section content begin -->
    <div class="uk-section uk-section-primary uk-section-xsmall" style="background: #047230;">
        <div class="uk-container in-wave-1">
            <div class="uk-grid uk-grid-divider uk-child-width-1-2@s uk-child-width-1-4@m in-margin-top@s in-margin-bottom@s" data-uk-grid>
                <div>
                    <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                        <div class="uk-width-auto">
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-wave-icon-1.svg'); ?>" alt="wave-icon" width="48" height="48" data-uk-img>
                        </div>
                        <div class="uk-width-expand">
                            <p>Free<br>analysis tools</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                        <div class="uk-width-auto">
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-wave-icon-2.svg'); ?>" alt="wave-icon" width="48" height="48" data-uk-img>
                        </div>
                        <div class="uk-width-expand">
                            <p>Fast execution<br>0 commision</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                        <div class="uk-width-auto">
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-wave-icon-3.svg'); ?>" alt="wave-icon" width="48" height="48" data-uk-img>
                        </div>
                        <div class="uk-width-expand">
                            <p>Low minimum<br>deposit of $100</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                        <div class="uk-width-auto">
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-wave-icon-4.svg'); ?>" alt="wave-icon" width="48" height="48" data-uk-img>
                        </div>
                        <div class="uk-width-expand">
                            <p>Over 2,100<br>assets to trade</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section uk-section-muted uk-section-xsmall">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <!-- <div data-uk-slider="autoplay: true; autoplay-interval: 5000">
                        <ul class="uk-grid-divider uk-child-width-1-3@s uk-child-width-1-5@m uk-slider-items" data-uk-grid>
                            <li>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-1-1 uk-text-center">
                                        <h5>XAU/USD</h5>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Bid</p>
                                        <span class="uk-label uk-text-small uk-label-success uk-border-pill">1730.69</span>
                                    </div>
                                    <div class="uk-width-1-2 uk-text-right">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Ask</p>
                                        <span class="uk-label uk-text-small uk-label-danger uk-border-pill">1731.44</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-1-1 uk-text-center">
                                        <h5>GBP/USD</h5>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Bid</p>
                                        <span class="uk-label uk-text-small uk-label-danger uk-border-pill">1.2382</span>
                                    </div>
                                    <div class="uk-width-1-2 uk-text-right">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Ask</p>
                                        <span class="uk-label uk-text-small uk-label-danger uk-border-pill">1.2383</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-1-1 uk-text-center">
                                        <h5>EUR/USD</h5>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Bid</p>
                                        <span class="uk-label uk-text-small uk-label-danger uk-border-pill">1.1240</span>
                                    </div>
                                    <div class="uk-width-1-2 uk-text-right">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Ask</p>
                                        <span class="uk-label uk-text-small uk-label-success uk-border-pill">1.1245</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-1-1 uk-text-center">
                                        <h5>USD/JPY</h5>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Bid</p>
                                        <span class="uk-label uk-text-small uk-label-success uk-border-pill">106.915</span>
                                    </div>
                                    <div class="uk-width-1-2 uk-text-right">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Ask</p>
                                        <span class="uk-label uk-text-small uk-label-success uk-border-pill">106.924</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-1-1 uk-text-center">
                                        <h5>USD/CAD</h5>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Bid</p>
                                        <span class="uk-label uk-text-small uk-label-danger uk-border-pill">1.3591</span>
                                    </div>
                                    <div class="uk-width-1-2 uk-text-right">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Ask</p>
                                        <span class="uk-label uk-text-small uk-label-success uk-border-pill">1.3593</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-1-1 uk-text-center">
                                        <h5>USD/CHF</h5>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Bid</p>
                                        <span class="uk-label uk-text-small uk-label-danger uk-border-pill">0.9506</span>
                                    </div>
                                    <div class="uk-width-1-2 uk-text-right">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Ask</p>
                                        <span class="uk-label uk-text-small uk-label-success uk-border-pill">0.9508</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-1-1 uk-text-center">
                                        <h5>AUD/USD</h5>
                                    </div>
                                    <div class="uk-width-1-2">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Bid</p>
                                        <span class="uk-label uk-text-small uk-label-success uk-border-pill">0.6868</span>
                                    </div>
                                    <div class="uk-width-1-2 uk-text-right">
                                        <p class="uk-text-small uk-text-uppercase uk-margin-remove">Ask</p>
                                        <span class="uk-label uk-text-small uk-label-danger uk-border-pill">0.6869</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Quotes</span></a> by TradingView</div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
                            {
                                "symbols": [{
                                        "proName": "FOREXCOM:SPXUSD",
                                        "title": "S&P 500"
                                    },
                                    {
                                        "proName": "FOREXCOM:NSXUSD",
                                        "title": "Nasdaq 100"
                                    },
                                    {
                                        "proName": "FX_IDC:EURUSD",
                                        "title": "EUR/USD"
                                    },
                                    {
                                        "proName": "BITSTAMP:BTCUSD",
                                        "title": "BTC/USD"
                                    },
                                    {
                                        "proName": "BITSTAMP:ETHUSD",
                                        "title": "ETH/USD"
                                    }
                                ],
                                "colorTheme": "light",
                                "isTransparent": true,
                                "showSymbolLogo": true,
                                "locale": "in"
                            }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section uk-padding-large in-wave-12 in-offset-bottom-70">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-3-4@m">
                    <h1 class="uk-margin-remove-bottom">Why traders <span class="in-highlight">choose</span> Money Market International</h1>
                </div>
            </div>
            <div class="uk-grid-large uk-child-width-1-2@s uk-child-width-1-4@m uk-margin-large-top" data-uk-grid>
                <div>
                    <div class="in-wave-12-counter">
                        <h1 class="uk-heading-medium uk-margin-remove">
                            <span class="count" data-counter-end="3">0</span>
                            <span class="in-wave-12-small">years</span>
                        </h1>
                        <h4 class="uk-margin-top uk-margin-remove-bottom">Experience</h4>
                        <p class="uk-text-muted uk-margin-remove-top">Since 2018</p>
                    </div>
                </div>
                <div>
                    <div class="in-wave-12-counter">
                        <h1 class="uk-heading-medium uk-margin-remove">
                            <span class="count" data-counter-end="3">0</span>
                            <span class="in-wave-12-small">years</span>
                        </h1>
                        <h4 class="uk-margin-top uk-margin-remove-bottom">Regulated</h4>
                        <p class="uk-text-muted uk-margin-remove-top">Since 2018</p>
                    </div>
                </div>
                <div>
                    <div class="in-wave-12-counter">
                        <h1 class="uk-heading-medium uk-margin-remove">
                            <span class="count" data-counter-end="18">0</span>
                            <span class="in-wave-12-small">K</span>
                        </h1>
                        <h4 class="uk-margin-top uk-margin-remove-bottom">Order per day</h4>
                        <p class="uk-text-muted uk-margin-remove-top">Fast execution</p>
                    </div>
                </div>
                <div>
                    <div class="in-wave-12-counter">
                        <h1 class="uk-heading-medium uk-margin-remove">
                            <span class="count" data-counter-end="24">0</span>
                            <span class="in-wave-12-small">/5</span>
                        </h1>
                        <h4 class="uk-margin-top uk-margin-remove-bottom">Customer support</h4>
                        <p class="uk-text-muted uk-margin-remove-top">Account manager</p>
                    </div>
                </div>
            </div>
            <div class="uk-grid uk-flex uk-flex-center uk-background-contain uk-background-top-center in-testimoni-wrap uk-background-image@m" style="background-image: url(<?php echo $this->CI->theme_asset('img/in-wave-testibg.jpg'); ?> );">
                <div class="uk-width-3-4@m">
                    <div class="uk-flex uk-flex-middle" data-uk-grid>
                        <div class="uk-width-1-1 uk-width-auto@m uk-flex-last uk-flex-first@m">
                            <img class="uk-align-center uk-margin-remove-bottom" src="<?php echo $this->CI->theme_asset('img/in-testimoni-1.png'); ?> " alt="client-testimoni" width="300">
                        </div>
                        <div class="uk-width-1-1 uk-width-expand@m">
                            <blockquote>
                                <p class="uk-margin-bottom uk-text-large">It surpassed my expectations. Trading on the platform is excellent and it allows for making accurate graphical analyses of the market.</p>
                                <footer>Steven Torres<br><cite class="uk-label uk-text-small uk-border-pill">Customer since 2019</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- start account trading-->
    <!-- <div class="uk-section uk-padding-large">
        <div class="uk-width-1-1 uk-text-center">
            <h1 class="uk-margin-medium-bottom"><span class="in-highlight">Complete</span> package for every traders</h1>
        </div>
        <div class="uk-container in-wave-4">
            <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
                <div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium">
                            <p class="uk-text-small uk-text-uppercase">Minimum funding<span class="uk-label uk-border-pill uk-text-small uk-margin-small-left">USD 200</span></p>
                            <h2 class="uk-margin-top uk-margin-remove-bottom">Classic account</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Benefit from industry-leading entry prices</p>
                            <hr>
                            <ul class="uk-list uk-list-bullet">
                                <li>One of the established industry leaders</li>
                                <li>Three decades of trading know-how</li>
                                <li>Award-winning customer service*</li>
                                <li>Highly-regarded trader education*</li>
                                <li>Advanced risk management</li>
                                <li>Tax-free spread betting profits</li>
                                <li>Low minimum deposit</li>
                            </ul>
                            <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium">
                            <p class="uk-text-small uk-text-uppercase">Minimum funding<span class="uk-label uk-border-pill uk-text-small uk-margin-small-left">USD 200</span></p>
                            <h2 class="uk-margin-top uk-margin-remove-bottom">Classic account</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Benefit from industry-leading entry prices</p>
                            <hr>
                            <ul class="uk-list uk-list-bullet">
                                <li>One of the established industry leaders</li>
                                <li>Three decades of trading know-how</li>
                                <li>Award-winning customer service*</li>
                                <li>Highly-regarded trader education*</li>
                                <li>Advanced risk management</li>
                                <li>Tax-free spread betting profits</li>
                                <li>Low minimum deposit</li>
                            </ul>
                            <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium">
                            <p class="uk-text-small uk-text-uppercase">Minimum funding<span class="uk-label uk-border-pill uk-text-small uk-margin-small-left">USD 200</span></p>
                            <h2 class="uk-margin-top uk-margin-remove-bottom">Classic account</h2>
                            <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Benefit from industry-leading entry prices</p>
                            <hr>
                            <ul class="uk-list uk-list-bullet">
                                <li>One of the established industry leaders</li>
                                <li>Three decades of trading know-how</li>
                                <li>Award-winning customer service*</li>
                                <li>Highly-regarded trader education*</li>
                                <li>Advanced risk management</li>
                                <li>Tax-free spread betting profits</li>
                                <li>Low minimum deposit</li>
                            </ul>
                            <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- end account trading-->
    <!-- section 2 account trading begin -->
    <div class="uk-section uk-padding-large">
        <div class="uk-container in-wave-4">
            <div class="uk-grid uk-flex uk-flex-center">
                <div class="uk-width-1-1 uk-text-center">
                    <h1 class="uk-margin-medium-bottom"><span class="in-highlight">Complete</span> package for every traders</h1>
                </div>
                <div class="uk-width-3-4@m">
                    <div class="uk-grid-collapse  uk-child-width-1-2@m in-wave-pricing" data-uk-grid>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium">
                                <p class="uk-text-small uk-text-uppercase">Minimum funding<span class="uk-label uk-border-pill uk-text-small uk-margin-small-left">USD 100</span></p>
                                <h2 class="uk-margin-top uk-margin-remove-bottom">Classic account</h2>
                                <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Benefit from industry-leading entry prices</p>
                                <hr>
                                <ul class="uk-list uk-list-bullet">
                                    <li>One of the established industry leaders</li>
                                    <li>Three decades of trading know-how</li>
                                    <li>Award-winning customer service*</li>
                                    <li>Highly-regarded trader education*</li>
                                    <li>Advanced risk management</li>
                                    <li>Tax-free spread betting profits</li>
                                    <li>Low minimum deposit</li>
                                </ul>
                                <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                            </div>
                        </div>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large">
                                <p class="uk-text-small uk-text-uppercase">Minimum funding<span class="uk-label uk-border-pill uk-text-small uk-margin-small-left">USD 500</span></p>
                                <h2 class="uk-margin-top uk-margin-remove-bottom">Platinum account</h2>
                                <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Receive even tighter spreads and commissions</p>
                                <hr>
                                <ul class="uk-list uk-list-bullet">
                                    <li>Award-winning trading platform*</li>
                                    <li>Wide range of charting tools</li>
                                    <li>Fast, automated excecution</li>
                                    <li>Expert news & analysis</li>
                                    <li>Competitive spreads</li>
                                    <li>Advanced trading tools</li>
                                    <li>Tax-free spread betting profits</li>
                                </ul>
                                <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-align-center">Open an account<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- <div class="uk-width-1-1">
                    <div class="uk-grid-medium uk-child-width-1-2@s uk-child-width-1-5@m uk-text-center uk-margin-large-top" data-uk-grid>
                        <div>
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/icon01.jpg'); ?>" alt="wave-award" width="71" height="58" data-uk-img>
                            <h6 class="uk-margin-small-top uk-margin-remove-bottom">REGISTERED</h6>
                            <p class="uk-text-small uk-margin-remove-top">St. Vincent Regulated </p>
                        </div>
                        <div>
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/icon02.jpg'); ?>" alt="wave-award" width="71" height="58" data-uk-img>
                            <h6 class="uk-margin-small-top uk-margin-remove-bottom">SEGREGATED FUNDS</h6>
                            <p class="uk-text-small uk-margin-remove-top">Safety your funds</p>
                        </div>
                        <div>
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/icon03.jpg'); ?>" alt="wave-award" width="71" height="58" data-uk-img>
                            <h6 class="uk-margin-small-top uk-margin-remove-bottom">QUICK WITHDRAWALS</h6>
                            <p class="uk-text-small uk-margin-remove-top">Same day transfer</p>
                        </div>
                        <div>
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/icon06.jpg'); ?>" alt="wave-award" width="71" height="58" data-uk-img>
                            <h6 class="uk-margin-small-top uk-margin-remove-bottom">ACCOUNT MANAGER</h6>
                            <p class="uk-text-small uk-margin-remove-top">Supported dedicated account</p>
                        </div>
                        <div class="uk-visible@m">
                            <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/icon05.jpg'); ?>" alt="wave-award" width="71" height="58" data-uk-img>
                            <h6 class="uk-margin-small-top uk-margin-remove-bottom">ULTRA FAST EXECUTION</h6>
                            <p class="uk-text-small uk-margin-remove-top">No delay connection</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- section 2 account trading end -->
    <!-- section content begin -->
    <div class="uk-section uk-section-muted uk-padding-large">
        <div class="uk-container in-wave-13">
            <div class="uk-grid-large uk-position-relative" data-uk-grid>
                <div class="uk-position-bottom-right in-wave-mockup">
                    <img src="<?php echo $this->CI->theme_asset('img/in-wave-mockup-3.png'); ?> " alt="linggafx-platform" width="860" height="530">
                </div>
                <div class="uk-width-1-2@m">
                    <h1 class="uk-text-primary uk-margin-remove">Metatrader 4:</h1>
                    <h2 class="uk-margin-remove-top uk-margin-medium-bottom">Your trusted trading platfrom for any trade conditions</h2>
                    <a href="#" class="uk-button uk-button-secondary uk-border-rounded in-button-app">
                        <i class="fab fa-google-play fa-2x"></i>
                        <span class="wrapper">Download from<span>Play Store</span></span>
                    </a>
                    <!-- <a href="#" class="uk-button uk-button-secondary uk-border-rounded in-button-app uk-margin-small-left in-margin-remove-left@s">
                        <i class="fab fa-apple fa-2x"></i>
                        <span class="wrapper">Download from<span>App Store</span></span>
                    </a> -->
                    <a href="https://download.mql5.com/cdn/web/20007/mt4/moneymarketintl4setup.exe" class="uk-button uk-button-secondary uk-border-rounded uk-visible@m in-button-app uk-margin-small-left">
                        <i class="fab fa-windows fa-2x"></i>
                        <span class="wrapper">Download for<span>Windows</span></span>
                    </a>
                    <div class="uk-child-width-1-3@m uk-margin-medium-top" data-uk-grid>
                        <div>
                            <img class="uk-margin-remove-bottom" src="<?php echo $this->CI->theme_asset('img/in-wave-icon-11.svg'); ?>" alt="wave-icon" width="42">
                            <h4 class="uk-margin-top">Daily analysis</h4>
                            <p>Get it now free analysis money market everyday.</p>
                        </div>
                        <div>
                            <img class="uk-margin-remove-bottom" src="<?php echo $this->CI->theme_asset('img/in-wave-icon-12.svg'); ?>" alt="wave-icon" width="42">
                            <h4 class="uk-margin-top">$100 deposit</h4>
                            <p>Start deposit from $100.</p>
                        </div>
                        <div>
                            <img class="uk-margin-remove-bottom" src="<?php echo $this->CI->theme_asset('img/in-wave-icon-13.svg'); ?>" alt="wave-icon" width="42">
                            <h4 class="uk-margin-top">Low spread</h4>
                            <p>We provide very low spread.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
    <!-- section content begin -->
    <div class="uk-section uk-padding-large">
        <div class="uk-container in-wave-14">
            <div class="uk-grid">
                <div class="uk-width-3-5@m">
                    <h1 class="uk-margin-remove-bottom">Explore all <span class="in-highlight">forex scanner</span></h1>
                    <p class="uk-text-lead uk-text-muted">Invest in cash products, trade with leveraged products or let the experts manage your money.</p>
                </div>
                <div class="uk-width-1-1@m">
                    <div class="uk-grid uk-grid-small uk-child-width-1-2@s uk-child-width-1-4@m uk-margin-medium-top in-wave-14-products" data-uk-grid>
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
                    </div>
                    <div class="uk-grid uk-flex uk-flex-center uk-margin-large-top">
                        <div class="uk-width-3-5@m">
                            <div class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded uk-box-shadow-small in-wave-14-card">
                                <span class="uk-label uk-text-small uk-text-uppercase uk-border-pill uk-margin-small-right">EXPLORE</span>
                                MONEYMARKET has been providing online trading services to clients since 2018 and it currently serves 173 countries worldwide. <a href="#">Learn more</a>
                            </div>
                            <div class="uk-grid-collapse uk-grid-divider uk-child-width-1-3@m uk-text-center uk-margin-top uk-margin-small-bottom" data-uk-grid>
                                <div>
                                    <i class="fas fa-headset fa-lg uk-margin-small-right uk-text-primary"></i>
                                    <p class="uk-margin-remove uk-text-small uk-text-uppercase">Award-winning support</p>
                                </div>
                                <div>
                                    <i class="fas fa-university fa-lg uk-margin-small-right uk-text-primary"></i>
                                    <p class="uk-margin-remove uk-text-small uk-text-uppercase">Regulated</p>
                                </div>
                                <div>
                                    <i class="fas fa-history fa-lg uk-margin-small-right uk-text-primary"></i>
                                    <p class="uk-margin-remove uk-text-small uk-text-uppercase">3 years experience</p>
                                </div>
                            </div>
                        </div>
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