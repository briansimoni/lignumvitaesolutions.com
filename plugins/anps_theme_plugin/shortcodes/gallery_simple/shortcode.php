<?php
if(!function_exists('anps_gallery_simple_func')) {
    function anps_gallery_simple_func($atts, $content) {
        extract( shortcode_atts( array(
            'images' => '',
            'columns'   => '3'
        ), $atts ) );
        $explode_images = explode(',', $images);
        $output = '';
        $output .= '<div class="gallery-simple gallery-simple--col-' . $columns . '">';
        /* First image */
        foreach($explode_images as $image_id) {
            $output .= '<figure class="gallery-simple__item">';
            $src = wp_get_attachment_image_src($image_id, 'full');
            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
            $output .= '<a title="' . $image_alt . '" class="gallery-simple__link" href="' . $src[0] . '">' . wp_get_attachment_image($image_id, 'full') . '</a>';
            $output .= '</figure>';
        }
        $output .= '</div>';
        return $output;
    }
}
add_shortcode('gallery_simple', 'anps_gallery_simple_func');
