<?php

/**
 * Blog Rich Theme Customizer
 *
 * @package Blog Rich
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog_rich_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    $blog_rich_theme = wp_get_theme();
    $blog_rich_text_domain = $blog_rich_theme->get('TextDomain');

    if ($blog_rich_text_domain == 'blog-rich') {
        $layout_container = 'container-fluid';
        $header_style = 'style2';
        $blog_style = 'classic';
    } else {
        $layout_container = 'container';
        $header_style = 'style1';
        $blog_style = 'grid';
    }
    //select sanitization function
    function blog_rich_sanitize_select($input, $setting)
    {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
    function blog_rich_sanitize_image($file, $setting)
    {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        //check file type from file name
        $file_ext = wp_check_filetype($file, $mimes);
        //if file has a valid mime type return it, otherwise return default
        return ($file_ext['ext'] ? $file : $setting->default);
    }

    $wp_customize->add_setting('blog_rich_site_tagline_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_site_tagline_show', array(
        'label'      => __('Hide Site Tagline Only? ', 'blog-rich'),
        'section'    => 'title_tagline',
        'settings'   => 'blog_rich_site_tagline_show',
        'type'       => 'checkbox',

    ));

    $wp_customize->add_panel('blog_rich_settings', array(
        'priority'       => 50,
        'title'          => __('Blog Rich Theme settings', 'blog-rich'),
        'description'    => __('All Blog Rich theme settings', 'blog-rich'),
    ));
    $wp_customize->add_section('blog_rich_header', array(
        'title' => __('Blog Rich Header Settings', 'blog-rich'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Blog Rich theme header settings', 'blog-rich'),
        'panel'    => 'blog_rich_settings',

    ));
    $wp_customize->add_setting('blog_rich_header_style', array(
        'default'        => $header_style,
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'blog_rich_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_header_style', array(
        'label'      => __('Header Style', 'blog-rich'),
        'description' => __('You can set the menu style one or two. ', 'blog-rich'),
        'section'    => 'blog_rich_header',
        'settings'   => 'blog_rich_header_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('Style One', 'blog-rich'),
            'style2' => __('Style Two', 'blog-rich'),
        ),
    ));

    //Blog Rich Home intro
    $wp_customize->add_section('blog_rich_hbanner', array(
        'title' => __('Blog Intro Settings', 'blog-rich'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Portfoli profile Intro Settings', 'blog-rich'),
        'panel'    => 'blog_rich_settings',

    ));
    $wp_customize->add_setting('blog_rich_hbanner_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_hbanner_show', array(
        'label'      => __('Show Home Banner? ', 'blog-rich'),
        'section'    => 'blog_rich_hbanner',
        'settings'   => 'blog_rich_hbanner_show',
        'type'       => 'checkbox',

    ));
    $wp_customize->add_setting('blog_rich_hbanner_img', array(
        'capability'        => 'edit_theme_options',
        'default'           => get_template_directory_uri() . '/assets/img/hero.jpg',
        'sanitize_callback' => 'blog_rich_sanitize_image',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'blog_rich_hbanner_img',
        array(
            'label'    => __('Upload Banner Image', 'blog-rich'),
            'description'    => __('Image size should be 450px width & 460px height for better view.', 'blog-rich'),
            'section'  => 'blog_rich_hbanner',
            'settings' => 'blog_rich_hbanner_img',
        )
    ));
    $wp_customize->add_setting('blog_rich_hbanner_subtitle', array(
        'default' => __('WELCOME TO MY WORLD', 'blog-rich'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_hbanner_subtitle', array(
        'label'      => __('Intro Subtitle', 'blog-rich'),
        'section'    => 'blog_rich_hbanner',
        'settings'   => 'blog_rich_hbanner_subtitle',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('blog_rich_hbanner_title', array(
        'default' => __('Exploring Our', 'blog-rich'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_hbanner_title', array(
        'label'      => __('Intro Title', 'blog-rich'),
        'section'    => 'blog_rich_hbanner',
        'settings'   => 'blog_rich_hbanner_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('blog_rich_color_title', array(
        'default' => __('Creative Blog.', 'blog-rich'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_color_title', array(
        'label'      => __('Intro Color Title', 'blog-rich'),
        'section'    => 'blog_rich_hbanner',
        'settings'   => 'blog_rich_color_title',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('blog_rich_hbanner_desc', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_hbanner_desc', array(
        'label'      => __('Intro Description', 'blog-rich'),
        'section'    => 'blog_rich_hbanner',
        'settings'   => 'blog_rich_hbanner_desc',
        'type'       => 'textarea',
    ));
    $wp_customize->add_setting('blog_rich_btn_text_one', array(
        'default' => __('Our Blogs', 'blog-rich'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('blog_rich_btn_text_one', array(
        'label'      => __('Button one text', 'blog-rich'),
        'section'    => 'blog_rich_hbanner',
        'settings'   => 'blog_rich_btn_text_one',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('blog_rich_btn_url_one', array(
        'default' => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_btn_url_one', array(
        'label'      => __('Button one url', 'blog-rich'),
        'description'      => __('Keep url empty for hide this button', 'blog-rich'),
        'section'    => 'blog_rich_hbanner',
        'settings'   => 'blog_rich_btn_url_one',
        'type'       => 'url',
    ));


    //blog-rich settings
    $wp_customize->add_section('blog_rich_blog', array(
        'title' => __('Blog Rich Settings', 'blog-rich'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Blog Rich theme blog settings', 'blog-rich'),
        'panel'    => 'blog_rich_settings',

    ));
    $wp_customize->add_setting('blog_rich_blog_container', array(
        'default'        => $layout_container,
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'blog_rich_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_blog_container', array(
        'label'      => __('Container type', 'blog-rich'),
        'description' => __('You can set standard container or full width container. ', 'blog-rich'),
        'section'    => 'blog_rich_blog',
        'settings'   => 'blog_rich_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'blog-rich'),
            'container-fluid' => __('Full width Container', 'blog-rich'),
        ),
    ));
    $wp_customize->add_setting('blog_rich_blog_layout', array(
        'default'        => 'fullwidth',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'blog_rich_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_blog_layout', array(
        'label'      => __('Select Blog Layout', 'blog-rich'),
        'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'blog-rich'),
        'section'    => 'blog_rich_blog',
        'settings'   => 'blog_rich_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'blog-rich'),
            'leftside' => __('Left Sidebar', 'blog-rich'),
            'fullwidth' => __('No Sidebar', 'blog-rich'),
        ),
    ));
    $wp_customize->add_setting('blog_rich_blog_style', array(
        'default'        => $blog_style,
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'blog_rich_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_blog_style', array(
        'label'      => __('Select Blog Style', 'blog-rich'),
        'section'    => 'blog_rich_blog',
        'settings'   => 'blog_rich_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'list' => __('List Style', 'blog-rich'),
            'grid' => __('Grid Style', 'blog-rich'),
            'classic' => __('Classic Style', 'blog-rich'),
        ),
    ));
    //Blog Rich page settings
    $wp_customize->add_section('blog_rich_page', array(
        'title' => __('Blog Rich Page Settings', 'blog-rich'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Blog Rich theme blog settings', 'blog-rich'),
        'panel'    => 'blog_rich_settings',

    ));
    $wp_customize->add_setting('blog_rich_page_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'blog_rich_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_page_container', array(
        'label'      => __('Page Container type', 'blog-rich'),
        'description' => __('You can set standard container or full width container for page. ', 'blog-rich'),
        'section'    => 'blog_rich_page',
        'settings'   => 'blog_rich_page_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'blog-rich'),
            'container-fluid' => __('Full width Container', 'blog-rich'),
        ),
    ));
    $wp_customize->add_setting('blog_rich_page_header', array(
        'default'        => 'show',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'blog_rich_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_page_header', array(
        'label'      => __('Show Page header', 'blog-rich'),
        'section'    => 'blog_rich_page',
        'settings'   => 'blog_rich_page_header',
        'type'       => 'select',
        'choices'    => array(
            'show' => __('Show all pages', 'blog-rich'),
            'hide-home' => __('Hide Only Front Page', 'blog-rich'),
            'hide' => __('Hide All Pages', 'blog-rich'),
        ),
    ));




    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'blog_rich_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'blog_rich_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'blog_rich_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blog_rich_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blog_rich_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_rich_customize_preview_js()
{
    wp_enqueue_script('blog-rich-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), BLOG_RICH_VERSION, true);
}
add_action('customize_preview_init', 'blog_rich_customize_preview_js');
