<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("product/image_upload/$item->id"); ?>" class="dropzone" id="dropzone" data-plugin="dropzone" data-options="{ url: '<?php echo base_url("product/image_upload/$item->id"); ?>'}">
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
            <div class="widget-body">
                <?php if (empty($item_images)) { ?>
                <div class="alert alert-info text-center">
                    <p>Herhangi bir resim bulunmamaktadır.</p>
                </div> 
                <?php } else{ ?> 
                <table class="table table-bordered table-striped tabel-hover pictures-list">
                    <thead>
                        <th class="w100 text-center">#id</th>
                        <th class="w100 text-center">Görsel</th>
                        <th>Resim Adı</th>
                        <th class="w100 text-center">Durumu</th>
                        <th class="w100 text-center">İşlem</th>
                    </thead>
                    <tbody>
                        <?php foreach ($item_images as $image) {?>
                        <tr>
                            <td class="w100 text-center"><?php echo $image->id; ?></td>
                            <td class="w100 text-center">
                                <img width="50" src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url"); ?>" alt="<?php echo $image->img_url; ?>" class="img-responsive">
                            </td>
                            <td><?php echo $image->img_url; ?></td>
                            <td class="w100 text-center">
                            <input
                                    data-url="<?php echo base_url("product/isActiveSetter"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($image->id) ? "checked" : "" ?> />
                            </td>
                            <td class="w100 text-center">
                                <button data-url="<?php echo base_url("product"); ?>" class="btn btn-sm btn-outline btn-block btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                            </td>
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
                <?php } ?>

            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>