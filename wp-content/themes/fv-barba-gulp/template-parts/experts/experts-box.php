<?php $expert_categories = wp_get_post_categories($args['expert']->ID); ?>

<div id="<?= $args['expert']->post_name; ?>" class="experts__box experts__box--acordeon" data-srt="<?= get_field('experts_company', $args['expert']->ID) ?>">
  <div class="experts__box-intro d-flex flex-column flex-lg-row align-items-center align-items-lg-stretch justify-content-sm-between">
    <div class="experts__box-wrap align-items-center align-items-lg-start flex-column flex-lg-row d-flex">
      <picture>
        <source srcset="<?= get_webp(get_field('experts_photo', $args['expert']->ID)['sizes']['experts']) ?>" type="image/webp">
        <img class="experts__box-image" src="<?= get_field('experts_photo', $args['expert']->ID)['sizes']['experts']?>" alt="zdjęcie: <?= get_field('experts_name', $args['expert']->ID); ?>"  />
      </picture>
      <div class="experts__data d-flex flex-column justify-content-center">
        <h2 class="experts__data-company experts__data-company--main">
          <?php
            if(count($expert_categories) > 0) :
              foreach($expert_categories as $cat_id) :
                $tag = get_category($cat_id);
          ?>
               <span data-srt="<?= $tag->slug ?>" class="experts__data-company__text"><?= $tag->name ?></span>
          <?php
              endforeach;
            endif;
          ?>
        </h2>
        <h3 class="experts__data-name"><?= get_field('experts_name', $args['expert']->ID); ?></h3>
        <p class="experts__data-position"><?= get_field('experts_position', $args['expert']->ID); ?></p>
      </div>
    </div>
    <a href="<?= get_home_url()?>/ekspert/<?= $args['expert']->post_name ?>"  class="d-block d-lg-flex mt-3 mt-lg-0 align-items-lg-end">
      <img class="experts__box-arrow" src="<?= images()?>icons/post-arrow.svg" alt="czerwona strzałka w dół">
    </a>
  </div>
</div>