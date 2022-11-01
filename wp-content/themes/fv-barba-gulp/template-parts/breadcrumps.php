<?php
  $mod = 'default';
  if(isset($args['mod'])) {
    $mod = $args['mod'];
  }
?>
<div class="breadcrumps breadcrumps--<?= $mod ?>">
  <div class="container container--<?= $mod !== 'home' ? 'medium' : 'big' ?>">
    <div class="row">
      <div class="col-12 d-flex">
        <a href="https://impel.pl/" class="breadcrumps__link">Impel</a>
        <?php if($args['current'] !== '') : ?>
          <a href="<?= get_home_url()?>" class="breadcrumps__link">
            <span class="breadcrumps__link-symbol"> > </span>
            Blog
          </a>
        <?php else : ?>
          <p class="breadcrumps__link breadcrumps__link--last">
            <span class="breadcrumps__link-symbol"> > </span>
            Blog
          </p>
        <?php 
        endif;
        if(isset($args['prev']) && $args['prev']['name']) : ?>
          <a href="<?= get_home_url() .'/'.$args['prev']['slug'] ?>" class="breadcrumps__link">
            <span class="breadcrumps__link-symbol"> > </span>
            <?= $args['prev']['name'] ?>
          </a>
        <?php endif; ?>
        <p class="breadcrumps__link breadcrumps__link--last">
          <?php if($args['current'] !== '') : ?>
            <span class="breadcrumps__link-symbol"> > </span>
          <?php
            endif;
            $dots = strlen($args['current']) > 40 ? '...' : '';
            echo mb_substr($args['current'], 0, 40).$dots; 
          ?>
        </p>
      </div>
    </div>
  </div>
</div>