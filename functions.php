<?php
/**
 * BS4WP functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package BS4WP
 */

if ( ! function_exists( 'bs4wp_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bs4wp_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on BS4WP, use a find and replace
		 * to change 'bs4wp' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bs4wp', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'bs4wp' ),
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
		add_theme_support( 'custom-background', apply_filters( 'bs4wp_custom_background_args', array(
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
add_action( 'after_setup_theme', 'bs4wp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bs4wp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bs4wp_content_width', 640 );
}
add_action( 'after_setup_theme', 'bs4wp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bs4wp_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bs4wp' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bs4wp' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bs4wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bs4wp_scripts() {

	// minified stylesheet
	wp_enqueue_style( 'baseinstall-min-style', get_template_directory_uri() . '/assets/css/main.css', array(), time() ); 



	// wp_enqueue_style( 'bs4wp-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'bs4wp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true ); // don't need this one

	// vendor scripts - pick slim or full verion of jQuery
	// wp_enqueue_script( 'baseinstall-jquery', get_template_directory_uri().'/assets/js/vendor/jquery-slim.min.js' ); // jQuery slim build (70kb)
	wp_enqueue_script( 'baseinstall-jquery', get_template_directory_uri().'/assets/js/vendor/jquery-2.2.4.min.js' ); // jQuery full build (86kb)
	wp_enqueue_script( 'baseinstall-popper', get_template_directory_uri().'/assets/js/vendor/popper.min.js' );

	// theme scripts
	wp_enqueue_script( 'baseinstall-js', get_template_directory_uri() . '/assets/js/main.js', array(), '20151215', true ); 



	wp_enqueue_script( 'bs4wp-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/vendor/skip-link-focus-fix.js', array(), '20151215', true );






	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bs4wp_scripts' );

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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}







/**
 * CUSTOM FUNCTIONS START BELOW
 * below are some optional additions to theme functionality
 * feel free to edit or delete to suit your needs
 */






/**
 * Custom nav walker to add consistent class/ID for CSS/JS targeting.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/*
 * Custom post type for Portfolio Items
 */
// require get_template_directory() . '/inc/custom-post-portfolio.php';

/*
 * Load the theme options page.
 */
// require get_template_directory() . '/inc/theme-options/theme-options.php';



