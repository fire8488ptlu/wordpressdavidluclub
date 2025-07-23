<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog Rich
 */
$blog_rich_lite_grid_position = get_theme_mod('blog_rich_lite_grid_position', 'center');
$blog_rich_categories = get_the_category();
if ($blog_rich_categories) {
	$blog_rich_category = $blog_rich_categories[mt_rand(0, count($blog_rich_categories) - 1)];
} else {
	$blog_rich_category = '';
}
?>
<div class="col-lg-4 mb-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-rich-list-item beye-grid'); ?>>
		<div class="ax-single-blog-post blog-rich-text-list grid-<?php echo esc_attr($blog_rich_lite_grid_position); ?>">

			<?php if (has_post_thumbnail()) : ?>
				<div class="ax-single-blog-post-img">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			<?php endif; ?>
			<div class="blog-rich-text-inner">
				<div class="grid-head">
					<span class="ghead-meta list-meta">
						<?php if ('post' === get_post_type() && !empty($blog_rich_category)) : ?>
							<a href="<?php echo esc_url(get_category_link($blog_rich_category)); ?>"><?php echo esc_html($blog_rich_category->name); ?></a>
						<?php endif; ?>
					</span>
					<?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

					<?php if ('post' === get_post_type()) : ?>
						<div class="list-meta list-author">
							<?php blog_rich_posted_by(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</div>
				<div class="blogeye-blist-content">
					<?php the_excerpt();
					?>
				</div>
				<a class="blog-rich-readmore btn-brich" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More ', 'blog-rich-lite'); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
			</div>
		</div>

	</article><!-- #post-<?php the_ID(); ?> -->
</div>