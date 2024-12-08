<?php
/**
 * Plugin installation and activation for the theme
 */
require_once ABSPATH . 'wp-admin/includes/plugin.php';

function custom_lab_theme_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
        array(
            'name'      => 'Yoast SEO',
            'slug'      => 'wordpress-seo',
            'required'  => true,
        ),
        array(
            'name'      => 'Classic Editor',
            'slug'      => 'classic-editor',
            'required'  => true,
        ),
    );

    foreach ($plugins as $plugin) {
        if (!is_plugin_active($plugin['slug'] . '/' . $plugin['slug'] . '.php')) {
            $status = install_plugin($plugin['slug']);
            if (!is_wp_error($status)) {
                activate_plugin($plugin['slug'] . '/' . $plugin['slug'] . '.php');
            }
        }
    }
}

add_action('after_switch_theme', 'custom_lab_theme_required_plugins');
