<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Kullanıcı Ekle
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("users/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Kullanıcı Adı</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Kullanıc Adı" name="user_name" value="<?php echo isset($form_error) ? set_value("user_name") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("user_name"); ?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Ad Soyad" name="full_name" value="<?php echo isset($form_error) ? set_value("full_name") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("full_name"); ?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>E-posta</label>
                        <input class="form-control" type="email" id="exampleInputEmail1" placeholder="E-posta" name="email" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("email"); ?></small>
                        <?php }?>
                    </div>

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
                    
                    <button type="submit" class="btn btn-outline btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("users"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>