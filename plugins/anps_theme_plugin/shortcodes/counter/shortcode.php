<?php
if(!function_exists('anps_counter_func')) {
    $counter_number = 0;
    function anps_counter_func($atts, $content) {
        extract( shortcode_atts( array(
                'max' => "",
                "number_color" => "",
                "divider_color" => "",
                "title_color" => "",
                'time' => '5000'
            ), $atts ) );
        global $counter_number;
        $counter_number++;
        wp_enqueue_script('countto');
        /* Number color */
        $style = '';
        if($number_color) {
            $style .= "#anps-counter-$counter_number .title:after {background-color: $number_color;} #anps-counter-$counter_number .title span {color: $number_color;}";
        }
        if($divider_color) {
            $style .= "#anps-counter-$counter_number .title:before {background-color: $divider_color;}";
        }
        if($title_color) {
            $style .= "#anps-counter-$counter_number h4 {color: $title_color;}";
        }
        $data = "<div class='counter-wrap' id='anps-counter-$counter_number'>
                    <h2 class='title'><span class='text-center counter-number' data-time='$time' data-to='$max'>0</span></h2>
                    <h4 class='text-center'>$content</h4>
                </div>";
        if($style) {
            $data .= "<style>$style</style>";
        }
        return $data;
    }
}
add_shortcode('counter', 'anps_counter_func');
