<?php
  $mod = 'default';
  if(isset($args['mod'])) {
    $mod = $args['mod'];
  }
  if($args['posts']) : 
?>
  <section class="posts posts--<?= $mod?>">
    <div class="posts-container container container--medium">
      <div id="news-wrap" class="posts-wrap row justify-content-center justify-content-lg-start">
        <?php if(isset($args['title'])) : ?>
          <div class="posts__title-wrap col-12">
            <h2 class="posts__title"><?= $args['title']; ?></h2>
          </div>
        <?php 
          endif; 
        // HTML for this objects is in inc/postcard/Postcard_Mini.php
          foreach($args['posts'] as $current_post) {
            $current_card = new Postcard_Mini([
              'link'  => get_the_permalink($current_post),
              'type'  => get_the_terms($current_post, 'rodzaj'),
              'tags'  => get_the_category($current_post),
              'title' => mb_strimwidth(get_the_title($current_post), 0, 69, '...'),
              'text'  => mb_strimwidth(get_field('post_lead', $current_post), 0, 120, '...'),
              'date'  => get_the_date('d.m.y', $current_post),
              'image' => get_the_post_thumbnail_url($current_post, 'news-mini')
            ]);
            echo '<div class="posts__item col-12  col-lg-6 col-xl-4">'.$current_card->get_card_html().'</div>';
          }
        ?>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <?php
            pagination_nav([
              'query' => $args['all_posts'],
              'main_class' => 'pagination',
              'query_var' => $args['query_var'],
              'prev' => [ 
                'text' => 'Wstecz',
                'icon' => get_template_directory_uri().'/dist/img/icons/chevron-left.svg' 
              ],
              'next' => [
                'text' => 'Dalej',
                'icon' => get_template_directory_uri().'/dist/img/icons/chevron-right.svg' 
              ]
            ]);
            endif;
          ?>
        </div>
      </div>
    </div>
  </section>