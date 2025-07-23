<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog Rich
 */
$blog_rich_categories = get_the_category();
if ($blog_rich_categories) {
	$blog_rich_category = $blog_rich_categories[mt_rand(0, count($blog_rich_categories) - 1)];
} else {
	$blog_rich_category = '';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-rich-list-item'); ?>>
	<div class="blog-rich-item blog-rich-text-list mb-5 <?php if (has_post_thumbnail()) : ?>has-thumbnail<?php endif; ?>">
		<div class="row">
			<?php if (has_post_thumbnail()) : ?>
				<div class="col-lg-6">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('medium_large'); ?>
					</a>
				</div>
				<div class="col-lg-6">
				<?php else : ?>
					<div class="col-lg-12 pb-3 pt-3">
					<?php endif; ?>
					<div class="blog-rich-text p-3">
						<div class="blog-rich-text-inner">
							<div class="grid-head">
								<span class="ghead-meta list-meta">
									<?php if ('post' === get_post_type() && !empty($blog_rich_category)) : ?>
										<a href="<?php echo esc_url(get_category_link($blog_rich_category)); ?>"><?php echo esc_html($blog_rich_category->name); ?></a>
									<?php endif; ?>
								</span>
								<?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
								<?php if ('post' === get_post_type()) :
								?>
									<div class="list-meta list-author">
										<?php blog_rich_posted_by(); ?>
									</div><!-- .entry-meta -->
								<?php endif; ?>
							</div>
							<div class="blogeye-blist-content">
								<?php the_excerpt(); ?>
							</div>
							<a class="blog-rich-readmore btn-brich" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More ', 'blog-rich'); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
						</div>
					</div>
					</div>
				</div>

		</div>
</article><!-- #post-<?php the_ID(); ?> -->