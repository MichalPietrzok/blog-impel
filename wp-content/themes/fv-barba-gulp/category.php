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
    get_template_part('template-parts/breadcrumps', null, [ 'current' => 'Kategorie' ]);
    get_template_part('template-parts/posts/posts', 'header');
    if (!empty($posts ->have_posts())) {
      get_template_part('template-parts/posts/posts', null, [
        'posts' => $posts->posts,
        'all_posts' => $posts,
        'query_var' => $query_var,
        'mod' => 'category'
      ]);
   } else { ?>
    <section class="posts">
      <div class="posts-container container container--medium">
        <div id="news-wrap" class="posts-wrap row justify-content-center justify-content-lg-start">
            <div class="posts__title-wrap col-12">
              <h2 class="posts__title">Pracujemy nad artykułami w tym temacie. Skontaktuj się z redakcją bloga i daj znać, jakie treści Cię interesują.</h2>
            </div>
        </div>
      </div>
    </section>

   <?php 
   }

    wp_reset_postdata();
  ?>
</div>

<?php get_footer(); ?>
