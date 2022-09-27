<?php
  $current_filter = 'wszyscy';
    if(isset($_GET['filter'])) {
      $current_filter = $_GET['filter'];
    }
?>
<div class="experts-filter__wrap">
  <div class="row align-items-start justify-content-between">
    <div 
      id="experts-filter"
      data-srtcurrent="<?= str_replace(' ', '-', $current_filter) ?>"
      class="experts-filter d-flex align-items-start align-items-xl-center flex-wrap flex-column flex-xl-row"
    >
      <button id="experts-filter-reset" class="experts-filter__reset active d-flex justify-content-between">
        <span>Wszyscy</span>
      </button>
    </div>
  </div>
  <div id="experts-up" class="experts__up d-none d-xl-flex align-items-center">
    <button class="experts__up-btn">
      <img class="experts__up-image" src="<?= images()?>icons/post-arrow.svg" alt="czerwona strzałka do góry">
    </button>
    <p class="experts__up-text">Do góry</p>
  </div>
</div>