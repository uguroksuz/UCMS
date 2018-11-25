<?php if (empty($item_images)) { ?>
<div class="alert alert-info text-center">
    <p>Herhangi bir resim bulunmamaktadır.</p>
</div> 
<?php } else{ ?> 
<table class="table table-bordered table-striped tabel-hover pictures-list">
    <thead>
        <th><i class="fa fa-reorder"></i></th>
        <th class="w100 text-center">#id</th>
        <th class="w100 text-center">Görsel</th>
        <th>Resim Adı</th>
        <th class="w100 text-center">Durumu</th>
        <th class="w100 text-center">Kapak</th>
        <th class="w100 text-center">İşlem</th>
    </thead>
    <tbody class="sortable" data-url="<?php echo base_url("portfolio/imageRankSetter"); ?>">
        <?php foreach ($item_images as $image) {?>
            <tr id="ord-<?php echo $image->id; ?>">
                <td class="text-center"><i class="fa fa-reorder"></i></td>
                <td class="w100 text-center"><?php echo $image->id; ?></td>
                <td class="w100 text-center">
                    <img width="50" src="<?php echo base_url("uploads/{$viewFolder}/$image->img_url"); ?>" alt="<?php echo $image->img_url; ?>" class="img-responsive">
                </td>
                <td><?php echo $image->img_url; ?></td>
                <td class="w100 text-center">
                <input
                        data-url="<?php echo base_url("portfolio/imageIsActiveSetter/$image->id"); ?>"
                        class="isActive"
                        type="checkbox" 
                        data-switchery 
                        <?php echo ($image->isActive) ? "checked" : "" ?> />
                </td>
                <td class="w100 text-center">
                <input
                        data-url="<?php echo base_url("portfolio/isCoverSetter/$image->id/$image->portfolio_id"); ?>"
                        class="isCover"
                        type="checkbox"
                        data-color="#ff5d5d"
                        data-switchery 
                        <?php echo ($image->isCover) ? "checked" : "" ?> />
                </td>
                
                <td class="w100 text-center">
                    <button data-url="<?php echo base_url("portfolio/imageDelete/$image->id/$image->portfolio_id"); ?>" class="btn btn-sm btn-outline btn-block btn-danger remove-btn">
                        <i class="fa fa-trash"></i> Sil
                    </button>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>
<?php } ?>