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
                <?php if(!empty($files)){?>
                    <table class="table table-hover table-striped table-bordered table-colored bg-purple">
                        <thead>
                            <td>Dosya Adı</td>
                            <td>İndir</td>
                        </thead>
                        <tbody>
                        <?php foreach ($files as $file) {?>                
                            <tr>
                                <td><?php echo $file->url; ?></td>
                                <td style="width: 100px">
                                    <a target="_blank" href="<?php echo base_url("panel/$file->url");?>" class="btn btn-animated btn-sm btn-default">İndir<i class="pl-10 fa fa-download"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } else {?>

                <div class="col-lg-12">
                    <div class="alert alert-warning text-center">
                        ! Herhangi bir veri bulunamadı.
                    </div>
                </div>           

            <?php } ?>
                <div class="col-lg-12">
                    <a href="<?php echo base_url("dosya-galerisi");?>" class="btn btn-default">
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
            
            
            
            



