<?php

  get_header();

  $next_post = get_previous_post();
  $prev_post = get_next_post();
  $post_id = get_the_ID();

  if(is_array(get_field('experts_select'))) {
    $current_experts = [];

    foreach(get_field('experts_select') as $item) {
      $current_experts[] = $item->post_title;
    }
    
    $args = array(
      'post_type' => 'experts',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'order' => 'ASC'
    );

    $loop = new WP_Query($args);
  }
?>

<div class="news-post generated-post" data-barba="container"  data-barba-namespace="post-<?= $post_id; ?>">
  <?php 
    get_template_part('template-parts/breadcrumps', null, [ 'current' => get_the_title(), 'mod' => 'post' ]); 
    get_template_part('template-parts/intro'); 
  ?>
  <section class="post-info">
    <div class="post-info__share ">
      <h2 class="post-info__share-title">Udostępnij</h2>
      <div class="post-info__share-wrap">
        <div class="post-info__share-item">
          <noindex>
            <a rel="nofollow" onclick="window.open ('https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>', 'facebook', 'width=500, height=500'); return false;" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?> " title="Podzielić się"> 
              <img src="<?= images()?>icons/facebook__share.svg" alt="Podzilić się" /> 
            </a>
          </noindex>
        </div>
        <div class="post-info__share-item">
          <noindex>
            <a rel="nofollow" rel="nofollow" onclick="window.open ('https://twitter.com/home?status=<?php the_permalink(); ?>: <?php the_title(); ?>', 'twitter', 'width=500, height=500'); return false;" href="http://twitter.com/home?status=<?php the_permalink(); ?>: <?php the_title(); ?>" title="Podzielić się"> 
              <img src="<?= images()?>icons/twitter__share.svg" alt="Podzielić się" />
            </a>
          </noindex>
        </div>
        <div class="post-info__share-item">
          <noindex>
            <a rel="nofollow" rel="nofollow" onclick="window.open ('https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>', 'twitter', 'width=500, height=500'); return false;" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" title="Podzielić się"> 
              <img src="<?= images()?>icons/linkedin__share.svg" alt="Podzielić się" />
            </a>
          </noindex>
        </div>
      </div>
      
    </div>
    <div class="post-info__container container container--text">
      <div class="post-info__wrap row">
        <div class="post-info__content col-12">
          <?php the_content(); ?>
          <?php if(isset($current_experts)) : ?>
        </div>

        <div class="experts__post">
          <h3 class="experts__post-title">Eksperci</h3>
          <div class="experts__post-wrap d-flex flex-wrap  d-xl-block align-items-center">
            <?php 
              while ($loop->have_posts()) : $loop->the_post();
                if(in_array(get_field('experts_name'), $current_experts)) :
                  $current_photo = get_field('experts_photo');
                  $post_slug = get_post_field( 'post_name', get_post() );
            ?>
              
              <div class="experts__box experts__box--post col-lg-6 col-12 col-xl-12">
                <a href="<?= get_home_url()?>/ekspert/<?= $post_slug ?>" class="experts__box-intro">
                  <div class="experts__box-wrap experts__box-wrap--posts d-flex flex-wrap">
                    <picture>
                      <source srcset="<?= get_webp($current_photo['sizes']['experts']) ?>" type="image/webp">
                      <img class="experts__box-image experts__box-image--post" src="<?= $current_photo['sizes']['experts']?>" alt="zdjęcie: <?= get_field('experts_name'); ?>"  />
                    </picture>
                    <div class="experts__data experts__data--post d-flex flex-column justify-content-center">
                      <h3 class="experts__data-name experts__data-name--post"><?= get_field('experts_name'); ?></h3>
                      <p class="experts__data-position experts__data-position--post"><?= get_field('experts_position'); ?></p>
                    </div>
                  </div>
                </a>
              </div>
            <?php 
              endif;
            endwhile;
            wp_reset_postdata();
          ?>
            </div>
          </div>
        <?php
          endif;
        ?>
          <div class="post-info__navigation d-flex align-items center justify-content-center">
            <a href="<?= get_the_permalink($prev_post);?>" class="post-info__navigation-link d-flex align-items-center <?= $prev_post ? '' : 'post-info__navigation-link--disabled' ?> ">
              <img class="post-info__navigation-icon" src="<?= images()?>icons/prev.svg" alt="">
              <span class="post-info__navigation-text d-none d-lg-block">poprzedni</span>  
            </a>
            <a href="<?= get_the_permalink($next_post);?>" class="post-info__navigation-link d-flex align-items-center <?= $next_post ? '' : 'post-info__navigation-link--disabled' ?>">
              <span class="post-info__navigation-text d-none d-lg-block">następny</span>  
              <img class="post-info__navigation-icon" src="<?= images()?>icons/next.svg" alt="">
            </a>
          </div>
        </div>
      </div>
  </section>
  <?php
  // similar posts
  $current_categories = [];
  foreach(get_the_category(get_the_ID()) as $category) {
    $current_categories[] = $category->slug;
  }
  $postsArgs = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'tax_query' => array(
      array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $current_categories
      )
    )
    );

    get_template_part('template-parts/similarposts', null, [
      'posts_args' => $postsArgs,
      'title' => 'Powiązane artykuły'
    ]); 
    if(get_field('faq')) {
      get_template_part('template-parts/posts/posts', 'faq', ['faq' => get_field('faq')]);  
    }
  ?>
</div>

<?php get_footer(); ?>