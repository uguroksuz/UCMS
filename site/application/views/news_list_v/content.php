      <!-- main-container start -->
      <!-- ================ -->
      <section class="main-container">

        <div class="container">
          <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-12">

              <!-- page-title start -->
              <!-- ================ -->
              <h1 class="page-title">Haber Listesi</h1>
              <div class="separator-2"></div>
              <!-- page-title end -->

              <!-- timeline grid start -->
              <!-- ================ -->
              <div class="timeline clearfix">

                <?php 
                $counter = 0 ;
                foreach ($news_list as $news) { ?>
                    <!-- timeline grid item start -->
                    <div class="timeline-item <?php echo (($counter++ % 2 )== 0) ? "" : "pull-right"; ?>">
                    <!-- blogpost start -->
                    <article    class="blogpost shadow-2 light-gray-bg bordered <?php echo ($news->news_type == "video")? "object-none-visible" : ""; ?>"
                                <?php echo ($news->news_type == "video")? 'data-animation-effect="fadeInUpSmall" data-effect-delay="100"': ''; ?> >
                        
                        <?php if($news->news_type == "image"){ ?>
                            <div class="overlay-container">
                                <img src="<?php echo base_url("panel/uploads/news_v/$news->img_url"); ?>" alt="<?php echo $news->url; ?>">
                                <a class="overlay-link" href="<?php echo base_url("haber/$news->url"); ?>"><i class="fa fa-link"></i></a>
                            </div>
                        <?php } else {?>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="<?php echo $news->video_url; ?>"></iframe>
                            </div>
                        <?php }?>
                        <header>
                        <h2><a href="<?php echo base_url("haber/$news->url"); ?>"><?php echo $news->title; ?></a></h2>
                        <div class="post-info">
                            <span class="post-date">
                            <i class="icon-calendar"></i>
                                <span class="month"><?php echo get_readable_date($news->createdAt); ?></span>
                            </span>
                            <span class="comments"><i class="icon-eye"></i> <a href="#"><?php echo $news->viewCount; ?></a></span>
                        </div>
                        </header>
                        <div class="blogpost-content">
                            <p><?php echo $news->description; ?></p>    
                        </div>
                        <footer class="clearfix">
                            <div class="link pull-right"><i class="icon-link"></i><a href="<?php echo base_url("haber/$news->url"); ?>">Devamı...</a></div>
                        </footer>
                    </article>
                    <!-- blogpost end -->
                    </div>
                    <!-- timeline grid item end -->
                <?php } ?>

              </div>
              <!-- timeline grid end -->

            </div>
            <!-- main end -->

          </div>
        </div>
      </section>
      <!-- main-container end -->