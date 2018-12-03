<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Kullanıcı Rolleri Listesi
            <?php if (isAllowedWriteModule()) {?>
                <a href="<?php echo base_url("user_roles/new_form"); ?>" class="btn btn-sm btn-outline btn-primary pull-right"><i class="fa fa-plus"></i> Yeni Kullanıcı Rolü Ekle</a>
            <?php }?>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("user_roles/new_form"); ?>">tıklayınız.</a></p>
            </div> 
            <?php } else{ ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>Başlık</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) {?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center w-50"><i class="fa fa-reorder"></i></td>
                            <td class="text-center w-50"><?php echo $item->id; ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td class="text-center w-100">
                                <input
                                    data-url="<?php echo base_url("user_roles/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($item->isActive) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center w-300">
                                <?php if (isAllowedDeleteModule()) {?>
                                    <button data-url="<?php echo base_url("user_roles/delete/$item->id"); ?>" class="btn btn-xs btn-outline btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <?php }?>
                                <?php if (isAllowedUpdateModule()) {?>
                                    <a href="<?php echo base_url("user_roles/update_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
                                <?php }?>
                                <?php if (isAllowedWriteModule()) {?>
                                    <a href="<?php echo base_url("user_roles/permissions_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-dark"><i class="fa fa-eye"></i> Yetki Tanımı</a>
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