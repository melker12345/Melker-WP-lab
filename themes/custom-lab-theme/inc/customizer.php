<?php
/**
 * Custom Lab Theme Theme Customizer
 *
 * @package Custom_Lab_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function custom_lab_theme_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    // Add theme color settings
    $wp_customize->add_setting('theme_primary_color', array(
        'default'           => '#2563eb',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme_primary_color', array(
        'label'    => __('Primary Color', 'custom-lab-theme'),
        'section'  => 'colors',
        'settings' => 'theme_primary_color',
    )));

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'custom_lab_theme_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'custom_lab_theme_customize_partial_blogdescription',
        ));
    }
}
add_action('customize_register', 'custom_lab_theme_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function custom_lab_theme_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function custom_lab_theme_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function custom_lab_theme_customize_preview_js() {
    wp_enqueue_script('custom-lab-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), CUSTOM_LAB_THEME_VERSION, true);
}
