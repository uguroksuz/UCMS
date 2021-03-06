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
                <form action="<?php echo base_url("courses/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
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
                        <div class="col-md-4">
                            <label for="datetimepicker1">Inline Display</label>
                            <input type="hidden" value="<?php echo $item->event_date; ?>" name="event_date"  id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format: 'YYYY-MM-DD HH:mm:ss' }">
                        </div><!-- END column -->
                        <div class="col-md-1 image_upload_container">
                            <img width="50" src="<?php echo base_url("uploads/{$viewFolder}/$item->img_url"); ?>" alt="<?php echo $item->img_url; ?>">
                        </div>
                        <div class="col-md-7 form-group image_upload_container">
                            <label for="exampleInputFile">Görsel Seçiniz</label>
                            <input type="file" name="img_url" id="exampleInputFile" class="form-control">
                        </div>
                    </div>                   

                    <button type="submit" class="btn btn-outline btn-primary btn-md">Güncelle</button>
                    <a href="<?php echo base_url("courses"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>