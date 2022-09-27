<?php  /* Template Name: Rodo */
get_header();
?>
<div class="main-info" data-barba="container"  data-barba-namespace="rodo">
  <?php get_template_part('template-parts/breadcrumps', null, [ 'current' => get_the_title(), 'mod' => 'light' ]); ?>
  <section class="rodo">
    <div class="rodo__container container">
      <div class="rodo__wrap row">
        <div class="rodo__info col-12">
          <h1 class="rodo__title"><?= get_the_title();?></h1>
          <div class="rodo__content">
            <?= get_the_content() ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php get_footer(); ?>