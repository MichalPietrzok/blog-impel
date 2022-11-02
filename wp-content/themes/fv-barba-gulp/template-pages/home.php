<?php /* Template Name: Homepage */
get_header();
?>

<div class="main-info home" data-barba="container"  data-barba-namespace="homepage">

  <?php         
    $query_var = 'page';
    $paged = (get_query_var($query_var)) ? get_query_var($query_var) : 1;
    get_template_part('template-parts/breadcrumps', null, [ 'current' => '', 'mod' => 'home' ]);
    get_template_part('template-parts/sorting', null, [
      'mod' => $paged > 1 ? 'light' : 'home'
    ]);
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 18,
      'order' => 'DESC',
      'paged' => $paged
    );
    $posts = new WP_Query($args);
    $other_post_start = 0;
    if(!get_query_var( 'page' )) {
      $banner_posts = array_slice($posts->posts, 0, 3);
      $other_post_start = 3;
      get_template_part('template-parts/banner', null, ['posts' => $banner_posts]);
    }
    $other_posts = array_slice($posts->posts, $other_post_start);
    ?>

    <?php
    get_template_part('template-parts/posts/posts', null, [
      'posts' => $other_posts,
      'all_posts' => $posts,
      'query_var' => $query_var,
      'title' => 'Posty',
      'mod' => 'home'
    ]);
    wp_reset_postdata();

  ?>
</div>

<?php get_footer(); ?>
