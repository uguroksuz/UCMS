<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo $gallery->title; ?> Galerisinie Ait Video Listesi
            <a href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id"); ?>" class="btn btn-sm btn-outline btn-primary pull-right"><i class="fa fa-plus"></i> Yeni Video Ekle</a>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("galleries/new_gallery_video_form/$gallery->id"); ?>">tıklayınız.</a></p>
            </div> 
            <?php } else{ ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>url</th>
                    <th>Görsel</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("galleries/rankGalleryVideoSetter"); ?>">
                    <?php foreach ($items as $item) {?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="text-center"><?php echo $item->id; ?></td>
                            <td><?php echo $item->url; ?></td>
                            <td class="text-center">
                                <iframe width="56" 
                                        height="31" 
                                        src="<?php echo $item->url ?>" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                            </td>
                            <td class="text-center">
                                <input
                                    data-url="<?php echo base_url("galleries/galleryVideoisActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($item->isActive) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center">
                                <button data-url="<?php echo base_url("galleries/galleryVideoDelete/$item->id/$item->gallery_id"); ?>"
                                        class="btn btn-xs btn-outline btn-warning remove-btn">
                                    <i class="fa fa-trash"></i> Sil
                                </button>
                                <a href="<?php echo base_url("galleries/update_gallery_video_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
                            </td>
                        </tr> 
                    <?php } ?>
                    
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>