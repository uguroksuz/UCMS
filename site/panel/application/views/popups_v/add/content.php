<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Popup Ekle
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("popups/save"); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label>Hedef Sayfa</label>
                      <select name="page" class="form-control">
                        <?php foreach (get_page_list() as $page => $value) {?>
                            <option value="<?php echo $page;?>"><?php echo $value;?></option>
                        <?php }?>
                            <option value="1"></option>
                      </select>
                    </div>

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
                    
                    <button type="submit" class="btn btn-outline btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("popups"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>