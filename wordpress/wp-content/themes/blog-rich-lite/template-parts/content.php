<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog Rich
 */
$blog_rich_blog_style = get_theme_mod('blog_rich_blog_style', 'grid');
if ($blog_rich_blog_style == 'list' && !is_single()) :
	get_template_part('template-parts/content', 'list');
elseif ($blog_rich_blog_style == 'grid' && !is_single()) :
	get_template_part('template-parts/content', 'grid');
else :

	$blog_rich_cat_list = get_the_category_list(esc_html__(' ', 'blog-rich-lite'));
	$blog_rich_tags_list = get_the_tag_list(sprintf('<p class="tags-list">%s: ', __('Tags', 'blog-rich-lite')), ' ', '</p>');

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="xpost-item pb-5 mb-5">
			<div class="blog-rich-list <?php if (!has_post_thumbnail()) : ?>brich-noimg<?php endif; ?>">
				<div class="rich-list-left">
					<header class="entry-header pb-4">
						<?php
						if ($blog_rich_cat_list && 'post' === get_post_type()) :
						?>
							<div class="rich-list-cats">
								<?php echo wp_kses($blog_rich_cat_list, array(
									'a' => array(
										'href' => true,
										'target' => true,
										'rel' => true,
									)
								));
								?>
							</div>
						<?php
						endif;
						if (is_singular()) :
							the_title('<h1 class="entry-title">', '</h1>');
						else :
							the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
						endif;

						if ('post' === get_post_type()) :
						?>
							<div class="ax-single-blog-post-author-section">
								<div class="ax-blog-post-author-detalis">
									<div class="ax-blog-post-author-img">
										<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo wp_kses_post(get_avatar(get_the_author_meta('ID'))); ?></a>
									</div>
									<div class="ax-single-blog-post-pub-date">
										<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="ax-blog-post-author-name"><?php echo esc_html(get_the_author_meta('display_name')); ?></a>
										<p><?php echo get_the_date('F j, Y'); ?></p>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</header><!-- .entry-header -->
				</div>
				<div class="rich-list-right">
					<?php blog_rich_post_thumbnail(); ?>
					<div class="entry-content <?php if (!is_single()) : ?>rich-blog-desk-only<?php endif; ?>">
						<?php

						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'blog-rich-lite'),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post(get_the_title())
							)
						);

						if (is_single()) {
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__('Pages:', 'blog-rich-lite'),
									'after'  => '</div>',
								)
							);
						}

						?>
					</div><!-- .entry-content -->
					<?php if (!is_single()) : ?>
						<div class="entry-content rich-blog-mbile-only">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>
					<?php
					if (is_single()) {
						echo $blog_rich_tags_list;
					}
					?>
				</div>
			</div>


		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>