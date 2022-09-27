<?php
get_header();
$term = get_queried_object();
$current_category = strtolower($term->slug);
?>
<div class="main-info categories" data-barba="container"  data-barba-namespace="<?= $current_category ?>">
  <?php          
    $current_categories = $current_category;
    if(isset($_GET['inne'])) {
      $current_categories = explode(' ', $_GET['inne']);
      array_push($current_categories, $current_category);
    }
    $query_var = 'paged';
    $paged = (get_query_var($query_var)) ? get_query_var($query_var) : 1;

    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => 15,
      'order' => 'DESC',
      'paged' => $paged,
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => $current_categories
        )
      )
    );
    $posts = new WP_Query($args);
    get_template_part('template-parts/posts/posts', 'header');
    get_template_part('template-parts/posts/posts', null, [
      'posts' => $posts->posts,
      'all_posts' => $posts,
      'query_var' => $query_var,
      'mod' => 'category'
    ]);
    wp_reset_postdata();
  ?>
</div>

<?php get_footer(); ?>
