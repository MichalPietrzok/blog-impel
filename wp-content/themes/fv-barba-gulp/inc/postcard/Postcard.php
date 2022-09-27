<?php 
require_once ('Postcard_Base.php');

class Postcard extends Postcard_Base {
  public function get_card_html() {
    return '<div data-link="'.$this->card_props['link'].'" class="postcard" >
    <div class="postcard-wrap d-flex flex-wrap">
      <div class="postcard-info d-flex flex-column justify-content-between ">
        <div class="postcard-tags d-flex flex-wrap align-items-end align-content-end">
          '.$this->get_card_tags().'
        </div>
        <div class="postcard-info__link d-flex flex-column justify-content-between">
          <div class="postcard-info__wrap">
            <a href="'.$this->card_props['link'].'" data-post="link">
              <h3 class="postcard-title" data-post="link"> '.$this->card_props['title'].' </h3>
            </a>
            <p class="postcard-text">'.$this->card_props['text'].' </p>
          </div>
          <p class="postcard-date d-flex align-items-center">
            <img class="postcard-date__icon" src="'.$this->image_path.'icons/calendar.svg" alt="kalendarz">
            <span class="postcard-date__text">'.$this->card_props['date'].'</span>
          </p>
        </div>
      </div>
      <div  class="postcard-link">
        <div class="postcard-link__wrap d-flex align-items-center justify-content-end">
          <span class="postcard-link__text">Czytaj więcej</span>
          <img class="postcard-icon" src="'.$this->image_path.'icons/post-arrow.svg" alt="czerwona strzałka w prawo">
        </div>
      </div>
      <div class="postcard-decore">
        <picture>
          <source srcset="'.get_webp($this->card_props['image']).'" type="image/webp">
          <img class="postcard-image" src="'.$this->card_props['image'].'" alt="'.$this->card_props['title'].'">
        </picture>
      </div>
    </div>
  </div>';
  }
}
