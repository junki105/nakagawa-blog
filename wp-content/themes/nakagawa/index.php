<?php get_header() ?>

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
              <div class="container-fluid">

                <!-- row -->
                <div class="row p-30-0 p-lg-30-0 p-md-15-0">
                  <!-- col -->
                  <div class="col-lg-12">

                    <!-- banner -->
                    <div class="art-a art-banner">
                      <!-- banner back -->
                      <!-- <div class="art-banner-back"></div> -->
                      <!-- banner dec -->
                      <div class="art-banner-dec"></div>
                      <!-- banner overlay -->
                      <div class="art-banner-overlay">
                        <!-- main title -->
                        <div class="art-banner-title">
                          <!-- title -->
                          <h1 class="mb-15">Learning to code is useful no matter what your career ambitions are.</h1>
                          <!-- suptitle -->
                          <div class="art-lg-text art-code mb-25">&lt;<i>code</i>&gt; <span class="txt-rotate" data-period="2000"
                              data-rotate='[ "First, solve the problem. Then write the code.", "Reusability is key in reducing bugs and coding quickly", "Don’t comment bad code - rewrite it.", "It’s not a bug. It’s an undocumented feature!", "Talk is cheap. Show me the code.", "As a programmer, it is your job to put yourself out of business."]'></span>&lt;/<i>code</i>&gt;</div>
                          <div class="art-lg-text art-code mb-25">
                          Senior front-end developer with 5+ years of experience with React and Vue.js. Strong in building web apps with React and specialized in dynamic languages such as JavaScript / Typescript, Python, Ruby, PHP, etc. Passionate about working with motivated teams and getting things done. Currently, prefers to work with React and Redux. Strictly adhere to the DRY principle and KISS approach.
                          </div>
                          <div class="art-buttons-frame">
                            <!-- button -->
                            <a href="<?php echo home_url( '/' ) ?>contact" class="art-btn art-btn-md"><span>Hire me</span></a>
                          </div>
                        </div>
                        <!-- main title end -->
                        <!-- photo -->
                        <!-- <img src="<?php echo get_template_directory_uri()?>/assets/img/face-2.png" class="art-banner-photo" alt="Your Name"> -->
                      </div>
                      <!-- banner overlay end -->
                    </div>
                    <!-- banner end -->

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
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter">5</span><span class="art-counter-plus">+</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Years Experience</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter">43</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Completed Projects</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter">43</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Happy Customers</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-md-3 col-6">

                    <!-- couner frame -->
                    <div class="art-counter-frame">
                      <!-- counter -->
                      <div class="art-counter-box">
                        <!-- counter number -->
                        <span class="art-counter">20</span><span class="art-counter-plus">+</span>
                      </div>
                      <!-- counter end -->
                      <!-- title -->
                      <h6>Honors and Awards</h6>
                    </div>
                    <!-- couner frame end -->

                  </div>
                  <!-- col end -->

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

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Blog</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                  </div>
                  <!-- col end -->

                  <!-- col -->
                  <div class="col-lg-12">
                    <?php
                      $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>10));

                      if ( $wpb_all_query->have_posts() ) :
                    ?>
                      <!-- slider container -->
                      <div class="swiper-container art-blog-slider" style="overflow: visible">
                        <!-- slider wrapper -->
                        <div class="swiper-wrapper">
                          <?php
                              while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post();
                          ?>

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
                            <!-- slide -->
                            <div class="swiper-slide">

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
                                      echo '<img src="'. get_template_directory_uri().'/assets/img/blog/1.jpg" alt="blog post">';
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
                            <!-- slide end -->
                          <?php
                              endwhile;
                          ?>
                        </div>
                        <!-- slider wrapper end -->
                      </div>
                      <!-- slider container end -->
                    <?php
                      else :
                        echo '<p>投稿はありません！</p>';
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
              <div class="container-fluid mt-5">

                <!-- row -->
                <div class="row">

                  <!-- col -->
                  <div class="col-lg-6">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Education and Qualifications, Awards</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                    <!-- timeline -->
                    <div class="art-timeline art-gallery" id="history">

                      <div class="art-timeline-item">
                        <div class="art-timeline-mark-light"></div>
                        <div class="art-timeline-mark"></div>

                        <div class="art-a art-timeline-content">
                          <div class="art-card-header">
                            <div class="art-left-side">
                              <h5>Bachelor's Degree in Computer Engineering</h5>
                              <div class="art-el-suptitle mb-15 japanese-font">コンピュータサイエンスの学士号</div>
                            </div>
                            <div class="art-right-side">
                              <span class="art-date">2015.3</span>
                            </div>
                          </div>
                          <div>Tokyo University of Science - Tokyo, Japan</div>
                        </div>
                      </div>

                      <div class="art-timeline-item">
                          <div class="art-timeline-mark-light"></div>
                          <div class="art-timeline-mark"></div>


                          <div class="art-a art-timeline-content">
                            <div class="art-card-header">
                              <div class="art-left-side">
                                <h5>Tokyo University of Science</h5>
                                <div class="art-el-suptitle mb-15 japanese-font">東京理科大学 情報工学</div>
                              </div>
                              <div class="art-right-side">
                                <span class="art-date">2011.4 - 2015.3</span>
                              </div>
                            </div>
                            <p class="japanese-font">
                            *プロジェクト・活動<br>
                            <br>
                            ミス＆ミスター理科大コンテスト2016<br>
                            ミス＆ミスター理科大コンテスト2016年度のHP制作を担当させていただきました。
                            </p>
                          </div>
                        </div>

                      <div class="art-timeline-item">
                        <div class="art-timeline-mark-light"></div>
                        <div class="art-timeline-mark"></div>

                        <div class="art-a art-timeline-content">
                          <div class="art-card-header">
                            <div class="art-left-side">
                              <h5>TOEIC760</h5>
                              <div class="art-el-suptitle mb-15">TOEIC® Tests</div>
                            </div>
                            <div class="art-right-side">
                              <span class="art-date">2018.6</span>
                            </div>
                          </div>
                          <p>TOEIC760</p>
                        </div>

                      </div>

                    </div>
                    <!-- timeline end -->

                  </div>
                  <div class="col-lg-6">

                    <!-- section title -->
                    <div class="art-section-title">
                      <!-- title frame -->
                      <div class="art-title-frame">
                        <!-- title -->
                        <h4>Work History</h4>
                      </div>
                      <!-- title frame end -->
                    </div>
                    <!-- section title end -->

                    <!-- timeline -->
                    <div class="art-timeline">

                      <div class="art-timeline-item">
                        <div class="art-timeline-mark-light"></div>
                        <div class="art-timeline-mark"></div>

                        <div class="art-a art-timeline-content">
                          <div class="art-card-header">
                            <div class="art-left-side">
                              <h5>Front-End Engineer</h5>
                              <div class="art-el-suptitle mb-15">Kaicom Solutions Japan Co., Ltd, Tokyo</div>
                            </div>
                            <div class="art-right-side">
                              <span class="art-date">2016.6 - Present</span>
                            </div>
                          </div>
                          <div>
                            <ul>
                              <li>Built pixel-perfect pages using React following the designs given by Adobe XD.</li>
                              <li>Updated code layout for better maintenance, particularly for the Redux part.</li>
                              <li>Worked on building a mobile app for iOS and Android using React Native from React code by using Ionic React and implemented push notifications and deep links.</li>
                              <li>Implemented the WebSocket communication between the back end and front end through MessagePack, a binary serialization format.</li>
                              <li>Executed showing the field-level validation error message from the back-end API response with redux-form and promise handling.</li>
                              <li>Built several Vue.js web applications.</li>
                              <li>Used different UI frameworks like Ant Design or Vuetify based on the project design type.</li>
                              <li>Built an admin management web app for the property listing platform with React and TypeScript.</li>
                              <li>Developed the responsive mobile screens of the buyer app for the real estate platform.</li>
                              <li>Fixed a slow performance issue with a lagging UI on mobile devices.</li>
                              <li>Implemented the pagination with infinite loading for the properties list.</li>
                              <li>Handled the implementation of the Firebase DB migration scripts in JavaScript.</li>
                              <li>Reimplemented data extraction from the Excel file into various microservice databases based on their new ETL workflow.</li>
                              <li>Updated the database models definition in Cloud Datastore, which is used in the new extraction flow.</li>
                              <li>Implemented the transformation of imported column data through the front-end UI in React.</li>
                              <li>Refactored the back-end APIs to preload entity and relationship options in Python.</li>
                              <li>Implemented the UI and back-end APIs for mapping relationships between entities imported from Excel files.</li>
                              <li>Implemented a new UI layout with Ant Design components.</li>
                              <li>Refactored the authentication logic with redux-auth-wrapper.</li>
                              <li>Tested and demonstrated React components using Storybook.</li>
                              <li>Introduced the HOCs for code reuse, logic, and Bootstrap abstraction.</li>
                              <li>Implemented the live detection view through the WebSocket subscription.</li>
                              <li>Built a front-end application for minting and staking NFTs using React and Web3.js.</li>
                              <li>Contributed to a contract for NFT registration and redemption with Solidity.</li>
                              <li>Created a POC Vue.js front-end platform for an NFT gallery using Moralis and Vue 3.</li>
                              <li>Worked on the token distribution and migration from BSC to Polygon network using BscScan, PolygonScan API, and Solidity</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- timeline end -->

                  </div>
                  <!-- col end -->

                </div>
                <!-- row end -->

              </div>
              <!-- container end -->

              <!-- container -->
              <?php get_template_part( 'template-parts/part-contact' ); ?>
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