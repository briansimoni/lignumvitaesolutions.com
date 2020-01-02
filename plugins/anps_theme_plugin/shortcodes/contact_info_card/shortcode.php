<?php
/* Contact info card */
if(!function_exists('anps_contact_info_card_func')) {
    function anps_contact_info_card_func($atts, $content) {
        extract(shortcode_atts( array(
            'num_row' => '3',
        ), $atts));
        global $num_row_global;
        $num_row_global = $num_row;
        $data = '<div class="contact-cards">';
        $data .= '<div class="row">';
        $data .= do_shortcode($content);
        $data .= '</div></div>';
        return $data;
    }
}
//contact info item card
if(!function_exists('anps_contact_info_card_item_func')) {
    function anps_contact_info_card_item_func($atts, $content) {
        extract(shortcode_atts( array(
            'icon' => '',
            'card_title' => '',
            'card_text' => '',
            'title_color' => '#a3baca',
            'desc_color' => '#fff',
            'background_color' => '#215070',
            'icon_color' => '#fff',
            'icon_back_color' => '#3498db',
        ), $atts));
        global $num_row_global;
        $class_row = 'col-md-4';
        if($num_row_global == '2') {
            $class_row = 'col-md-6';
        }
        if($content !== '') {
            $card_text = $content;
        }
        $data = '';
        $data .= "<div class='$class_row'>";
        $data .= '<div class="card" style="background-color:' . $background_color . '; color:' . $icon_back_color. '">';
        $data .= "<span class='icon'>";
        $data .= "<i class='$icon' style='color: $icon_color'></i>";
        $data .= '</span>';
        $data .= '<div class="content-wrap">';
        if($card_title != '') {
            $data .= "<span class='item-title' style='color:$title_color;'>$card_title</span>";
        }
        if($card_text != '') {
            $data .= "<div class='text font1' style='color:". $desc_color ."' >$card_text</div>";
        }
        $data .= '</div>';
        $data .= '</div>';
        $data .= '</div>';
        return $data;
    }
}
/* END Contact info card */
/* Load shortcodes */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    add_shortcode('contact_info_card', array('WPBakeryShortCode_contact_info_card','contact_info_card_func'));
    add_shortcode('contact_info_card_item', array('WPBakeryShortCode_contact_info_card_item','contact_info_card_item'));
} else {
    add_shortcode('contact_info_card', 'anps_contact_info_card_func');
    add_shortcode('contact_info_card_item', 'anps_contact_info_card_item_func');
}
