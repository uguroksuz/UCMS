<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Ziyaretçi Notu Ekle
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("testimonials/save"); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>İsim Soyisim</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Ad Soyad" name="full_name">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("full_name"); ?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Şirket</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Şirket Adı" name="company">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("company"); ?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Başlık" name="title">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Ziyaretçi Mesajı</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("description"); ?></small>
                        <?php }?>
                    </div>

                     <div class="form-group image_upload_container">
                        <label for="exampleInputFile">Görsel Seçiniz</label>
                        <input type="file" name="img_url" id="exampleInputFile" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-outline btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("testimonials"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>