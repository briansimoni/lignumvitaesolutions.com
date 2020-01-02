<?php
class Anps_Customizer {
    public static function customizer_register($wp_customize) {
        /* Include custom controls */
        include_once 'customizer_controls/anps_divider_control.php';
        include_once 'customizer_controls/anps_desc_control.php';
        include_once 'customizer_controls/anps_sidebar_control.php';
        /* Add theme options panel */
        $wp_customize->add_panel('anps_customizer', array('title' =>esc_html__('Theme options', 'industrial'), 'description' => esc_html__('Theme options', 'industrial')));
        /* Theme options sections (categories) */
        $wp_customize->add_section('anps_colors', array('title' =>esc_html__('Main theme colors', 'industrial'), 'description' => esc_html__('Not satisfied with the premade color schemes? Here you can set your custom colors.', 'industrial'), 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_button_colors', array('title' =>esc_html__('Button colors', 'industrial'), 'description' => esc_html__('Button colors', 'industrial'), 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_typography', array('title' =>esc_html__('Typography', 'industrial'), 'description' => esc_html__('Typography', 'industrial'), 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_page_layout', array('title' =>esc_html__('Page layout', 'industrial'), 'description' => esc_html__('Page layout', 'industrial'), 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_page_setup', array('title' =>esc_html__('Page setup', 'industrial'), 'description' => esc_html__('Page setup', 'industrial'), 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_header', array('title' =>esc_html__('Header options', 'industrial'), 'description' => esc_html__('Header options', 'industrial'), 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_footer', array('title' =>esc_html__('Footer options', 'industrial'), 'description' => esc_html__('Footer options', 'industrial'), 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_woocommerce', array('title' =>esc_html__('Woocommerce', 'industrial'), 'description' => esc_html__('Woocommerce', 'industrial'), 'panel'=>'anps_customizer'));
        $wp_customize->add_section('anps_logos', array('title' =>esc_html__('Logos', 'industrial'), 'description' => esc_html__('If you would like to use your logo and favicon, upload them to your theme here', 'industrial'), 'panel'=>'anps_customizer'));
        /* END Theme options sections (categories) */
        //Color management (main theme and buttons) settings
        Anps_Customizer::color_management($wp_customize);
        //Typography settings
        Anps_Customizer::typography($wp_customize);
        //Page layout settings
        Anps_Customizer::page_layout($wp_customize);
        //Page layout settings
        Anps_Customizer::page_setup($wp_customize);
        //Header options
        Anps_Customizer::header_options($wp_customize);
        //Footer options
        Anps_Customizer::footer_options($wp_customize);
        //Woocommerce
        Anps_Customizer::woocommerce($wp_customize);
        //Logos
        Anps_Customizer::logos($wp_customize);
    }
    /* Color management settings */
    private static function color_management($wp_customize) {
        /* Main theme colors */
        //text color
        $wp_customize->add_setting('anps_text_color', array('default'=>get_option('anps_text_color', '898989'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_text_color', array('label' => esc_html__('Text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_text_color')));
        //primary color
        $wp_customize->add_setting('anps_primary_color', array('default'=>get_option('anps_primary_color', '3498db'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_primary_color', array('label' => esc_html__('Primary color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_primary_color')));
        //hovers color
        $wp_customize->add_setting('anps_hovers_color', array('default'=>get_option('anps_hovers_color', '2a76a9'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_hovers_color', array('label' => esc_html__('Hovers color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_hovers_color')));
        //menu text color
        $wp_customize->add_setting('anps_menu_text_color', array('default'=>get_option('anps_menu_text_color', 'ffffff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_menu_text_color', array('label' => esc_html__('Menu text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_menu_text_color')));
        //menu background color
        $wp_customize->add_setting('anps_menu_bg_color', array('default'=>get_option('anps_menu_bg_color', '16242e'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_menu_bg_color', array('label' => esc_html__('Menu background color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_menu_bg_color')));
        //headings color
        $wp_customize->add_setting('anps_headings_color', array('default'=>get_option('anps_headings_color', '000000'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_headings_color', array('label' => esc_html__('Headings color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_headings_color')));
        //Top bar text color
        $wp_customize->add_setting('anps_top_bar_color', array('default'=>get_option('anps_top_bar_color', '8c8c8c'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_top_bar_color', array('label' => esc_html__('Top bar color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_top_bar_color')));
        //Top bar background color
        $wp_customize->add_setting('anps_top_bar_bg_color', array('default'=>get_option('anps_top_bar_bg_color', '16242e'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_top_bar_bg_color', array('label' => esc_html__('Top bar background color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_top_bar_bg_color')));
        //Footer background color
        $wp_customize->add_setting('anps_footer_bg_color', array('default'=>get_option('anps_footer_bg_color', '171717'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_footer_bg_color', array('label' => esc_html__('Footer background color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_footer_bg_color')));
        //Footer text color
        $wp_customize->add_setting('anps_footer_text_color', array('default'=>get_option('anps_footer_text_color', '7f7f7f'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_footer_text_color', array('label' => esc_html__('Footer text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_footer_text_color')));
        //Footer border color
        $wp_customize->add_setting('anps_footer_border_color', array('default'=>get_option('anps_footer_border_color', '2e2e2e'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_footer_border_color', array('label' => esc_html__('Footer border color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_footer_border_color')));
        //Footer heading text color
        $wp_customize->add_setting('anps_footer_heading_text_color', array('default'=>get_option('anps_footer_heading_text_color', 'ffffff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_footer_heading_text_color', array('label' => esc_html__('Footer heading text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_footer_heading_text_color')));
        //Copyright footer text color
        $wp_customize->add_setting('anps_c_footer_text_color', array('default'=>get_option('anps_c_footer_text_color', '9C9C9C'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_c_footer_text_color', array('label' => esc_html__('Copyright footer text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_c_footer_text_color')));
        //Copyright footer background color
        $wp_customize->add_setting('anps_c_footer_bg_color', array('default'=>get_option('anps_c_footer_bg_color', ''), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_c_footer_bg_color', array('label' => esc_html__('Copyright footer background color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_c_footer_bg_color')));
        //Page header background color
        $wp_customize->add_setting('anps_page_header_background_color', array('default'=>get_option('anps_page_header_background_color', 'f8f9f9'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_page_header_background_color', array('label' => esc_html__('Page header background color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_page_header_background_color')));
        //Page title color
        $wp_customize->add_setting('anps_page_title', array('default'=>get_option('anps_page_title', '4e4e4e'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_page_title', array('label' => esc_html__('Page title color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_page_title')));
        //Submenu background color
        $wp_customize->add_setting('anps_submenu_background_color', array('default'=>get_option('anps_submenu_background_color', 'ffffff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_submenu_background_color', array('label' => esc_html__('Submenu background color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_submenu_background_color')));
        //Submenu text color
        $wp_customize->add_setting('anps_submenu_text_color', array('default'=>get_option('anps_submenu_text_color', '8c8c8c'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_submenu_text_color', array('label' => esc_html__('Submenu text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_submenu_text_color')));
         //Submenu text hover color
        $wp_customize->add_setting('anps_submenu_text_hover_color', array('default'=>get_option('anps_submenu_text_hover_color', 'ffffff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_submenu_text_hover_color', array('label' => esc_html__('Submenu text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_submenu_text_hover_color')));
        //Submenu divider color
        $wp_customize->add_setting('anps_submenu_divider_color', array('default'=>get_option('anps_submenu_divider_color', 'ececec'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_submenu_divider_color', array('label' => esc_html__('Submenu divider color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_submenu_divider_color')));
        //Text on top of primary color
        $wp_customize->add_setting('anps_primary_text_top', array('default'=>get_option('anps_primary_text_top', 'ffffff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_primary_text_top', array('label' => esc_html__('Text on top of primary color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_primary_text_top')));
        //Shopping cart item number bg color
        $wp_customize->add_setting('anps_woo_cart_items_number_bg_color', array('default'=>get_option('anps_woo_cart_items_number_bg_color', '3daaf3'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_woo_cart_items_number_bg_color', array('label' => esc_html__('Shopping cart item number background color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_woo_cart_items_number_bg_color')));
        //Shopping cart item number text color
        $wp_customize->add_setting('anps_woo_cart_items_number_color', array('default'=>get_option('anps_woo_cart_items_number_color', '2f4d60'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_woo_cart_items_number_color', array('label' => esc_html__('Shopping cart item number text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_woo_cart_items_number_color')));
        //Important background color
        $wp_customize->add_setting('anps_important_bg_color', array('default'=>get_option('anps_important_bg_color', '69cd72'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_important_bg_color', array('label' => esc_html__('Important background color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_important_bg_color')));
        //Important text color
        $wp_customize->add_setting('anps_important_text_color', array('default'=>get_option('anps_important_text_color', '32853a'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_important_text_color', array('label' => esc_html__('Important text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_important_text_color')));
        //Heading divider color
        $wp_customize->add_setting('anps_main_divider_color', array('default'=>get_option('anps_main_divider_color', '69cd72'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_main_divider_color', array('label' => esc_html__('Important text color', 'industrial'), 'section' => 'anps_colors', 'settings'=>'anps_main_divider_color')));

        /* END Main theme colors */
        /* Button colors */
        //Normal button description
        $wp_customize->add_setting('anps_normal_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_normal_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_normal_button_desc', 'label'=>esc_html__('Normal button', 'industrial'), 'description'=>esc_html__('Next 4 colors define normal button.', 'industrial'))));
        //Default button background
        $wp_customize->add_setting('anps_normal_button_bg', array('default'=>get_option('anps_normal_button_bg', '3498db'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_normal_button_bg', array('label' => esc_html__('Normal button background', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_normal_button_bg')));
        //Default button color
        $wp_customize->add_setting('anps_normal_button_color', array('default'=>get_option('anps_normal_button_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_normal_button_color', array('label' => esc_html__('Normal button color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_normal_button_color')));
        //Default button hover background
        $wp_customize->add_setting('anps_normal_button_hover_bg', array('default'=>get_option('anps_normal_button_hover_bg', '2a76a9'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_normal_button_hover_bg', array('label' => esc_html__('Normal button hover background', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_normal_button_hover_bg')));
        //Default button hover color
        $wp_customize->add_setting('anps_normal_button_hover_color', array('default'=>get_option('anps_normal_button_hover_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_normal_button_hover_color', array('label' => esc_html__('Normal button hover color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_normal_button_hover_color')));
        //Button with gradient description
        $wp_customize->add_setting('anps_gradient_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_gradient_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_desc', 'label'=>esc_html__('Button with gradient', 'industrial'), 'description'=>esc_html__('Next 4 colors define button with gradient.', 'industrial'))));
        //Gradient button background
        $wp_customize->add_setting('anps_gradient_button_bg', array('default'=>get_option('anps_gradient_button_bg', '3498db'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_gradient_button_bg', array('label' => esc_html__('Gradient button background', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_bg')));
        //Gradient button color
        $wp_customize->add_setting('anps_gradient_button_color', array('default'=>get_option('anps_gradient_button_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_gradient_button_color', array('label' => esc_html__('Gradient button color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_color')));
        //Gradient button hover background
        $wp_customize->add_setting('anps_gradient_button_hover_bg', array('default'=>get_option('anps_gradient_button_hover_bg', '2a76a9'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_gradient_button_hover_bg', array('label' => esc_html__('Gradient button hover background', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_hover_bg')));
        //Gradient button hover color
        $wp_customize->add_setting('anps_gradient_button_hover_color', array('default'=>get_option('anps_gradient_button_hover_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_gradient_button_hover_color', array('label' => esc_html__('Gradient button hover color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_gradient_button_hover_color')));
        //Dark button description
        $wp_customize->add_setting('anps_dark_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_dark_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_dark_button_desc', 'label'=>esc_html__('Dark button', 'industrial'), 'description'=>esc_html__('Next 4 colors define dark button.', 'industrial'))));
        //Dark button background
        $wp_customize->add_setting('anps_dark_button_bg', array('default'=>get_option('anps_dark_button_bg', '242424'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_dark_button_bg', array('label' => esc_html__('Dark button background', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_dark_button_bg')));
        //Dark button color
        $wp_customize->add_setting('anps_dark_button_color', array('default'=>get_option('anps_dark_button_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_dark_button_color', array('label' => esc_html__('Dark button color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_dark_button_color')));
        //Dark button hover background
        $wp_customize->add_setting('anps_dark_button_hover_bg', array('default'=>get_option('anps_dark_button_hover_bg', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_dark_button_hover_bg', array('label' => esc_html__('Dark button hover background', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_dark_button_hover_bg')));
        //Dark button hover color
        $wp_customize->add_setting('anps_dark_button_hover_color', array('default'=>get_option('anps_dark_button_hover_color', '242424'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_dark_button_hover_color', array('label' => esc_html__('Dark button hover color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_dark_button_hover_color')));
        //Light button description
        $wp_customize->add_setting('anps_light_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_light_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_light_button_desc', 'label'=>esc_html__('Light button', 'industrial'), 'description'=>esc_html__('Next 4 colors define light button.', 'industrial'))));
        //Light button background
        $wp_customize->add_setting('anps_light_button_bg', array('default'=>get_option('anps_light_button_bg', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_light_button_bg', array('label' => esc_html__('Light button background', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_light_button_bg')));
        //Light button color
        $wp_customize->add_setting('anps_light_button_color', array('default'=>get_option('anps_light_button_color', '242424'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_light_button_color', array('label' => esc_html__('Light button color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_light_button_color')));
        //Light button hover color
        $wp_customize->add_setting('anps_light_button_hover_bg', array('default'=>get_option('anps_light_button_hover_bg', '242424'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_light_button_hover_bg', array('label' => esc_html__('Light button hover color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_light_button_hover_bg')));
        //Light button hover color
        $wp_customize->add_setting('anps_light_button_hover_color', array('default'=>get_option('anps_light_button_hover_color', 'fff'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_light_button_hover_color', array('label' => esc_html__('Light button hover color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_light_button_hover_color')));
        //Button minimal description
        $wp_customize->add_setting('anps_minimal_button_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_minimal_button_desc', array('section' => 'anps_button_colors', 'settings'=>'anps_minimal_button_desc', 'label'=>esc_html__('Minimal button', 'industrial'), 'description'=>esc_html__('Next 2 colors define minimal button.', 'industrial'))));
        //Button minimal color
        $wp_customize->add_setting('anps_minimal_button_color', array('default'=>get_option('anps_minimal_button_color', '3498db'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_minimal_button_color', array('label' => esc_html__('Button minimal color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_minimal_button_color')));
        //Button minimal hover color
        $wp_customize->add_setting('anps_minimal_button_hover_color', array('default'=>get_option('anps_minimal_button_hover_color', '2a76a9'), 'type'=>'option', 'sanitize_callback'=>'sanitize_hex_color_no_hash', 'sanitize_js_callback'=>'maybe_hash_hex_color'));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'anps_minimal_button_hover_color', array('label' => esc_html__('Button minimal hover color', 'industrial'), 'section' => 'anps_button_colors', 'settings'=>'anps_minimal_button_hover_color')));
        /* END Button colors */
    }
    /* Typography settings */
    private static function typography($wp_customize) {
        /* Še manjka za izbiranje fontov */
        //Body font size
        $wp_customize->add_setting('anps_body_font_size', array('default'=>get_option('anps_body_font_size', '14'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_body_font_size', array('label'=>esc_html__('Body font size', 'industrial'), 'settings' => 'anps_body_font_size', 'section' => 'anps_typography'));
        //Menu font size
        $wp_customize->add_setting('anps_menu_font_size', array('default'=>get_option('anps_menu_font_size', '14'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_menu_font_size', array('label'=>esc_html__('Menu font size', 'industrial'), 'settings' => 'anps_menu_font_size', 'section' => 'anps_typography'));
        //Submenu font size
        $wp_customize->add_setting('anps_submenu_font_size', array('default'=>get_option('anps_submenu_font_size', '12'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_submenu_font_size', array('label'=>esc_html__('Submenu font size', 'industrial'), 'settings' => 'anps_submenu_font_size', 'section' => 'anps_typography'));
        //Top bar font size
        $wp_customize->add_setting('anps_top_bar_font_size', array('default'=>get_option('anps_top_bar_font_size', '12'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_top_bar_font_size', array('label'=>esc_html__('Top bar font size', 'industrial'), 'settings' => 'anps_top_bar_font_size', 'section' => 'anps_typography'));
        //Content heading 1 font size
        $wp_customize->add_setting('anps_h1_font_size', array('default'=>get_option('anps_h1_font_size', '31'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_h1_font_size', array('label'=>esc_html__('Content heading 1 font size', 'industrial'), 'settings' => 'anps_h1_font_size', 'section' => 'anps_typography'));
        //Content heading 2 font size
        $wp_customize->add_setting('anps_h2_font_size', array('default'=>get_option('anps_h2_font_size', '24'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_h2_font_size', array('label'=>esc_html__('Content heading 2 font size', 'industrial'), 'settings' => 'anps_h2_font_size', 'section' => 'anps_typography'));
        //Content heading 3 font size
        $wp_customize->add_setting('anps_h3_font_size', array('default'=>get_option('anps_h3_font_size', '21'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_h3_font_size', array('label'=>esc_html__('Content heading 3 font size', 'industrial'), 'settings' => 'anps_h3_font_size', 'section' => 'anps_typography'));
        //Content heading 4 font size
        $wp_customize->add_setting('anps_h4_font_size', array('default'=>get_option('anps_h4_font_size', '18'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_h4_font_size', array('label'=>esc_html__('Content heading 4 font size', 'industrial'), 'settings' => 'anps_h4_font_size', 'section' => 'anps_typography'));
        //Content heading 5 font size
        $wp_customize->add_setting('anps_h5_font_size', array('default'=>get_option('anps_h5_font_size', '16'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_h5_font_size', array('label'=>esc_html__('Content heading 5 font size', 'industrial'), 'settings' => 'anps_h5_font_size', 'section' => 'anps_typography'));
        //Page heading 1 font size
        $wp_customize->add_setting('anps_page_heading_h1_font_size', array('default'=>get_option('anps_page_heading_h1_font_size', '48'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_page_heading_h1_font_size', array('label'=>esc_html__('Page heading 1 font size', 'industrial'), 'settings' => 'anps_page_heading_h1_font_size', 'section' => 'anps_typography'));
        //Single blog page heading 1 font size
        $wp_customize->add_setting('anps_blog_heading_h1_font_size', array('default'=>get_option('anps_blog_heading_h1_font_size', '28'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_blog_heading_h1_font_size', array('label'=>esc_html__('Single blog page heading 1 font size', 'industrial'), 'settings' => 'anps_blog_heading_h1_font_size', 'section' => 'anps_typography'));
        //Footer font size
        $wp_customize->add_setting('anps_footer_font_size', array('default'=>get_option('anps_footer_font_size', '14'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_footer_font_size', array('label'=>esc_html__('Footer font size', 'industrial'), 'settings' => 'anps_footer_font_size', 'section' => 'anps_typography'));
        //Copyright footer font size
        $wp_customize->add_setting('anps_c_footer_font_size', array('default'=>get_option('anps_c_footer_font_size', '14'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_c_footer_font_size', array('label'=>esc_html__('Copyright footer font size', 'industrial'), 'settings' => 'anps_c_footer_font_size', 'section' => 'anps_typography'));
    }
    /* Page layout settings */
    private static function page_layout($wp_customize) {
        //Pge sidebar description
        $wp_customize->add_setting('anps_page_sidebar_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_page_sidebar_desc', array('section' => 'anps_page_layout', 'settings'=>'anps_page_sidebar_desc', 'label'=>esc_html__('Page Sidebars', 'industrial'), 'description'=>esc_html__('This will change the default sidebar value on all pages. It can be changed on each page individually.', 'industrial'))));
        //Page left sidebar
        $wp_customize->add_setting('anps_page_sidebar_left', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Sidebar_Control($wp_customize, 'anps_page_sidebar_left', array('section' => 'anps_page_layout', 'settings'=>'anps_page_sidebar_left', 'label'=>esc_html__('Page sidebar left', 'industrial'))));
        //Page right sidebar
        $wp_customize->add_setting('anps_page_sidebar_right', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Sidebar_Control($wp_customize, 'anps_page_sidebar_right', array('section' => 'anps_page_layout', 'settings'=>'anps_page_sidebar_right', 'label'=>esc_html__('Page sidebar right', 'industrial'))));
        //Post sidebar description
        $wp_customize->add_setting('anps_post_sidebar_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_post_sidebar_desc', array('section' => 'anps_page_layout', 'settings'=>'anps_post_sidebar_desc', 'label'=>esc_html__('Post Sidebars', 'industrial'), 'description'=>esc_html__('This will change the default sidebar value on all posts. It can be changed on each post individually.', 'industrial'))));
        //Post left sidebar
        $wp_customize->add_setting('anps_post_sidebar_left', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Sidebar_Control($wp_customize, 'anps_post_sidebar_left', array('section' => 'anps_page_layout', 'settings'=>'anps_post_sidebar_left', 'label'=>esc_html__('Post sidebar left', 'industrial'))));
        //Post right sidebar
        $wp_customize->add_setting('anps_post_sidebar_right', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Sidebar_Control($wp_customize, 'anps_post_sidebar_right', array('section' => 'anps_page_layout', 'settings'=>'anps_post_sidebar_right', 'label'=>esc_html__('Post sidebar right', 'industrial'))));
        //Disable page title and background
        $wp_customize->add_setting('anps_heading_status', array('default'=>get_option('anps_heading_status', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_heading_status', array('section'=>'anps_page_layout', 'type'=>'checkbox', 'label'=>esc_html__('Enable page title and background', 'industrial'), 'settings'=>'anps_heading_status'));
        //divider heading
        $wp_customize->add_setting('anps_heading_divider', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Divider_Control($wp_customize, 'anps_heading_divider', array('section' => 'anps_page_layout', 'settings'=>'anps_heading_divider')));
        //Breadcrumbs
        $wp_customize->add_setting('anps_breadcrumbs_status', array('default'=>get_option('anps_breadcrumbs_status', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_breadcrumbs_status', array('section'=>'anps_page_layout', 'type'=>'checkbox', 'label'=>esc_html__('Enable Bredcrumbs', 'industrial'), 'settings'=>'anps_breadcrumbs_status'));
        //Page comments
        $wp_customize->add_setting('anps_page_comments', array('default'=>get_option('anps_page_comments', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_page_comments', array('section'=>'anps_page_layout', 'type'=>'checkbox', 'label'=>esc_html__('Enable page comments', 'industrial'), 'settings'=>'anps_page_comments'));
        //Blog layout description
        $wp_customize->add_setting('anps_blog_layout_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_blog_layout_desc', array('section' => 'anps_page_layout', 'settings'=>'anps_blog_layout_desc', 'label'=>esc_html__('Blog layout', 'industrial'), 'description'=>esc_html__('This option defines default display of blog, archive pages, categories and tags.', 'industrial'))));
        //Blog layout columns
        $wp_customize->add_setting('anps_blog_columns', array('default'=>get_option('anps_blog_columns', 'col-md-12'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_blog_columns', array(
            'label'=>esc_html__('Columns', 'industrial'),
            'type'=>'select',
            'settings' =>'anps_blog_columns',
            'section' =>'anps_page_layout',
            'choices' =>array(
                'col-md-12'=>esc_html__('1 column', 'industrial'),
                'col-md-6'=>esc_html__('2 columns', 'industrial'),
                'col-md-4'=>esc_html__('3 columns', 'industrial'),
                'col-md-3'=>esc_html__('4 columns', 'industrial')
            )
        ));
    }
    /* Page setup */
    private static function page_setup($wp_customize) {
        //Excerpt length
        $wp_customize->add_setting('anps_excerpt_length', array('default'=>get_option('anps_excerpt_length', '40'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_excerpt_length', array('label'=>esc_html__('Excerpt length', 'industrial'), 'settings' => 'anps_excerpt_length', 'section' => 'anps_page_setup'));
        //404 error page
        $wp_customize->add_setting('anps_error_page', array('default'=>get_option('anps_error_page'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_error_page', array('label'=>esc_html__('404 error page', 'industrial'), 'type'=>'dropdown-pages', 'settings' => 'anps_error_page', 'section' => 'anps_page_setup'));
        //Portfolio title and description
        $wp_customize->add_setting('anps_portfolio_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_portfolio_desc', array('section' => 'anps_page_setup', 'settings'=>'anps_portfolio_desc', 'label'=>esc_html__('Portfolio settings', 'industrial'), 'description'=>esc_html__('Here you can select single portfolio style, change portfolio slug to your own and add content to portfolio single footer (including shortcodes).', 'industrial'))));
        //Portfolio slug
        $wp_customize->add_setting('anps_portfolio_slug', array('default'=>get_option('anps_portfolio_slug'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_portfolio_slug', array('label'=>esc_html__('Portfolio slug', 'industrial'), 'settings' => 'anps_portfolio_slug', 'section' => 'anps_page_setup'));
        //Portfolio single style
        $wp_customize->add_setting('anps_portfolio_single', array('default'=>get_option('anps_portfolio_single', 'style-1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_portfolio_single', array(
            'label'=>esc_html__('Portfolio single style', 'industrial'),
            'type'=>'select',
            'settings' =>'anps_portfolio_single',
            'section' =>'anps_page_setup',
            'choices' =>array(
                'style-1'=>esc_html__('Style 1', 'industrial'),
                'style-2'=>esc_html__('Style 2', 'industrial'),
                'style-3'=>esc_html__('Style 3', 'industrial')
            )
        ));
        //Team slug
        $wp_customize->add_setting('anps_team_slug', array('default'=>get_option('anps_team_slug'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_team_slug', array('label'=>esc_html__('Team slug', 'industrial'), 'settings' => 'anps_team_slug', 'section' => 'anps_page_setup'));
        //Post meta title and description
        $wp_customize->add_setting('anps_post_meta_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_post_meta_desc', array('section' => 'anps_page_setup', 'settings'=>'anps_post_meta_desc', 'label'=>esc_html__('Post meta settings', 'industrial'), 'description'=>esc_html__('Here you can check with post meta will be hidden on posts.', 'industrial'))));
        //comments checkbox
        $wp_customize->add_setting('anps_post_meta_comments', array('default'=>get_option('anps_post_meta_comments', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_post_meta_comments', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>esc_html__('Comments', 'industrial'), 'settings'=>'anps_post_meta_comments'));
        //categories checkbox
        $wp_customize->add_setting('anps_post_meta_categories', array('default'=>get_option('anps_post_meta_categories', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_post_meta_categories', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>esc_html__('Categories', 'industrial'), 'settings'=>'anps_post_meta_categories'));
        //author checkbox
        $wp_customize->add_setting('anps_post_meta_author', array('default'=>get_option('anps_post_meta_author', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_post_meta_author', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>esc_html__('Author', 'industrial'), 'settings'=>'anps_post_meta_author'));
        //date checkbox
        $wp_customize->add_setting('anps_post_meta_date', array('default'=>get_option('anps_post_meta_date', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_post_meta_date', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>esc_html__('Date', 'industrial'), 'settings'=>'anps_post_meta_date'));
        //Post meta on single post
        $wp_customize->add_setting('anps_post_meta_page_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_post_meta_page_desc', array('section' => 'anps_page_setup', 'settings'=>'anps_post_meta_page_desc', 'label'=>esc_html__('Post meta single page settings', 'industrial'), 'description'=>esc_html__('Here you can check with post meta will be hidden on single post.', 'industrial'))));
        //comments page checkbox
        $wp_customize->add_setting('anps_post_meta_comments_single', array('default'=>get_option('anps_post_meta_comments_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_post_meta_comments_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>esc_html__('Comments', 'industrial'), 'settings'=>'anps_post_meta_comments_single'));
        //categories page checkbox
        $wp_customize->add_setting('anps_post_meta_categories_single', array('default'=>get_option('anps_post_meta_categories_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_post_meta_categories_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>esc_html__('Categories', 'industrial'), 'settings'=>'anps_post_meta_categories_single'));
        //author page checkbox
        $wp_customize->add_setting('anps_post_meta_author_single', array('default'=>get_option('anps_post_meta_author_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_post_meta_author_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>esc_html__('Author', 'industrial'), 'settings'=>'anps_post_meta_author_single'));
        //date page checkbox
        $wp_customize->add_setting('anps_post_meta_date_single', array('default'=>get_option('anps_post_meta_date_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_post_meta_date_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>esc_html__('Date', 'industrial'), 'settings'=>'anps_post_meta_date_single'));
        //tags page checkbox
        $wp_customize->add_setting('anps_post_meta_tags_single', array('default'=>get_option('anps_post_meta_tags_single', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_post_meta_tags_single', array('section'=>'anps_page_setup', 'type'=>'checkbox', 'label'=>esc_html__('Tags', 'industrial'), 'settings'=>'anps_post_meta_tags_single'));
    }
    /* Header options */
    private static function header_options($wp_customize) {
        //Page heading background
        $wp_customize->add_setting('anps_page_heading_bg', array('type' =>'option', 'sanitize_callback' => 'esc_raw_url'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_page_heading_bg', array('label'=>esc_html__('Page heading background', 'industrial'), 'section'=>'anps_header', 'settings'=>'anps_page_heading_bg')));
        //Search page heading background
        $wp_customize->add_setting('anps_search_content_bg', array('type' =>'option', 'sanitize_callback' => 'esc_raw_url'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_search_content_bg', array('label'=>esc_html__('Search page content background', 'industrial'), 'section'=>'anps_header', 'settings'=>'anps_search_content_bg')));
        //Divider heading
        $wp_customize->add_setting('anps_heading_divider', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Divider_Control($wp_customize, 'anps_heading_divider', array('section' => 'anps_header', 'settings'=>'anps_heading_divider')));
        //Description general top menu settings
        $wp_customize->add_setting('anps_topmenu_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_topmenu_desc', array('section' => 'anps_header', 'settings'=>'anps_topmenu_desc', 'label'=>esc_html__('Description general top menu settings', 'industrial'), 'description'=>'')));
        //Display top bar?
        $wp_customize->add_setting('anps_global_topmenu_style', array('default'=>get_option('anps_global_topmenu_style', "1"),'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_global_topmenu_style', array(
            'label' => esc_html__('Display top bar?', 'industrial'),
            'section' => 'anps_header',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__('Yes', 'industrial'),
                '3' => esc_html__('No', 'industrial'),
                '2' => esc_html__('Only on desktop', 'industrial')
            )
        ));
        //Above nav bar
        $wp_customize->add_setting('anps_global_above_nav_bar', array('default'=>get_option('anps_global_above_nav_bar', '1'),'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_global_above_nav_bar', array(
            'label' => esc_html__('Display above menu bar?', 'industrial'),
            'section' => 'anps_header',
            'type' => 'select',
            'choices' => array(
                '1' => esc_html__('on', 'industrial'),
                '2' => esc_html__('off', 'industrial')
            )
        ));
        //Sticky menu
        $wp_customize->add_setting('anps_sticky_menu', array('default'=>get_option('anps_sticky_menu', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_sticky_menu', array('section'=>'anps_header', 'type'=>'checkbox', 'label'=>esc_html__('Sticky menu', 'industrial'), 'settings'=>'anps_sticky_menu'));
        //Sticky menu mobile
        $wp_customize->add_setting('anps_sticky_menu_mobile', array('default'=>get_option('anps_sticky_menu_mobile', ''), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_sticky_menu_mobile', array('section'=>'anps_header', 'type'=>'checkbox', 'label'=>esc_html__('Sticky menu mobile', 'industrial'), 'settings'=>'anps_sticky_menu_mobile'));
        //Display search on mobile and tablets?
        $wp_customize->add_setting('anps_global_search_icon_mobile', array('default'=>get_option('anps_global_search_icon_mobile', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_global_search_icon_mobile', array('section'=>'anps_header', 'type'=>'checkbox', 'label'=>esc_html__('Display search on mobile and tablets?', 'industrial'), 'settings'=>'anps_global_search_icon_mobile'));
        //Display search icon in menu (desktop)?
        $wp_customize->add_setting('anps_global_search_icon', array('default'=>get_option('anps_global_search_icon', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_global_search_icon', array('section'=>'anps_header', 'type'=>'checkbox', 'label'=>esc_html__('Display search icon in menu (desktop)?', 'industrial'), 'settings'=>'anps_global_search_icon'));
        //Menu walker
        $wp_customize->add_setting('anps_global_menu_walker', array('default'=>get_option('anps_global_menu_walker', '1'), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_global_menu_walker', array('section'=>'anps_header', 'type'=>'checkbox', 'label'=>esc_html__('Enable menu walker (mega menu)', 'industrial'), 'settings'=>'anps_global_menu_walker'));
    }
    /* Footer options */
    private static function footer_options($wp_customize) {
        //Footer description
        $wp_customize->add_setting('anps_footer_desc', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Desc_Control($wp_customize, 'anps_footer_desc', array('section' => 'anps_footer', 'settings'=>'anps_footer_desc', 'label'=>esc_html__('Footer options', 'industrial'), 'description'=>'')));
        //disable footer
        $wp_customize->add_setting('anps_enable_footer', array('default'=>get_option('anps_enable_footer', "1"), 'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_enable_footer', array('section'=>'anps_footer', 'type'=>'checkbox', 'label'=>esc_html__('Enable footer', 'industrial'), 'settings'=>'anps_enable_footer'));
        //Footer style
        $wp_customize->add_setting('anps_footer_style', array('default'=>get_option('anps_footer_style', "0"),'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_footer_style', array(
            'label' => esc_html__('Footer style', 'industrial'),
            'section' => 'anps_footer',
            'type' => 'select',
            'choices' => array(
                '0' => esc_html__('*** Select ***', 'industrial'),
                '2' => esc_html__('2 columns', 'industrial'),
                '3' => esc_html__('3 columns', 'industrial'),
                '4' => esc_html__('4 columns', 'industrial')
            )
        ));
        //Copyright footer
        $wp_customize->add_setting('anps_copyright_footer', array('default'=>get_option('anps_copyright_footer', '0'),'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_copyright_footer', array(
            'label' => esc_html__('Copyright footer', 'industrial'),
            'section' => 'anps_footer',
            'type' => 'select',
            'choices' => array(
                '0' => esc_html__('*** Select ***', 'industrial'),
                '1' => esc_html__('1 columns', 'industrial'),
                '2' => esc_html__('2 columns', 'industrial')
            )
        ));
        //Footer type
        $wp_customize->add_setting('anps_footer_style_fixed', array('default'=>get_option('anps_footer_style_fixed', '0'),'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_footer_style_fixed', array(
            'label' => esc_html__('Footer type', 'industrial'),
            'section' => 'anps_footer',
            'type' => 'select',
            'choices' => array(
                '0' => esc_html__('*** Select ***', 'industrial'),
                'classic' => esc_html__('Classic', 'industrial'),
                'fixed-footer' => esc_html__('Fixed', 'industrial')
            )
        ));
        //Mobile footer
        $wp_customize->add_setting('anps_mobile_footer_columns', array('default'=>get_option('anps_mobile_footer_columns', '0'),'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_mobile_footer_columns', array(
            'label' => esc_html__('Mobile footer columns', 'industrial'),
            'section' => 'anps_footer',
            'type' => 'select',
            'choices' => array(
                '0' => esc_html__('*** Select ***', 'industrial'),
                '1' => esc_html__('1 column', 'industrial'),
                '2' => esc_html__('2 columns', 'industrial')
            )
        ));
    }
    /* Woocommerce */
    private static function woocommerce($wp_customize) {
        //display shopping cart icon in header
        $wp_customize->add_setting('anps_shopping_cart_header', array('default'=>get_option('anps_shopping_cart_header', "shop_only"),'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_shopping_cart_header', array(
            'label' => esc_html__('Display shopping cart icon in header?', 'industrial'),
            'section' => 'anps_woocommerce',
            'type' => 'select',
            'choices' => array(
                'hide' => esc_html__('Never display', 'industrial'),
                'shop_only' => esc_html__('Only on Woo pages', 'industrial'),
                'always' => esc_html__('Display everywhere', 'industrial')
            )
        ));
        //products page columns
        $wp_customize->add_setting('anps_woo_products_layout', array('default'=>get_option('anps_woo_products_layout', "col-md-3"),'type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_woo_products_layout', array(
            'label' => esc_html__('How many products in column?', 'industrial'),
            'section' => 'anps_woocommerce',
            'type' => 'select',
            'choices' => array(
                'col-md-3' => esc_html__('4 columns', 'industrial'),
                'col-md-4' => esc_html__('3 columns', 'industrial')
            )
        ));
    }
    /* Logos */
    private static function logos($wp_customize) {
        //Logo
        $wp_customize->add_setting('anps_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_logo', array('label'=>esc_html__('Logo', 'industrial'), 'section'=>'anps_logos', 'settings'=>'anps_logo')));
        //Logo height
        $wp_customize->add_setting('anps_logo_height', array('type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_logo_height', array('label'=>esc_html__('Logo height (px)', 'industrial'), 'settings' => 'anps_logo_height', 'section' => 'anps_logos'));
        //Front page logo
        $wp_customize->add_setting('anps_front_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_front_logo', array('label'=>esc_html__('Front page logo', 'industrial'), 'section'=>'anps_logos', 'settings'=>'anps_front_logo')));
        //Front page logo height
        $wp_customize->add_setting('anps_front_logo_height', array('type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_front_logo_height', array('label'=>esc_html__('Front page logo height (px)', 'industrial'), 'settings' => 'anps_front_logo_height', 'section' => 'anps_logos'));
        //Divider sticky logo
        $wp_customize->add_setting('anps_logo_divider', array('type'=>'option', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(new Anps_Divider_Control($wp_customize, 'anps_logo_divider', array('section' => 'anps_logos', 'settings'=>'anps_logo_divider')));
        //Sticky logo
        $wp_customize->add_setting('anps_sticky_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_sticky_logo', array('label'=>esc_html__('Sticky logo', 'industrial'), 'section'=>'anps_logos', 'settings'=>'anps_sticky_logo')));
        //Sticky logo height
        $wp_customize->add_setting('anps_sticky_logo_height', array('type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_sticky_logo_height', array('label'=>esc_html__('Sticky logo height (px)', 'industrial'), 'settings' => 'anps_sticky_logo_height', 'section' => 'anps_logos'));
        //Transparent sticky logo
        $wp_customize->add_setting('anps_sticky_transparent_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_sticky_transparent_logo', array('label'=>esc_html__('Transparent sticky logo', 'industrial'), 'section'=>'anps_logos', 'settings'=>'anps_sticky_transparent_logo')));
        //Transparent sticky logo height
        $wp_customize->add_setting('anps_sticky_transparent_logo_height', array('type' =>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control('anps_sticky_transparent_logo_height', array('label'=>esc_html__('Transparent sticky logo height (px)', 'industrial'), 'settings' => 'anps_sticky_transparent_logo_height', 'section' => 'anps_logos'));
        //Divider sticky logo
        $wp_customize->add_setting('anps_sticky_logo_divider', array('type'=>'option', 'sanitize_callback' => 'esc_html'));
        $wp_customize->add_control(new Anps_Divider_Control($wp_customize, 'anps_sticky_logo_divider', array('section' => 'anps_logos', 'settings'=>'anps_sticky_logo_divider')));
        //Mobile logo
        $wp_customize->add_setting('anps_mobile_logo', array('type' =>'option', 'sanitize_callback' => 'esc_url_raw'));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'anps_mobile_logo', array('label'=>esc_html__('Mobile logo', 'industrial'), 'section'=>'anps_logos', 'settings'=>'anps_mobile_logo')));
    }
}
add_action('customize_register', array('Anps_Customizer', 'customizer_register'));
