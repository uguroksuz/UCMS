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
                                <?php foreach ($product_images as $image ) {?>
                                        <!-- slide 1 start -->
                                    <!-- ================ -->
                                    <li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="<?php echo $product->title; ?>">

                                    <!-- main image -->
                                    <img src="<?php echo base_url("panel/uploads/product_v/$image->img_url"); ?>" alt="<?php echo $product->title; ?>" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">
                                    
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
                        <div class="main col-lg-12">
                        <h1 class="title"><?php echo $product->title; ?></h1>
                        <div class="separator-2"></div>
                        <p>
                            <?php echo $product->description; ?>
                        </p>

                        </div>
                        <!-- main end -->

                    </div>
                    </div>
                </section>
                <!-- main-container end -->

                <!-- section start -->
                <!-- ================ -->
                <section class="section pv-40 clearfix">
                    <div class="container">
                    <h3 class="mt-3">Diğer <strong>Ürünler</strong></h3>
                    <div class="row grid-space-10">
                        <?php foreach ($products as $product) { ?>
                            <div class="col-sm-4">
                                <div class="image-box style-2 mb-20 bordered light-gray-bg">
                                <div class="overlay-container overlay-visible">
                                    <?php 
                                        $image = get_product_cover_image($product->id);
                                        $image = ($image) ? base_url("panel/uploads/product_v/$image") : base_url("assets/images/portfolio-1.jpg");                            
                                    ?>
                                    <img src="<?php echo $image; ?>" alt="<?php echo $product->title; ?>">

                                    <div class="overlay-bottom text-left">
                                    <p class="lead margin-clear"><?php echo $product->title; ?></p>
                                    </div>
                                </div>
                                <div class="body">
                                    <p class="small mb-10 text-muted"><i class="icon-calendar"></i> Dec, 2017 <i class="pl-10 icon-tag-1"></i> Web Design</p>
                                    <p><?php echo character_limiter(strip_tags($product->description), 40); ?></p>
                                    <a href="<?php echo base_url("urun-detay/$product->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Görüntüle <i class="fa fa-arrow-right pl-10"></i></a>
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