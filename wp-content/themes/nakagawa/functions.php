<?php
/**
 * functions and definitions
 *
 * @package WordPress
 * @subpackage LargicWave-1
 */

add_theme_support( 'post-thumbnails' );

// remove_filter( 'the_content', 'wpautop' );

remove_filter( 'the_excerpt', 'wpautop' );

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

// pagination

function get_previous_posts_link_custom( $label = null ) {
	global $paged;

	if ( null === $label ) {
		$label = __( 'Previous Page' );
	}

	if ( ! is_single() && $paged > 1 ) {
		/**
		 * Filters the anchor tag attributes for the previous posts page link.
		 *
		 * @since 2.7.0
		 *
		 * @param string $attributes Attributes for the anchor tag.
		 */
		$attr = apply_filters( 'previous_posts_link_attributes', '' );
		return '<a class="art-link art-color-link art-w-chevron art-left-link" href="' . previous_posts( false ) . "\" $attr><span>" . preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) . '</span></a>';
	}
}


function get_next_posts_link_custom( $label = null, $max_page = 0 ) {
	global $paged, $wp_query;

	if ( ! $max_page ) {
		$max_page = $wp_query->max_num_pages;
	}

	if ( ! $paged ) {
		$paged = 1;
	}

	$nextpage = (int) $paged + 1;

	if ( null === $label ) {
		$label = __( 'Next Page' );
	}

	if ( ! is_single() && ( $nextpage <= $max_page ) ) {
		/**
		 * Filters the anchor tag attributes for the next posts page link.
		 *
		 * @since 2.7.0
		 *
		 * @param string $attributes Attributes for the anchor tag.
		 */
		$attr = apply_filters( 'next_posts_link_attributes', '' );

		return '<a class="art-link art-color-link art-w-chevron" href="' . next_posts( $max_page, false ) . "\" $attr><span>" . preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) . '</span></a>';
	}
}

function wpbeginner_numeric_posts_nav() {
    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="art-a art-pagination">' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link_custom() ) :
        printf( '%s' . "\n", get_previous_posts_link_custom() );
    else :
        echo '<a href=""></a>'. "\n";
    endif;
    echo '<div class="art-pagination-center art-m-hidden">' . "\n";
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="art-active-pag"' : '';

        printf( '<a%s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<a>…</a>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="art-active-pag"' : '';
        printf( '<a%s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<a>…</a>' . "\n";

        $class = $paged == $max ? ' class="art-active-pag"' : '';
        printf( '<a%s href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    echo '</div>' . "\n";

    /** Next Post Link */
    if ( get_next_posts_link_custom() )
        printf( '%s' . "\n", get_next_posts_link_custom() );

    echo '</div>' . "\n";

  }