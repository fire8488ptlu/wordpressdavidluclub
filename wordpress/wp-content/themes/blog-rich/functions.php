<?php

/**
 * Blog Rich functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blog Rich
 */

$blog_rich_theme = wp_get_theme();
$blog_rich_text_domain = $blog_rich_theme->get('TextDomain');

if (!defined('BLOG_RICH_VERSION')) {
	define('BLOG_RICH_VERSION', $blog_rich_theme->get('Version'));
}

if (!function_exists('blog_rich_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blog_rich_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Blog, use a find and replace
		 * to change 'blog-rich' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('blog-rich', get_template_directory() . '/languages');

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
		register_nav_menus(
			array(
				'main-menu' => esc_html__('Main Menu', 'blog-rich'),
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
				'blog_rich_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');
		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');
		add_theme_support("responsive-embeds");

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
add_action('after_setup_theme', 'blog_rich_setup');



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_rich_content_width()
{
	$GLOBALS['content_width'] = apply_filters('blog_rich_content_width', 1170);
}
add_action('after_setup_theme', 'blog_rich_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_rich_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'blog-rich'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'blog-rich'),
			'before_widget' => '<section id="%1$s" class="widget mb-5 p-3 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'blog_rich_widgets_init');



/**
 * Enqueue scripts and styles.
 */
function blog_rich_scripts()
{
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '5.0.1', 'all');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.css', array(), '5.15.3');
	wp_enqueue_style('blog-rich-block-style', get_template_directory_uri() . '/assets/css/block.css', array(), BLOG_RICH_VERSION);
	wp_enqueue_style('blog-rich-default-style', get_template_directory_uri() . '/assets/css/default-style.css', array(), BLOG_RICH_VERSION);
	wp_enqueue_style('blog-rich-main-style', get_template_directory_uri() . '/assets/css/main.css', array(), BLOG_RICH_VERSION);
	wp_enqueue_style('blog-rich-style', get_stylesheet_uri(), array(), BLOG_RICH_VERSION);
	wp_enqueue_style('blog-rich-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), BLOG_RICH_VERSION);

	wp_enqueue_script('masonry');
	wp_enqueue_script('blog-rich-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), BLOG_RICH_VERSION, true);
	wp_enqueue_script('blog-rich-mmenu-scripts', get_template_directory_uri() . '/assets/js/mobile-menu.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('blog-rich-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), BLOG_RICH_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'blog_rich_scripts');

function blog_rich_gb_block_style()
{

	wp_enqueue_style('blog-rich-gb-block', get_theme_file_uri('/assets/css/admin-block.css'), false, '1.0', 'all');
}
add_action('enqueue_block_assets', 'blog_rich_gb_block_style');

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
add_filter('excerpt_more', 'blog_rich_exerpt_empty_string', 999);
function blog_rich_exerpt_empty_string($more)
{
	if (is_admin()) {
		return $more;
	}
	return '';
}
function blog_rich_excerpt_length($length)
{
	if (is_admin()) {
		return $length;
	}
	return 60;
}
add_filter('excerpt_length', 'blog_rich_excerpt_length', 999);


/*
* Customizer pro info .
*/
require get_template_directory() . '/inc/info/class-customize.php';

if (is_admin()) {
	require_once trailingslashit(get_template_directory()) . 'inc/about/about.php';
}


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

// Load all actions file
require get_template_directory() . '/actions/header-actions.php';
require get_template_directory() . '/actions/home-intro.php';


/**
 * Add tem plugin Recomended
 */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/recomended-plugin.php';

