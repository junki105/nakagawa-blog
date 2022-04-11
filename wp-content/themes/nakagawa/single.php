<?php get_header()?>
<body>

  <!-- app -->
  <div class="art-app">

    <!-- mobile top bar -->
    <div class="art-mobile-top-bar"></div>

    <!-- app wrapper -->
    <div class="art-app-wrapper">

      <!-- app container end -->
      <div class="art-app-container">

        <!-- info bar -->
        <?php get_sidebar() ?>
        <!-- info bar end -->

        <!-- content -->
        <div class="art-content">

          <!-- curtain -->
          <div class="art-curtain"></div>

          <!-- top background -->
          <div class="art-top-bg">
            <!-- overlay -->
            <div class="art-top-bg-overlay"></div>
            <!-- overlay end -->
          </div>
          <!-- top background end -->


          <!-- swup container -->
          <div class="transition-fade" id="swup">

            <!-- scroll frame -->
            <div id="scrollbar" class="art-scroll-frame">

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row p-30-0">
                  <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                    if ( have_posts() ) :
                      while ( have_posts() ) : the_post();
                  ?>
                    <!-- col -->
                    <div class="col-lg-12">

                      <!-- section title -->
                      <div class="art-section-title">
                        <!-- title frame -->
                        <div class="art-title-frame">
                          <!-- title -->
                          <h4><?php the_title()?></h4>
                        </div>
                        <!-- title frame end -->
                        <!-- right frame -->
                        <div class="art-right-frame">
                          <div class="art-project-category">
                            <?php
                              $categories = get_the_category();
                              $comma      = '　｜　';
                              $output     = '';

                              if ( $categories ) {
                                foreach ( $categories as $category ) {
                                  $output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $comma;
                                }
                                echo trim( $output, $comma );
                              }
                            ?>
                          </div>
                        </div>
                        <!-- right frame end -->
                      </div>
                      <!-- section title end -->

                    </div>
                    <!-- col end -->

                    <!-- col -->
                    <div class="col-lg-12">

                      <!-- project cover -->
                      <div class="art-a art-project-cover">
                        <!-- item frame -->
                        <a data-fancybox="gallery" href="img/blog/2.jpg" class="art-portfolio-item-frame art-horizontal">
                          <!-- img -->
                          <?php
                            if (has_post_thumbnail()){
                              the_post_thumbnail( 'full' );
                            }
                            else {
                              echo '<img src="'. get_template_directory_uri().'/assets/img/blog/2.jpg" alt="item">';
                            }
                          ?>
                          <!-- zoom icon -->
                          <span class="art-item-hover"><i class="fas fa-expand"></i></span>
                        </a>
                        <!-- item end -->
                      </div>
                      <!-- project cover nd -->

                    </div>
                    <!-- col end -->

                    <!-- col -->
                    <div class="col-lg-8">

                      <!-- post text -->
                      <div class="art-a art-card post-content">
                        <?php
                          $getPost = get_the_content();
                          $postwithbreaks = wpautop( $getPost, true );
                          echo $postwithbreaks;
                        ?>
                      </div>
                      <!-- post text end -->

                    </div>
                    <!-- col end -->

                    <!-- col -->
                    <div class="col-lg-4">

                      <div class="art-a art-card">
                        <!-- table -->
                        <div class="art-table p-15-15">
                          <ul>
                            <li>
                              <h6>Date:</h6><span><?php the_time( 'Y.m.d' ); ?></span>
                            </li>
                            <li>
                              <h6>Author:</h6><span><?php echo get_the_author_meta('display_name', $author_id); ?></span>
                            </li>
                            <li>
                              <h6>Category:</h6>
                              <span>
                                <?php
                                  $categories = get_the_category();
                                  $comma      = '　｜　';
                                  $output     = '';

                                  if ( $categories ) {
                                    foreach ( $categories as $category ) {
                                      $output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $comma;
                                    }
                                    echo trim( $output, $comma );
                                  }
                                ?>
                              </span>
                            </li>
                          </ul>
                        </div>
                        <!-- table end -->
                      </div>

                    </div>
                    <!-- col end -->
                  <?php
                      endwhile;
                      wp_reset_postdata();
                    else :
                      echo '<p>投稿はありません！</p>';
                    endif;
                  ?>
                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row">

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- pagination -->
                    <div class="art-a art-pagination">
                    <?php
                      $prev_post = get_adjacent_post(false, '', true);
                      if(!empty($prev_post)) { ?>
                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="art-link art-color-link art-w-chevron art-left-link"><span>Previous post</span></a>
                    <?php
                      }
                    ?>
                      <!-- button -->
                      <div class="art-pagination-center art-m-hidden">
                        <a class="art-link" href="<?php echo esc_url( home_url( '/' ) ); ?>blog">All publications</a>
                      </div>
                      <!-- button -->
                      <?php
                        $next_post = get_adjacent_post(false, '', false);
                        if(!empty($next_post)) { ?>
                          <a href="<?php echo get_permalink($next_post->ID); ?>" class="art-link art-color-link art-w-chevron"><span>Next post</span></a>
                      <?php
                        }
                      ?>
                    </div>
                    <!-- pagination end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- row -->
                <div class="row p-30-0">

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Recent posts</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-lg-12">
                    <?php
                      $wpb_recent_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>5));
                      if ( $wpb_recent_query->have_posts() ) :
                    ?>

                    <!-- slider container -->
                    <div class="swiper-container art-blog-slider" style="overflow: visible">
                      <!-- slider wrapper -->
                      <div class="swiper-wrapper">
                        <?php
                          while ( $wpb_recent_query->have_posts() ) : $wpb_recent_query->the_post();
                        ?>
                          <!-- slide -->
                          <div class="swiper-slide">

                            <!-- blog post card -->
                            <div class="art-a art-blog-card">
                              <!-- post cover -->
                              <a href="<?php the_permalink() ?>" class="art-port-cover">
                                <!-- img -->
                                <?php
                                  if (has_post_thumbnail()){
                                      the_post_thumbnail();
                                  }
                                  else {
                                    echo '<img src="'. get_template_directory_uri().'/assets/img/blog/1.jpg" alt="blog post">';
                                  }
                                ?>
                              </a>
                              <!-- post cover end -->
                              <!-- post description -->
                              <div class="art-post-description">
                                <!-- title -->
                                <a href="<?php the_permalink() ?>">
                                  <h5 class="mb-15"><?php the_title() ?></h5>
                                </a>
                                <!-- text -->
                                <div class="mb-15">
                                  <?php the_excerpt() ?>
                                </div>
                                <!-- link -->
                                <a href="<?php the_permalink() ?>" class="art-link art-color-link art-w-chevron">Read more</a>
                              </div>
                              <!-- post description end -->
                            </div>
                            <!-- blog post card end -->

                          </div>
                          <!-- slide end -->
                        <?php
                          endwhile;
                          wp_reset_postdata();
                        ?>
                      </div>
                      <!-- slider wrapper end -->
                    </div>
                    <!-- slider container end -->

                    <?php
                      else :
                        echo '<p>関連記事はありません！</p>';
                      endif;
                    ?>

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- slider navigation -->
                    <div class="art-slider-navigation">

                      <!-- left side -->
                      <div class="art-sn-left">

                        <!-- slider pagination -->
                        <div class="swiper-pagination"></div>

                      </div>
                      <!-- left side end -->

                      <!-- right side -->
                      <div class="art-sn-right">

                        <!-- slider navigation -->
                        <div class="art-slider-nav-frame">
                          <!-- prev -->
                          <div class="art-slider-nav art-blog-swiper-prev"><i class="fas fa-chevron-left"></i></div>
                          <!-- next -->
                          <div class="art-slider-nav art-blog-swiper-next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                        <!-- slider navigation -->

                      </div>
                      <!-- right side end -->

                    </div>
                    <!-- slider navigation end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <?php get_template_part( 'template-parts/part-brand' ); ?>
              <!-- container end -->

              <!-- container -->
              <div class="container-fluid">

                <!-- footer -->
                <?php get_template_part( 'template-parts/part-copyright' ); ?>
                <!-- footer end -->

              </div>
              <!-- container end -->


            </div>
            <!-- scroll frame end -->

          </div>
          <!-- swup container end -->

        </div>
        <!-- content end -->

        <!-- menu bar -->
        <?php get_template_part( 'template-parts/part-menubar' ); ?>
        <!-- menu bar end -->

      </div>
      <!-- app container end -->

    </div>
    <!-- app wrapper end -->

<?php get_footer() ?>
