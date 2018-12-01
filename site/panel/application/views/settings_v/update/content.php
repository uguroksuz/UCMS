<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo $item->company_name . " düzenleniyor." ; ?> 
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <form action="<?php echo base_url("settings/update/$item->id"); ?>" method="post" enctype="multipart/form-data">

        <div class="widget">
            <div class="m-b-lg nav-tabs-horizontal">
                <!-- tabs list -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab-1" aria-controls="tab-3" role="tab" data-toggle="tab">Site Bilgileri</a></li>
                    <li role="presentation"><a href="#tab-6" aria-controls="tab-5" role="tab" data-toggle="tab">Adres Bilgisi</a></li>
                    <li role="presentation"><a href="#tab-2" aria-controls="tab-1" role="tab" data-toggle="tab">Hakkımızda</a></li>
                    <li role="presentation"><a href="#tab-3"  aria-controls="tab-2" role="tab" data-toggle="tab">Misyon</a></li>
                    <li role="presentation"><a href="#tab-4"  aria-controls="tab-3" role="tab" data-toggle="tab">Vizyon</a></li>
                    <li role="presentation"><a href="#tab-5"  aria-controls="tab-4" role="tab" data-toggle="tab">Sosyal Medya</a></li>
                    <li role="presentation"><a href="#tab-7"  aria-controls="tab-6" role="tab" data-toggle="tab">Logo</a></li>
                </ul><!-- .nav-tabs -->

                <!-- Tab panes -->
                <div class="tab-content p-md">

                    <div role="tabpanel" class="tab-pane in active fade" id="tab-1">
                        <div class="form-group">
                            <label>Şirket Adı</label>
                            <input  class="form-control" 
                                    placeholder="Şirket/Site Adı" 
                                    name="company_name" 
                                    value="<?php echo isset($form_error) ? set_value("company_name") : $item->company_name; ?>">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("company_name"); ?></small>
                            <?php }?>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-4">
                                <label>Telefon 1</label>
                                <input  class="form-control" 
                                        placeholder="Telefon Numaranız" 
                                        name="phone_1" 
                                        value="<?php echo isset($form_error) ? set_value("phone_1") : $item->phone_1; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error"><?php echo form_error("phone_1"); ?></small>
                                <?php }?>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Telefon 2 (opsiyonel)</label>
                                <input  class="form-control" 
                                        placeholder="Telefon Numaranız" 
                                        name="phone_2"
                                        value="<?php echo isset($form_error) ? set_value("phone_2") : $item->phone_2; ?>">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Fax 1</label>
                                <input  class="form-control" 
                                        placeholder="Fax numaranız" 
                                        name="fax_1" 
                                        value="<?php echo isset($form_error) ? set_value("fax_1") : $item->fax_1; ?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Fax 2 (opsiyonel)</label>
                                <input  class="form-control" 
                                        placeholder="Fax numaranız" 
                                        name="fax_2"
                                        value="<?php echo isset($form_error) ? set_value("fax_2") : $item->fax_2; ?>">
                            </div>
                        </div>





                    
                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-6">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Adres Bilgisi</label>
                                <textarea name="address" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                                    <?php echo isset($form_error) ? set_value("address") : $item->address; ?>
                                </textarea>
                            </div>
                        </div>
                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-2">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Hakkımızda</label>
                                <textarea name="about_us" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                                    <?php echo isset($form_error) ? set_value("about_us") : $item->about_us; ?>
                                </textarea>
                            </div>
                        </div>
                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-3">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Misyon</label>
                                <textarea name="mission" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                                    <?php echo isset($form_error) ? set_value("mission") : $item->mission; ?>
                                </textarea>
                            </div>
                        </div>
                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-4">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Vizyon</label>
                                <textarea name="vision" class="m-0" data-plugin="summernote" data-options="{height: 250}">
                                    <?php echo isset($form_error) ? set_value("vision") : $item->vision; ?>
                                </textarea>
                            </div>
                        </div>
                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-5">
                        <div class="form-group">
                            <label>E-posta Adresi</label>
                            <input  class="form-control" 
                                    placeholder="E-posta" 
                                    name="email" 
                                    value="<?php echo isset($form_error) ? set_value("email") : $item->email; ?>">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error"><?php echo form_error("email"); ?></small>
                            <?php }?>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Facebook</label>
                                <input  class="form-control" 
                                        placeholder="Facebook" 
                                        name="facebook" 
                                        value="<?php echo isset($form_error) ? set_value("facebook") : $item->facebook; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Twitter</label>
                                <input  class="form-control" 
                                        placeholder="Twitter" 
                                        name="twitter" 
                                        value="<?php echo isset($form_error) ? set_value("twitter") : $item->twitter; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Instagram</label>
                                <input  class="form-control" 
                                        placeholder="Insatagram" 
                                        name="instagram" 
                                        value="<?php echo isset($form_error) ? set_value("instagram") : $item->instagram; ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Linkedin</label>
                                <input  class="form-control" 
                                        placeholder="Linkedin" 
                                        name="linkedin" 
                                        value="<?php echo isset($form_error) ? set_value("linkedin") : $item->linkedin; ?>">
                            </div>
                        </div>

                    </div><!-- .tab-pane  -->

                    <div role="tabpanel" class="tab-pane fade" id="tab-7">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo get_picture($viewFolder, $item->logo, "300x70"); ?>" alt="<?php echo $item->logo; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputFile">Masaüstü Logo Seçiniz</label>
                                <input type="file" name="logo" id="exampleInputFile" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo get_picture($viewFolder, $item->logo, "150x35"); ?>" alt="<?php echo $item->logo_mobile; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputFile">Mobil Logo Seçiniz</label>
                                <input type="file" name="logo_mobile" id="exampleInputFile" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo get_picture($viewFolder, $item->logo, "32x32"); ?>" alt="<?php echo $item->favicon; ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputFile">Favicon Seçiniz</label>
                                <input type="file" name="favicon" id="exampleInputFile" class="form-control">
                            </div>
                        </div>
                    </div><!-- .tab-pane  -->

                </div><!-- .tab-content  -->
            </div><!-- .nav-tabs-horizontal -->
        </div><!-- .widget -->
        <div class="widget">
            <div class="widget-body">
                <button type="submit" class="btn btn-outline btn-primary btn-md">Kaydet</button>
                <a href="<?php echo base_url("users"); ?>" class="btn btn-outline btn-danger btn-md">İptal</a>
            </div>
        </div>
        </form>
    </div><!-- END column -->
</div>