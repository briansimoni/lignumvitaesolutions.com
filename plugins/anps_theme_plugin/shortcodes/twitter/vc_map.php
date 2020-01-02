<?php
/* VC twitter */
vc_map(array(
    'name' => esc_html__('Twitter', 'anps_theme_plugin'),
    'base' => 'twitter',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Slug', 'anps_theme_plugin'),
            'param_name' => 'slug',
            'description' => esc_html__('It should be unique value.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'title',
            'value' => 'Stay tuned, follow us on Twitter',
            'description' => esc_html__('Enter twitter title.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of tweets', 'anps_theme_plugin'),
            'param_name' => 'tw_number',
            'value' => '3',
            'description' => esc_html__('Enter number of tweets to display. (default 3)', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Twitter username', 'anps_theme_plugin'),
            'param_name' => 'content',
            'value' => '',
            'description' => esc_html__('Enter twitter username.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title color', 'anps_theme_plugin'),
            'param_name' => 'title_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text color', 'anps_theme_plugin'),
            'param_name' => 'text_color',
            'admin_label' => false
        ),
    )
));