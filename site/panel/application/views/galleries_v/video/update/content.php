<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "Video kaydı düzenleniyor." ; ?> 
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("galleries/gallery_video_update/$item->id/$item->gallery_id"); ?>" method="post" enctype="multipart/form-data">               

                   <div class="form-group" >
                        <label>Video Url</label>
                        <input class="form-control" id="exampleInputEmail1" value="<?php echo $item->url; ?>" placeholder="Video bağlantısını buraya yapıştırınız." name="url">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("url"); ?></small>
                        <?php }?>
                    </div>

                    <button type="submit" class="btn btn-outline btn-primary btn-md">Güncelle</button>
                    <a href="<?php echo base_url("galleries/gallery_video_list/$item->gallery_id"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>