<?php
/* Contact info */
if(!function_exists('anps_contact_info_func')) {
    function anps_contact_info_func($atts, $content) {
        return "<table class='info-table'></tbody>".do_shortcode($content)."</table></tbody>";
    }
}
//contact info item
if(!function_exists('anps_contact_info_item_func')) {
    function anps_contact_info_item_func($atts, $content) {
        extract( shortcode_atts( array(
            'icon' => '',
            'url' => ''
        ), $atts ) );
        $contact_info_content = "";
        $contact_info_content .= "<tr class='info-table-row'>";
        $contact_info_content .= "<th class='info-table-icon'><i class='fa ".$icon."'></i></th>";
        $contact_info_content .= "<td class='info-table-content'>";
        if($url) {
            $contact_info_content .= "<strong><a href='$url'>";
        }
        $contact_info_content .= $content;
        if($url) {
            $contact_info_content .= "</a></strong>";
        }
        $contact_info_content .= "</td>";
        $contact_info_content .= "</tr>";
        return $contact_info_content;
    }
}
/* END Contact info */
/* Load shortcodes */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    add_shortcode('contact_info', array('WPBakeryShortCode_contact_info','contact_info_func'));
    add_shortcode('contact_info_item', array('WPBakeryShortCode_contact_info_item','contact_info_item'));
} else {
    add_shortcode('contact_info', 'anps_contact_info_func');
    add_shortcode('contact_info_item', 'anps_contact_info_item_func');
}