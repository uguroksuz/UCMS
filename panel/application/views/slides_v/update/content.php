<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo $item->title . "düzenleniyor." ; ?> 
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("slides/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Başlık" name="title"  value="<?php echo $item->title; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                        <?php echo $item->description; ?>
                        </textarea>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-1 image_upload_container">
                            <img width="50" src="<?php echo get_picture($viewFolder, $item->img_url, "1920x650");?>" alt="<?php echo $item->img_url; ?>">
                        </div>
                        <div class="col-md-9 form-group image_upload_container">
                            <label for="exampleInputFile">Görsel Seçiniz</label>
                            <input type="file" name="img_url" id="exampleInputFile" class="form-control">
                        </div>
                    </div> 

                    <div class="form-group">
                       <label for="exampleInputFile">Buton Kullanımı</label> <br>
                       <input   class="button_usage_btn"
                                type="checkbox"
                                name="allowButton"
                                <?php echo ($item->allowButton) ? "checked" : ""; ?>
                                data-switchery>
                   </div>   

                    <div class="button-information-container" style="display: <?php echo ($item->allowButton) ? "block" : "none"; ?>">
                        <div class="form-group">
                            <label>Buton Başlık</label>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Buton üzerindeki yazı" name="button_caption" value="<?php echo $item->button_caption; ?>">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("button_caption"); ?></small>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label>Url Bilgisi</label>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Url Bilgisi" name="button_url" value="<?php echo $item->button_url; ?>">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("button_url"); ?></small>
                            <?php }?>
                        </div>
                   </div>     

                    <button type="submit" class="btn btn-outline btn-primary btn-md">Güncelle</button>
                    <a href="<?php echo base_url("slides"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>