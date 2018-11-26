  <!-- main-container start -->
      <!-- ================ -->
      <section class="main-container">

        <div class="container">
          <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">

              <!-- page-title start -->
              <!-- ================ -->
              <h1 class="page-title">Marka Listesi</h1>
              <div class="separator-2"></div>
              <!-- page-title end -->
              <p class="lead">Çalıştığımız markaların listesini aşağıda görebilirsiniz.</p>
              <div class="row">
                <?php foreach ($brands as $brand) { ?>
                    <div class="col-sm-4">
                    <div class="image-box shadow text-center mb-20">
                        <div class="overlay-container">
                        <img src="<?php echo base_url("panel/uploads/brands_v/$brand->img_url"); ?>" alt="">
                        <div class="overlay-top">
                            <div class="text">
                            <h3><a href="portfolio-item.html"><?php echo $brand->title; ?></a></h3>
                            </div>
                        </div>
                        <div class="overlay-bottom">
                            
                        </div>
                        </div>
                    </div>
                    </div>
                <?php } ?>
              </div>
              

            </div>
            <!-- main end -->

          </div>
        </div>
      </section>
      <!-- main-container end -->