<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni E-posta Hesabı Ekle
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="<?php echo base_url("emailsettings/save"); ?>" method="post">
                
                    <div class="form-group">
                        <label>Protokol</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Protokol" name="protocol" value="<?php echo isset($form_error) ? set_value("protocol") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("protocol"); ?></small>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label>E-posta Sunucu Bilgisi</label>
                        <input class="form-control" id="exampleInputEmail1" placeholder="Hostname" name="host" value="<?php echo isset($form_error) ? set_value("host") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("host"); ?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Port Numarası</label>
                        <input class="form-control" type="text" id="exampleInputEmail1" placeholder="port" name="port" value="<?php echo isset($form_error) ? set_value("port") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("port"); ?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>E-posta adresi</label>
                        <input class="form-control" type="email" id="exampleInputEmail1" placeholder="user" name="user" value="<?php echo isset($form_error) ? set_value("user") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("user"); ?></small>
                        <?php }?>
                    </div>                    
                    
                    <div class="form-group">
                        <label>E-posta Şifresi</label>
                        <input class="form-control" type="password" id="exampleInputEmail1" placeholder="Şifre" name="password">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("password"); ?></small>
                        <?php }?>
                    </div>

                    <div class="form-group">
                        <label>Kimden Gidecek (from)</label>
                        <input class="form-control" type="email" id="exampleInputEmail1" placeholder="from" name="from" value="<?php echo isset($form_error) ? set_value("from") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("from"); ?></small>
                        <?php }?>
                    </div>   

                    <div class="form-group">
                        <label>Kime Gidecek (to)</label>
                        <input class="form-control" type="email" id="exampleInputEmail1" placeholder="to" name="to" value="<?php echo isset($form_error) ? set_value("to") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("to"); ?></small>
                        <?php }?>
                    </div>   

                    <div class="form-group">
                        <label>E-posta Başlık </label>
                        <input class="form-control" type="text" id="exampleInputEmail1" placeholder="E-posta Başlık" name="user_name" value="<?php echo isset($form_error) ? set_value("user_name") : ""; ?>">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error"><?php echo form_error("user_name"); ?></small>
                        <?php }?>
                    </div>
                    
                    <button type="submit" class="btn btn-outline btn-primary btn-md">Kaydet</button>
                    <a href="<?php echo base_url("emailsettings"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>