<!-- main-container start -->
<!-- ================ -->
<section class="main-container">

    <div class="container">
        <div class="row">

        <!-- main start -->
        <!-- ================ -->
        <div class="main col-lg-12">

            <!-- page-title start -->
            <!-- ================ -->
            <h1 class="page-title"><?php echo $gallery->title; ?></h1>
            <div class="separator-2"></div>
            <!-- page-title end -->

            <div class="row grid-space-20">
                <?php 
                if(!empty($images)){
                foreach ($images as $imgae) {?>                
                    <div class="col-3">
                    <div class="overlay-container">
                        <img src="<?php echo base_url("assets/images"); ?>/portfolio-1.jpg" alt="">
                        <a href="<?php echo base_url("assets/images"); ?>/portfolio-1.jpg" class="overlay-link small popup-img" title="<?php echo $gallery->title; ?>">
                        <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    </div>
                <?php } 
            } else {?>

                <div class="col-lg-12">
                    <div class="alert alert-warning text-center">
                        ! Herhangi bir veri bulunamadı.
                    </div>
                </div>           

            <?php } ?>
                <div class="col-lg-12">
                    <a href="<?php echo base_url("fotograf-galerisi");?>" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Geri Dön
                    </a>
                </div> 
            </div>

        </div>
        <!-- main end -->            

        </div>
    </div>
</section>
<!-- main-container end -->
            
            
            
            



