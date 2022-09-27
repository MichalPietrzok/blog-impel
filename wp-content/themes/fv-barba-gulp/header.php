<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fv
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <link rel="stylesheet" href="https://use.typekit.net/wex3ncp.css">
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory(); ?>/dist/img/icons/browser-icons/favicon-32x32.png">
<link rel="mask-icon" href="<?php echo get_template_directory(); ?>/dist/img/icons/browser-icons/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
	<?php wp_head(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-11085216-3"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

 

  gtag('config', 'UA-11085216-3');

</script>

</head>

<body data-barba="wrapper">
	<div id="page" class="site">
		<header id="main-header" class="header site-header">
      <?php get_template_part('template-parts/header-main'); ?>    
      <div class="header__wrapper d-flex align-items-center">
        <div class="header__container container container--medium">
          <div class="header__top row align-items-center align-items-xl-start align-items-xl-center justify-content-between">
          <a class="header-main__logo" href="<?= get_home_url() ?>">
            <img class="header-main__img d-block d-xl-none" src="<?= images() ?>main-logo.svg" alt="impel">
          </a>
            <nav id="main-nav" class="navigation navigation--header col-xl-9 d-flex flex-column-reverse  flex-xl-row align-items-xl-end align-items-xl-center justify-content-xl-between">
              <?php 
                $args = array(
                  'container'     => '',
                  'depth'         => 3,
                  'fallback_cb'   => false,
                  'add_li_class'  => 'navigation__item',
                  'menu_class'    => 'navigation__list justify-content-start d-flex flex-column flex-xl-row'
                  );
                wp_nav_menu($args);
              ?>
              <div class="header__links-wrap d-flex flex-column flex-xl-row align-items-center">
                <div class="header__links d-flex justify-content-center align-items-center">
                    <a class="header__social" target="blank" rel=“nofollow” href="https://www.linkedin.com/company/impel-s-a-/">
                      <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><g><g><g><path fill="#040931" d="M17.842 17.5v-.001h.004v-6.235c0-3.05-.657-5.4-4.222-5.4-1.714 0-2.865.941-3.334 1.833h-.05V6.15H6.86V17.5h3.52v-5.62c0-1.48.28-2.91 2.113-2.91 1.805 0 1.832 1.688 1.832 3.005V17.5z"/></g><g><path fill="#040931" d="M1.127 6.15h3.525V17.5H1.127z"/></g><g><path fill="#040931" d="M2.888.5A2.042 2.042 0 0 0 .846 2.541c0 1.127.915 2.06 2.042 2.06 1.127 0 2.041-.933 2.041-2.06A2.043 2.043 0 0 0 2.888.5z"/></g></g></g></svg>
                    </a>
                    <a class="header__social" target="blank" rel=“nofollow” href="https://www.youtube.com/channel/UCdZSLrV2LcXPpCvJKh2OxLQ">
                      <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18"><g><g><g><path fill="#040931" d="M10.374 12.4V5.264l6.195 3.568zm13.782-9.293a2.982 2.982 0 0 0-2.098-2.098C20.196.5 12.746.5 12.746.5S5.296.5 3.434.99a3.042 3.042 0 0 0-2.098 2.117C.846 4.97.846 8.832.846 8.832s0 3.882.49 5.724a2.982 2.982 0 0 0 2.098 2.098c1.882.51 9.312.51 9.312.51s7.45 0 9.312-.49a2.982 2.982 0 0 0 2.098-2.098c.49-1.862.49-5.725.49-5.725s.02-3.881-.49-5.744z"/></g></g></g></svg>                    </a>
                    <a class="header__social" target="blank" rel=“nofollow” href="https://twitter.com/Impel_SA">
                      <svg class="d-block" xmlns="http://www.w3.org/2000/svg" width="23" height="19" viewBox="0 0 23 19"><g><g><path fill="#040931" d="M23 2.63a9.47 9.47 0 0 1-2.617.718 4.516 4.516 0 0 0 1.998-2.51 9.076 9.076 0 0 1-2.88 1.1 4.54 4.54 0 0 0-7.856 3.106c0 .359.03.705.105 1.035-3.776-.185-7.117-1.994-9.361-4.751a4.573 4.573 0 0 0-.622 2.296c0 1.573.81 2.967 2.017 3.774a4.485 4.485 0 0 1-2.052-.56v.05a4.563 4.563 0 0 0 3.64 4.463c-.37.101-.774.15-1.192.15-.29 0-.584-.017-.86-.078.589 1.799 2.259 3.121 4.244 3.164a9.126 9.126 0 0 1-5.63 1.937c-.373 0-.73-.017-1.088-.062A12.786 12.786 0 0 0 7.814 18.5c8.357 0 12.926-6.923 12.926-12.924 0-.2-.007-.395-.016-.587A9.06 9.06 0 0 0 23 2.63z"/></g></g></svg>                
                    </a>
                </div> 
              </div>
            </nav>
            <div class="header__button-wrap">
              <button class="header__button d-flex align-items-center justify-content-center flex-column">
                <span class="header__button-line header__button-line--first"></span>
                <span class="header__button-line header__button-line--second"></span>
                <span class="header__button-line header__button-line--third"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="page-transition">
      <div class="page-transition__wrap"></div>
    </div>
    <div id="content" class="site-content">
      <?php get_template_part('template-parts/subscribe'); ?>

