<?php
if(!function_exists('anps_icon_func')) {
    function anps_icon_func($atts, $content) {
        extract( shortcode_atts( array(
             'url' => '',
             'target' => '_self',
             'icon' => '',
             'icon_size' => '30',
             'title' => '',
             'position' => '',
             'image' => ''
         ), $atts ) );

         $icon_content = "";
         $icon_content .= "<div class='icon $position'>";
         $icon_content .= "<div class='icon-header'>";
         if($image != '') {
             $icon_content .= "<div class='icon-media' style='width: {$icon_size}px;'>".wp_get_attachment_image($image, 'full').'</i></div>';
         } else {
             $icon_content .= "<div class='icon-media' data-style='width: {$icon_size}px;' style='font-size: {$icon_size}px;'><i class='fa $icon'></i></div>";
         }
         $icon_content .= "<h3 class='icon-title text-uppercase'>$title</h3>";
         $icon_content .= "</div>";
         $icon_content .= "<p>$content</p>";
         if($url!='') {
             $icon_content .= "<a href='".esc_url($url)."' target='$target' class='btn btn-md btn-minimal'>".esc_html__('Read more', 'anps_theme_plugin')."</a>";
         }
         $icon_content .= "</div>";
         return $icon_content;
    }
}
add_shortcode('icon', 'anps_icon_func');
