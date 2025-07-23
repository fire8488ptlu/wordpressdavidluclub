<?php

/**
 * Blog Rich lite Theme Customizer
 *
 * @package Blog Rich lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function blog_rich_lite_customize_register($wp_customize)
{

    //blog style
    $wp_customize->add_setting('blog_rich_lite_grid_position', array(
        'default'       => 'center',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'blog_rich_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('blog_rich_lite_grid_position', array(
        'label'      => __('Blog Position', 'blog-rich-lite'),
        'section'    => 'blog_rich_blog',
        'settings'   => 'blog_rich_lite_grid_position',
        'type'       => 'select',
        'choices'    => array(
            'left' => __('Left', 'blog-rich-lite'),
            'center' => __('Center', 'blog-rich-lite'),
            'right' => __('Right', 'blog-rich-lite'),
        ),

    ));
}
add_action('customize_register', 'blog_rich_lite_customize_register', 999);
