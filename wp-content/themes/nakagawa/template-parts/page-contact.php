<?php
/* 
Template Name: Contact
*/
get_header(); ?>
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
          <div class="art-top-bg" style="background-image: url(img/bg.jpg)">
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
              <?php get_template_part( 'template-parts/part-contact' ); ?>
              <!-- container end -->

              <!-- container -->
              <?php get_template_part( 'template-parts/part-brand' ); ?>
              <!-- container end -->

              <!-- footer -->
              <?php get_template_part( 'template-parts/part-copyright' ); ?>
              <!-- footer end -->

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