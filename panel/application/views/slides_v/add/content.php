<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Slayt Ekle
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("slides/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Başlık" name="title">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>

                     <div class="form-group image_upload_container">
                        <label for="exampleInputFile">Görsel Seçiniz</label>
                        <input type="file" name="img_url" id="exampleInputFile" class="form-control">
                    </div>
                    
                    <div class="form-group image_upload_container">
                       <label for="exampleInputFile">Buton Kullanımı</label> <br>
                       <input   class="button_usage_btn"
                                type="checkbox"
                                name="allowButton"
                                data-switchery>
                   </div>

                   <div class="button-information-container">
                        <div class="form-group">
                            <label>Buton Başlık</label>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Buton üzerindeki yazı" name="button_caption">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("button_caption"); ?></small>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <label>Url Bilgisi</label>
                            <input class="form-control" id="exampleInputEmail1" placeholder="Url Bilgisi" name="button_url">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("button_url"); ?></small>
                            <?php }?>
                        </div>
                   </div>

                    <button type="submit" class="btn btn-outline btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("slides"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>