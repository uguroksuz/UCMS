<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Listesi
            <a href="<?php echo base_url("product/new_form"); ?>" class="btn btn-sm btn-outline btn-primary pull-right"><i class="fa fa-plus"></i> Yeni Ürün Ekle</a>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("product/new_form"); ?>">tıklayınız.</a></p>
            </div> 
            <?php } else{ ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>Başlık</th>
                    <th>url</th>
                    <th>Açıklama</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("product/rankSetter"); ?>">
                    <?php foreach ($items as $item) {?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center w-50"><i class="fa fa-reorder"></i></td>
                            <td class="text-center w-50"><?php echo $item->id; ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo $item->url; ?></td>
                            <td><?php echo character_limiter(strip_tags($item->description), 100); ?></td>
                            <td class="text-center">
                                <input
                                    data-url="<?php echo base_url("product/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($item->isActive) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center w-300">
                                <button data-url="<?php echo base_url("product/delete/$item->id"); ?>" class="btn btn-xs btn-outline btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <a href="<?php echo base_url("product/update_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
                                <a href="<?php echo base_url("product/image_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-dark"><i class="fa fa-image"></i> Resimler</a>
                            </td>
                        </tr> 
                    <?php } ?>
                    
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>