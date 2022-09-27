<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fv
 */

?>
</div>
    </div><!-- #content -->
      <footer id="colophon" class="site-footer">
        <div class="footer">
          <div class="footer__container container container--medium">
            <div class="footer__wrapper d-flex flex-xl-row flex-column  justify-content-between">
              <div class="footer__left d-flex flex-md-row flex-column align-items-center">
                <a href="<?= get_home_url() ?>" class="footer__logo">
                  <img class="footer__logo-image"  src="<?= images()?>main-logo.svg" alt="logotyp Impel group / blog">
                </a>
                <p class="footer__left-text">© Impel Group. All Rights Reserved</p>
              </div>
              <nav id="footer-nav" class="navigation navigation--footer d-flex flex-xl-row flex-column justify-content-end align-items-xl-center"> 
                <div class="footer__panel d-flex flex-column flex-md-row align-items-center"> 
                  <a href="https://impel.pl/polityka-prywatnosci/" rel=“nofollow” target="_blank" class="footer__panel-link justify-content-center justify-content-md-start d-flex align-items-center">
                    <span>Polityka prywatności</span>
                    <img class="footer__panel-button__icon" src="<?= images()?>arrow-right.svg" alt="granatowa strzałka w prawo">
                  </a>
                  <a href="https://impel.pl/polityka-cookies/" rel=“nofollow” target="_blank" class="footer__panel-link justify-content-center justify-content-md-start d-flex align-items-center">
                    <span>Polityka cookies</span>
                    <img class="footer__panel-button__icon" src="<?= images()?>arrow-right.svg" alt="granatowa strzałka w prawo">
                  </a>
                  <a href="https://impel.pl" rel=“nofollow” target="_blank" class="footer__panel-button d-flex align-items-center justify-content-between">
                    <span class="footer__panel-button__text">www.impel.pl</span>
                    <img class="footer__panel-button__icon" src="<?= images()?>arrow-right.svg" alt="granatowa strzałka w prawo">
                  </a>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </footer><!-- #colophon -->
  </div><!-- #page -->


    <!-- get info about posts -->
    <?php 
      $all_posts_id = get_posts(array(
        'fields'          => 'ids',
        'posts_per_page'  => -1
      ));
      $all_experts_id = get_posts(array(
        'post_type' => 'experts',
        'fields'          => 'ids',
        'posts_per_page'  => -1
      ));
    ?>

    <script>
      var singlePostCounter = "<?php echo (implode(', ', $all_posts_id)); ?>";
      var singleExpertsCounter = "<?php echo (implode(', ', $all_experts_id)); ?>";
      var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
      var homePageUrl = '<?php echo get_home_url(); ?>';
    </script>
    <?php wp_footer(); ?>
  </body>

</html>
