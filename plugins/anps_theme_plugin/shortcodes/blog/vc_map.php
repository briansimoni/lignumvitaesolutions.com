<?php
vc_map( array(
    'name' => esc_html__('Blog', 'anps_theme_plugin'),
    'base' => 'blog',
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'blog_categories',
            'heading' => esc_html__('Blog categories', 'anps_theme_plugin'),
            'param_name' => 'category',
            'description' => esc_html__('Select blog categories.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Posts per page', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter post per page.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order By', 'anps_theme_plugin'),
            'param_name' => 'orderby',
            'value' => array(
                esc_html__('Default', 'anps_theme_plugin') => '',
                esc_html__('Date', 'anps_theme_plugin')    => 'date',
                esc_html__('Id', 'anps_theme_plugin')      => 'ID',
                esc_html__('Title', 'anps_theme_plugin')   => 'title',
                esc_html__('Name', 'anps_theme_plugin')    => 'name',
                esc_html__('Author', 'anps_theme_plugin')  => 'author'
            ),
            'description' => esc_html__('Order by.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Order', 'anps_theme_plugin'),
            'param_name' => 'order',
            'value' => array(
                esc_html__('Default', 'anps_theme_plugin') => '',
                esc_html__('ASC', 'anps_theme_plugin')     => 'ASC',
                esc_html__('DESC', 'anps_theme_plugin')    => 'DESC'
            ),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Columns', 'anps_theme_plugin'),
            'param_name' => 'columns',
            'value' => array(
                esc_html__('1 column', 'anps_theme_plugin')  => '1',
                esc_html__('2 columns', 'anps_theme_plugin') => '2',
                esc_html__('3 columns', 'anps_theme_plugin') => '3',
                esc_html__('4 columns', 'anps_theme_plugin') => '4'
            ),
            'save_always' => true,
            'admin_label' => true
        )
    )
));