<?php

/**
 * fv functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fv
 */

if (!function_exists('fv_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fv_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fv, use a find and replace
		 * to change 'fv' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('fv', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'fv'),
		));

    add_image_size( 'news-big', 886, 526, true);
    add_image_size( 'news-medium', 500, 250, true);
    add_image_size( 'news-mini', 460, 270, true);
    add_image_size( 'full-hd', 1920, 980, true);
		add_image_size( 'post-info', 1046, 9999, true );
		add_image_size( 'experts', 136, 136, true);
		add_image_size( 'experts-big', 167, 167, true);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'post-thumbnails',
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('fv_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'fv_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fv_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('fv_content_width', 640);
}
add_action('after_setup_theme', 'fv_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fv_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'fv'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'fv'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'fv_widgets_init');

/**
 * Enqueue scripts and styles.
 */

function add_async_forscript($url)
{
	if (strpos($url, '#asyncload') === false)
		return $url;
	else if (is_admin())
		return str_replace('#asyncload', '', $url);
	else
		return str_replace('#asyncload', '', $url) . "' defer='defer";
}
add_filter('clean_url', 'add_async_forscript', 11, 1);


function fv_scripts()
{
	wp_enqueue_style('fv-css-libs', get_template_directory_uri() . '/dist/css/libs.css');
	wp_enqueue_style('fv-css-app', get_template_directory_uri() . '/dist/css/app.css');

	wp_enqueue_script('fv-js-libs', get_template_directory_uri() . '/dist/js/libs.js#asyncload',  array(), '20151215', true);
	wp_enqueue_script('fv-js-app', get_template_directory_uri() . '/dist/js/app.js#asyncload',  array(), '20151215', true);
	
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'fv_scripts');

function add_favicon()
{
	echo '<link rel="shortcut icon" type="image/x-icon" href="' . get_template_directory_uri() . '/favicon.png" />';
}

add_action('wp_head', 'add_favicon');



// function blockusers_init() {
 
//   if ( is_admin() && ! current_user_can( 'administrator' ) &&
  
//   ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
  
//   wp_redirect( home_url() );
  
//   exit;
  
//   }
  
//   }
//   add_action( 'init', 'blockusers_init' );

// function redirect_login_page() {  
//   $page_viewed = basename($_SERVER['REQUEST_URI']);  

//   if( $page_viewed == "wp-login.php?pass=1" ) {  
//       wp_redirect( home_url() );  
//       exit;  
//   }  
// }  
// add_action('init','redirect_login_page');



/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );



function logout_page() {  
  $login_page  = home_url( 'wp-admin' );  
  wp_redirect( $login_page . "?loggedout=true" );  
  exit;  
}  
add_action('wp_logout','logout_page');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
  acf_set_options_page_menu('Options');
}
require get_template_directory() . '/inc/get_webp.php';
require get_template_directory() . '/inc/postcard/Postcard.php';
require get_template_directory() . '/inc/postcard/Postcard_Mini.php';
require get_template_directory() . '/inc/postcard/Postcard_Big.php';

require get_template_directory() . '/inc/pagination-nav.php';

function replace_core_jquery_version() {
  wp_deregister_script( 'jquery' );

  wp_register_script( 'jquery',  get_template_directory_uri() . '/jquery-3.5.1.min.js', array(), '3.5.1' );
}


function images() {
  return bloginfo('template_directory').'/dist/img/';
}

add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );





function experts_init()
{
	$args = array(
		'label' => 'Eksperci',
		'public' => true,
		'has_archive' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array(
			'with_front' => false,
			'slug' => 'ekspert',
		),
		'query_var' => true,
		'menu_icon' => 'dashicons-welcome-write-blog',
		'supports' => array(
			'title',
			'revisions',
			'page-attributes',
			'author'
		),
		'show_in_rest' => true,
		'rest_base' => 'experts',
		'taxonomies' => array( 'category' )
	);
	register_post_type('experts', $args);
}
add_action('init', 'experts_init');



add_action('init', 'create_rodzaj_hierarchical_taxonomy', 0);
//create a custom taxonomy name it topics for your posts
function create_rodzaj_hierarchical_taxonomy()
{
	// Add new taxonomy, make it hierarchical like categories
	//first do the translations part for GUI
	$labels = array(
		'name' => _x('Rodzaj wpisu', 'taxonomy general name'),
		'singular_name' => _x('Rodzaj', 'taxonomy singular name'),
		'search_items' =>  __('Wyszukaj rodzaj'),
		'all_items' => __('Wszystkie Rodzaj'),
		'parent_item' => __('Rodzic rodzaj'),
		'parent_item_colon' => __('Rodzic rodzaj:'),
		'edit_item' => __('Edytuj rodzaj'),
		'update_item' => __('Aktualizuj rodzaj'),
		'add_new_item' => __('Dodaj nowego rodzaj'),
		'new_item_name' => __('Dodaj nowego rodzaj'),
		'menu_name' => __('Rodzaj wpisu'),
		'local_images' => true
	);
	// Now register the taxonomy
	register_taxonomy('rodzaj', array('post'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'rodzaj'),
		'show_in_rest'      => true // Needed for tax to appear in Gutenberg editor.
	));
}



function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
