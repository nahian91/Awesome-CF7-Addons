<?php
if (!defined('ABSPATH')) exit;

class ACF7_Elementor_Widget extends \Elementor\Widget_Base {

    public function get_name() { return 'acf7_form'; }
    public function get_title() { return 'CF7 Form'; }
    public function get_icon() { return 'eicon-form-horizontal'; }
    public function get_categories() { return ['general']; }

    protected function register_controls() {
        $this->start_controls_section('content_section', ['label'=>'Content','tab'=>\Elementor\Controls_Manager::TAB_CONTENT]);
        $forms = get_posts(['post_type'=>'wpcf7_contact_form', 'numberposts'=>-1]);
        $options = [];
        foreach ($forms as $form) $options[$form->ID] = $form->post_title;

        $this->add_control('form_id', [
            'label'=>'Select CF7 Form',
            'type'=>\Elementor\Controls_Manager::SELECT,
            'options'=>$options,
            'default'=>key($options)
        ]);
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo do_shortcode('[contact-form-7 id="' . esc_attr($settings['form_id']) . '"]');
    }
}
