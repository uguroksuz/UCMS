<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Kullanıcı Listesi
            <?php if(isAdmin()){?>
            <a href="<?php echo base_url("users/new_form"); ?>" class="btn btn-sm btn-outline btn-primary pull-right"><i class="fa fa-plus"></i> Yeni Kullanıcı Ekle</a>
            <?php }?>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("users/new_form"); ?>">tıklayınız.</a></p>
            </div> 
            <?php } else{ ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th>#id</th>
                    <th>Kullanıcı Adı</th>
                    <th>Ad Soyad</th>
                    <th>E-posta</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody>
                    <?php foreach ($items as $item) {?>
                        <tr>
                            <td class="text-center w-50"><?php echo $item->id; ?></td>
                            <td class="text-center"><?php echo $item->user_name; ?></td>
                            <td class="text-center"><?php echo $item->full_name; ?></td>
                            <td class="text-center"><?php echo $item->email; ?></td>
                            <td class="text-center w-50">
                                <input
                                    data-url="<?php echo base_url("users/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($item->isActive) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center w-400">
                                <button data-url="<?php echo base_url("users/delete/$item->id"); ?>" class="btn btn-xs btn-outline btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <a href="<?php echo base_url("users/update_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
                                <a href="<?php echo base_url("users/update_password_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-purple"><i class="fa fa-key"></i> Şifre Değiştir</a>
                            </td>
                        </tr>
                    <?php } ?>
                    
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>