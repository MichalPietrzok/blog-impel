<?php 
function pagination_nav($props) {
    if($props['query']->max_num_pages <= 1) return;
    $paged = get_query_var( $props['query_var'] ) ? absint( get_query_var( $props['query_var'] ) ) : 1;
    $max   = intval($props['query']->max_num_pages);
  
    if ( $paged >= 1 ) $links[] = $paged;
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
  
    echo '<div class="'.$props['main_class'].'"><ul class="'.$props['main_class'].'__list">' . "\n";
    if ( get_previous_posts_link() ) {
        printf( '<li class="'.$props['main_class'].'__item '.$props['main_class'].'__item--nav">%s</li>' . "\n", get_previous_posts_link('<img src="'.$props['prev']['icon'].'"> '.$props['prev']['text']) );
    }
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? 'active' : '';
        printf( '<li class="'.$props['main_class'].'__item '.$class.'" %s><a href="%s">%s</a></li>' . "\n", null, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) ) {
            echo '<li class="'.$props['main_class'].'__item '.$props['main_class'].'__item--dots">…</li>';
        }
    }
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? 'active' : '';
        printf( '<li class="'.$props['main_class'].'__item '.$class.'" %s><a href="%s">%s</a></li>' . "\n", null, esc_url( get_pagenum_link( $link ) ), $link );
    }
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) ) {
            echo '<li class="'.$props['main_class'].'__item '.$props['main_class'].'__item--dots">…</li>' . "\n";
        }
  
        $class = $paged == $max ? 'active' : '';
        printf( '<li class="'.$props['main_class'].'__item '.$class.'" %s><a href="%s">%s</a></li>' . "\n", null, esc_url( get_pagenum_link( $max ) ), $max );
    }
    if ( get_next_posts_link(null, $max) ) {
        printf( '<li class="'.$props['main_class'].'__item '.$props['main_class'].'__item--nav">%s</li>' . "\n", get_next_posts_link($props['next']['text'].' <img src="'.$props['next']['icon'].'">', $max) );
    }
    echo '</ul></div>' . "\n";
}