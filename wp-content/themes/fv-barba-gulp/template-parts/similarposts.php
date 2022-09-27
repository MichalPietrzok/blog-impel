<?php 
$current_id = get_the_ID();
$postsLoop = new WP_Query($args['posts_args']);
?>

<section class="posts posts--similar">
  <div class="posts-container container container--medium">
    <div class="posts-wrap row justify-content-center justify-content-lg-start">
      <div class="posts__title-wrap col-12 col-md-9 col-lg-12">
        <h2 class="posts__title posts__title--similar"><?= $args['title'] ?></h2>
      </div>
      <?php
      // HTML for this objects is in inc/postcard/Postcard_Mini.php
      while ($postsLoop->have_posts()) : $postsLoop->the_post();
        $current_card = new Postcard_Mini([
          'link'  => get_the_permalink(),
          'type'  => get_the_terms(get_the_ID(), 'rodzaj'),
          'tags'  => get_the_category(),
          'title' => mb_strimwidth(get_the_title(), 0, 69, '...'),
          'text'  => mb_strimwidth(get_field('post_lead'), 0, 120, '...'),
          'date'  => get_the_date('d.m.y'),
          'image' => get_the_post_thumbnail_url(null, 'news-mini')
        ]);
        if($current_id != get_the_ID()) {
          echo '<div class="posts__item col-12  col-lg-6 col-xl-4">'.$current_card->get_card_html().'</div>';
        }
      endwhile;    
      wp_reset_postdata();
      ?>
    </div>
  </div>
</section>