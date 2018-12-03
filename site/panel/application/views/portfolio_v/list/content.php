<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Portfolio Listesi
            <?php if (isAllowedWriteModule()) {?>
                <a href="<?php echo base_url("portfolio/new_form"); ?>" class="btn btn-sm btn-outline btn-primary pull-right"><i class="fa fa-plus"></i> Yeni Portfolyo Ekle</a>
            <?php }?>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("portfolio/new_form"); ?>">tıklayınız.</a></p>
            </div> 
            <?php } else{ ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>Başlık</th>
                    <th>url</th>
                    <th>Kategori</th>
                    <th>Müşteri</th>
                    <th>Tamamlanma Tarihi</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("portfolio/rankSetter"); ?>">
                    <?php foreach ($items as $item) {?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center w-50"><i class="fa fa-reorder"></i></td>
                            <td class="text-center w-50"><?php echo $item->id; ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo $item->url; ?></td>
                            <td><?php echo get_category_title($item->category_id); ?></td>
                            <td><?php echo $item->client; ?></td>
                            <td><?php echo get_readable_date($item->finishedAt); ?></td>
                            <td class="text-center">
                                <input
                                    data-url="<?php echo base_url("portfolio/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($item->isActive) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center w-300">
                                <?php if (isAllowedDeleteModule()) {?>
                                    <button data-url="<?php echo base_url("portfolio/delete/$item->id"); ?>" class="btn btn-xs btn-outline btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <?php }?>
                                <?php if (isAllowedUpdateModule()) {?>
                                    <a href="<?php echo base_url("portfolio/update_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
                                <?php }?>
                                <?php if (isAllowedWriteModule()) {?>
                                    <a href="<?php echo base_url("portfolio/image_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-dark"><i class="fa fa-image"></i> Resimler</a>
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