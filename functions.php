<?php
/**
 * V2starry-nights functions and definitions
 *
 * @package V2starry-nights
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600; /* pixels */
}

if ( ! function_exists( 'v2starry_nights_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function v2starry_nights_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on V2starry-nights, use a find and replace
	 * to change 'v2starry-nights' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'v2starry-nights', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'v2starry-nights' ),
            	'social' => __( 'Social Menu', 'v2starry-nights' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside'
	) );

	// Setup the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'v2starry_nights_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
}
endif; // v2starry_nights_setup
add_action( 'after_setup_theme', 'v2starry_nights_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function v2starry_nights_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'v2starry-nights' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
        
        register_sidebar( array(
		'name'          => __( 'footer-widgets', 'v2starry-nights' ),
            	'description'   => __( 'Footer widgets appear in the footer of the site',  'v2starry-nights'),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'v2starry_nights_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function v2starry_nights_scripts() {
	wp_enqueue_style( 'v2starry-nights-style', get_stylesheet_uri() );
        
        wp_enqueue_style('v2starry-nights', get_template_directory_uri() . '/layouts/content-sidebar.css');
        
        wp_enqueue_style('v2starry-nights-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:100,400,700,900,400italic,900italic|PT+Serif:400,700,400italic,700italic');

	wp_enqueue_style('v2starry-nights-font-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
        
        wp_enqueue_script( 'v2starry-nights-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20140726', true );
        
        wp_enqueue_script( 'v2starry-nights-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('v2starry-nights-superfish'), '20140726', true );
        
        wp_enqueue_script( 'v2starry-nights-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '20140726', true );
        
        wp_enqueue_script( 'v2starry-nights-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'v2starry-nights-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
        
        wp_enqueue_script( 'v2starry-nights-masonry', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20140401', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'v2starry_nights_scripts' );

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
