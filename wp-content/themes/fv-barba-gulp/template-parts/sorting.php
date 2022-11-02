<?php 
  global $wp;
  $mod = 'default';
  if(isset($args['mod'])) {
    $mod = $args['mod'];
  }
?>
<div class="sorting__content sorting__content--<?= $mod ?>">
  <?php if($mod === 'home' || $mod === 'light') : ?>
    <div class="container container--<?= $mod === 'home' ? 'max' : 'medium' ?>">
      <div class="row">
        <div class="col-12">
  <?php endif; ?>
        <div class="sorting__wrap sorting__wrap--<?= $mod ?>  d-flex justify-content-center justify-content-lg-end align-items-start">
          <div class="sorting__list d-none">
            <?php 
              include_once("wp-config.php");
              include_once("wp-includes/wp-db.php");
              $sql = "SELECT post_title, post_name, ID FROM wp_posts WHERE post_type = 'post' AND post_status = 'publish'";
              $results = $wpdb->get_results($sql);
              foreach($results as $result) {
                $post_categories = wp_get_post_categories($result->ID, array( 'fields' => 'names' ) );
                echo '<a data-search-name="'.$result->post_name.'" data-search-cat="'.implode(', ', $post_categories).'" class="sorting__link" href="'.get_home_url().'/'.$result->post_name.'"> '.$result->post_title .' </a>';
              }
            ?>
          </div>
          <div class="sorting">
            <button data-sort="button" class="sorting__button">Filtruj według</button>
            <div data-sort="panel" class="sorting__panel">
              <div data-sort="panel" class="sorting__panel-wrap">
                <ul class="sorting__list d-flex flex-wrap" data-sort="panel">
                  <?php
                    $cat_trigger = '/kategoria/';
                    foreach(wp_get_nav_menu_items('Menu 1') as $item) :    
                      $cat_pos = stripos($item->url, $cat_trigger);
                      if($cat_pos != false || $item->url == '#') :
                        $data_sort_url = '#';
                        if($cat_pos != false) {
                          $len = strlen($cat_trigger);
                          $sbstr_len = $len + $cat_pos;
                          $sbstr = substr($item->url, $sbstr_len);
                          $data_sort_url = substr($sbstr, 0, -1);
                        }
                  ?>
                  
                  <li data-sort="panel" class="sorting__list-item sorting__list-item--<?=$item->url == '#' ? 'parent' : 'child' ?>">
                    <button
                      data-sort="check"
                      data-sort-url="<?= $data_sort_url ?>"
                      data-sort-search="<?= $item->title ?>"
                      class="sorting__list-button d-flex align-items-center justify-content-between"
                    >
                      <span data-sort="check" class="sorting__list-text"><?= $item->title ?></span>
                    </button>
                  </li>
                  <?php 
                      endif;
                    endforeach; 
                  ?>
                </ul>
                <div class="sorting__summary d-lg-flex justify-content-between align-items-center">
                  <p data-sort="text" class="sorting__summary-text">
                    znaleziono 
                    <span 
                      class="sorting__summary-amount" 
                      data-sort="amount"
                    >
                      0
                    </span>
                    artykułów</p>
                    <div class="d-sm-flex align-items-center">
                      <button data-sort="reset" class="sorting__reset d-flex align-items-center">
                        <img data-sort="reset" class="sorting__reset-icon" src="<?= images() ?>icons/reset.svg" alt="okrągła strazłka">
                        <span data-sort="reset" class="sorting__reset-text">Resetuj filtrowanie</span>
                      </button>
                      <a
                        class="sorting__summary-link disabled d-flex align-items-center"
                        href="<?= get_home_url()?>/kategoria"
                      >
                        <span class="sorting__summary-link__text">Filtruj</span>
                        <img src="<?= images()?>arrow-right.svg" class="sorting__summary-link__icon" />
                      </a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php if($mod === 'home' || $mod === 'light') : ?>
      </div>
    </div>
  </div>
<?php endif; ?>