<?php
/**
 * functions and definitions
 *
 * @package WordPress
 * @subpackage LargicWave-1
 */

add_theme_support( 'post-thumbnails' );

add_action( 'template_redirect', function() {
  if ( is_singular() ) {
      global $wp_query;
      $page = ( int ) $wp_query->get( 'page' );
      if ( $page > 1 ) {
          // convert 'page' to 'paged'
          $wp_query->set( 'page', 1 );
          $wp_query->set( 'paged', $page );
      }
      // prevent redirect
      remove_action( 'template_redirect', 'redirect_canonical' );
  }
}, 0 ); // on priority 0 to remove 'redirect_canonical' added with priority 10


function my_pagination_link( $label = NULL, $dir = 'next', WP_Query $query = NULL ) {
  if ( is_null( $query ) ) {
      $query = $GLOBALS['wp_query'];
  }
  $max_page = ( int ) $query->max_num_pages;
  // only one page for the query, do nothing
  if ( $max_page <= 1 ) {
      return;
  }
  $paged = ( int ) $query->get( 'paged' );
  if ( empty( $paged ) ) {
      $paged = 1;
  }
  $target_page = $dir === 'next' ?  $paged + 1 : $paged - 1;
  // if 1st page requiring previous or last page requiring next, do nothing
  if ( $target_page < 1 || $target_page > $max_page ) {
      return;
  }
  if ( null === $label ) {
      $label = __( 'Next Page &raquo;' );
  }

  $label = preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label );
  printf( '<a href="%s">%s</a>', get_pagenum_link( $target_page ), esc_html( $label ) );
}

function my_excerpt_length($length){
  return 35;
}

add_filter('excerpt_length', 'my_excerpt_length');