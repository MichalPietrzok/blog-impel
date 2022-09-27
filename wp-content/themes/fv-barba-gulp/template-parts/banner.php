<section class="banner">
  <div class="banner-container container container--max">
    <div class="banner-wrap row">
      <div class="banner__left col-12 col-lg-6 d-block d-lg-flex d-xl-block flex-wrap justify-content-between">
        <?php 
          // HTML for this objects is in inc/postcard/Postcard_Big.php
          $current_card = new Postcard_Big([
            'link'  => get_the_permalink($args['posts'][0]),
            'type'  => get_the_terms($args['posts'][0], 'rodzaj'),
            'tags'  => get_the_category($args['posts'][0]),
            'title' => mb_strimwidth(get_the_title($args['posts'][0]), 0, 90, '...'),
            'text'  => mb_strimwidth(get_field('post_lead', $args['posts'][0]), 0, 228, '...'),
            'date'  => get_the_date('d.m.y', $args['posts'][0]),
            'image' => get_the_post_thumbnail_url($args['posts'][0], 'news-big'),
            'image_mini' => get_the_post_thumbnail_url($args['posts'][0], 'news-medium'),
          ]);
          echo $current_card->get_card_html();
        ?>
      </div>
      <div class="banner__right col-12 col-lg-6 d-block d-lg-flex d-xl-block flex-wrap justify-content-between">
      <?php
        // HTML for this objects is in inc/postcard/Postcard.php
        for($i = 1; $i < count($args['posts']); $i++)  {
          if(isset($args['posts'][$i])) {
            $current_card = new Postcard([
              'link'  => get_the_permalink($args['posts'][$i]),
              'type'  => get_the_terms($args['posts'][$i], 'rodzaj'),
              'tags'  => get_the_category($args['posts'][$i]),
              'title' => mb_strimwidth(get_the_title($args['posts'][$i]), 0, 63, '...'),
              'text'  => mb_strimwidth(get_field('post_lead', $args['posts'][$i]), 0, 120, '...'),
              'date'  => get_the_date('d.m.y', $args['posts'][$i]),
              'image' => get_the_post_thumbnail_url($args['posts'][$i], 'news-medium')
            ]);
            echo $current_card->get_card_html();
          } 
        }?>
      </div>
    </div>
  </div>
</section>