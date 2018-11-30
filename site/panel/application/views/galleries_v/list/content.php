<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Galeri Listesi
            <a href="<?php echo base_url("galleries/new_form"); ?>" class="btn btn-sm btn-outline btn-primary pull-right"><i class="fa fa-plus"></i> Yeni Galeri Ekle</a>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("galleries/new_form"); ?>">tıklayınız.</a></p>
            </div> 
            <?php } else{ ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>Galeri Adı</th>
                    <th>Galeri Türü</th>
                    <th>Klasör Adı</th>
                    <th>url</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("galleries/rankSetter"); ?>">
                    <?php foreach ($items as $item) {?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="text-center"><?php echo $item->id; ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo $item->gallery_type; ?></td>
                            <td><?php echo $item->folder_name; ?></td>
                            <td><?php echo $item->url; ?></td>
                            <td class="text-center">
                                <input
                                    data-url="<?php echo base_url("galleries/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($item->isActive) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center">
                                <button data-url="<?php echo base_url("galleries/delete/$item->id"); ?>" class="btn btn-xs btn-outline btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <?php 
                                    if ($item->gallery_type == "image") {
                                        $button_icon = "fa-image";
                                        $button_url = "galleries/upload_form/$item->id";
                                    } else if ($item->gallery_type == "video") {
                                        $button_icon = "fa-play";           
                                        $button_url = "galleries/gallery_video_list/$item->id";                             
                                    } else{
                                        $button_icon = "fa-folder";
                                        $button_url = "galleries/upload_form/$item->id";                             
                                    }
                                
                                ?>                               
                                <a href="<?php echo base_url("galleries/update_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
                                <a href="<?php echo base_url($button_url); ?>" class="btn btn-xs btn-outline btn-dark"><i class="fa <?php echo $button_icon; ?>"></i> Galeri</a>
                            </td>
                        </tr> 
                    <?php } ?>
                    
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>