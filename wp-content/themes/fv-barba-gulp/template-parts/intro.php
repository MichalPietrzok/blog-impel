<?php 

$current_categories = [];
foreach(get_the_category(get_the_ID()) as $category) {
  $current_categories[] = [
    'name' => $category->name,
    'slug' => $category->slug
  ];
}

?>
<section class="intro">
  <div class="intro__bg d-none d-md-block" style="background: url(<?= get_the_post_thumbnail_url(null, 'full-hd') ?>) no-repeat center / cover"></div> 
  <div class="intro__bg d-block d-md-none" style="background: url(<?= get_the_post_thumbnail_url(null, 'news-big') ?>) no-repeat center / cover"></div> 
  <div class="intro__container container container--medium">
    <div class="intro__wrap row align-items-center">
      <div class="intro__content col-12">
        <div class="intro__tags d-flex flex-wrap">
          <?php foreach($current_categories as $category) :?> 
          <a href="<?= get_home_url().'/kategoria/'.$category['slug'] ?>" class="intro__tag d-flex align-items-center">
            <span class="intro__tag-text"><?= $category['name'] ?></span>
          </a>
          <?php endforeach; ?>
        </div>
        <h1 class="intro__title"><?= get_the_title();?></h1>
        <p class="intro__date  d-flex align-items-center">
          <img class="intro__date-icon" src="<?= get_template_directory_uri()?>/dist/img/icons/calendar.svg" alt="kalendarz">
          <span class="intro__date-text">
            <?= get_the_date('d.m.y'); ?>
          </span>
        </p>
      </div>
    </div>
  </div>
</section>