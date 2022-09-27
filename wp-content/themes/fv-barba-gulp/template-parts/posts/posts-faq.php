<section class="posts-faq__wrap">
  <div class="container container--medium">
    <div class="row justify-content-center">
      <div class="col-11 col-sm-12">
        <h2 class="posts-faq__main-title">FAQ</h2>
      </div>
      <?php foreach($args['faq'] as $accordion) : ?>
      <div data-accordion="wrap" class="posts-faq col-11 col-sm-12">
        <button data-accordion="button" class="posts-faq__button d-flex align-items-center justify-content-between">
          <span class="posts-faq__button-text"><?= $accordion['faq_title'] ?></span>
          <div class="posts-faq__icon-wrap d-flex align-items-center justify-content-center">
            <img data-accordion="icon" key="posts-faq__icon-1" class="posts-faq__icon" src="<?= images()?>icons/post-arrow.svg" alt="plus" />
          </div>
        </button>
        <div data-accordion="content" class="posts-faq__content">
          <?= $accordion['faq_content'] ?>
          <div class="posts-faq__content-indent"></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>