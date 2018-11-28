<!-- sidebar start -->
            <!-- ================ -->
            <aside class="col-lg-4 col-xl-3 ml-xl-auto">
              <div class="sidebar">
                <div class="block clearfix">
                  <h3 class="title">Sidebar menu</h3>
                  <div class="separator-2"></div>
                  <nav>
                    <ul class="nav flex-column">
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>">Anasayfa</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url("urun-listesi"); ?>">Ürünler</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url("portfolyo"); ?>">Portfolyo</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url("hakkimizda"); ?>">Hakkımızda</a></li>
                      <li class="nav-item"><a class="nav-link" href="<?php echo base_url("iletisim"); ?>">İletişim</a></li>
                    </ul>
                  </nav>
                </div>
                <div class="block clearfix">
                  <h3 class="title">Son Haberler</h3>
                  <div class="separator-2"></div>

                  <?php foreach ($recent_news_list as $recent_news ) {?>

                    <div class="media margin-clear">
                        <div class="d-flex pr-2">
                        <div class="overlay-container">
                            <?php if ($recent_news->news_type == "image") {?>
                                <img class="media-object" src="<?php echo base_url("panel/uploads/news_v/$recent_news->img_url"); ?>" alt="<?php echo $recent_news->url;?>">
                                <a href="<?php echo base_url("haber/$recent_news->url") ?>" class="overlay-link small"><i class="fa fa-link"></i></a>
                            <?php } else {?>
                                <i class="media-object fa fa-youtube-play fa-4x" aria-hidden="true"></i>
                                <a href="<?php echo base_url("haber/$recent_news->url") ?>" class="overlay-link small"><i class="fa fa-link"></i></a>

                            <?php } ?>
                            
                        </div>
                        </div>
                        <div class="media-body">
                        <h6 class="media-heading"><a href="<?php echo base_url("haber/$recent_news->url") ?>"><?php echo $recent_news->title; ?></a></h6>
                        <p class="small margin-clear"><i class="fa fa-calendar pr-10"></i><?php echo get_readable_date($recent_news->createdAt); ?></p>
                        </div>
                    </div>
                    <hr>

                  <?php } ?>


                  <div class="text-right space-top">
                    <a href="<?php echo base_url("haberler"); ?>" class="link-dark"><i class="fa fa-plus-circle pl-1 pr-1"></i>Tüm Haberler</a> 
                  </div>
                </div>
                <div class="block clearfix">
                  <form role="search">
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control" placeholder="Search">
                      <i class="fa fa-search form-control-feedback"></i>
                    </div>
                  </form>
                </div>                
              </div>
            </aside>
            <!-- sidebar end -->