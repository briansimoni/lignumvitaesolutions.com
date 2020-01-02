<?php
vc_map( array(
    'name' => esc_html__('Portfolio', 'anps_theme_plugin'),
    'base' => 'portfolio',
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of portfolio posts', 'anps_theme_plugin'),
            'param_name' => 'per_page',
            'value' => '',
            'description' => esc_html__('Enter number of portfolio posts.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show in row', 'anps_theme_plugin'),
            'param_name' => 'columns',
            'value' => array(esc_html__('6', 'anps_theme_plugin')=>'6', esc_html__('4', 'anps_theme_plugin')=>'4', esc_html__('3', 'anps_theme_plugin')=>'3', esc_html__('2', 'anps_theme_plugin')=>'2' ),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'portfolio_categories',
            'heading' => esc_html__('Portfolio categories', 'anps_theme_plugin'),
            'param_name' => 'category',
            'description' => esc_html__('Select portfolio categories.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Filter', 'anps_theme_plugin'),
            'param_name' => 'filter',
            'value' => array(esc_html__('On', 'anps_theme_plugin')=>'on', esc_html__('Off', 'anps_theme_plugin')=>'off'),
            'save_always' => true,
            'admin_label' => false
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order By', 'anps_theme_plugin'),
            'param_name' => 'orderby',
            'value' => array(esc_html__('Default', 'anps_theme_plugin')=>'default', esc_html__('Date', 'anps_theme_plugin')=>'date', esc_html__('Id', 'anps_theme_plugin')=>'ID', esc_html__('Title', 'anps_theme_plugin')=>'title', esc_html__('Name', 'anps_theme_plugin')=>'name'),
            'description' => esc_html__('Enter order by.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order', 'anps_theme_plugin'),
            'param_name' => 'order',
            'value' => array(esc_html__('Default', 'anps_theme_plugin')=>'', esc_html__('ASC', 'anps_theme_plugin')=>'ASC', esc_html__('DESC', 'anps_theme_plugin')=>'DESC'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Mobile view', 'anps_theme_plugin'),
            'param_name' => 'mobile_class',
            'value' => array(esc_html__('2 columns', 'anps_theme_plugin')=>'2', esc_html__('1 column', 'anps_theme_plugin')=>'1'),
            'save_always' => true,
            'admin_label' => true
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
