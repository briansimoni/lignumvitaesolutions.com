<?php
if(!function_exists('anps_featured_content_func')) {
    function anps_featured_content_func($atts, $content) {
        extract( shortcode_atts( array(
            'title' => '',
            'image_u' => '',
            'link' => '',
            'link_target' => '_self',
            'button_text' => esc_html__('Read more', 'anps_theme_plugin'),
            'video' => '',
            'absolute_img' =>'',
            'exposed' =>'',
            'lightbox' => '',
            'icon' => '',
            'icon_custom' => '',
            'icon_custom_hover' => '',
            'style' => ''
        ), $atts ) );

        if($image_u) {
            $image = wp_get_attachment_image_src($image_u, 'anps-featured');
            $image = $image[0];
        }

        $has_icon = '';
        if($icon) {
            $icon = "<i class='$icon'></i>";
            $has_icon = ' featured-has-icon';
        }

        if($icon_custom) {
            if($icon_custom_hover) {
                $icon_custom_hover = wp_get_attachment_image($icon_custom_hover, 'full', false, array('class' => 'featured-custom-icon-hover'));
            }

            $icon =  '<div class="featured-custom-icon">' . wp_get_attachment_image($icon_custom, 'full') . $icon_custom_hover . '</div>';

            $has_icon = ' featured-has-icon';
        }

        $img_class = 'relative';
        $push_top_class = '';
        if($absolute_img!="") {
            $push_top_class = ' featured-push-top';
        }

        /* Media type */
        $media_class = '';
        if($video!="" && $lightbox!="") {
            $media_class = ' featured-video';
        } elseif($video=='' && $lightbox!="") {
            $media_class = ' featured-image';
        }

        $style_class = "";
        if($style!="") {
            $style_class = ' '.$style;
        }

        /* Larger content */
        $large_class = '';
        if($exposed!='') {
            $large_class = ' featured-large';
        }

        $has_link = '';
        if($link!="") {
            $has_link = ' featured-has-link';
        }

        $has_content = '';
        if($content!='') {
            $has_content = ' featured-has-content';
        }

        /* Get image from vimeo or youtube if there is no other image */
        if($video!="" && $image_u=='') {
            if(strpos($video,'vimeo') !== false) {
                $video_id = explode('/', $video);
                $thumbnail = wp_remote_get( 'https://vimeo.com/api/v2/video/'.$video_id[3].'.json' );
                if ($thumbnail) {
                    $body = json_decode($thumbnail['body']);
                    $image = $body[0]->thumbnail_large;
                }
            } else {
                $video_explode = explode('v=', $video);
                $image = "https://img.youtube.com/vi/$video_explode[1]/maxresdefault.jpg";
            }
        }

        $output = "<div class='featured$media_class$large_class$push_top_class$has_link$has_icon$has_content$style_class'>";
        $output .= "<div class='featured-header'>";

        if($link!="") {
            $output .= "<a target='$link_target' href='$link'><img alt='$title' src='$image'/></a>";
        } else {
            $output .= "<img alt='$title' src='$image'/>";
        }

        $output .= "</div>";
        $output .= "<div class='featured-content'>";

        if($link!="") {
            $output .= "<h3 class='featured-title text-uppercase'><a target='$link_target' href='$link'>{$icon}$title</a></h3>";
        } else {
            $output .= "<h3 class='featured-title text-uppercase'>{$icon}$title</h3>";
        }

        if($content!="") {
        $output .= "<p class='featured-desc'>$content</p>";
        }
        if($link!="") {
            $output .= "<a class='btn btn-md btn-minimal' target='$link_target' href='$link'>$button_text</a>";
        }
        if($lightbox!="") {
            if($video=='' && $image!='') {
                $output .= "<a href='$image' class='featured-lightbox-link'><i class='fa fa-image'></i>";
            } elseif($video!="") {
                if(strpos($video,'vimeo') !== false) {
                    $video_type = 'vimeo';
                } else {
                    $video_type = 'youtube';
                }
                $output .= "<a data-rel='$video_type' href='$video' class='featured-lightbox-link'><svg><use xlink:href='#featured-video-dark'></use></svg>";
            }
            $output .= '</a>';
        }
        $output .= "</div>";
        $output .= "</div>";

        return $output;
    }
}
add_shortcode('anps_featured', 'anps_featured_content_func');
