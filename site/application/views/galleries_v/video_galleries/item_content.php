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
                if(!empty($videos)){
                foreach ($videos as $video) {?>                
                    <div class="col-3">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $video->url; ?>"></iframe>
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
                    <a href="<?php echo base_url("video-galerisi");?>" class="btn btn-default">
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
            
            
            
            



