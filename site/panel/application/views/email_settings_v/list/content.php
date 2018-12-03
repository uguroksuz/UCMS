<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            E-posta Listesi
            <?php if (isAllowedWriteModule()) {?>
                <a href="<?php echo base_url("emailsettings/new_form"); ?>" class="btn btn-sm btn-outline btn-primary pull-right"><i class="fa fa-plus"></i> Yeni E-posta Ekle</a>
            <?php }?>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("emailsettings/new_form"); ?>">tıklayınız.</a></p>
            </div> 
            <?php } else{ ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th>#id</th>
                    <th>E-posta Başlık</th>
                    <th>Sunucu Adı</th>
                    <th>Protokol</th>
                    <th>Port</th>
                    <th>E-Posta</th>
                    <th>Kimden</th>
                    <th>Kime</th>
                    <th>Durum</th>
                    <th>İşlem</th>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) {?>
                        <tr>
                            <td class="text-center w-50"><?php echo $item->id; ?></td>
                            <td><?php echo $item->user_name; ?></td>
                            <td><?php echo $item->host; ?></td>
                            <td class="text-center"><?php echo $item->protocol; ?></td>
                            <td class="text-center"><?php echo $item->port; ?></td>
                            <td class="text-center"><?php echo $item->user; ?></td>
                            <td class="text-center"><?php echo $item->from; ?></td>
                            <td class="text-center"><?php echo $item->to; ?></td>
                            <td class="text-center w-50">
                                <input
                                    data-url="<?php echo base_url("emailsettings/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($item->isActive) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center w-200">
                            <?php if (isAllowedDeleteModule()) {?>
                                <button data-url="<?php echo base_url("emailsettings/delete/$item->id"); ?>" class="btn btn-xs btn-outline btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                            <?php }?>
                            <?php if (isAllowedUpdateModule()) {?>
                                <a href="<?php echo base_url("emailsettings/update_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
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