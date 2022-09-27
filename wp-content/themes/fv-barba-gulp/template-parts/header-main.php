<?php 
  $links = [
    ['title' => 'Usługi', 'url' => 'https://impel.pl/uslugi/', 
      'sublist' => [
        ['title' => 'Dla firm', 'url' => 'https://impel.pl/uslugi/'],
        ['title' => 'Dla segmentów rynku', 'url' => 'https://impel.pl/uslugi/#industries'],
        ['title' => 'Dla klientów indywidualnych', 'url' => 'https://impel.pl/uslugi/#other' ]
      ]  
    ],
    ['title' => 'O nas', 'url' => 'https://impel.pl/o-nas/',
    'sublist' => [
        ['title' => 'Grupa Impel', 'url' => 'https://impel.pl/o-nas/grupa-impel/'],
        ['title' => 'Impel SA', 'url' => 'https://impel.pl/o-nas/impel-sa/akcjonariat/'],
        ['title' => 'Franczyza', 'url' => 'https://impel.pl/o-nas/franczyza/' ],
        ['title' => 'Współpraca', 'url' => 'https://impel.pl/o-nas/wspolpraca/' ]
      ]
    ],
    ['title' => 'Jak działamy', 'url' => 'https://impel.pl/jak-dzialamy/',
      'sublist' => [
        ['title' => 'Jak pracujemy z klientem', 'url' => 'https://impel.pl/jak-dzialamy/jak-pracujemy-z-klientem/'],
        ['title' => 'Nasze wartości', 'url' => 'https://impel.pl/jak-dzialamy/nasze-wartosci/'],
        ['title' => 'Odpowiedzialność biznesu', 'url' => 'https://impel.pl/jak-dzialamy/odpowiedzialnosc-biznesu/' ],
        ['title' => 'Standardy jakości', 'url' => 'https://impel.pl/jak-dzialamy/standardy-jakosci/' ],
        ['title' => 'Projekty unijne', 'url' => 'https://impel.pl/jak-dzialamy/projekty-unijne/' ]
      ]
    ],
    ['title' => 'Aktualności', 'url' => 'https://impel.pl/aktualnosci/'],
    ['title' => 'Praca', 'url' => 'https://impel.pl/praca/'],
    ['title' => 'Kontakt', 'url' => 'https://impel.pl/kontakt/']
  ];
?>
<div class="header-main d-none d-xl-flex align-items-center">
  <div class="header-main__container container container--medium"> 
    <div class="header-main__wrap row d-flex align-items-center justify-content-between">
      <div class="col-xl-3">
        <a class="header-main__logo" href="<?= get_home_url() ?>">
          <img class="header-main__img" src="<?= images() ?>main-logo.svg" alt="impel">
        </a>
      </div>
      <ul class="header-main__list d-lg-flex align-items-center col" data-barba-prevent="all">
        <?php foreach($links as $link) : ?>
          <li class="header-main__item align-items-center">
            <a
            class="header-main__link <?= isset($link['sublist']) ? 'header-main__link--sublist' : '' ?>"
            href="<?= $link['url'] ?>">
              <?= $link['title'] ?>
            </a>
            <?php if(isset($link['sublist'])) : ?>
              <ul class="header-main__sublist">
                <?php foreach($link['sublist'] as $sublink) : ?>
                  <li class="header-main__subitem">
                    <a class="header-main__sublink d-block" href="<?= $sublink['url'] ?>"><?= $sublink['title'] ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="header-main__contact d-flex align-items-center col-xl-2 justify-content-xl-end">
        <a class="header-main__mail" href="mailto:cc.info@impel.pl">
          <img class="header-main__icon" src="<?= images() ?>mail.svg" alt="koperta">
        </a>
        <a class="header-main__phone" href="tel:+48 800 190 911">+48 800 190 911</a>
      </div>
    </div>
  </div>
</div>