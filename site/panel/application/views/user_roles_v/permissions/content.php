<?php $permissions = json_decode($item->permissions); ?>
<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo $item->title . " yetkilerini değiştiriyorsunuz." ; ?> 
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("user_roles/update_permissions/$item->id"); ?>" method="post">

                   <table class="table table-bordered table-striped table-hover">
                       <thead>
                           <th>Modül Adı</th>
                           <th>Görüntüleme</th>
                           <th>Ekleme</th>
                           <th>Düzenleme</th>
                           <th>Silme</th>
                       </thead>
                       <tbody>
                           <?php foreach (getControllerList() as $controllerName) {?>
                           <tr>
                                <td><?php echo $controllerName;?></td>
                                <td class="text-center w-150">
                                    <input  name="permissions[<?php echo $controllerName;?>][read]"
                                            type="checkbox"
                                            class="special"
                                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->read)) ? "checked" : ""; ?> 
                                            data-switchery/>
                                </td>
                                <td class="text-center w-150">
                                    <input  name="permissions[<?php echo $controllerName;?>][write]"
                                            type="checkbox"
                                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->write)) ? "checked" : ""; ?> 
                                            data-switchery/>
                                </td>
                                <td class="text-center w-150">
                                    <input  name="permissions[<?php echo $controllerName;?>][update]"
                                            type="checkbox"
                                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->update)) ? "checked" : ""; ?> 
                                            data-switchery/>
                                </td>
                                <td class="text-center w-150">
                                    <input  name="permissions[<?php echo $controllerName;?>][delete]"
                                            type="checkbox"
                                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->delete)) ? "checked" : ""; ?> 
                                            data-switchery/>
                                </td>
                           </tr>
                           <?php }?>
                       </tbody>
                   </table>
                    <hr>
                    <span href="#" class="btn btn-outline btn-default btn-md selectAll pull-right">Tümünü Seç</span>
                    <span href="#" class="btn btn-outline btn-default btn-md deselectAll pull-right">Tümünü Kaldır</span>
                    <button type="submit" class="btn btn-outline btn-primary btn-md">Güncelle</button>
                    <a href="<?php echo base_url("user_roles"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>