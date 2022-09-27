<?php 
class Postcard_Base {
  public $card_props;
  public $image_path;

  public function __construct ($props) {
    $this->card_props = $props;
    $this->image_path = get_template_directory_uri().'/dist/img/';
  }

  public function get_card_type($val='name') {
    $current_type = '';
    if(isset($this->card_props['type'][0]->$val)) {
      $current_type = $this->card_props['type'][0]->$val;
    }
    return $current_type;
  }

  public function get_card_tags() {
    $current_tags = '';
    global $wp;
    $current_url = home_url( $wp->request );
    foreach(array_slice($this->card_props['tags'], 0, 5) as $tag) {
      $tag_link = get_home_url().'/kategoria/'.$tag->slug;
      $tag_modification = '';
      if($tag_link === $current_url) {
        $tag_modification = 'link-disabled';
      }
      $current_tags .= '
      <a data-post="tag" href="'.$tag_link.'" class="postcard-tag d-flex align-items-center '.$tag_modification.'">
        <span data-post="tag" class="postcard-tag__text">'.$tag->cat_name.'</span>
      </a>';
    }
    if(count($this->card_props['tags']) > 5) {
      $current_tags .= '
      <a class="postcard-tag d-flex align-items-center '.$tag_modification.'">
        <span class="postcard-tag__text">...</span>
      </a>';
    }
    return $current_tags;
  }
}