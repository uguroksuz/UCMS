<?php if (empty($items)) { ?>
<div class="alert alert-info text-center">
    <p>Herhangi bir resim bulunmamaktadır.</p>
</div> 
<?php } else{ ?> 
<table class="table table-bordered table-striped tabel-hover pictures-list">
    <thead>
        <th><i class="fa fa-reorder"></i></th>
        <th class="w100 text-center">#id</th>
        <th class="w100 text-center">Görsel</th>
        <th>Dosya Yolu/Adı</th>
        <th class="w100 text-center">Durumu</th>

        <th class="w100 text-center">İşlem</th>
    </thead>
    <tbody class="sortable" data-url="<?php echo base_url("galleries/fileRankSetter/$gallery_type"); ?>">
        <?php foreach ($items as $item) {?>
            <tr id="ord-<?php echo $item->id; ?>">
                <td class="w-50 text-center"><i class="fa fa-reorder"></i></td>
                <td class="w-50 text-center"><?php echo $item->id; ?></td>
                <td class="w-200 text-center">
                    <?php 
                    if ($gallery_type == "image") {?>
                        <img 
                            width="75" 
                            src="<?php echo get_picture("galleries_v/images/$folder_name", $item->url,"251x156"); ?>" 
                            alt="<?php echo $item->url; ?>" 
                            class="img-responsive mx-auto">
                    <?php } else if($gallery_type == "file") {?>
                        <i class="fa fa-folder fa-2x"></i>
                    <?php } ?>
                </td>
                <td><?php echo $item->url; ?></td>
                <td class="w-100 text-center">
                <input
                        data-url="<?php echo base_url("galleries/fileIsActiveSetter/$item->id/$gallery_type"); ?>"
                        class="isActive"
                        type="checkbox" 
                        data-switchery 
                        <?php echo ($item->isActive) ? "checked" : "" ?> />
                </td>                
                <td class="w-100 text-center">
                    <button data-url="<?php echo base_url("galleries/fileDelete/$item->id/$item->gallery_id/$gallery_type"); ?>" class="btn btn-sm btn-outline btn-block btn-danger remove-btn">
                        <i class="fa fa-trash"></i> Sil
                    </button>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>
<?php } ?>