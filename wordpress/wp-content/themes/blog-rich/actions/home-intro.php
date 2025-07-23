<?php
/*
*
* Home intro section for portfolix section
*
*
*/



function blog_rich_hbanner_section_output()
{
  $blog_rich_hbanner_show = get_theme_mod('blog_rich_hbanner_show');
  if (empty($blog_rich_hbanner_show)) {
    return;
  }
  $blog_rich_dfimgh = get_template_directory_uri() . '/assets/img/hero.jpg';
  $blog_rich_hbanner_img = get_theme_mod('blog_rich_hbanner_img', $blog_rich_dfimgh);
  $blog_rich_hbanner_subtitle = get_theme_mod('blog_rich_hbanner_subtitle', __('Welcome To Our Rich Blog', 'blog-rich'));
  $blog_rich_hbanner_title = get_theme_mod('blog_rich_hbanner_title', __('Exploring Our', 'blog-rich'));
  $blog_rich_color_title = get_theme_mod('blog_rich_color_title', __('Creative Blog.', 'blog-rich'));
  $blog_rich_hbanner_desc = get_theme_mod('blog_rich_hbanner_desc');
  $blog_rich_btn_text_one = get_theme_mod('blog_rich_btn_text_one', __('Our Blogs', 'blog-rich'));
  $blog_rich_btn_url_one = get_theme_mod('blog_rich_btn_url_one', '#');

?>
  <!-- home -->
  <section class="aghome" id="home">
    <div id="ax-praticals"></div>
    <div class="ax-home-single-slide-all-content">
      <?php if ($blog_rich_hbanner_img) : ?>
        <div class="ax-home-bg">
          <img src="<?php echo esc_url($blog_rich_hbanner_img); ?>" alt="<?php esc_attr($blog_rich_hbanner_title); ?>">
        </div>
      <?php endif; ?>
      <div class="ax-home-details text-center">
        <?php if ($blog_rich_hbanner_subtitle) : ?>
          <div class="ax-home-subtitle">
            <p><?php echo esc_html($blog_rich_hbanner_subtitle); ?></p>
          </div>
        <?php endif; ?>
        <?php if ($blog_rich_hbanner_title || $blog_rich_color_title) : ?>
          <div class="ax-home-title">
            <?php if ($blog_rich_hbanner_title) : ?>
              <h1><?php echo esc_html($blog_rich_hbanner_title); ?>
              </h1>
            <?php endif; ?>
            <?php if ($blog_rich_color_title) : ?>
              <h1 class="ax-section-title"><?php echo esc_html($blog_rich_color_title); ?>
              <?php endif; ?>
          </div>
        <?php endif; ?>
        <?php if ($blog_rich_hbanner_desc) : ?>
          <div class="ax-home-dres">
            <p><?php echo wp_kses_post($blog_rich_hbanner_desc); ?></p>
          </div>
        <?php endif; ?>
        <?php if ($blog_rich_btn_url_one) : ?>
          <div class="ax-home-btn">
            <a href="<?php echo esc_url($blog_rich_btn_url_one); ?>" class="ax-home-first-btn"><?php echo esc_html($blog_rich_btn_text_one); ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

<?php
}
add_action('blog_rich_hbanner', 'blog_rich_hbanner_section_output');
