<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @package Custom_Lab_Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Set up the WordPress core custom header feature.
 */
function custom_lab_theme_custom_header_setup() {
    add_theme_support('custom-header', apply_filters('custom_lab_theme_custom_header_args', array(
        'default-image'          => '',
        'default-text-color'     => '000000',
        'width'                  => 1000,
        'height'                 => 250,
        'flex-height'            => true,
        'wp-head-callback'       => 'custom_lab_theme_header_style',
    )));
}
add_action('after_setup_theme', 'custom_lab_theme_custom_header_setup');

/**
 * Styles the header image and text displayed on the blog.
 */
function custom_lab_theme_header_style() {
    $header_text_color = get_header_textcolor();

    if (get_theme_support('custom-header', 'default-text-color') === $header_text_color) {
        return;
    }

    ?>
    <style type="text/css">
        <?php if (!display_header_text()) : ?>
            .site-title,
            .site-description {
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }
        <?php else : ?>
            .site-title a,
            .site-description {
                color: #<?php echo esc_attr($header_text_color); ?>;
            }
        <?php endif; ?>
    </style>
    <?php
}
