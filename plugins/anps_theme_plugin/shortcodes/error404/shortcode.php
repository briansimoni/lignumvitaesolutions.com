<?php
if(!function_exists('anps_error_404_func')) {
    function anps_error_404_func($atts, $content) {
        extract( shortcode_atts( array(
            'title' => '',
            'image_u' => ''
        ), $atts ) );

        $data = '';
        $data .= '<div class="text-center">';
        $data .= "<h2 class='title fs30'>$title</h2>";
        $data .= '<br>';
        $data .= "<span>$content</span>";
        $data .= '<br>';
        if( $image_u ) {
            $data .= wp_get_attachment_image($image_u, 'full', 0, array('class' => 'error404'));
        }
        $data .= '</div>';

        return $data;
    }
}
add_shortcode('error_404', 'anps_error_404_func');