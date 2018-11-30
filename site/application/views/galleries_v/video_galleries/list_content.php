<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">Video Galerileri</h1>
                <div class="separator-2"></div>
                <!-- page-title end -->

                <div class="row">
                    <?php foreach ($galleries as $gallery) {?>
                        <div class="col-sm-4">
                            <div class="image-box shadow text-center mb-20">
                                <div class="overlay-container overlay-visible">
                                <img src="<?php echo base_url("assets/images"); ?>/portfolio-4.jpg" alt="">
                                <a href="<?php echo base_url("video-galerisi/$gallery->url"); ?>" class="overlay-link"><i class="fa fa-link"></i></a>
                                <div class="overlay-bottom hidden-xs">
                                    <div class="text">
                                    <p class="lead margin-clear"><?php echo $gallery->title; ?></p>
                                    </div>
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
