<?php
if(!function_exists('anps_appointment_func')) {
    function anps_appointment_func($atts, $content) {
        extract( shortcode_atts( array(
            'image_u' => '',
            'location' => '',
            'title' => '',
            'text' => '',
            'contact_form' => ''
        ), $atts ) );
        $data = '';
        $data .= '<div class="appointment">';
            /* Left side */
            $data .= '<div class="appointment-content">';
                $data .= '<div class="appointment-media">';
                if($image_u) {
                    $data .= wp_get_attachment_image($image_u, 'full');
                } elseif($location!='') {
                    $data .= do_shortcode("[google_maps zoom='14' map_type='ROADMAP' height='300' scroll='true'][google_maps_item marker_center='' pin='' location='".$location."'][/google_maps_item][/google_maps]");
                }
                $data .= '</div>';
                $data .= '<div class="text-center"><h4 class="title appointment-title">' . $title . '</h4></div>';
                $data .= '<p class="appointment-text">' . $text . '</p>';
            $data .= '</div>';

            /* Right side */
            $data .= '<div class="appointment-form">';
                $data .= do_shortcode("[contact-form-7 id='$contact_form']");
            $data .= '</div>';
        $data .= '</div>';
        return $data;
    }
}
add_shortcode('appointment', 'anps_appointment_func');