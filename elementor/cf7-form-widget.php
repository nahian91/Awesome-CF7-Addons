<?php
if (!defined('ABSPATH')) exit;

add_action('elementor/widgets/register', function($widgets_manager) {
    require_once(__DIR__ . '/cf7-form-widget-class.php');
    $widgets_manager->register(new \ACF7_Elementor_Widget());
});
