<!-- main start -->
            <!-- ================ -->
            <div class="main col-lg-8">

              <!-- page-title start -->
              <!-- ================ -->
              <h1 class="page-title"><?php echo $news->title; ?></h1>
              <!-- page-title end -->

              <!-- blogpost start -->
              <!-- ================ -->
              <article class="blogpost full">
                <header>
                  <div class="post-info mb-4">
                    <span class="post-date">
                      <i class="icon-calendar"></i>
                      <span class="month"><?php echo get_readable_date($news->createdAt) ?></span>
                    </span>
                    <span class="comments"><i class="icon-chat"></i> <a href="#">22 comments</a></span>
                  </div>
                </header>
                <div class="blogpost-content">
                  <div class="carousel slide mb-5">

                      <?php if ($news->news_type == "image") {?>
                        <div class="overlay-container">
                          <img src="<?php echo base_url("panel/uploads/news_v/$news->img_url"); ?>" alt="">
                          <a class="overlay-link popup-img" href="<?php echo base_url("panel/uploads/news_v/$news->img_url"); ?>"><i class="fa fa-search-plus"></i></a>
                        </div>
                      <?php } else { ?>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="<?php echo $news->video_url; ?>"></iframe>
                        </div>
                      <?php } ?>
                      
                      <span class="comments"><i class="icon-eye"></i> <a href="#"><?php echo $news->viewCount; ?></a></span>

                  </div>
                  <p><?php echo $news->description; ?></p>
                </div>
                <footer class="clearfix">
                  <div class="tags pull-left"><i class="icon-tags"></i> <a href="#">tag 1</a>, <a href="#">tag 2</a>, <a href="#">long tag 3</a></div>
                  <div class="link pull-right">
                    <ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
                      <li class="twitter">
                          <a class="share-button" target="_blank" href="https://www.twitter.com/intent/tweet?text=<?php echo $news->title; ?>&url=<?php echo base_url("haber/$news->url"); ?>"><i class="fa fa-twitter"></i></a>
                      </li>
                      <li class="facebook">
                          <a class="share-button" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo base_url("haber/$news->url"); ?>&t=<?php echo $news->title; ?>"><i class="fa fa-facebook"></i></a>
                      </li>
                      <li class="googleplus">
                          <a class="share-button" target="_blank" href="https://plus.google.com/share?url=<?php echo base_url("haber/$news->url"); ?>"><i class="fa fa-google-plus"></i></a>
                      </li>
                      
                    </ul>
                  </div>
                </footer>
              </article>
              <!-- blogpost end -->

            </div>
            <!-- main end -->