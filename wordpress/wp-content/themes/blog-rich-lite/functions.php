<?php
/*This file is part of Magic Elementor child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/
$blog_rich_lite_theme = wp_get_theme();
if (!defined('BLOG_RICH_LITE_VERSION')) {
	// Replace the version number of the theme on each release.
	define('BLOG_RICH_LITE_VERSION', $blog_rich_lite_theme->get('Version'));
}

function blog_rich_lite_fonts_url()
{
	$fonts_url = '';

	$font_families = array();

	$font_families[] = 'Urbanist:400,600,700,900';
	$font_families[] = 'Playfair Display:400,600,700';

	$query_args = array(
		'family' => urlencode(implode('|', $font_families)),
		'subset' => urlencode('latin,latin-ext'),
	);


	$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css2');

	return esc_url_raw($fonts_url);
}


function blog_rich_lite_enqueue_child_styles()
{
	wp_enqueue_style('blog-rich-lite-google-font', blog_rich_lite_fonts_url(), array(), null);
	wp_enqueue_style('blog-rich-lite-parent-style', get_template_directory_uri() . '/style.css', array('blog-rich-style'), BLOG_RICH_LITE_VERSION, 'all');
	wp_enqueue_style('blog-rich-lite-main', get_stylesheet_directory_uri() . '/assets/css/main.css', array('bootstrap', 'blog-rich-style', 'blog-rich-main-style', 'blog-rich-default-style', 'bootstrap'), BLOG_RICH_LITE_VERSION, 'all');
}
add_action('wp_enqueue_scripts', 'blog_rich_lite_enqueue_child_styles');





add_filter('excerpt_more', 'blog_rich_lite_exerpt_empty_string', 999);
function blog_rich_lite_exerpt_empty_string($more)
{
	if (is_admin()) {
		return $more;
	}
	return '';
}

function blog_rich_lite_excerpt_length($length)
{
	if (is_admin()) {
		return $length;
	}
	return 15;
}
add_filter('excerpt_length', 'blog_rich_lite_excerpt_length', 9999);


/**
 * Customizer functions
 */
require get_stylesheet_directory() . '/inc/customizer.php';
