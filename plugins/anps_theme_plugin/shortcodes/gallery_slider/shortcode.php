<?php
if(!function_exists('anps_gallery_slider_func')) {
    function anps_gallery_slider_func($atts, $content) {
        extract( shortcode_atts( array(
            'images' => ''
        ), $atts ) );
        $explode_images = explode(',', $images);
        $output = '';
        $output .= '<div class="gallery-fs">';
        /* First image */
        $output .= '<figure>';
        $image_src_first = wp_get_attachment_image_src($explode_images[0], 'full');
        $image_alt_first = get_post_meta($explode_images[0], '_wp_attachment_image_alt', true);;
        $output .= '<img src="' . $image_src_first[0] . '" alt="' . $image_alt_first . '">';
        $output .= "<figcaption>" . anps_get_attachment_caption($explode_images[0]) . "</figcaption>";
        $output .= '</figure>';
        /* If there is more than 1 image, thumbnails gallery code */
        if(count($explode_images)>1) {
            $output .= '<div class="gallery-fs-nav">';
            $output .= '<button class="gallery-fs-fullscreen"><i class="fa fa-arrows-alt"></i></button>';
            $output .= '</div>';

            $output .= '<div class="gallery-fs-thumbnails gallery-fs-thumbnails-col-5 owl-carousel">';
            $i=0;
            foreach($explode_images as $item) {
                $image_src = wp_get_attachment_image_src($item, 'full');
                $image_title = get_the_title($item);
                $class = '';
                if($i==0) {
                    $class = ' class="selected"';
                }
                $output .= "<a href='$image_src[0]' data-caption='" . anps_get_attachment_caption($item) . "' title='$image_title'$class>";
                $output .= wp_get_attachment_image($item, 'anps-gallery-thumb');
                $output .= '</a>';
                $i++;
            }
            $output .= '</div>';
        }
        $output .= '</div>';
        return $output;
    }
}
add_shortcode('gallery_slider', 'anps_gallery_slider_func');
