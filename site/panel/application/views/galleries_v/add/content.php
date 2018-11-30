<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Galeri Ekle
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("galleries/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Galeri Adı</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Galeri adını giriniz" name="title">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
						<label for="control-demo-6" class="">Galeri Türü</label>
						<div id="control-demo-6" class="">
							<select class="form-control news_type_select" name="gallery_type">
								<option <?php echo (isset($gallery_type) && $gallery_type == "image") ? "selected" : ""; ?> value="image">Resim</option>
								<option <?php echo (isset($gallery_type) && $gallery_type == "video") ? "selected" : ""; ?> value="video">Video</option>
								<option <?php echo (isset($gallery_type) && $gallery_type == "file") ? "selected" : ""; ?> value="file">Dosya</option>
							</select>
						</div>
                    </div><!-- .form-group -->

                    
                    <button type="submit" class="btn btn-outline btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("galleries"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>