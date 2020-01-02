<?php
vc_map( array(
    'name' => esc_html__('Alert', 'anps_theme_plugin'),
    'base' => 'alert',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'value' => '',
            'description' => esc_html__('Enter alert text.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon', 'anps_theme_plugin'),
            'param_name' => 'type',
            'value' => array(
                esc_html__('Info', 'anps_theme_plugin')            => 'info',
                esc_html__('Danger', 'anps_theme_plugin')          => 'danger',
                esc_html__('Warning', 'anps_theme_plugin')         => 'warning',
                esc_html__('Success', 'anps_theme_plugin')         => 'success',
                esc_html__('Useful', 'anps_theme_plugin')          => 'useful',
                esc_html__('Normal', 'anps_theme_plugin')          => 'normal',
                esc_html__('Info style 2', 'anps_theme_plugin')    => 'info-2',
                esc_html__('Danger style 2', 'anps_theme_plugin')  => 'danger-2',
                esc_html__('Warning style 2', 'anps_theme_plugin') => 'warning-2',
                esc_html__('Success style 2', 'anps_theme_plugin') => 'success-2',
                esc_html__('Useful style 2', 'anps_theme_plugin')  => 'useful-2',
                esc_html__('Normal style 2', 'anps_theme_plugin')  => 'normal-2'),
            'save_always' => true,
            'admin_label' => true
        )
    )
));