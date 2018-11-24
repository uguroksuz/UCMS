<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo $item->user_name . " şifresini değiştiriyorsunuz." ; ?> 
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("users/update_password/$item->id"); ?>" method="post">

                    <div class="form-group">
                        <label>Şifre</label>
                        <input class="form-control" type="password" id="exampleInputEmail1" placeholder="Şifre" name="password">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("password"); ?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Şifre Tekrar</label>
                        <input class="form-control" type="password" id="exampleInputEmail1" placeholder="Şifre Tekrar" name="re_password">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("re_password"); ?></small>
                        <?php }?>
                    </div>
  

                    <button type="submit" class="btn btn-outline btn-primary btn-md">Güncelle</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>