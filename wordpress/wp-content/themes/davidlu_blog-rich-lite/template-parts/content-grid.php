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
					<!-- ADD Post Publish Date -->
					<div class="post-publish-date" style="padding-left:12px; margin-bottom: 0.5rem; font-size: 0.9rem; color: #666;">
						<time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
							<?php echo esc_html(get_the_date('Y-m-d')); ?>
						</time>
						
					</div>
					<?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

					<?php if ('post' === get_post_type()) : ?>
						<div class="list-meta list-author">
							<?php blog_rich_posted_by(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</div>

				<div class="blogeye-blist-content">
					<?php the_excerpt(); ?>
				</div>

				<!-- Read More Button -->
				<a class="blog-rich-readmore btn-brich" href="<?php the_permalink(); ?>" style="display: block; margin-bottom: 1rem;">
					<?php esc_html_e('Read More ', 'blog-rich-lite'); ?> 
					<i class="fas fa-long-arrow-alt-right"></i>
				</a>

				<!-- Ensure Categories Appear Below the Button -->
			

				<div class="ghead-meta-container" style="display: block; margin-top: 1rem;">
					<span class="ghead-meta list-meta" style="display: block;">
						<?php
						if ('post' === get_post_type()) {
							$categories = get_the_category();
							if (!empty($categories)) {
								foreach ($categories as $category) {
									$category_color = $category->slug; // Get the slug (which is the hex color code)
									echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" 
											style="background-color: #' . esc_attr($category_color) . ';
												color: #ffffff;
												padding: 3px 3px;
												border-radius: 5px;
												display: inline-block;
												text-decoration: none;
												font-weight: bold;
												margin-top:2px;
												margin-right: 5px;">
											' . esc_html($category->name) . '
										</a>';
								}
							}
						}
						?>
					</span>
				</div>



			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
