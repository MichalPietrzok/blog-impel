<?php
  get_header();
  $term = get_queried_object();
  $post_id = get_the_ID();

  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'meta_query' => array(
      array(
        'key' => 'experts_select',
        'value' => '"' . get_the_ID() . '"',
        'compare' => 'LIKE'
      )
    )
  );
  wp_reset_postdata();
  $expert_categories = wp_get_post_categories($post_id);
?>
<div class="main-info" data-barba="container"  data-barba-namespace="experts-<?= $post_id ?>">
  <?php get_template_part('template-parts/breadcrumps', null, [
    'prev' => [ 'name' => 'Eksperci', 'slug' => 'eksperci' ],
    'current' => get_field('experts_name') 
  ]); ?>
  <section class="experts-single">
    <div class="container container--medium">
      <div class="row">
        <div class="col-12">
          <div class="experts-single__wrap align-items-center align-items-lg-start flex-column flex-lg-row d-flex">
            <div class="experts-single__images d-flex flex-column align-items-center justify-content-center">
              <picture>
                <source srcset="<?= get_webp(get_field('experts_photo')['sizes']['experts-big']) ?>" type="image/webp">
                <img class="experts-single__photo d-block" src="<?= get_field('experts_photo')['sizes']['experts-big']?>"  alt="zdjęcie: <?= get_field('experts_name'); ?>">
              </picture>
              <?php if(get_field('experts_link') != '') : ?>
                <a rel="nofollow" shref="<?= get_field('experts_link') ?>" target="_blank" class="experts-single__link">
                  <img class="experts-single__icon" src="<?= images()?>icons/experts-in.svg" alt="logotyp linkedin (in)">
                </a>
              <?php endif; ?>
            </div>
            <div class="experts-single__info">
              <h2 class="experts-single__categories">
              <?php
                if(count($expert_categories) > 0) :
                  foreach($expert_categories as $cat_id) :
                    $tag = get_category($cat_id);
              ?>
                    <span data-srt="<?= $tag->slug ?>" class="experts-single__categories-text"><?= $tag->name ?></span> 
              <?php
                  endforeach;
                endif;
              ?>
              </h2>
              <h1 class="experts-single__name"><?= get_field('experts_name'); ?></h1>
              <p class="experts-single__position"><?= get_field('experts_position'); ?></p>
              <p class="experts-single__firm"><?= get_field('experts_company'); ?></p>
              <div class="experts-single__text"><?= get_field('experts_description'); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php  get_template_part('template-parts/similarposts', null, [
    'posts_args' => $args,
    'title' => get_field('experts_name').' - artykuły'
  ]);  ?>
</div>

<?php get_footer(); ?>
