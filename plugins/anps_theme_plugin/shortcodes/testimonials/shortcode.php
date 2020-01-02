<?php
/* Testimonials */
if(!function_exists('anps_testimonials')) {
    function anps_testimonials($atts,  $content) {

        extract( shortcode_atts( array(
            'testimonialheading' => '',
            'style' => 'style-1',
            'autoplay' => '',
            'autoplay_timeout' => '6000',
            'random' => '',
        ), $atts ) );

        global $anps_testimonials_style;

        $anps_testimonials_style = $style;

        $data_return = '';

        $attrs = '';

        if($style == 'style-3') {
            /* Style without owl carousel */

            $data_return .= '<div class="testimonials testimonials-' . $style . '">';
            $data_return .= "<div class='testimonials-header'>";
            if($testimonialheading != '') {
                $data_return .= "<h3 class='title'>".$testimonialheading."</h3>";
            }
            $data_return .= '</div>';
            $data_return .= "<ul class='testimonials-wrap clearfix'>";
            $data_return .= do_shortcode($content);
            $data_return .= '</ul>';
            $data_return .= '</div>';
        } else {
            /* Other testimonials styles (that use Owl carousel) */

            if ($random) {
                $attrs .= ' data-random="random"';
            }

            if ($autoplay) {
                $attrs .= ' data-autoplay="' . $autoplay_timeout . '"';
            }

            $icon_prev_class = 'fa-angle-left';
            $icon_next_class = 'fa-angle-right';
            $owl_class = 'owl-nav';


            if($style == 'style-2') {
                $icon_prev_class = 'fa-chevron-left';
                $icon_next_class = 'fa-chevron-right';
                $owl_class = 'owl-nav-style-2';
            }

            $testimonials_number = substr_count($content, "[testimonial");

            $data_return .= '<div class="testimonials testimonials-' . $style . '">';
            $data_return .= "<div class='testimonials-header'>";
            if($testimonialheading != '') {
                $data_return .= "<h3 class='title'>".$testimonialheading."</h3>";
            }
            $data_return .= '</div>';
            $data_return .= "<div class='testimonials-outer-wrap'>";
            $data_return .= '<ul class="testimonial-wrap owl-carousel"' . $attrs . '>';
            $data_return .= do_shortcode($content);
            $data_return .= '</ul>';
            /* Slider left/right navigation buttons */
            if($testimonials_number>1) {
                $data_return .= '<div class="' . $owl_class . '">';
                $data_return .= '<button class="owlprev"><i class="fa ' . $icon_prev_class . '"></i></button>';
                $data_return .= '<button class="owlnext"><i class="fa ' . $icon_next_class . '"></i></button>';
                $data_return .= '</div>';
            }
            /* END Slider left/right navigation buttons */
            $data_return .= '</div>';
            $data_return .= '</div>';
        }

        return $data_return;
    }
}
//testimonial item
if(!function_exists('anps_testimonial')) {
    function anps_testimonial($atts,  $content) {
        extract( shortcode_atts( array(
            'image' => '',
            'image_u' => '',
            'user_name' => '',
            'user_name_subtitle' => ''
        ), $atts ) );

        global $anps_testimonials_style;

		$grid_class = '';
        if($image_u) {
            $image = wp_get_attachment_image_src($image_u, 'full');
            $image = $image[0];
            $grid_class = 'col-xs-12 col-sm-6';
            $grid_class = '';
        }
        $float_class = '';
        $row_class = '';

        if($anps_testimonials_style != 'style-3') {
            $float_class = ' pull-left';
            $row_class = ' class="clearfix row"';
        }

        $data = '';
        $data .= '<li' . $row_class . '>';
        $data .= '<div class="user' . $float_class . '">';

        if($image) {
        	$data .= '<div class="user-image">';
            $data .= "<img class='user-photo' src='".$image."' alt='".$user_name."'>";
            $data .= '</div>';
        }
        $data .= '<div class="content' . $float_class . '">';
        $data .= "<h3 class='name-user'>$user_name</h3>";

		if($user_name_subtitle) {
        	$data .= '<h4 class="jobtitle">'.$user_name_subtitle.'</h4>';
		}

        $data .= '<p>'.$content.'</p>';
        $data .= '</div>';
        $data .= '</div>';
        $data .= '</li>';
        return $data;
    }
}
/* END Testimonials */
/* Load shortcodes */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    add_shortcode('testimonials', array('WPBakeryShortCode_testimonials','anps_testimonials_func'));
    add_shortcode('testimonial', array('WPBakeryShortCode_anps_testimonial','anps_testimonial_func'));
} else {
    add_shortcode('testimonials', 'anps_testimonials');
    add_shortcode('testimonial', 'anps_testimonial');
}
