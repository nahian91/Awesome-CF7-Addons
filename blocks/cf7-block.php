<?php
if (!defined('ABSPATH')) exit;

add_action('init', function() {
    wp_register_script('acf7-block-js', plugin_dir_url(__FILE__) . 'cf7-block.js', ['wp-blocks','wp-element','wp-editor','wp-components'], null, true);

    register_block_type('acf7/cf7-form', [
        'editor_script'=>'acf7-block-js',
        'render_callback'=>function($attr){
            return isset($attr['formId']) ? do_shortcode('[contact-form-7 id="'.esc_attr($attr['formId']).'"]') : '';
        },
        'attributes'=>['formId'=>['type'=>'number']]
    ]);
});

// Ajax for fetching forms in editor
add_action('wp_ajax_acf7_get_forms', function() {
    $forms = get_posts(['post_type'=>'wpcf7_contact_form','numberposts'=>-1]);
    $result = [];
    foreach($forms as $f) $result[]=['id'=>$f->ID,'title'=>$f->post_title];
    wp_send_json($result);
});
