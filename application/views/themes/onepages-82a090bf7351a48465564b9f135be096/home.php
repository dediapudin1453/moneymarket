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
<div role="main" class="main" id="home">
    <div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover nav-inside nav-inside-plus nav-dark nav-md nav-font-size-md show-nav-hover mb-0" data-plugin-options="{'autoplayTimeout': 7000}" style="height: 100vh;">
        <div class="owl-stage-outer">
            <div class="owl-stage">
                <?php foreach ($slider as $key => $value) { ?>
                    <div class="owl-item position-relative overlay overlay-show overlay-op-5 pt-5" style="background-image: url(<?php echo content_url(); ?>uploads/<?= $value->picture ?>); background-size: cover; background-position: center;">
                        <div class="container position-relative z-index-3 h-100">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column align-items-center">
                                        <h3 class="position-relative text-center text-color-light text-5 line-height-5 font-weight-medium px-4 mb-2 appear-animation" data-appear-animation="fadeInDownShorterPlus" data-plugin-options="{'minWindowWidth': 0}">
                                            <?= $value->title ?>
                                        </h3>
                                        <h2 class="text-color-light text-center font-weight-extra-bold text-12 mb-3 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}"> <?= $value->subtitle ?></h2>
                                        <?= html_entity_decode($value->content) ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="owl-nav">
            <button type="button" role="presentation" class="owl-prev"></button>
            <button type="button" role="presentation" class="owl-next"></button>
        </div>

        <div class="owl-dots mb-5">
            <?php $no = 0;
            foreach ($slider as $key => $value) { ?>
                <button role="button" class="owl-dot <?php if ($no == 0) { ?> active <?php } ?>"><span></span></button>
            <?php $no++;
            } ?>
        </div>
    </div>

    <section id="whychooseus" class="section section-height-3 bg-primary border-0 m-0 appear-animation" data-appear-animation="fadeIn">
        <div class="container my-3">
            <div class="row mb-5">
                <div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                    <h2 class="font-weight-bold text-color-light mb-2">MKP PROMAX</h2>
                    <p class="text-color-light opacity-7">Kenapa harus menggunakan Robot Trading dari MKP ProMax </p>
                </div>
            </div>
            <div class="row mb-lg-4">
                <div class="col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">
                    <div class="feature-box feature-box-style-2">
                        <div class="feature-box-icon">
                            <img src="https://mkp-promax.com/content/uploads/cuan.png" width="50px">
                        </div>
                        <div class="feature-box-info">
                            <h4 class="font-weight-bold text-color-light text-4 mb-2">ALTERNATIF PENGHASILAN</h4>
                            <p class="text-color-light opacity-7">Anda akan memiliki potensi penghasilan baru tanpa meninggalkan pekerjaan atau bisnis Anda yang sekarang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 appear-animation" data-appear-animation="fadeInUpShorter">
                    <div class="feature-box feature-box-style-2">
                        <div class="feature-box-icon">
                            <img src="https://mkp-promax.com/content/uploads/komisi-afiliasi.png" width="50px">
                        </div>
                        <div class="feature-box-info">
                            <h4 class="font-weight-bold text-color-light text-4 mb-2">KOMISI AFILIASI MENARIK</h4>
                            <p class="text-color-light opacity-7">Rekomdasikan kepada rekan Anda dan dapatkan komisi afiliasi menarik sampai 5 level.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300">
                    <div class="feature-box feature-box-style-2">
                        <div class="feature-box-icon">
                            <img src="https://mkp-promax.com/content/uploads/SUPPORT.png" width="50px">
                        </div>
                        <div class="feature-box-info">
                            <h4 class="font-weight-bold text-color-light text-4 mb-2">SUPPORT SYSTEM & EDUKASI </h4>
                            <p class="text-color-light opacity-7">Kami memberikan support sistem untuk memudahkan Anda menggunakan robot dan memberikan edukasi forex.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="300">
                    <div class="feature-box feature-box-style-2">
                        <div class="feature-box-icon">
                            <i class="icons icon-doc text-color-light"></i>
                        </div>
                        <div class="feature-box-info">
                            <h4 class="font-weight-bold text-color-light text-4 mb-2">REGULASI BROKER RESMI</h4>
                            <p class="text-color-light opacity-7">Robot Trading ProMax terafiliasi dengan broker resmi forex</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 appear-animation" data-appear-animation="fadeInUpShorter">
                    <div class="feature-box feature-box-style-2">
                        <div class="feature-box-icon">
                            <i class="icons icon-user text-color-light"></i>
                        </div>
                        <div class="feature-box-info">
                            <h4 class="font-weight-bold text-color-light text-4 mb-2">LAYANAN CUSTOMER SERVICE</h4>
                            <p class="text-color-light opacity-7">Layanan pelanggan 24/5 yang akan membantu Anda ketika mengalami kesulitan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300">
                    <div class="feature-box feature-box-style-2">
                        <div class="feature-box-icon">
                            <img src="https://mkp-promax.com/content/uploads/dolar.png" width="50px">
                        </div>
                        <div class="feature-box-info">
                            <h4 class="font-weight-bold text-color-light text-4 mb-2">WAKTU TRADING</h4>
                            <p class="text-color-light opacity-7">Waktu trading dengan robot menjadi flexible, Anda tidak harus stanby setiap saat mantau akaun trading Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  <section id="account" class="parallax section section-text-dark section-parallax mt-0 mb-0" data-plugin-parallax data-plugin-options="{'speed': 1.5}" data-image-src="<?php echo base_url(); ?>content/uploads/PARALAX.jpg">
            <div class="row text-center mb-3">
                <div class="col-lg-8 m-auto">
                    <h2 class="custom-bar _center text-color-dark">Account Type</h2>
                    <p>We present a satisfying trading account service and experience for all clients. ATM account type is the best account choice for you</p>
                </div>
            </div>
            <div class="container py-5">
                <div class="pricing-table pricing-table-no-gap">
                    <?php foreach ($product as $key => $value) {
                        if ($value->highlight === 'Y') {
                            $class = "plan-header bg-primary py-4";
                        } else {
                            $class = "plan-header bg-secondary py-4";
                        } ?>
                            <div class="col-md-4">
                                <div class="plan plan-featured">
                                    <div class="<?= $class ?>">
                                        <h3><?= $value->title ?></h3>
                                    </div>
                                    <div class="plan-features">
                                        <ul>
                                            <?php echo html_entity_decode($value->content); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>

                </div>
            </div>
    </section> -->



    <section id="account">
        <div class="container py-5">
            <div class="row text-center mb-3">
                <div class="col-lg-8 m-auto">
                    <h2 class="custom-bar _center text-color-dark">Paket Robot</h2>
                    <p>Kami memberikan pilihan paket robot sesuai kebutuhan Anda</p>
                </div>
            </div>
            <div class="pricing-table mb-4 cekung">
                <?php foreach ($product as $key => $value) { ?>
                    <div class="col-md-6 col-lg-4 ">
                        <div class="plan efekbayangan">
                            <div class="plan-header">
                                <h3><?= $value->title ?></h3>
                            </div>
                            <div class="plan-price ">
                                <label class="price-label">HARGA ROBOT</label>
                                <span class="price"><span class="price-unit">$</span><?= $value->subtitle ?></span>
                            </div>
                            <div class="plan-features">
                                <!-- <ul>
                                    <li>10GB Disk Space</li>
                                    <li>100GB Monthly Bandwith</li>
                                    <li>20 Email Accounts</li>
                                    <li>Unlimited Subdomains</li>
                                </ul> -->
                                <?php echo html_entity_decode($value->content); ?>
                            </div>

                        </div>
                    </div>
                <?php } ?>
                <!-- <div class="col-md-6 col-lg-3">
								<div class="plan">
									<div class="plan-header">
										<h3>Enterprise</h3>
									</div>
									<div class="plan-price">
										<span class="price"><span class="price-unit">$</span>50</span>
										<label class="price-label">MIN DEPOSIT</label>
									</div>
									<div class="plan-features">
										<ul>
											<li>10GB Disk Space</li>
											<li>100GB Monthly Bandwith</li>
											<li>20 Email Accounts</li>
											<li>Unlimited Subdomains</li>
										</ul>
									</div>
									<div class="plan-footer">
										<a href="#" class="btn btn-dark btn-modern btn-outline py-2 px-4">Sign Up</a>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-3">
								<div class="plan">
									<div class="plan-header">
										<h3>Professional</h3>
									</div>
									<div class="plan-price">
										<span class="price"><span class="price-unit">$</span>29</span>
										<label class="price-label">PER MONTH</label>
									</div>
									<div class="plan-features">
										<ul>
											<li>5GB Disk Space</li>
											<li>50GB Monthly Bandwith</li>
											<li>10 Email Accounts</li>
											<li>Unlimited Subdomains</li>
										</ul>
									</div>
									<div class="plan-footer">
										<a href="#" class="btn btn-dark btn-modern btn-outline py-2 px-4">Sign Up</a>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-3">
								<div class="plan">
									<div class="plan-header">
										<h3>Standard</h3>
									</div>
									<div class="plan-price">
										<span class="price"><span class="price-unit">$</span>17</span>
										<label class="price-label">PER MONTH</label>
									</div>
									<div class="plan-features">
										<ul>
											<li>3GB Disk Space</li>
											<li>25GB Monthly Bandwith</li>
											<li>5 Email Accounts</li>
											<li>Unlimited Subdomains</li>
										</ul>
									</div>
									<div class="plan-footer">
										<a href="#" class="btn btn-primary btn-modern py-2 px-4">Sign Up</a>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-3">
								<div class="plan">
									<div class="plan-header">
										<h3>Basic</h3>
									</div>
									<div class="plan-price">
										<span class="price"><span class="price-unit">$</span>9</span>
										<label class="price-label">PER MONTH</label>
									</div>
									<div class="plan-features">
										<ul>
											<li>1GB Disk Space</li>
											<li>10GB Monthly Bandwith</li>
											<li>2 Email Accounts</li>
											<li>Unlimited Subdomains</li>
										</ul>
									</div>
									<div class="plan-footer">
										<a href="#" class="btn btn-dark btn-modern btn-outline py-2 px-4">Sign Up</a>
									</div>
								</div>
							</div> -->
            </div>
        </div>
    </section>



    <section id="platform" class="section section-background section-height-4 overlay overlay-show overlay-op-9 border-0 m-0" style="background-image: url(http://mkp-promax.com/content/uploads/18.png); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="font-weight-bold text-color-light mb-2">Platform Trading</h2>
                    <p class="text-color-light opacity-7">Sebelum menggunakan robot trading kami, pastikan Anda telah mendownload Metatrader 4 sesuai dengan operating sistem yang Anda gunakan.</p>
                    <div class="col-md-12">
                        <p>
                            <a class="btn btn-primary" href="https://play.google.com/store/apps/details?id=net.metaquotes.metatrader4&hl=en&gl=US" role="button"><i class="fab fa-google-play"></i> Android</a>
                            <a class="btn btn-primary" href="https://apps.apple.com/us/app/metatrader-4/id496212596" role="button"><i class="fab fa-apple"></i> IOS</a>
                            <a class="btn btn-primary" href="https://www.metatrader4.com/en/trading-platform" role="button"><i class="fab fa-windows"></i> Windows</a>
                    </div>
                    <img src="http://mkp-promax.com/content/uploads/mockup.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>

</div>
</section>



<section id="hubungikami" class="section bg-primary border-0 m-0">
    <div class="container">
        <div class="row justify-content-center text-center text-lg-left py-4">
            <div class="col-lg-auto appear-animation" data-appear-animation="fadeInRightShorter">
                <div class="feature-box feature-box-style-2 d-block d-lg-flex mb-4 mb-lg-0">
                    <div class="feature-box-icon">
                        <i class="icon-profile icons text-color-light"></i>
                    </div>
                    <div class="feature-box-info pl-1">
                        <h5 class="font-weight-light text-color-light opacity-7 mb-0">CUSTOMER SERVICE</h5>
                        <p class="text-color-light font-weight-semibold mb-0">SENIN - JUM'AT: 09:00am - 17:00pm</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                <div class="feature-box feature-box-style-2 d-block d-lg-flex mb-4 mb-lg-0 px-xl-4 mx-lg-5">
                    <div class="feature-box-icon">
                        <i class="icon-call-out icons text-color-light"></i>
                    </div>
                    <div class="feature-box-info pl-1">
                        <h5 class="font-weight-light text-color-light opacity-7 mb-0">HANDPHONE</h5>
                        <a href="tel:+8001234567" class="text-color-light font-weight-semibold text-decoration-none"><?php echo  $this->CI->settings->website('tlpn') ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-auto appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                <div class="feature-box feature-box-style-2 d-block d-lg-flex">
                    <div class="feature-box-icon">
                        <i class="icon-share icons text-color-light"></i>
                    </div>
                    <div class="feature-box-info pl-1">
                        <h5 class="font-weight-light text-color-light opacity-7 mb-0">IKUTI SOSIAL MEDIA KAMI</h5>
                        <p class="mb-0">
                            <span class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" class="text-color-light font-weight-semibold" title="Facebook"><i class="mr-1 fab fa-facebook-f"></i> FACEBOOK</a></span>
                            <span class="social-icons-twitter pl-3"><a href="http://www.twitter.com/" target="_blank" class="text-color-light font-weight-semibold" title="Twitter"><i class="mr-1 fab fa-twitter"></i> TWITTER</a></span>
                            <span class="social-icons-instagram pl-3"><a href="http://www.linkedin.com/" target="_blank" class="text-color-light font-weight-semibold" title="Linkedin"><i class="mr-1 fab fa-instagram"></i> INSTAGRAM</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- End Content -->
<!-- 
*******************************************************
	Include Footer Template
******************************************************* 
-->
<?php $this->CI->render_view('footer'); ?>