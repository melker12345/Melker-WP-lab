<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Custom_Lab_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function custom_lab_theme_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'custom_lab_theme_pingback_header');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function custom_lab_theme_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'custom_lab_theme_body_classes');

/**
 * Add a rel="preload" for Google Fonts.
 */
function custom_lab_theme_preload_fonts() {
    if (wp_style_is('google-fonts', 'registered')) {
        echo '<link rel="preload" href="' . esc_url(wp_styles()->registered['google-fonts']->src) . '" as="style">';
    }
}
add_action('wp_head', 'custom_lab_theme_preload_fonts', 1);
