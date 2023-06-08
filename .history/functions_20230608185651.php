<?php
/**
 * Swistak Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Swistak_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'swistak_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function swistak_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Swistak Theme, use a find and replace
		 * to change 'swistak-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'swistak-theme', get_template_directory() . '/languages' );

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
		add_image_size( 'post', 500, 395 );
		add_image_size( 'portrait', 325, 488, true );
		add_image_size( 'help1', 260, 356, true );
		add_image_size( 'help2', 260, 316, true );
		add_image_size( 'recommendation', 130, 130 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'swistak-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'swistak_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'swistak_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function swistak_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'swistak_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'swistak_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function swistak_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'swistak-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'swistak-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'swistak_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function swistak_theme_scripts() {
	wp_enqueue_style( 'swistak-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'swistak-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'swistak-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'swistak_theme_scripts' );

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

function swistak_theme_styles_and_scripts() {
	wp_register_style('custom-styles', get_template_directory_uri().'/assets/public/dist/css/style.css', array(), rand(111,9999), 'all');
	wp_enqueue_style('custom-styles');
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/modernizr.js', array (), 1.5, true);
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', array (), rand(111,9999), true);
	wp_enqueue_script( 'anchor-scroll', get_template_directory_uri() . '/assets/js/anchor-scroll-master/scroll.min.js', array (), 1.5, true);
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/public/dist/js/Main.js', array(), 1.5, true);
	wp_enqueue_script( 'FadeInBottom', get_template_directory_uri() . '/assets/public/dist/js/FadeInBottom.js', array(), 1.5, true);
	wp_enqueue_script( 'FormLabel', get_template_directory_uri() . '/assets/public/dist/js/FormLabel.js', array(), 1.5, true);
	wp_enqueue_script( 'FormRodo', get_template_directory_uri() . '/assets/public/dist/js/FormRodo.js', array(), 1.5, true);
	wp_enqueue_script( 'HeaderPosition', get_template_directory_uri() . '/assets/public/dist/js/HeaderPosition.js', array('anchor-scroll'), 1.5, true);
	wp_enqueue_script( 'StringLimitation', get_template_directory_uri() . '/assets/public/dist/js/StringLimitation.js', array(), 1.5, true);
	wp_enqueue_script( 'SwiperCarousels', get_template_directory_uri() . '/assets/public/dist/js/SwiperCarousels.js', array('swiper'), 1.5, true);
	wp_enqueue_script( 'VideoHandler', get_template_directory_uri() . '/assets/public/dist/js/VideoHandler.js', array(), 1.5, true);
	wp_enqueue_script( 'WaveStore', get_template_directory_uri() . '/assets/public/dist/js/WaveStore.js', array(), 1.5, true);
}

add_action('wp_enqueue_scripts', 'swistak_theme_styles_and_scripts');

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

function add_menu_items_classname( $atts, $item, $args ) {
	$atts['class'] = 'scroll';
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_items_classname', 10, 3 );



function allow_nbsp_in_tinymce( $mceInit ) {
    $mceInit['entities'] = '160,nbsp,38,amp,60,lt,62,gt';   
    $mceInit['entity_encoding'] = 'named';
    return $mceInit;
}
add_filter( 'tiny_mce_before_init', 'allow_nbsp_in_tinymce' );


// tk test
function custom_menu_item_links($items, $args) {
	if (is_front_page()) {
			foreach ($items as $item) {
					if ($item->title == 'Blog') {
							$item->url = '#ks-blog';
					};
			};
	}else{
		foreach ($items as $item) {
			if ($item->title == 'Blog') {
					$item->url = 'https://swistak.webo.design/blog/';
			};
		};
	};
	return $items;
};
add_filter('wp_nav_menu_objects', 'custom_menu_item_links', 10, 2);

function posts_link_next_class($format){
	$format = str_replace('href=', 'class="next text-black rounded-full w-fit h-[60px] bg-slate-200 hover:bg-slate-300 transition-bg ease-out duration-300" href=', $format);
	return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
	$format = str_replace('href=', 'class="prev text-black rounded-full w-fit h-[60px] bg-slate-200 hover:bg-slate-300 transition-bg ease-out duration-300" href=', $format);
	return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');
