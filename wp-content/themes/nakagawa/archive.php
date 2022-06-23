<?php get_header() ?>
<?php
 $paged = get_query_var('paged')?get_query_var('paged'):1;
 $category = get_query_var("cat")?get_query_var("cat"):"";
?>

<body>

  <!-- app -->
  <div class="art-app">

    <!-- mobile top bar -->
    <div class="art-mobile-top-bar"></div>

    <!-- app wrapper -->
    <div class="art-app-wrapper">

      <!-- app container end -->
      <div class="art-app-container">

        <?php get_sidebar() ?>

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
              <div class="container-fluid" style="min-height: 69vh;">

                <!-- row -->
                <div class="row p-30-0">

                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4><?php printf( __( '%s', 'nakagawa' ),  single_cat_title( '', false ) );?></h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->
                  <?php
                    $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>9, 'paged'=> $paged, 'cat'=> $category));

                    if ( $wpb_all_query->have_posts() ) :
                      while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();

                  ?>
                    <!-- col -->
                    <div class="col-lg-4">
                      <?php
                        $categories = get_the_category();
                        $comma      = ', ';
                        $output     = '';
                        $japanese = 0;

                        if ( $categories ) {
                          foreach ( $categories as $category ) {
                            if($category->cat_name == "Japanese") {
                              $japanese = 1;
                            }
                          }
                        }

                      ?>
                      <!-- blog post card -->
                      <div class="art-a art-blog-card">
                        <!-- post cover -->
                        <a href="<?php the_permalink() ?>" class="art-port-cover">
                          <!-- img -->
                          <?php
                            if (has_post_thumbnail()){
                              the_post_thumbnail('post-thumbnail');
                            }
                            else {
                              echo '<img src="'. get_template_directory_uri().'/assets/img/blog/1.jpg" alt="'. get_the_title() . '">';
                            }
                          ?>
                        </a>
                        <!-- post cover end -->
                        <!-- post description -->
                        <div class="art-post-description">
                          <!-- title -->
                          <a href="<?php the_permalink() ?>">
                            <h5 class="mb-15<?php if($japanese) echo " japanese-font-medium" ?>"><?php the_title() ?></h5>
                          </a>
                          <!-- link -->
                          <a href="<?php the_permalink() ?>" class="art-link art-color-link art-w-chevron">Read more</a>
                        </div>
                        <!-- post description end -->
                      </div>
                      <!-- blog post card end -->

                    </div>
                    <!-- col end -->

                  <?php
                      endwhile;
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
                    <?php wpbeginner_numeric_posts_nav();?>
                    <!-- pagination end -->

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
