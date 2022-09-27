<?php /* Template Name: Experts */ 
get_header();

$experts = array(
  'post_type' => 'experts',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => 'menu_order', 
  'order' => 'ASC'
);

$all_experts = get_posts($experts);
?>

<div class="main-info" data-barba="container"  data-barba-namespace="experts">
  <?php get_template_part('template-parts/breadcrumps', null, [ 'current' => 'Eksperci' ]); ?>
  <section class="experts">
    <div class="experts__container container container--medium">
      <div class="experts__wrap align-items-start row">
        <div class="col-12">
          <h1 class="experts__intro-subtitle">Przedstawiamy naszych ekspertów</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-12 d-xl-flex justify-content-center">
          <?php get_template_part('template-parts/experts/experts', 'filter'); ?>
          <div class="experts__boxes">
            <div id="expert-boxes-anchor" class="experts__boxes-anchor"></div>
            <?php foreach($all_experts as $expert) : ?>
              <?php get_template_part('template-parts/experts/experts', 'box', [ 'expert' => $expert ]); ?>
            <?php endforeach; ?>
            <p id="error-alert" class="experts__boxes-alert">Brak ekspertów w wybranej kategorii</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>