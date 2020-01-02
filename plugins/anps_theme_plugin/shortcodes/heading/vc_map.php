<?php
vc_map( array(
    'name' => esc_html__('Heading', 'anps_theme_plugin'),
    'base' => 'heading',
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'content',
            'value' => '',
            'description' => esc_html__('Enter title.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Subtitle', 'anps_theme_plugin'),
            'param_name' => 'subtitle',
            'value' => '',
            'description' => esc_html__('Enter subtitle.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size', 'anps_theme_plugin'),
            'param_name' => 'size',
            'value' => array(esc_html__('H1', 'anps_theme_plugin')=>'1', esc_html__('H2', 'anps_theme_plugin')=>'2', esc_html__('H3', 'anps_theme_plugin')=>'3', esc_html__('H4', 'anps_theme_plugin')=>'4', esc_html__('H5', 'anps_theme_plugin')=>'5'),
            'description' => esc_html__('Enter title size.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Heading class', 'anps_theme_plugin'),
            'param_name' => 'heading_class',
            'value' => array(esc_html__('Middle heading', 'anps_theme_plugin')=>'heading', esc_html__('Content heading', 'anps_theme_plugin')=>'content_heading', esc_html__('Left heading', 'anps_theme_plugin')=>'style-3'),
            'description' => esc_html__('Choose heading.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => false
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Heading style', 'anps_theme_plugin'),
            'param_name' => 'heading_style',
            'value' => array(esc_html__('Style 1', 'anps_theme_plugin')=>'style-1', esc_html__('Style 2', 'anps_theme_plugin')=>'divider-sm', esc_html__('Style 3', 'anps_theme_plugin')=>'divider-lg', esc_html__('Style 4', 'anps_theme_plugin')=>'divider-modern'),
            'description' => esc_html__('Choose heading style.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Id', 'anps_theme_plugin'),
            'param_name' => 'h_id',
            'value' => '',
            'description' => esc_html__('Enter id.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Class', 'anps_theme_plugin'),
            'param_name' => 'h_class',
            'value' => '',
            'description' => esc_html__('Enter class.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'anps_theme_plugin'),
            'param_name' => 'color',
            'description' => esc_html__('Heading text color.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Subtitle Color', 'anps_theme_plugin'),
            'param_name' => 'subtitle_color',
            'description' => esc_html__('Heading subtitle color.', 'anps_theme_plugin'),
            'admin_label' => false
        )
    )
));