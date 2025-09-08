<?php
/*
Plugin Name: Awesome CF7 Addons
Plugin URI:  https://example.com
Description: CF7 Addons with Analytics, Submissions, Reports, Import/Export, Elementor & Gutenberg support.
Version:     1.0
Author:      Abdullah Nahian
Author URI:  https://example.com
Text Domain: awesome-cf7-addons
*/

if (!defined('ABSPATH')) exit;

// Include admin pages
require_once plugin_dir_path(__FILE__) . 'pages/general.php';
require_once plugin_dir_path(__FILE__) . 'pages/analytics.php';
require_once plugin_dir_path(__FILE__) . 'pages/submission.php';
require_once plugin_dir_path(__FILE__) . 'pages/reports.php';
require_once plugin_dir_path(__FILE__) . 'pages/import-export.php';
require_once plugin_dir_path(__FILE__) . 'pages/settings.php';

// Include Elementor widget
if (defined('ELEMENTOR_PATH')) {
    require_once plugin_dir_path(__FILE__) . 'elementor/cf7-form-widget.php';
}

// Include Gutenberg block
require_once plugin_dir_path(__FILE__) . 'blocks/cf7-block.php';

// Admin menu
add_action('admin_menu', 'acf7a_add_admin_menu');
function acf7a_add_admin_menu() {
    // Main menu points to General page
    add_menu_page(
        'Awesome CF7',          // Page title
        'Awesome CF7',          // Menu title
        'manage_options',       // Capability
        'acf7a-general',        // Menu slug (main menu links to General)
        'acf7a_general_page',   // Callback function
        'dashicons-feedback',   // Icon
        56                      // Position
    );

    // Submenus
    add_submenu_page('acf7a-general', 'General', 'General', 'manage_options', 'acf7a-general', 'acf7a_general_page'); // First submenu
    add_submenu_page('acf7a-general', 'Analytics', 'Analytics', 'manage_options', 'acf7a-analytics', 'acf7a_analytics_page');
    add_submenu_page('acf7a-general', 'Submission', 'Submission', 'manage_options', 'acf7a-submission', 'acf7a_submission_page');
    add_submenu_page('acf7a-general', 'Reports', 'Reports', 'manage_options', 'acf7a-reports', 'acf7a_reports_page');
    add_submenu_page('acf7a-general', 'Import / Export', 'Import / Export', 'manage_options', 'acf7a-import-export', 'acf7a_import_export_page');

    // Settings at the bottom
    add_submenu_page('acf7a-general', 'Settings', 'Settings', 'manage_options', 'acf7a-settings', 'acf7a_settings_page');
}

// Enqueue assets
add_action('admin_enqueue_scripts', 'acf7a_admin_assets');
function acf7a_admin_assets($hook) {
    $screens = [
        'toplevel_page_acf7a-general',
        'awesome-cf7-addons_page_acf7a-analytics',
        'awesome-cf7-addons_page_acf7a-submission',
        'awesome-cf7-addons_page_acf7a-reports',
        'awesome-cf7-addons_page_acf7a-import-export'
    ];
    if (!in_array($hook, $screens)) return;

    wp_enqueue_style('acf7a-admin-css', plugin_dir_url(__FILE__) . 'assets/admin.css');
    wp_enqueue_script('acf7a-admin-js', plugin_dir_url(__FILE__) . 'assets/admin.js', ['jquery'], null, true);
}

// Settings API
add_action('admin_init', 'acf7a_register_settings');
function acf7a_register_settings() {
    register_setting('acf7a_general_settings', 'acf7a_options');
    add_settings_section('acf7a_general_section', 'General Settings', null, 'acf7a_general_settings');
    add_settings_field('enable_analytics', 'Enable Analytics', 'acf7a_enable_analytics_cb', 'acf7a_general_settings', 'acf7a_general_section');
}

function acf7a_enable_analytics_cb() {
    $options = get_option('acf7a_options');
    ?>
    <input type="checkbox" name="acf7a_options[enable_analytics]" value="1" <?php checked(1, isset($options['enable_analytics']) ? $options['enable_analytics'] : 0); ?> />
    <?php
}
