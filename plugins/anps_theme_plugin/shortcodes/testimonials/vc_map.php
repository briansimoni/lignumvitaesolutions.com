<?php
/* Testimonials */
class WPBakeryShortCode_testimonials extends WPBakeryShortCodesContainer {
    static  function anps_testimonials_func($atts, $content) {
        return anps_testimonials($atts, $content);
    }
}
/* END Testimonials */
/* Testimonial item */
class WPBakeryShortCode_anps_testimonial extends WPBakeryShortCode {
    static function anps_testimonial_func($atts, $content) {
        return anps_testimonial($atts, $content);
    }
}
/* END Testimonial */
/* VC testimonials (as parent) */
vc_map(array(
    'name' => esc_html__('Testimonials', 'anps_theme_plugin'),
    'base' => 'testimonials',
    'as_parent' => array('only' => 'testimonial'),
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('title', 'anps_theme_plugin'),
            'param_name' => 'testimonialheading',
            'description' => esc_html__('Enter the title.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'anps_theme_plugin'),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Style 1', 'anps_theme_plugin') => 'style-1',
                esc_html__('Style 2', 'anps_theme_plugin') => 'style-2',
                esc_html__('Style 3', 'anps_theme_plugin') => 'style-3'
            ),
            'save_always' => true,
            'admin_label' => false
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Random order', 'anps_theme_plugin'),
            'param_name' => 'random',
            'description' => esc_html__('Display testimonials in random order when shown in a carousel.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Autoplay', 'anps_theme_plugin'),
            'param_name' => 'autoplay',
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Autoplay timeout', 'anps_theme_plugin'),
            'param_name' => 'autoplay_timeout',
            'value' => '6000',
            'admin_label' => true
        ),
    )
));
/* END VC testimonials */
/* VC testimonial (as child) */
vc_map(array(
    'name' => esc_html__('Testimonial item', 'anps_theme_plugin'),
    'base' => 'testimonial',
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'as_child' => array('only' => 'testimonials'),
    'params' => array(
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Testimonial text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter user testimonial text', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('User name', 'anps_theme_plugin'),
            'param_name' => 'user_name',
            'description' => esc_html__('Enter user name', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Job position', 'anps_theme_plugin'),
            'param_name' => 'user_name_subtitle',
            'description' => esc_html__('Enter optional job position', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('User image', 'anps_theme_plugin'),
            'param_name' => 'image_u',
            'description' => esc_html__('Choose image.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('User image url', 'anps_theme_plugin'),
            'param_name' => 'image',
            'description' => esc_html__('Enter image url.', 'anps_theme_plugin'),
            'admin_label' => false
        )
    )
));
/* END VC testimonial */
