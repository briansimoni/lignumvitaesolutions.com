<?php
vc_map( array(
   'name' => esc_html__('Team', 'anps_theme_plugin'),
   'base' => 'team',
   'category' => 'Anps Shortcodes',
   'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
   'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Number of items in column', 'anps_theme_plugin'),
            'param_name' => 'columns',
            'value' => array(
                esc_html__('4', 'anps_theme_plugin')=>'4',
                esc_html__('2', 'anps_theme_plugin')=>'2',
                esc_html__('3', 'anps_theme_plugin')=>'3',
                esc_html__('6', 'anps_theme_plugin')=>'6'
            ),
            'description' => esc_html__('Enter number of team item in column.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Number of team members', 'anps_theme_plugin'),
            'param_name' => 'number_items',
            'value' => '',
            'description' => esc_html__('Enter number of team members (if you want all than enter -1).', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Team member id/s', 'anps_theme_plugin'),
            'param_name' => 'ids',
            'value' => '',
            'description' => esc_html__('Enter team member id/s. Example: 1,2,3', 'anps_theme_plugin'),
            'admin_label' => true
        )
    )
));