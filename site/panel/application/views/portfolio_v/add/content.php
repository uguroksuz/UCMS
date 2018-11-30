<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Portfolyo Ekle
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("portfolio/save"); ?>" method="post">
                    <div class="row">
                    <div class="form-group col-md-6">
                        <label>Başlık</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Başlık" name="title">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("title"); ?></small>
                        <?php }?>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category_id" class="form-control">
                                <?php foreach ($categories as $category ) { ?>
                                    <option value="<?php echo $category->id ?>"><?php echo $category->title; ?></option>
                                <?php } ?>
                            </select>
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("client"); ?></small>
                            <?php }?>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="datetimepicker1">Bitirme Tarihi</label>
                            <input type="hidden" name="finishedAt"  id="datetimepicker1" data-plugin="datetimepicker" data-options="{ inline: true, viewMode: 'days', format: 'YYYY-MM-DD HH:mm:ss' }">
                        </div><!-- END column -->
                        <div class="col-md-8">                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Müşteri</label>
                                        <input class="form-control" id="exampleInputEmail1" placeholder="İşi yaptığınız müşteri" name="client">
                                        <?php if (isset($form_error)) { ?>
                                            <small class="input-form-error"><?php echo form_error("client"); ?></small>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Yer/Mekan</label>
                                        <input class="form-control" id="exampleInputEmail1" placeholder="İşi yaptığınız yer, mekan bilgisi" name="place">
                                        <?php if (isset($form_error)) { ?>
                                            <small class="input-form-error"><?php echo form_error("place"); ?></small>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Yapılan işin URL'si</label>
                                        <input class="form-control" id="exampleInputEmail1" placeholder="İnternet Bağlantısı" name="portfolio_url">
                                        <?php if (isset($form_error)) { ?>
                                            <small class="input-form-error"><?php echo form_error("portfolio_url"); ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END column -->
                    </div>

                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>


                    <button type="submit" class="btn btn-outline btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("portfolio"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>