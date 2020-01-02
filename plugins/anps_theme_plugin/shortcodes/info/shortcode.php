<?php
/* Info element */
if(!function_exists('anps_info_element')) {
    function anps_info_element($atts, $content) {
        extract( shortcode_atts( array(
            'heading_color' => '',
            'text_color' => '',
            'primary_color' => '',
            'hover_color' => '',
            'divider_color' => '',
        ), $atts ) );

        global $anps_divider_color, $anps_heading_color, $anps_text_color, $anps_primary_color, $anps_hover_color;
        $anps_divider_color = $divider_color;
        $anps_heading_color = $heading_color;
        $anps_text_color = $text_color;
        $anps_primary_color = $primary_color;
        $anps_hover_color = $hover_color;

        $return = '';

        $style = '';
        $col = substr_count($content, '[info_element');

        if($divider_color) {
            $style = " style='border-color:$divider_color;'";
        }

        $return .= "<div class='anps-info clearfix anps-info-col-$col'$style>";
        $return .= do_shortcode($content);
        $return .= '<div class="anps-info-shadow"></div>';
        $return .= '</div>';

        return $return;
    }
}
/* END Info element */
/* Info element icon with text */
if(!function_exists('anps_info_element_icon_text')) {
    function anps_info_element_icon_text($atts, $content) {
        extract( shortcode_atts( array(
            'heading' => '',
            'icon' => '',
            'icon_text' => '',
        ), $atts ) );

        global $anps_divider_color, $anps_heading_color, $anps_text_color, $anps_primary_color;

        $return = '';
        $divider_style = '';
        $heading_style = '';
        $text_style = '';
        $it_style = '';

        if($anps_divider_color) {
            $divider_style = " style='background-color:$anps_divider_color;'";
        }

        if($anps_heading_color) {
            $heading_style = " style='color:$anps_heading_color;'";
        }

        if($anps_text_color) {
            $text_style = " style='color:$anps_text_color;'";
        }

        if($anps_text_color) {
            $text_style = " style='color:$anps_text_color;'";
        }

        if($anps_primary_color) {
            $it_style = " style='color:$anps_primary_color;'";
        }

        if($icon) {
            $icon = "<i class='fa $icon'></i> ";
        }

        $return .= '<div class="anps-info-element anps-info-icon-text">';
        $return .= "<h3 class='anps-info-title'$heading_style>$heading</h3>";
        $return .= "<p class='anps-info-text'$text_style>$content</p>";
        $return .= "<div class='anps-info-it-wrap'$it_style>$icon$icon_text</div>";
        $return .= "<div class='anps-info-divider'$divider_style></div>";
        $return .= '</div>';

        return $return;
    }
}
/* END Info element icon with text */
/* Info element icon */
if(!function_exists('anps_info_element_icon')) {
    function anps_info_element_icon($atts, $content) {
        extract( shortcode_atts( array(
            'heading' => '',
            'icon1' => '',
            'icon2' => '',
            'icon3' => '',
            'icon4' => '',
            'icon5' => '',
        ), $atts ) );

        global $anps_divider_color, $anps_heading_color, $anps_text_color, $anps_primary_color;

        $return = '';
        $divider_style = '';
        $heading_style = '';
        $text_style = '';
        $icons_style = '';

        if($anps_divider_color) {
            $divider_style = " style='background-color:$anps_divider_color;'";
        }

        if($anps_heading_color) {
            $heading_style = " style='color:$anps_heading_color;'";
        }

        if($anps_text_color) {
            $text_style = " style='color:$anps_text_color;'";
        }

        if($anps_text_color) {
            $text_style = " style='color:$anps_text_color;'";
        }

        if($anps_primary_color) {
            $icons_style = " style='color:$anps_primary_color;'";
        }

        $icons = '';
        for($i=1; $i<=5; $i++) {
            $name = "icon$i";
            $temp_icon = $$name;

            if($temp_icon) {
                $icons .= "<i class='fa $temp_icon'></i> ";
            }
        }

        $return .= '<div class="anps-info-element anps-info-icon">';
        $return .= "<h3 class='anps-info-title'$heading_style>$heading</h3>";
        $return .= "<p class='anps-info-text'$text_style>$content</p>";

        if($icons != '') {
            $return .= "<div class='anps-info-icons-wrap'$icons_style>$icons</div>";
        }

        $return .= "<div class='anps-info-divider'$divider_style></div>";
        $return .= '</div>';

        return $return;
    }
}
/* END Info element icon */
/* Info element button */
if(!function_exists('anps_info_element_button')) {
    function anps_info_element_button($atts, $content) {
        extract( shortcode_atts( array(
            'heading' => '',
            'icon' => '',
            'button_text' => '',
            'url' => '',
            'target' => '',
            'button_text_color' => '',
            'button_text_hover_color' => '',
        ), $atts ) );

        global $anps_divider_color, $anps_heading_color, $anps_text_color, $anps_primary_color, $anps_hover_color;

        $return = '';
        $divider_style = '';
        $heading_style = '';
        $text_style = '';
        $button_bg = '';
        $button_hover = '';

        if($anps_divider_color) {
            $divider_style = " style='background-color:$anps_divider_color;'";
        }

        if($anps_heading_color) {
            $heading_style = " style='color:$anps_heading_color;'";
        }

        if($anps_text_color) {
            $text_style = " style='color:$anps_text_color;'";
        }

        if($anps_text_color) {
            $text_style = " style='color:$anps_text_color;'";
        }

        if($anps_primary_color) {
            $button_bg = $anps_primary_color;
        }

        if($anps_hover_color) {
            $button_hover = $anps_hover_color;
        }

        $return .= '<div class="anps-info-element anps-info-button">';
        $return .= "<h3 class='anps-info-title'$heading_style>$heading</h3>";
        $return .= "<p class='anps-info-text'$text_style>$content</p>";
        $return .= do_shortcode('[button background_hover="' . $button_hover . '" background="' . $button_bg . '" size="md" icon="' . $icon . '" color="' . $button_text_color . '" color_hover="' . $button_text_hover_color . '" link="' . $url . '" target="' . $target . '"]' . $button_text . '[/button]');
        $return .= "<div class='anps-info-divider'$divider_style></div>";
        $return .= '</div>';

        return $return;
    }
}
/* END Info element button */
/* Load shortcodes */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    add_shortcode('info_element', array('WPBakeryShortCode_info_element', 'anps_info_element'));
    add_shortcode('info_element_icon_text', array('WPBakeryShortCode_info_element_icon_text', 'anps_info_element_icon_text'));
    add_shortcode('info_element_icon', array('WPBakeryShortCode_info_element_icon', 'anps_info_element_icon'));
    add_shortcode('info_element_button', array('WPBakeryShortCode_info_element_button', 'anps_info_element_button'));
} else {
    add_shortcode('info_element', 'anps_info_element');
    add_shortcode('info_element_icon_text', 'anps_info_element_icon_text');
    add_shortcode('info_element_icon', 'anps_info_element_icon');
    add_shortcode('info_element_button', 'anps_info_element_button');
}