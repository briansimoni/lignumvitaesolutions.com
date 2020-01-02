<?php
vc_map( array(
    'name' => esc_html__('Recent blog', 'anps_theme_plugin'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'base' => 'recent_blog',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'recent_title',
            'value' => '',
            'description' => esc_html__('Recent blog title.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'anps_theme_plugin'),
            'param_name' => 'style',
            'value' => array(esc_html__('Default', 'anps_theme_plugin') => 'default', esc_html__('Minimal light', 'anps_theme_plugin') => 'minimal-light', esc_html__('Minimal dark', 'anps_theme_plugin') => 'minimal-dark'),
            'save_always' => true,
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of blog posts', 'anps_theme_plugin'),
            'param_name' => 'number',
            'value' => '',
            'description' => esc_html__('Enter number of recent blog posts. If you want to display all posts, leave this field empty.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Number in row', 'anps_theme_plugin'),
            'param_name' => 'number_in_row',
            'value' => array(esc_html__('3', 'anps_theme_plugin')=>'3', esc_html__('4', 'anps_theme_plugin')=>'4'),
            'std' => '4',
            'description' => esc_html__('Select number of items in row.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Slider', 'anps_theme_plugin'),
            'param_name' => 'slider',
            'value' => array(esc_html__('Enable', 'anps_theme_plugin')=>'1', esc_html__('Disable', 'anps_theme_plugin')=>'0'),
            'std' => '4',
            'description' => esc_html__('Enable/disable slider.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Content length', 'anps_theme_plugin'),
            'param_name' => 'content_length',
            'value' => '',
            'description' => esc_html__('Content length (default 130).', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Category id/s', 'anps_theme_plugin'),
            'param_name' => 'cat_ids',
            'value' => '',
            'description' => esc_html__('Enter category id/s. Example: 1,2,3', 'anps_theme_plugin'),
            'admin_label' => true
        )
    )
));