<?php $settings = get_settings(); ?>
<!-- footer top start -->
<!-- ================ -->
<div class="default-bg footer-top border-clear">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="call-to-action text-center">
          <div class="row">
            <div class="col-md-8">
              <h2 class="mt-4">Powerful Bootstrap Template</h2>
            </div>
            <div class="col-md-4">
              <p class="mt-10"><a href="#" class="btn btn-animated btn-lg btn-gray-transparent">Purchase<i class="fa fa-cart-arrow-down pl-20"></i></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- footer top end -->
<!-- footer start (Add "dark" class to #footer in order to enable dark footer) -->
<!-- ================ -->
<footer id="footer" class="clearfix dark">

  <!-- .footer start -->
  <!-- ================ -->
  <div class="footer">
    <div class="container">
      <div class="footer-inner">
        <div class="row">
          <div class="col-lg-3">
            <div class="footer-content">
              <div class="logo-footer"><img id="logo-footer" src="<?php echo base_url("assets/images"); ?>/logo_purple.png" alt=""></div>
              <p><?php echo character_limiter(strip_tags($settings->about_us), 100); ?> <a href="<?php echo base_url("hakkimizda"); ?>"><i class="fa fa-long-arrow-right pl-1"></i></a></p>
              <div class="separator-2"></div>
              <nav>
                <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link" target="_blank" href="http://htmlcoder.me/support">Support</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                  <li class="nav-item"><a class="nav-link" href="page-about.html">About</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-content">
              <h2 class="title">Latest From Blog</h2>
              <div class="separator-2"></div>
              <div class="media margin-clear">
                <div class="d-flex pr-2">
                  <div class="overlay-container">
                    <img class="media-object" src="<?php echo base_url("assets/images"); ?>/blog-thumb-1.jpg" alt="blog-thumb">
                    <a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
                  <p class="small margin-clear"><i class="fa fa-calendar pr-2"></i>Mar 23, 2017</p>
                </div>
              </div>
              <hr>
              <div class="media margin-clear">
                <div class="d-flex pr-2">
                  <div class="overlay-container">
                    <img class="media-object" src="<?php echo base_url("assets/images"); ?>/blog-thumb-2.jpg" alt="blog-thumb">
                    <a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
                  <p class="small margin-clear"><i class="fa fa-calendar pr-2"></i>Mar 22, 2017</p>
                </div>
              </div>
              <hr>
              <div class="media margin-clear">
                <div class="d-flex pr-2">
                  <div class="overlay-container">
                    <img class="media-object" src="<?php echo base_url("assets/images"); ?>/blog-thumb-3.jpg" alt="blog-thumb">
                    <a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
                  <p class="small margin-clear"><i class="fa fa-calendar pr-2"></i>Mar 21, 2017</p>
                </div>
              </div>
              <hr>
              <div class="media margin-clear">
                <div class="d-flex pr-2">
                  <div class="overlay-container">
                    <img class="media-object" src="<?php echo base_url("assets/images"); ?>/blog-thumb-4.jpg" alt="blog-thumb">
                    <a href="blog-post.html" class="overlay-link small"><i class="fa fa-link"></i></a>
                  </div>
                </div>
                <div class="media-body">
                  <h6 class="media-heading"><a href="blog-post.html">Lorem ipsum dolor sit amet...</a></h6>
                  <p class="small margin-clear"><i class="fa fa-calendar pr-2"></i>Mar 21, 2017</p>
                </div>
              </div>
              <div class="text-right space-top">
                <a href="blog-large-image-right-sidebar.html" class="link-dark"><i class="fa fa-plus-circle pl-1 pr-1"></i>More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-content">
              <h2 class="title">Portfolio Gallery</h2>
              <div class="separator-2"></div>
              <div class="row grid-space-10">
                <div class="col-4 col-lg-6">
                  <div class="overlay-container mb-10">
                    <img src="<?php echo base_url("assets/images"); ?>/gallery-1.jpg" alt="">
                    <a href="portfolio-item.html" class="overlay-link small">
                      <i class="fa fa-link"></i>
                    </a>
                  </div>
                </div>
                <div class="col-4 col-lg-6">
                  <div class="overlay-container mb-10">
                    <img src="<?php echo base_url("assets/images"); ?>/gallery-2.jpg" alt="">
                    <a href="portfolio-item.html" class="overlay-link small">
                      <i class="fa fa-link"></i>
                    </a>
                  </div>
                </div>
                <div class="col-4 col-lg-6">
                  <div class="overlay-container mb-10">
                    <img src="<?php echo base_url("assets/images"); ?>/gallery-3.jpg" alt="">
                    <a href="portfolio-item.html" class="overlay-link small">
                      <i class="fa fa-link"></i>
                    </a>
                  </div>
                </div>
                <div class="col-4 col-lg-6">
                  <div class="overlay-container mb-10">
                    <img src="<?php echo base_url("assets/images"); ?>/gallery-4.jpg" alt="">
                    <a href="portfolio-item.html" class="overlay-link small">
                      <i class="fa fa-link"></i>
                    </a>
                  </div>
                </div>
                <div class="col-4 col-lg-6">
                  <div class="overlay-container mb-10">
                    <img src="<?php echo base_url("assets/images"); ?>/gallery-5.jpg" alt="">
                    <a href="portfolio-item.html" class="overlay-link small">
                      <i class="fa fa-link"></i>
                    </a>
                  </div>
                </div>
                <div class="col-4 col-lg-6">
                  <div class="overlay-container mb-10">
                    <img src="<?php echo base_url("assets/images"); ?>/gallery-6.jpg" alt="">
                    <a href="portfolio-item.html" class="overlay-link small">
                      <i class="fa fa-link"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="text-right space-top">
                <a href="portfolio-grid-2-3-col.html" class="link-dark"><i class="fa fa-plus-circle pl-1 pr-1"></i>More</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="footer-content">
              <h2 class="title">İletişime Geçin</h2>
              <div class="separator-2"></div>
              <p><?php echo $settings->slogan; ?></p>
              <ul class="social-links circle animated-effect-1">
                <?php if($settings->facebook){ ?>
                  <li class="facebook"><a target="_blank" href="<?php echo $settings->facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                  <?php if($settings->twitter){ ?>
                <li class="twitter"><a target="_blank" href="<?php echo $settings->twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if($settings->instagram){ ?>
                  <li class="instagram"><a target="_blank" href="<?php echo $settings->instagram; ?>"><i class="fa fa-instagram"></i></a></li>
                <?php } ?>
                <?php if($settings->linkedin){ ?>
                  <li class="linkedin"><a target="_blank" href="<?php echo $settings->linkedin; ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php } ?>

              </ul>
              <div class="separator-2"></div>
              <ul class="list-icons">
                <li><i class="fa fa-map-marker pr-2 text-default"></i><?php echo $settings->address; ?></li>
                <li><i class="fa fa-phone pr-2 text-default"></i> <?php echo $settings->phone_1; ?></li>
                <li><a href="mailto:<?php echo $settings->email; ?>"><i class="fa fa-envelope-o pr-2"></i><?php echo $settings->email; ?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .footer end -->

  <!-- .subfooter start -->
  <!-- ================ -->
  <div class="subfooter">
    <div class="container">
      <div class="subfooter-inner">
        <div class="row">
          <div class="col-md-12">
            <p class="text-center">Copyright © <?php echo date("Y"); ?> Bu Proje <a target="_blank" href="#"><?php echo $settings->company_name; ?></a>. Aittir</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .subfooter end -->

</footer>
<!-- footer end -->
