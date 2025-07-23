<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog Rich
 */
$blog_rich_blog_container = get_theme_mod('blog_rich_blog_container', 'container');
$blog_rich_blog_layout = get_theme_mod('blog_rich_blog_layout', 'fullwidth');
$blog_rich_blog_style = get_theme_mod('blog_rich_blog_style', 'grid');

if (is_active_sidebar('sidebar-1') && $blog_rich_blog_layout != 'fullwidth') {
	$blog_rich_blog_column = 'col-lg-9';
} else {
	$blog_rich_blog_column = 'col-lg-12';
}
get_header();
?>

<div class="<?php echo esc_attr($blog_rich_blog_container); ?> mt-5 mb-5 pt-5 pb-5">
	<div class="row">
		<?php if (is_active_sidebar('sidebar-1') && $blog_rich_blog_layout == 'leftside') : ?>
			<div class="col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($blog_rich_blog_column); ?>">
			<main id="primary" class="site-main">

				<?php if (have_posts()) : ?>

					<header class="page-header archive-header p-4 mb-5 text-center">
						<?php
						the_archive_title('<h1 class="page-title">', '</h1>');
						the_archive_description('<div class="archive-description">', '</div>');
						?>
					</header><!-- .page-header -->
					<?php
					if ($blog_rich_blog_style == 'grid') :
					?>
						<div class="row ax-all-blog" data-masonry='{"percentPosition": true }'>
						<?php
					endif;
					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
						get_template_part('template-parts/content', get_post_type());

					endwhile;
					if ($blog_rich_blog_style == 'grid') :
						?>
						</div>
				<?php
					endif;
					the_posts_pagination();

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>

			</main><!-- #main -->
		</div>
		<?php if (is_active_sidebar('sidebar-1') && $blog_rich_blog_layout == 'rightside') : ?>
			<div class="col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();
