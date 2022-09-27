<?php 
require_once ('Postcard_Base.php');

class Postcard_Mini extends Postcard_Base {
  public function get_card_html() {
    return '<div data-link="'.$this->card_props['link'].'" class="postcard postcard--mini">
      <div class="postcard-content">
        <div class="postcard-wrap postcard-wrap--mini d-flex flex-wrap">
          <div class="postcard-decore postcard-decore--mini">
            <div class="postcard-tags postcard-tags--mini d-flex flex-wrap align-items-end align-content-end">
              '.$this->get_card_tags().'
            </div>
            <picture>
              <source srcset="'.get_webp($this->card_props['image']).'" type="image/webp">
              <img class="postcard-image postcard-image--mini" src="'.$this->card_props['image'].'" alt="'.$this->card_props['title'].'">
            </picture>
          </div>
          <div class="postcard-info postcard-info--mini d-flex flex-column justify-content-between">
            <div class="postcard-info__link postcard-info__link--mini d-flex flex-column justify-content-between">
              <div class="postcard-content__wrap postcard-content__wrap--mini">
                <div class="postcard-info__wrap postcard-info__wrap--mini">
                  <a href="'.$this->card_props['link'].'" data-post="link">
                    <h3 class="postcard-title postcard-title--mini" data-post="link"> '.$this->card_props['title'].' </h3>
                  </a>
                  <p class="postcard-text postcard-text--mini">'.$this->card_props['text'].' </p>
                </div>
              </div>
              <p class="postcard-date postcard-date--mini d-flex align-items-center">
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
      </div>
    </div>';
  }
}
