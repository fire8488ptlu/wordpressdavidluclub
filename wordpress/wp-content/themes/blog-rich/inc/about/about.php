<?php

/**
 * About setup
 *
 * @package Blog Rich
 */

require_once trailingslashit(get_template_directory()) . 'inc/about/class.about.php';

if (!function_exists('blog_rich_about_setup')) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function blog_rich_about_setup()
	{
		$theme = wp_get_theme();
		$xtheme_name = $theme->get('Name');


		$config = array(
			// Menu name under Appearance.
			'menu_name'               => sprintf(esc_html__('%s Info', 'blog-rich'), $xtheme_name),
			// Page title.
			'page_name'               => sprintf(esc_html__('%s Info', 'blog-rich'), $xtheme_name),
			/* translators: Main welcome title */
			'welcome_title'         => sprintf(esc_html__('Welcome to %s! - Version ', 'blog-rich'), $theme['Name']),
			// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf(esc_html__('%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'blog-rich'), $theme['Name']),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__('Getting Started', 'blog-rich'),
				'recommended_actions' => esc_html__('Recommended Actions', 'blog-rich'),
				'useful_plugins'  => esc_html__('Useful Plugins', 'blog-rich'),
				'free_pro'  => esc_html__('Free Vs Pro', 'blog-rich'),
			),

			// Quick links.
			'quick_links' => array(
				'xmagazine_url' => array(
					'text'   => esc_html__('UPGRADE Blog Rich PRO', 'blog-rich'),
					'url'    => 'https://wpthemespace.com/product/blog-rich-pro/?add-to-cart=11619',
					'button' => 'danger',
				),
				'update_url' => array(
					'text'   => esc_html__('PortfolioX PRO Video', 'blog-rich'),
					'url'    => 'https://www.youtube.com/watch?v=pNlm-ArOHTM&t=18s',
					'button' => 'danger',
				),

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__('Demo Content', 'blog-rich'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('Demo content is pro feature. To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'blog-rich'), esc_html__('One Click Demo Import', 'blog-rich')),
					'button_text' => esc_html__('UPGRADE For  Demo Content', 'blog-rich'),
					'button_url'  => 'https://wpthemespace.com/product/blog-rich-pro/?add-to-cart=11619',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),

				'two' => array(
					'title'       => esc_html__('Theme Options', 'blog-rich'),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__('Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'blog-rich'),
					'button_text' => esc_html__('Customize', 'blog-rich'),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
				),
				'three' => array(
					'title'       => esc_html__('Show Video', 'blog-rich'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('You may show Blog Rich short video for better understanding', 'blog-rich'), esc_html__('One Click Demo Import', 'blog-rich')),
					'button_text' => esc_html__('Show video', 'blog-rich'),
					'button_url'  => 'https://www.youtube.com/watch?v=pNlm-ArOHTM&t=18s',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),
				'five' => array(
					'title'       => esc_html__('Set Widgets', 'blog-rich'),
					'icon'        => 'dashicons dashicons-tagcloud',
					'description' => esc_html__('Set widgets in your sidebar, Offcanvas as well as footer.', 'blog-rich'),
					'button_text' => esc_html__('Add Widgets', 'blog-rich'),
					'button_url'  => admin_url() . '/widgets.php',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'six' => array(
					'title'       => esc_html__('Theme Preview', 'blog-rich'),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__('You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'blog-rich'),
					'button_text' => esc_html__('View Demo', 'blog-rich'),
					'button_url'  => 'https://px.wpteamx.com/demos',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'seven' => array(
					'title'       => esc_html__('Contact Support', 'blog-rich'),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__('Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'blog-rich'),
					'button_text' => esc_html__('Contact Support', 'blog-rich'),
					'button_url'  => 'https://wpthemespace.com/support/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
			),

			'useful_plugins'        => array(
				'description' => esc_html__('Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'blog-rich'),
				'already_activated_message' => esc_html__('Already activated', 'blog-rich'),
				'version_label' => esc_html__('Version: ', 'blog-rich'),
				'install_label' => esc_html__('Install and Activate', 'blog-rich'),
				'activate_label' => esc_html__('Activate', 'blog-rich'),
				'deactivate_label' => esc_html__('Deactivate', 'blog-rich'),
				'content'                   => array(
					array(
						'slug' => 'magical-addons-for-elementor',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-products-display'
					),
					array(
						'slug' => 'magical-posts-display'
					),
					array(
						'slug' => 'click-to-top'
					),
					array(
						'slug' => 'gallery-box',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-blocks'
					),
					array(
						'slug' => 'easy-share-solution',
						'icon' => 'svg',
					),
					array(
						'slug' => 'wp-edit-password-protected',
						'icon' => 'svg',
					),
				),
			),
			// Required actions array.
			'recommended_actions'        => array(
				'install_label' => esc_html__('Install and Activate', 'blog-rich'),
				'activate_label' => esc_html__('Activate', 'blog-rich'),
				'deactivate_label' => esc_html__('Deactivate', 'blog-rich'),
				'content'            => array(
					'magical-blocks' => array(
						'title'       => __('Magical Addons', 'blog-rich'),
						'description' => __('Now you can add or update your site elements very easily by Magical Products Display. Supercharge your Elementor block with highly customizable Magical Blocks For WooCommerce.', 'blog-rich'),
						'plugin_slug' => 'magical-addons-for-elementor',
						'id' => 'magical-addons-for-elementor'
					),
					'go-pro' => array(
						'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/blog-rich-pro/?add-to-cart=11619">' . __('UPGRADE Blog Rich PRO', 'blog-rich') . '</a>',
						'description' => __('You will get more frequent updates and quicker support with the Pro version.', 'blog-rich'),
						//'plugin_slug' => 'x-instafeed',
						'id' => 'go-pro'
					),

				),
			),
			// Free vs pro array.
			'free_pro'                => array(
				'free_theme_name'     => $xtheme_name,
				'pro_theme_name'      => $xtheme_name . __(' Pro', 'blog-rich'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/portfolio-view-pro',
				/* translators: View link */
				'get_pro_theme_label' => sprintf(__('Get %s', 'blog-rich'), 'Blog Rich Pro'),
				'features'            => array(
					array(
						'title'       => esc_html__('Daring Design for Devoted Readers', 'blog-rich'),
						'description' => esc_html__('Blog Rich\'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'blog-rich'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Mobile-Ready For All Devices', 'blog-rich'),
						'description' => esc_html__('Blog Rich makes room for your readers to enjoy your articles on the go, no matter the device their using. We shaped everything to look amazing to your audience.', 'blog-rich'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Home slider', 'blog-rich'),
						'description' => esc_html__('Blog Rich gives you extra slider feature. You can create awesome home slider in this theme.', 'blog-rich'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Widgetized Sidebars To Keep Attention', 'blog-rich'),
						'description' => esc_html__('Blog Rich comes with a widget-based flexible system which allows you to add your favorite widgets over the Sidebar as well as on offcanvas too.', 'blog-rich'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Auto Set-up Feature', 'blog-rich'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'blog-rich'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Multiple Header Layout', 'blog-rich'),
						'description' => esc_html__('Blog Rich gives you extra ways to showcase your header with miltiple layout option you can change it on the basis of your requirement', 'blog-rich'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('One Click Demo install', 'blog-rich'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'blog-rich'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Extra Drag and drop support', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advanced Portfolio Filter', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Testimonial Carousel', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Diffrent Style Blog', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Flexible Home Page Design', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Pro Service Section', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Animation Home Text', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Customizer Options', 'blog-rich'),
						'description' => esc_html__('Advance control for each element gives you different way of customization and maintained you site as you like and makes you feel different.', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Pagination', 'blog-rich'),
						'description' => esc_html__('Multiple Option of pagination via customizer can be obtained on your site like Infinite scroll, Ajax Button On Click, Number as well as classical option are available.', 'blog-rich'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),

					array(
						'title'       => esc_html__('Premium Support and Assistance', 'blog-rich'),
						'description' => esc_html__('We offer ongoing customer support to help you get things done in due time. This way, you save energy and time, and focus on what brings you happiness. We know our products inside-out and we can lend a hand to help you save resources of all kinds.', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('No Credit Footer Link', 'blog-rich'),
						'description' => esc_html__('You can easily remove the Theme: Blog Rich by Blog Rich copyright from the footer area and make the theme yours from start to finish.', 'blog-rich'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
				),
			),

		);

		blog_rich_About::init($config);
	}

endif;

add_action('after_setup_theme', 'blog_rich_about_setup');

function blog_rich_pnotice_output()
{

?>
	<div class="mgadin-hero">
		<div class="mge-info-content">
			<div class="mge-info-hello">
				<?php

				$current_theme = wp_get_theme();
				$current_theme_name = $current_theme->get('Name');
				$current_user = wp_get_current_user();
				$demo_link = esc_url('https://wpthemespace.com/product/blog-rich-pro/');
				$pro_link = esc_url('https://wpthemespace.com/product/blog-rich-pro/?add-to-cart=11619');

				esc_html_e('Hello, ', 'blog-rich');
				echo esc_html($current_user->display_name);
				?>

				<?php esc_html_e('👋🏻', 'blog-rich'); ?>
			</div>
			<div class="mge-info-desc">
				<div><?php printf(esc_html__('Your Site Running Blog Rich Free Version. Upgrade to Pro and take your website to the next level! With advanced features and a simple one-click demo installation, you can easily create a professional-grade website that stands out from the crowd. Don\'t wait any longer, get Blog Rich Pro now and start building the website of your dreams!', 'blog-rich'), $current_theme_name); ?></div>
				<div class="mge-offer"><?php printf(esc_html__('Blog Rich Pro is now available for an unbeatable price of only $21!', 'blog-rich'), $current_theme_name); ?></div>
			</div>
			<div class="mge-info-actions">
				<a href="<?php echo esc_url($pro_link); ?>" target="_blank" class="button button-primary upgrade-btn">
					<?php esc_html_e('Upgrade Pro', 'blog-rich'); ?>
				</a>
				<a href="<?php echo esc_url($demo_link); ?>" target="_blank" class="button button-primary demo-btn">
					<?php esc_html_e('View Demo', 'blog-rich'); ?>
				</a>
				<button class="button button-info btnend"><?php esc_html_e('Dismiss this notice', 'blog-rich') ?></button>
			</div>

		</div>

	</div>
<?php
}
//Admin notice 
function blog_rich_new_optins_texts()
{

	global $pagenow;
	$pxinfo_date = get_option('blog_rich_info_text');
	if (!empty($pxinfo_date) || $pagenow == 'themes.php') {
		$clickhide = round((time() - strtotime($pxinfo_date)) / 24 / 60 / 60);
		if ($clickhide < 26) {
			return;
		}
	}
?>
	<div class="mgadin-notice notice notice-success mgadin-theme-dashboard mgadin-theme-dashboard-notice mge is-dismissible meis-dismissible">
		<?php blog_rich_pnotice_output(); ?>
	</div>
<?php
}
add_action('admin_notices', 'blog_rich_new_optins_texts');

function blog_rich_new_optins_texts_init()
{

	if (isset($_GET['xbnotice']) && $_GET['xbnotice'] == 1) {
		update_option('blog_rich_info_text', current_time('mysql'));
	}
}
add_action('init', 'blog_rich_new_optins_texts_init');
