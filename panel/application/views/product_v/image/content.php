<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Fotoğrafları
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <form action="../api/dropzone" class="dropzone" data-plugin="dropzone" data-options="{ url: '../api/dropzone'}">
                    <div class="dz-message">
                        <h3 class="m-h-lg">Drop files here or click to upload.</h3>
                        <p class="m-b-lg text-muted">(This is just a demo dropzone. Selected files are not actually uploaded.)</p>
                    </div>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>

<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Ürün Fotoğrafları
        </h4>

    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">
                <table class="table table-bordered table-striped tabel-hover">
                    <thead>
                        <th>#id</th>
                        <th>Görsel</th>
                        <th>Resim Adı</th>
                        <th>Durumu</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1</td>
                            <td>
                                <img width="50" src="http://uguroksuz.com/wp-content/uploads/2017/11/csharp-375x195.jpg" alt="" class="img-responsive">
                            </td>
                            <td>deneme-urun.jpg</td>
                            <td>
                            <input
                                    data-url="<?php echo base_url("product/isActiveSetter"); ?>"
                                    class="isActive"
                                    type="checkbox" 
                                    data-switchery 
                                    <?php echo (true) ? "checked" : "" ?> />
                            </td>
                            <td>
                                <button data-url="<?php echo base_url("product"); ?>" class="btn btn-xs btn-outline btn-warning remove-btn"><i class="fa fa-trash"></i> Sil</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>