<?php
vc_map(array(
    'name' => esc_html__('Team with description', 'anps_theme_plugin'),
    'base' => 'team_with_description',
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Team member id/s', 'anps_theme_plugin'),
            'param_name' => 'ids',
            'value' => '',
            'description' => esc_html__('Enter team member id/s. Example: 1,2,3 up to 3 members.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'content_title',
            'value' => '',
            'description' => esc_html__('Enter content title.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Button text', 'anps_theme_plugin'),
            'param_name' => 'button_text',
            'value' => '',
            'description' => esc_html__('Enter button text.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Button url', 'anps_theme_plugin'),
            'param_name' => 'button_url',
            'value' => '',
            'description' => esc_html__("Enter url for button.", 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Target', 'anps_theme_plugin'),
            'param_name' => 'target',
            'value' => '_self',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title color', 'anps_theme_plugin'),
            'param_name' => 'title_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Description color', 'anps_theme_plugin'),
            'param_name' => 'desc_color',
            'admin_label' => false
        ),
    )
));