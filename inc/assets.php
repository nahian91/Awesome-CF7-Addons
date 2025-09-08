<?php
if (!defined('ABSPATH')) exit;

/**
 * Enqueue admin CSS and JS for Awesome CF7 Addons
 */
add_action('admin_enqueue_scripts', 'acf7a_admin_assets');
function acf7a_admin_assets($hook) {

    // Only load on plugin admin pages
    $screens = [
        'toplevel_page_acf7a-general',
        'awesome-cf7-addons_page_acf7a-analytics',
        'awesome-cf7-addons_page_acf7a-submission',
        'awesome-cf7-addons_page_acf7a-reports',
        'awesome-cf7-addons_page_acf7a-import-export',
        'awesome-cf7-addons_page_acf7a-settings',
    ];

    if (!in_array($hook, $screens)) return;

    // Admin CSS
    wp_enqueue_style(
        'acf7a-admin-css',
        plugin_dir_url(__FILE__) . '../assets/admin.css',
        [],
        '1.0.0'
    );

    // Admin JS
    wp_enqueue_script(
        'acf7a-admin-js',
        plugin_dir_url(__FILE__) . '../assets/admin.js',
        ['jquery'],
        '1.0.0',
        true
    );
}
