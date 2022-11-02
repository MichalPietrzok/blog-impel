<?php
  $mod = 'default';
  if(isset($args['mod'])) {
    $mod = $args['mod'];
  }
?>
<div class="breadcrumps breadcrumps--<?= $mod ?>">
  <div class="container container--medium">
    <div class="row">
      <div class="col-12 d-flex">
        <a data-barba-prevent="self" href="https://impel.pl/" class="breadcrumps__link">Impel</a>
        <a href="<?= get_home_url()?>" class="breadcrumps__link">
          <span class="breadcrumps__link-symbol"> > </span>
          Blog
        </a>
        <?php if($args['prev']['name']) : ?>
          <a href="<?= get_home_url() .'/'.$args['prev']['slug'] ?>" class="breadcrumps__link">
            <span class="breadcrumps__link-symbol"> > </span>
            <?= $args['prev']['name'] ?>
          </a>
        <?php endif; ?>
        <p class="breadcrumps__link breadcrumps__link--last">
          <span class="breadcrumps__link-symbol"> > </span>
          <?php
            $dots = strlen($args['current']) > 40 ? '...' : '';
            echo mb_substr($args['current'], 0, 40).$dots; 
          ?>
        </p>
      </div>
    </div>
  </div>
</div>