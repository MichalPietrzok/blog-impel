<section class="posts__header posts__header--categories">
  <div class="posts__header-container container container--medium">
    <div class="row">
      <div class="posts__title-wrap col-12 col-lg-12">
        <div>
          <?php
            $current_categories = isset($_GET['inne']) ? explode(' ',$_GET['inne']) : [''];
            $all_categories = [];
            $selected_categories = [];
            $title_text = '';
            $other_categories = [];
            foreach(get_categories() as $category) {
              $all_categories[$category->slug] = $category->name;
            }
            $i = 0;
            foreach($all_categories as $key => $val) {
              if(in_array($key, $current_categories) && $key !== get_queried_object()->slug) {  
                $other_categories[] = $key;
              }
            }

            foreach($all_categories as $key => $val) {
              if(in_array($key, $current_categories)) {  
                $current_params = '';
                foreach($all_categories as $key2 => $val2) {
                  if(in_array($key2, $current_categories) && $key !== $key2) {
                    $current_params .= $key2.'+';
                  }
                }
                $current_url = get_queried_object()->slug;
                if(get_queried_object()->slug === $key && count($current_categories) > 1) {
                  if(count($other_categories) > 0) {
                    $current_url = $other_categories[0];
                  }
                }
                $current_link = $current_url.'/'.'?inne='.$current_params;
                $selected_categories[] = [
                  'slug' => $key,
                  'name' => $val,
                  'link' => $current_link
                ];
              }
            }
          ?>
        </div>
        <div class="d-flex align-items-center flex-wrap flex-lg-nowrap justify-content-between">
          <h1 class="posts__header-title order-1">Posty</h1>
          <div class="posts__header-categories order-3 order-lg-2 flex-grow-1">
            <?php
              if(count($selected_categories) > 1 ) :
                foreach($selected_categories as $cat) : ?>
                  <a class="posts__header-tag" href="<?= get_home_url()?>/kategoria/<?= $cat['link'] ?>">
                    <span class="posts__header-tag__text d-block">
                    <?= $cat['name'] ?>
                    </span>
                  </a>
            <?php
                endforeach;
              else :
            ?>
              <a class="posts__header-tag" href="<?= get_home_url()?>">
                <span class="posts__header-tag__text d-block">
                  <?= get_queried_object()->name ?>
                </span>
              </a>
            <?php endif; ?>
          </div>
          <div class="order-2 order-lg-3"> 
            <?php get_template_part('template-parts/sorting', null, ['mod' => 'posts']) ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>