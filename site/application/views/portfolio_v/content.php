<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- banner start -->
                <!-- ================ -->
                <div class="pv-40 banner light-gray-bg">
                    <div class="container clearfix">

                    <!-- slideshow start -->
                    <!-- ================ -->
                    <div class="slideshow">

                        <!-- slider revolution start -->
                        <!-- ================ -->
                        <div class="slider-revolution-5-container">
                        <div id="slider-banner-boxedwidth" class="slider-banner-boxedwidth rev_slider" data-version="5.0">
                            <ul class="slides">
                                <?php foreach ($portfolio_images as $image ) {?>
                                        <!-- slide 1 start -->
                                    <!-- ================ -->
                                    <li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="<?php echo $portfolio->title; ?>">

                                    <!-- main image -->
                                    <img src="<?php echo base_url("panel/uploads/portfolio_v/$image->img_url"); ?>" alt="<?php echo $portfolio->title; ?>" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">
                                    
                                    </li>
                                    <!-- slide 1 end -->
                                <?php } ?>
                               
                            </ul>
                            <div class="tp-bannertimer"></div>
                        </div>
                        </div>
                        <!-- slider revolution end -->

                    </div>
                    <!-- slideshow end -->

                    </div>
                </div>
                <!-- banner end -->

                <!-- main-container start -->
                <!-- ================ -->
                <section class="main-container padding-ver-clear">
                    <div class="container pv-40">
                    <div class="row">

                        <!-- main start -->
                        <!-- ================ -->
                        <div class="main col-lg-8">
                            <h1 class="title"><?php echo $portfolio->title; ?></h1>
                            <div class="separator-2"></div>
                            <p>
                                <?php echo $portfolio->description; ?>
                            </p>
                        </div>
                        <!-- main end -->
                        <!-- sidebar start -->
                        <!-- ================ -->
                        <aside class="col-lg-4 col-xl-3 ml-xl-auto">
                            <div class="sidebar">
                                <div class="block clearfix">
                                <h3 class="title">Portfolyo Detayları</h3>
                                <div class="separator-2"></div>
                                <ul class="list margin-clear">
                                    <li><strong>Müşteri: </strong> <span class="text-right"><?php echo $portfolio->client; ?></span></li>
                                    <li><strong>Tarih: </strong> <span class="text-right"><?php echo get_readable_date($portfolio->finishedAt); ?></span></li>
                                    <li><strong>Kategori: </strong> <span class="text-right"><?php echo get_portfolio_category_title($portfolio->category_id); ?></span></li>
                                    <li><strong>Yer/Mekan: </strong> <span class="text-right"><?php echo $portfolio->place; ?></span></li>
                                    <li><strong>URL: </strong> <span class="text-right"><a href="<?php echo $portfolio->portfolio_url; ?>"><?php echo $portfolio->portfolio_url; ?></a></span></li>
                                </ul>
                                <!-- <a href="#" class="btn btn-animated btn-default btn-lg">External Link <i class="fa fa-external-link"></i></a>
                                <h3 class="mt-4">Share This</h3>
                                <div class="separator-2"></div>
                                <ul class="social-links colored circle small">
                                    <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                    <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                    <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                    <li class="linkedin"><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                                    <li class="xing"><a target="_blank" href="http://www.xing.com"><i class="fa fa-xing"></i></a></li>
                                </ul> -->
                                </div>
                            </div>
                        </aside>
                        <!-- sidebar end -->

                    </div>
                    </div>
                </section>
                <!-- main-container end -->

                <!-- section start -->
                <!-- ================ -->
                <section class="section pv-40 clearfix">
                    <div class="container">
                    <h3 class="mt-3">Diğer <strong>Çalışmalarımız</strong></h3>
                    <div class="row grid-space-10">
                        <?php foreach ($portfolios as $portfolio) { ?>
                            <div class="col-sm-4">
                                <div class="image-box style-2 mb-20 bordered light-gray-bg">
                                <div class="overlay-container overlay-visible">
                                    <?php 
                                        $image = get_portfolio_cover_image($portfolio->id);
                                        $image = ($image) ? base_url("panel/uploads/portfolio_v/$image") : base_url("assets/images/portfolio-1.jpg");                            
                                    ?>
                                    <img src="<?php echo $image; ?>" alt="<?php echo $portfolio->title; ?>">

                                    <div class="overlay-bottom text-left">
                                    <p class="lead margin-clear"><?php echo $portfolio->title; ?></p>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="small mb-10 text-muted"><i class="icon-calendar"></i> Dec, 2017 <i class="pl-10 icon-tag-1"></i> Web Design</p>
                                    <p><?php echo character_limiter(strip_tags($portfolio->description), 40); ?></p>
                                    <a href="<?php echo base_url("urun-detay/$portfolio->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Görüntüle <i class="fa fa-arrow-right pl-10"></i></a>
                                </div>
                                </div>
                            </div> 
                        <?php } ?>
                    </div>
                    </div>
                </section>
                <!-- section end -->
            </div>
        </div>
    </div>
</div>