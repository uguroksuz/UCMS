<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Haber Listesi
            <a href="<?php echo base_url("news/new_form"); ?>" class="btn btn-sm btn-outline btn-primary pull-right"><i class="fa fa-plus"></i> Yeni Haber Ekle</a>
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if (empty($items)) { ?>
            <div class="alert alert-info text-center">
                <p>Herhangi bir veri bulunmamaktadır. Eklemek için lütfen <a href="<?php echo base_url("news/new_form"); ?>">tıklayınız.</a></p>
            </div> 
            <?php } else{ ?>
            <table class="table table-hover table-striped table-bordered content-container">
                <thead>
                    <th><i class="fa fa-reorder"></i></th>
                    <th>#id</th>
                    <th>Başlık</th>
                    <th>url</th>
                    <th>Açıklama</th>
                    <th>Haber türü</th>
                    <th>Görsel</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                </thead>
                <tbody class="sortable" data-url="<?php echo base_url("news/rankSetter"); ?>">
                    <?php foreach ($items as $item) {?>
                        <tr id="ord-<?php echo $item->id; ?>">
                            <td class="text-center"><i class="fa fa-reorder"></i></td>
                            <td class="text-center"><?php echo $item->id; ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo $item->url; ?></td>
                            <td><?php echo $item->description; ?></td>
                            <td><?php echo $item->news_type; ?></td>
                            <td class="text-center">
                                <?php if($item->news_type == "image"){ ?>

                                <img src="<?php echo base_url("uploads/{$viewFolder}/$item->img_url"); ?>" 
                                     alt="<?php echo $item->img_url; ?>" 
                                     class="img-rounded"
                                     width="30">

                                <?php } else if($item->news_type == "video") {?>

                                <iframe width="56" 
                                        height="31" 
                                        src="<?php echo $item->video_url ?>" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>

                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <input
                                    data-url="<?php echo base_url("news/isActiveSetter/$item->id"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo ($item->isActive) ? "checked" : "" ?> />
                            </td>
                            <td class="text-center">
                                <button data-url="<?php echo base_url("news/delete/$item->id"); ?>" class="btn btn-xs btn-outline btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                <a href="<?php echo base_url("news/update_form/$item->id"); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-edit"></i> Düzenle</a>
                            </td>
                        </tr> 
                    <?php } ?>
                    
                </tbody>
            </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>