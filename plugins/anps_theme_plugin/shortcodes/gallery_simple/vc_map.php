<?php
vc_map( array(
    'name' => esc_html__('Gallery', 'anps_theme_plugin'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'base' => 'gallery_simple',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'attach_images',
            'heading' => esc_html__('Images', 'anps_theme_plugin'),
            'param_name' => 'images',
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Show in row', 'anps_theme_plugin'),
            'param_name' => 'columns',
            'value' => array(
                '2' => '2',
                '3' => '3',
                '4' => '4'
            ),
            'save_always' => true,
            'admin_label' => true
        )
    )
));
