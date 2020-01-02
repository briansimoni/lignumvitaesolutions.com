<?php
vc_map( array(
    'name' => esc_html__('Recent portfolio', 'anps_theme_plugin'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'base' => 'recent_portfolio',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'recent_title',
            'value' => '',
            'description' => esc_html__('Recent portfolio title.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of portfolio posts', 'anps_theme_plugin'),
            'param_name' => 'number',
            'value' => '',
            'description' => esc_html__('Enter number of recent portfolio posts. If you want to display all posts, leave this field empty.', 'anps_theme_plugin'),
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
            'type' => 'portfolio_categories',
            'heading' => esc_html__('Portfolio categories', 'anps_theme_plugin'),
            'param_name' => 'category',
            'description' => esc_html__('Select portfolio categories.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Hide filter', 'anps_theme_plugin'),
            'param_name' => 'hide_filter',
            'description' => esc_html__('Show/hide portfolio categories filter', 'anps_theme_plugin'),
            'admin_label' => true,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title color', 'anps_theme_plugin'),
            'param_name' => 'title_color',
            'group' => esc_html__('Design Options', 'anps_theme_plugin'),
            'admin_label' => false,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background color', 'anps_theme_plugin'),
            'param_name' => 'bg_color',
            'group' => esc_html__('Design Options', 'anps_theme_plugin'),
            'admin_label' => false,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Item background color', 'anps_theme_plugin'),
            'param_name' => 'item_bg_color',
            'group' => esc_html__('Design Options', 'anps_theme_plugin'),
            'admin_label' => false,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Item text color', 'anps_theme_plugin'),
            'param_name' => 'item_text_color',
            'group' => esc_html__('Design Options', 'anps_theme_plugin'),
            'admin_label' => false,
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Item title color', 'anps_theme_plugin'),
            'param_name' => 'item_title_color',
            'group' => esc_html__('Design Options', 'anps_theme_plugin'),
            'admin_label' => false,
        ),
    )
));
