<?php
vc_map(array(
    'name' => esc_html__('Featured horizontal content', 'anps_theme_plugin'),
    'base' => 'anps_featured_horizontal',
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'title',
            'admin_label' => true
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Image', 'anps_theme_plugin'),
            'param_name' => 'image_u',
            'admin_label' => false
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Content', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter content of shortcode.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Link', 'anps_theme_plugin'),
            'param_name' => 'link',
            'admin_label' => false
        )
    )
));