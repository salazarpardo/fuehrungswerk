<?php
/**
 * fuehrungswerk functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fuehrungswerk
 */

if ( ! function_exists( 'fuehrungswerk_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fuehrungswerk_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fuehrungswerk, use a find and replace
	 * to change 'fuehrungswerk' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'fuehrungswerk', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'fuehrungswerk' ),
		'top' => esc_html__( 'Top', 'fuehrungswerk' ),
		'footer' => esc_html__( 'Footer', 'fuehrungswerk' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fuehrungswerk_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'fuehrungswerk_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fuehrungswerk_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fuehrungswerk_content_width', 1260 );
}
add_action( 'after_setup_theme', 'fuehrungswerk_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fuehrungswerk_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fuehrungswerk' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Intro', 'fuehrungswerk' ),
		'id'            => 'home-intro',
		'description'   => 'Introduction below slider',
		'before_widget' => '<section id="%1$s" class="widget text-center %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title hide">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Services', 'fuehrungswerk' ),
		'id'            => 'services',
		'description'   => 'Services widgets',
		'before_widget' => '<div class="widget">
								<section id="%1$s" class="text-widget text-center %2$s">
									<div class="circle">
										<header class="entry-header">',
		'after_widget'  => '</header></div></section></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Footer', 'fuehrungswerk' ),
		'id'            => 'home-footer',
		'description'   => 'Widgets before footer in home',
		'before_widget' => '<div class="widget"><section id="%1$s" class="footer-widget %2$s">',
		'after_widget'  => '</section></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Single Page Circles', 'fuehrungswerk' ),
		'id'            => 'circles',
		'description'   => 'Circle text widgets',
		'before_widget' => '<div class="widget">
								<section id="%1$s" class="text-widget text-center %2$s">
									<div class="circle">
										<header class="entry-header">',
		'after_widget'  => '</header></div></section></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fuehrungswerk_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fuehrungswerk_scripts() {
	wp_enqueue_style( 'fuehrungswerk-style', get_stylesheet_uri() );

	/* Add Theme CSS */
	wp_enqueue_style( 'fuehrungswerk-custom-style', get_stylesheet_directory_uri() . '/fuehrungswerk.css', array(), '1' );
	
	/* Add Foundation JS */
	wp_enqueue_script( 'what-input', get_template_directory_uri() . '/node_modules/foundation-sites/node_modules/what-input/what-input.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/node_modules/foundation-sites/dist/foundation.min.js', array( 'jquery' ), '1', true );

	/* Slick JS */
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js', array( 'jquery' ), '1', true );

	/* Scripts Init JS */
	wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '1', true );

	/* Sticky Nav */
	wp_enqueue_script( 'sticky-nav-js', get_template_directory_uri() . '/js/header.js', array(), '1', true );
	
	wp_enqueue_script( 'fuehrungswerk-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'fuehrungswerk-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fuehrungswerk_scripts' );


if ( ! class_exists( 'Fuehrungswerk_Top_Bar_Walker' ) ) :
class Fuehrungswerk_Top_Bar_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
  		$output .= "\n$indent<ul class=\"dropdown menu vertical\" data-dropdown-menu>\n";
	}
}
endif;

if ( ! class_exists( 'Fuehrungswerk_Mobile_Walker' ) ) :
class Fuehrungswerk_Mobile_Walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"vertical nested menu\">\n";
	}
}
endif;

function add_menuclass($ulclass) {
return preg_replace('/<a rel="button"/', '<a rel="button" class="button tiny secondary"', $ulclass, 1);
}
add_filter('wp_nav_menu','add_menuclass');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Remove default styles for admin bar.
 */
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action( 'init', 'fuehrungswerk_excerpts_to_pages' );
function fuehrungswerk_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

add_filter( 'get_the_archive_title', function ( $title ) {

	if ( is_post_type_archive() ) {
		$title = post_type_archive_title('<h1 class="entry-title">', '</h1>');
	}

	elseif ( is_archive() ) {
		$title = the_archive_title('<h1 class="entry-title">', '</h1>'); 
	}

	return $title;

});