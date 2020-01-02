<?php
vc_map( array(
   'name' => esc_html__('Quote', 'anps_theme_plugin'),
   'base' => 'quote',
   'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
   'category' => 'Anps Shortcodes',
   'params' => array(
       array(
         'type' => 'textarea',
         'heading' => esc_html__('Quote text', 'anps_theme_plugin'),
         'param_name' => 'content',
         'admin_label' => true
      ),
      array(
         'type' => 'dropdown',
         'heading' => esc_html__('Style', 'anps_theme_plugin'),
         'param_name' => 'style',
         'value' => array(esc_html__('Style 1', 'anps_theme_plugin')=>'', esc_html__('Style 2', 'anps_theme_plugin')=>'blockquote-style-2'),
         'save_always' => true,
         'admin_label' => true
       )
   )
));