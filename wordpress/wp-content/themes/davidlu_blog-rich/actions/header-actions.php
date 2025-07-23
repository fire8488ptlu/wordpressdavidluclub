<?php

/**
 * The file for header all actions
 *
 *
 * @package Blog Rich
 */

function blog_rich_header_menu_output()
{
?>
	<nav id="site-navigation" class="main-navigation">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'main-menu',
			'menu_id'        => 'blog-rich-menu',
			'menu_class'        => 'blog-rich-menu',
		));
		?>
	</nav><!-- #site-navigation -->
<?php
}
add_action('blog_rich_main_menu', 'blog_rich_header_menu_output');


function blog_rich_header_logo_output()
{
	$blog_rich_site_tagline_show = get_theme_mod('blog_rich_site_tagline_show');

?>

	<?php if (has_custom_logo()) : ?>
		<div class="site-branding brand-logo">
			<?php
			the_custom_logo();
			?>
		</div>
	<?php endif; ?>
	<?php
	if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
		<div class="site-branding brand-text">
			<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
				$blog_rich_description = get_bloginfo('description', 'display');
				if (($blog_rich_description || is_customize_preview()) && empty($blog_rich_site_tagline_show)) :
				?>
					<p class="site-description"><?php echo $blog_rich_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?></p>
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .site-branding -->
	<?php endif; ?>

<?php
}
add_action('blog_rich_header_logo', 'blog_rich_header_logo_output');




// header style one
function blog_rich_header_style_one()
{
?>
	<div class="container pxm-style1">
		<div class="navigation mx-4">
			<div class="d-flex">
				<div class="pxms1-logo">
					<?php do_action('blog_rich_header_logo'); ?>
				</div>
				<div class="pxms1-menu ms-auto">
					<?php do_action('blog_rich_main_menu'); ?>
				</div>
			</div>
		</div>
	</div>


<?php
}
add_action('blog_rich_header_style_one', 'blog_rich_header_style_one');

// header style one
function blog_rich_header_style_two()
{

?>
	<div class="blog-rich-logo-section">
		<div class="container">
			<div class="head-logo-sec">
				<?php do_action('blog_rich_header_logo'); ?>
			</div>
		</div>
	</div>

	<div class="menu-bar text-center">
		<div class="container">
			<div class="blog-rich-container menu-inner">
				<?php do_action('blog_rich_main_menu'); ?>
			</div>
		</div>
	</div>
<?php
}
add_action('blog_rich_header_style_two', 'blog_rich_header_style_two');


// Blog Rich mobile menu
function blog_rich_mobile_menu_output()
{
?>
	<div class="mobile-menu-bar">
		<div class="container">
			<nav id="mobile-navigation" class="mobile-navigation">
				<button id="mmenu-btn" class="menu-btn" aria-expanded="false">
					<span class="mopen"><?php esc_html_e('Menu', 'blog-rich'); ?></span>
					<span class="mclose"><?php esc_html_e('Close', 'blog-rich'); ?></span>
				</button>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'main-menu',
					'menu_id'        => 'wsm-menu',
					'menu_class'        => 'wsm-menu',
				));
				?>
			</nav><!-- #site-navigation -->
		</div>
	</div>

<?php
}
add_action('blog_rich_mobile_menu', 'blog_rich_mobile_menu_output');
