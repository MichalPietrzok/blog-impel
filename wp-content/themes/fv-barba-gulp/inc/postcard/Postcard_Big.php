<?php 
require_once ('Postcard_Base.php');

class Postcard_Big extends Postcard_Base {
  public function get_card_html() {
    return '<div data-link="'.$this->card_props['link'].'" class="postcard postcard--big d-flex">
    <div class="postcard-wrap postcard-wrap--big d-flex flex-wrap">
      <div class="postcard-info postcard-info--big d-flex flex-column justify-content-between ">
        <div class="postcard-tags postcard-tags--big d-flex flex-wrap align-items-end align-content-end">
          '.$this->get_card_tags().'
        </div>
        <div class="postcard-info__link postcard-info__link--big d-flex flex-column justify-content-between">
          <div class="postcard-info__wrap postcard-info__wrap--big">
            <a href="'.$this->card_props['link'].'" data-post="link">
              <h3 class="postcard-title postcard-title--big" data-post="link"> '.$this->card_props['title'].' </h3>
            </a>
            <p class="postcard-text postcard-text--big">'.$this->card_props['text'].' </p>
          </div>
          <div>
            <p class="postcard-date postcard-date--big d-flex align-items-center">
              <img class="postcard-date__icon" src="'.$this->image_path.'icons/calendar.svg" alt="kalendarz">
              <span class="postcard-date__text">'.$this->card_props['date'].'</span>
            </p>
            <div class="postcard-link">
              <div class="postcard-link__wrap d-flex align-items-center justify-content-end">
                <span class="postcard-link__text">Czytaj więcej</span>
                <img class="postcard-icon" src="'.$this->image_path.'icons/post-arrow.svg" alt="czerwona strzałka w prawo">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="postcard-decore postcard-decore--big">
        <picture>
        
          <source srcset="'.get_webp($this->card_props['image']).'" type="image/webp">
          <img class="d-none d-lg-block postcard-image postcard-image--big" src="'.$this->card_props['image'].'" alt="'.$this->card_props['title'].'">
        </picture>
        <picture>
          <source srcset="'.get_webp($this->card_props['image_mini']).'" type="image/webp">
          <img class="d-block d-lg-none postcard-image postcard-image--big" src="'.$this->card_props['image_mini'].'" alt="'.$this->card_props['title'].'">
        </picture>        
      </div>
    </div>
  </div>';
  }
}