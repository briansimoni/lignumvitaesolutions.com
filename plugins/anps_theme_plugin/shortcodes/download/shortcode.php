<?php
if(!function_exists('anps_download_func')) {
    function anps_download_func($atts, $content) {
        extract( shortcode_atts( array(
            'icon_c' => '',
            'icon_d' => '',
            'text_color' => '#fff',
            'url' => '',
            'target' => '_self',
            'download_text' => 'Download'
        ), $atts ) );
        $icon_content = '';
        if($icon_c) {
            $icon_content = "<i class='fa $icon_c'></i> ";
        }
        $icon_download = '';
        if($icon_d) {
            $icon_download = "<i class='fa $icon_d'></i> ";
        }
        $data = '';
        $data .= '<div class="download">';
        $data .= "<div class='download-content text-uppercase' style='color: $text_color'>$icon_content$content</div>";
        if($url) {
            $data .= "<a target='$target' href='$url' class='btn btn-md btn-dark btn-shadow'>$icon_download$download_text</a>";
        }
        $data .= '</div>';
        return $data;
    }
}
add_shortcode('download', 'anps_download_func');