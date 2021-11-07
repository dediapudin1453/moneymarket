<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<footer>
    <!-- footer content begin -->
    <div class="uk-section uk-section-muted uk-padding-large uk-padding-remove-horizontal uk-margin-medium-top">
        <div class="uk-container">
            <div class="uk-grid-medium" data-uk-grid>
                <div class="uk-width-expand@m">
                    <img class="uk-margin-small-right in-margin-top-30@s" src="img/in-lazy.gif" data-src="img/in-logo-2.svg" alt="wave" width="134" height="23" data-uk-img>
                    <p class="uk-text-large uk-margin-small-top"><?php echo $this->settings->website('web_name'); ?></p>
                    <p class="uk-visible@m"><?php echo htmlspecialchars_decode($this->CI->settings->website('address')); ?><br>
                        <?php echo $this->CI->settings->website('web_email'); ?>
                    </p>
                </div>
                <div class="uk-width-3-5@m">
                    <div class="uk-child-width-1-3@s uk-child-width-1-3@m" data-uk-grid>
                        <div>
                            <h4><span>Markets</span></h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="#">Forex</a></li>
                                <li><a href="#">Synthetic indices</a></li>
                                <li><a href="#">Stock indices</a></li>
                                <li><a href="#">Commodities</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4><span>Resources</span></h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="#">Help Centre</a></li>
                                <li><a href="#">Payment methods</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4><span>Legal Company</span></h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="#">Rules Terms and Conditions</a></li>
                                <li><a href="#">Privacy & Policy</a></li>
                                <li><a href="#">Client Aggrement</a></li>
                                <li><a href="#">Partnership Aggrement</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-large-top in-offset-bottom-20">
                    <h6><i class="fas fa-exclamation-triangle fa-sm uk-text-danger uk-margin-small-right"></i>Risk disclaimer </h6>
                    <p class="uk-text-small">Berfore trading, you should ensure that you’ve undergone sufficient preparation and fully understand the risks involved in margin trading.</p>
                    <hr>
                    <!-- <div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
                        <div class="uk-width-1-2@m">
                            <div class="uk-grid-small uk-flex uk-child-width-1-4@s uk-flex uk-child-width-1-5@m in-payment-method uk-text-center" data-uk-grid>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-wave-visa.svg'); ?> " alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-wave-mastercard.svg'); ?> " alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-wave-skrill.svg'); ?>" alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body">
                                        <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-wave-paypal.svg'); ?>" alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                                <div>
                                    <div class="uk-card uk-card-default uk-card-small uk-card-body uk-visible@m">
                                        <img src="img/in-lazy.gif" data-src="<?php echo $this->CI->theme_asset('img/in-wave-neteller.svg'); ?>" alt="wave-payment" width="59" height="22" data-uk-img>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-2@m uk-text-right@m">
                            <div class="in-footer-socials in-margin-bottom-40@s">
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-facebook-square"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="uk-section uk-section-secondary uk-padding-remove-vertical">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-3-4@m uk-visible@m">
                    <ul class="uk-subnav uk-subnav-divider">
                        <li><a href="#">Legal documents</a></li>
                        <li><a href="#">Important information</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Public relations</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                <div class="uk-width-expand@m uk-text-right@m">
                    <p>© <?php echo date('Y'); ?> <?php echo $this->settings->website('web_name'); ?> Inc.</p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- footer content end -->
    <!-- module totop begin -->
    <div class="uk-visible@m">
        <a href="#" class="in-totop fas fa-chevron-up" data-uk-scroll></a>
    </div>
    <!-- module totop begin -->
</footer>

<!-- Javascript -->
<script src="<?php echo $this->CI->theme_asset('js/vendors/uikit.min.js'); ?> "></script>
<script src="<?php echo $this->CI->theme_asset('js/vendors/indonez.min.js'); ?> "></script>
<!--  <script src="https://widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" defer></script> -->
<script src="<?php echo $this->CI->theme_asset('js/config-theme.js'); ?> "></script>
</body>

</html>