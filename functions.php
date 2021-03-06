<?php
/**
 * AmilyFalbum functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AmilyFalbum
 */

if ( ! function_exists( 'amilyfalbum_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function amilyfalbum_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AmilyFalbum, use a find and replace
		 * to change 'amilyfalbum' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'amilyfalbum', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'amilyfalbum' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'amilyfalbum_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'amilyfalbum_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function amilyfalbum_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'amilyfalbum_content_width', 640 );
}
add_action( 'after_setup_theme', 'amilyfalbum_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function amilyfalbum_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'amilyfalbum' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'amilyfalbum' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'amilyfalbum_widgets_init' );

/***
* Register widget area in picture-posting drawer (just for login purposes, really)
*/

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'drawer login', 'theme-slug' ),
        'id' => 'drawer_login',
        'description' => __( 'Widgets in this area will be shown ONLY in the bottom drawer', 'theme-slug' ),
        'before_widget' => '<div id="front-end-login" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );
}

/**
 * Enqueue scripts and styles.
 */
function amilyfalbum_scripts() {
	wp_enqueue_style( 'amilyfalbum-style', get_stylesheet_uri() );

	wp_enqueue_script( 'amilyfalbum-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'amilyfalbum-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'amilyfalbum-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'amilyfalbum_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * Plugin Name:       Front-end Media Example
 * Plugin URI:        http://derekspringer.wordpress.com
 * Description:       An example of adding the media loader on the front-end.
 * Version:           0.1
 * Author:            Derek Springer
 * Author URI:        http://derekspringer.wordpress.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       frontend-media
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Class wrapper for Front End Media example
 */
class Front_End_Media {
	/**
	 * A simple call to init when constructed
	 */
	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}
	function init() {
		load_plugin_textdomain(
			'frontend-media',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_shortcode( 'frontend-button', array( $this, 'frontend_shortcode' ) );
	}
	/**
	 * Call wp_enqueue_media() to load up all the scripts we need for media uploader
	 */
	function enqueue_scripts() {
		wp_enqueue_media();
		
	}

	function frontend_shortcode( $args ) {
		// check if user can upload files
		if ( is_user_logged_in() ) {
			$str = __( 'Select File', 'frontend-media' );
			return '<input id="frontend-button" type="button" value="Upload" class="button"><img id="frontend-image" />';
		} 
		return __( 'Please <a href="/familyalbum/login">Login</a> To Upload Pictures', 'frontend-media' );
	}
}
new Front_End_Media();

// unattached image loop?
function get_attachment_files(){
$args = array(
    'post_type' => 'attachment',
    'numberposts' => -1,
    'post_status' => null,
    'post_parent' => 0
);
$attachments = get_posts($args);
if ($attachments) { foreach ($attachments as $post) { setup_postdata($post); the_attachment_link($post->ID); } } }

?>