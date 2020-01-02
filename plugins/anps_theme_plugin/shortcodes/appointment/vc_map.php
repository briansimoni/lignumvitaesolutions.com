<?php
vc_map( array(
    'name' => esc_html__('Appointment', 'anps_theme_plugin'),
    'base' => 'appointment',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Image', 'anps_theme_plugin'),
            'param_name' => 'image_u',
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Location', 'anps_theme_plugin'),
            'param_name' => 'location',
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'title',
            'admin_label' => true
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'text',
            'admin_label' => false
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Contact form', 'anps_theme_plugin'),
            'param_name' => 'contact_form',
            'value' => anps_get_all_cf7_forms(),
            'save_always' => true,
            'admin_label' => false
        )
    )
));