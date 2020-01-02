<?php
vc_map( array(
    'name' => esc_html__('Featured content', 'anps_theme_plugin'),
    'base' => 'anps_featured',
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'title',
            'admin_label' => true
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Image', 'anps_theme_plugin'),
            'param_name' => 'image_u',
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Video', 'anps_theme_plugin'),
            'description' => esc_html__('Enter youtube or vimeo video url. Example: https://vimeo.com/146064760', 'anps_theme_plugin'),
            'param_name' => 'video',
            'admin_label' => false
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Open in lightbox', 'anps_theme_plugin'),
            'param_name' => 'lightbox',
            'description' => esc_html__('Open image or video in fullscreen lightbox', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Content', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter content of shortcode.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Link', 'anps_theme_plugin'),
            'param_name' => 'link',
            'admin_label' => false
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Link target', 'anps_theme_plugin'),
            'param_name' => 'link_target',
            'value' => array(
                '_self' => '_self',
                '_blank' => '_blank',
                '_parent' => '_parent',
                '_top' => '_top'
            ),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'js_composer' ),
            'param_name' => 'icon',
            'value' => '',
            'settings' => array(
               'emptyIcon' => true,
               'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Custom Icon', 'anps_theme_plugin'),
            'param_name' => 'icon_custom',
            'admin_label' => false
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Custom Icon (hover)', 'anps_theme_plugin'),
            'param_name' => 'icon_custom_hover',
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Button text', 'anps_theme_plugin'),
            'param_name' => 'button_text',
            'admin_label' => false
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('position image above? (use below slider)', 'anps_theme_plugin'),
            'param_name' => 'absolute_img',
            'admin_label' => true
         ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Exposed content', 'anps_theme_plugin'),
            'param_name' => 'exposed',
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'anps_theme_plugin'),
            'param_name' => 'style',
            'value' => array(esc_html__('default', 'anps_theme_plugin')=>'', esc_html__('Simple', 'anps_theme_plugin')=>'simple-style'),
            'save_always' => true,
            'admin_label' => false
       )
    )
));