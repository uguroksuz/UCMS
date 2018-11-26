      <!-- banner start -->
      <!-- ================ -->
      <div class="banner dark-translucent-bg" style="background-image:url('images/page-about-banner-1.jpg'); background-position: 50% 27%;">
        <div class="container">
          <div class="row justify-content-lg-center">
            <div class="col-lg-8 text-center pv-20">
              <h3 class="title logo-font object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"> "<span class="text-default">Hakkımızda</span>" </h3>
              <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
              <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><?php echo character_limiter(strip_tags($settings->about_us), 200); ?> <p>
            </div>
          </div>
        </div>
      </div>
      <!-- banner end -->

      <!-- main-container start -->
      <!-- ================ -->
      <section class="main-container padding-bottom-clear">

        <div class="container">
          <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">
              <h3 class="title">Bizim <strong>Hakkımzda</strong></h3>
              <div class="separator-2"></div>
              <div class="row">
                <div class="col-lg-6">
                  <p><?php echo $settings->about_us; ?> <p>

                </div>
                <div class="col-lg-6">
                  <div class="owl-carousel content-slider-with-controls">
                    <div class="overlay-container overlay-visible">
                      <img src="<?php echo base_url("assets/images"); ?>/page-about-1.jpg" alt="">
                      <div class="overlay-bottom hidden-sm-down">
                        <div class="text">
                          <h3 class="title">We Can Do It</h3>
                        </div>
                      </div>
                      <a href="images/page-about-1.jpg" class="owl-carousel--popup-img overlay-link" title="image title"><i class="icon-plus-1"></i></a>
                    </div>
                    <div class="overlay-container overlay-visible">
                      <img src="<?php echo base_url("assets/images"); ?>/page-about-2.jpg" alt="">
                      <div class="overlay-bottom hidden-sm-down">
                        <div class="text">
                          <h3 class="title">You Can Trust Us</h3>
                        </div>
                      </div>
                      <a href="images/page-about-2.jpg" class="owl-carousel--popup-img overlay-link" title="image title"><i class="icon-plus-1"></i></a>
                    </div>
                    <div class="overlay-container overlay-visible">
                      <img src="<?php echo base_url("assets/images"); ?>/page-about-3.jpg" alt="">
                      <div class="overlay-bottom hidden-sm-down">
                        <div class="text">
                          <h3 class="title">We Love What We Do</h3>
                        </div>
                      </div>
                      <a href="images/page-about-3.jpg" class="owl-carousel--popup-img overlay-link" title="image title"><i class="icon-plus-1"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- main end -->

          </div>
        </div>

        <!-- section start -->
        <!-- ================ -->
        <div class="section">
          <div class="container">
            <h3 class="mt-4">Neden <strong>Bizi Seçmelisiniz</strong></h3>
            <div class="separator-2"></div>
            <div class="row">
              <!-- accordion start -->
              <!-- ================ -->
              <div class="col-lg-6">
                <div id="accordion" class="collapse-style-1" role="tablist" aria-multiselectable="true">
                  <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <i class="fa fa-rocket pr-10"></i>Misyonumuz
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                      <div class="card-block">
                        <?php echo strip_tags($settings->mission); ?>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="true" aria-controls="collapseTwo">
                          <i class="fa fa-leaf pr-10"></i>Vizyonumuz
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="card-block">
                        <?php echo strip_tags($settings->mission); ?>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- accordion end -->
              <!-- progress bars start -->
              <!-- ================ -->
              <div class="col-lg-6">
                <div class="progress mt-20 style-1">
                  <span class="text"></span>
                  <div class="progress-bar progress-bar-default" data-animate-width="90%">
                    <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">CSS</span>
                  </div>
                </div>
                <div class="progress style-1">
                  <span class="text"></span>
                  <div class="progress-bar progress-bar-default" data-animate-width="95%">
                    <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">HTML5</span>
                  </div>
                </div>
                <div class="progress style-1">
                  <span class="text"></span>
                  <div class="progress-bar progress-bar-default" data-animate-width="80%">
                    <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">JQUERY</span>
                  </div>
                </div>
                <div class="progress style-1">
                  <span class="text"></span>
                  <div class="progress-bar progress-bar-default" data-animate-width="85%">
                    <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">PHP</span>
                  </div>
                </div>
                <div class="progress style-1">
                  <span class="text"></span>
                  <div class="progress-bar progress-bar-default" data-animate-width="75%">
                    <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">PHOTOSHOP</span>
                  </div>
                </div>
                <div class="progress style-1">
                  <span class="text"></span>
                  <div class="progress-bar progress-bar-default" data-animate-width="90%">
                    <span class="label object-non-visible" data-animation-effect="fadeInLeftSmall" data-effect-delay="1000">DRUPAL</span>
                  </div>
                </div>
              </div>
              <!-- progress bars end -->
            </div>
            <!-- clients start -->
            <!-- ================ -->
            <div class="separator"></div>
            <div class="clients-container">
              <div class="clients">
                <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
                  <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-1.png" alt=""></a>
                </div>
                <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="200">
                  <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-2.png" alt=""></a>
                </div>
                <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
                  <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-3.png" alt=""></a>
                </div>
                <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="400">
                  <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-4.png" alt=""></a>
                </div>
                <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="500">
                  <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-5.png" alt=""></a>
                </div>
                <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="600">
                  <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-6.png" alt=""></a>
                </div>
                <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="700">
                  <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-7.png" alt=""></a>
                </div>
                <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="800">
                  <a href="#"><img src="<?php echo base_url("assets/images"); ?>/client-8.png" alt=""></a>
                </div>
              </div>
            </div>
            <!-- clients end -->
          </div>
        </div>
        <!-- section end -->

      </section>
      <!-- main-container end -->
