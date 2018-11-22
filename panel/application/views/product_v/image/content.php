<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form   action="<?php echo base_url("product/image_upload/$item->id"); ?>"
                        data-url="<?php echo base_url("product/refresh_image_list/$item->id"); ?>"
                        class="dropzone" 
                        id="dropzone" 
                        data-plugin="dropzone" 
                        data-options="{ url: '<?php echo base_url("product/image_upload/$item->id"); ?>'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">Resim Ekle</h3>
                        <p class="m-b-lg text-muted">(Yüklemek istediğiniz resimleri buraya sürükleyiniz. Yada buraya tıklayınız.)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <strong><?php echo $item->title; ?></strong> ürününe ait resimler.
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body image_list_container">
                
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_elements/image_list_v"); ?>

            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>