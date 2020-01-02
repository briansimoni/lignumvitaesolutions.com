<?php
if(!function_exists('anps_current_year_func')) {
    function anps_current_year_func($atts, $content) {
        return date("Y");
    }
}
add_shortcode('anps_current_year', 'anps_current_year_func');