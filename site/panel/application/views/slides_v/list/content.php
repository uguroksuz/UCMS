<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Slayt Listesi
            <?php if (isAllowedWriteModule()) {?>
                <a href="<?php echo base_url("slides/new_form"); ?>" class="btn btn-sm btn-outline btn-primary pull-right"><i class="fa fa-plus"></i> Yeni Slide Ekle</a>
            <?php }?>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("slides/new_form"); ?>">tıklayınız.</a></p>
            </div> 
            <?php } else{ ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>Başlık</th>
                    <th>Açıklama</th>
                    <th>Button</th>
                    <th>Görsel</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("slides/rankSetter"); ?>">
                    <?php foreach ($items as $item) {?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center w-50"><i class="fa fa-reorder"></i></td>
                            <td class="text-center w-50"><?php echo $item->id; ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo character_limiter(strip_tags($item->description), 100); ?></td>
                            <td><?php echo $item->allowButton; ?></td>
                            <td class="text-center">
                                <img src="<?php echo get_picture($viewFolder, $item->img_url, "1920x650");?>" 
                                        alt="<?php echo $item->img_url; ?>" 
                                        class="img-rounded"
                                        width="50">
                            </td>
                            <td class="text-center w-100">
                                <input
                                    data-url="<?php echo base_url("slides/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($item->isActive) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center w-200">
                                <?php if (isAllowedDeleteModule()) {?>
                                    <button data-url="<?php echo base_url("slides/delete/$item->id"); ?>" class="btn btn-xs btn-outline btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <?php }?>
                                <?php if (isAllowedUpdateModule()) {?>
                                    <a href="<?php echo base_url("slides/update_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
                                <?php }?>
                            </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>