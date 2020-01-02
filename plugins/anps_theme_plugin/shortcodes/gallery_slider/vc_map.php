<?php
vc_map( array(
    'name' => esc_html__('Gallery slider', 'anps_theme_plugin'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'base' => 'gallery_slider',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'attach_images',
            'heading' => esc_html__('Images', 'anps_theme_plugin'),
            'param_name' => 'images',
            'admin_label' => true
        )
    )
));