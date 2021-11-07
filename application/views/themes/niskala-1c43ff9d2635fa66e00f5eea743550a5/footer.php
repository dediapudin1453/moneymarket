<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

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
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy &amp; Policy</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="uk-visible@m">
                        <h4 class="uk-heading-bullet">Support</h4>
                        <ul class="uk-list uk-link-text">
                            <li><a href="#">Documentation</a></li>
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
</body>

</html>