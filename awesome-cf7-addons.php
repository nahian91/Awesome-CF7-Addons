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

require_once plugin_dir_path(__FILE__) . 'inc/assets.php';

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
