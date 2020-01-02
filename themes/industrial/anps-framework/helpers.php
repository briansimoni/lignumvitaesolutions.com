<?php
if ( !defined('ABSPATH') ){ die(); }

/*
 * Front page header types
 * header-1 = classic/bellow
 * header-2 = vertical
 * header-3 = full width menu
 * header-4 = logo in the middle
 */
if(!function_exists('anps_get_header_type')) {
    function anps_get_header_type() {
        $layout = 'header-1';
        if(get_option('anps_global_menu_type', 'classic-layout')=='vertical-layout') {
            $layout = 'header-2';
        } elseif(get_option('anps_global_menu_type', 'classic-layout')=='classic-layout' && get_option('anps_home_classic_menu_type', 'top')=='style2') {
            $layout = 'header-3';
        } elseif(get_option('anps_global_menu_type', 'classic-layout')=='classic-layout' && get_option('anps_home_classic_menu_type', 'top')=='style4') {
            $layout = 'header-4';
        }
        return $layout;
    }
}
/* Body classes */
if(!function_exists('anps_body_classes')) {
    function anps_body_classes($class) {
        if (anps_is_vertical()) {
            $class[] = anps_is_vertical();
        }
        if (anps_is_sticky()) {
            $class[] = anps_is_sticky();
        }
        if (anps_footer_style()) {
            $class[] = anps_footer_style();
        }
        if (anps_header_margin()) {
            $class[] = anps_header_margin();
        }
        if (anps_is_boxed()) {
            $class[] = anps_is_boxed();
        }
        if (get_option('anps_shadows', '1') == '1') {
            $class[] = 'anps-shadows';
        } else {
            $class[] = 'anps-no-shadows';
        }
        if (anps_sidebar_hide()) {
            $class[] = 'sidebar-hide';
        }
        if (anps_sidebar_after()) {
            $class[] = 'sidebar-after';
        }
        return $class;
    }
}
add_filter( 'body_class', 'anps_body_classes' );

if(!function_exists('anps_sidebar_hide')) {
    function anps_sidebar_hide() {
        $value_sidebar_hide = get_post_meta(get_queried_object_id(), 'anps_mobile_sidebar_hide', true);
        if(isset($value_sidebar_hide) && $value_sidebar_hide != '') {
            return true;
        }
        if (is_single()) {
            return get_option('anps_post_sidebar_hide', '0') === '1';
        } else {
            return get_option('anps_page_sidebar_hide', '0') === '1';
        }

        return false;
    }
}

if(!function_exists('anps_sidebar_after')) {
    function anps_sidebar_after() {
        $value_sidebar_after = get_post_meta(get_queried_object_id(), 'anps_mobile_sidebar_after', true);
        if(isset($value_sidebar_after) && $value_sidebar_after != '') {
            return true;
        }
        if (is_single()) {
            return get_option('anps_post_sidebar_after', '0') === '1';
        } else {
            return get_option('anps_page_sidebar_after', '0') === '1';
        }

        return false;
    }
}

/* Inline SVGs */
if(!function_exists('anps_inline_svgs')) {
    function anps_inline_svgs() {
        get_template_part('includes/svg', 'images');
    }
}

/*boxed*/
if(!function_exists('anps_is_boxed')) {
    function anps_is_boxed() {
        $class = '';
        $is_boxed = get_option('anps_is_boxed', '0');
        $layout = get_option('anps_global_menu_type', '');

        if ( $is_boxed == '1' && $layout != 'vertical-layout' ) {
            $class .= ' boxed';
            if ( get_option('anps_custom_pattern')!= '0' ) {
                $class .= ' pattern-' . get_option('anps_pattern');
            }
        }
        return $class;
    }
}
//anps_is_boxed();
if(!function_exists('anps_body_style')) {
    function anps_body_style() {
        $style="style='";
        if ( get_option('anps_is_boxed', '0') == '1' && get_option('anps_global_menu_type', '') != 'vertical-layout' && get_option('anps_pattern') == '0' ) {

            if (get_option('anps_type') == 'custom-color') {
               $style .= 'background-color:#'. get_option('anps_bg_color', 'fff').';';
            }

            if (get_option('anps_type') != 'custom-color') {
               $style .= 'background-image:url('. get_option('anps_custom_pattern', ''). ');';            }

            if (get_option('anps_type') == 'stretched') {
                $style .= ' background-repeat: no-repeat;';
                $style .= ' background-size: cover;';

            }
            $style .= "'";
           echo wp_kses($style, array(
                'style' => array()
            ));
        }
    }
}


/* Logo (global, sticky, mobile) */
if(!function_exists('anps_logo')) {
    function anps_logo() {
        $page_logo = get_post_meta(get_queried_object_id(), $key ='anps_full_screen_logo', $single = true );
        $sticky_page_logo = get_post_meta(get_queried_object_id(), $key ='anps_page_sticky_logo', $single = true );
        $mobile_page_logo = get_post_meta(get_queried_object_id(), $key ='anps_page_mobile_logo', $single = true );
        $sticky_logo_option = get_option('anps_sticky_logo', '');
        $mobile_logo_option = get_option('anps_mobile_logo', '');
        $front_logo = get_option('anps_front_logo', '');
        $front_mobile_logo = get_option('anps_front_mobile_logo', '');
        $global_logo = get_option('anps_logo', '');
        $text_logo = get_option('anps_text_logo', '');
        $logo_alt = get_bloginfo('name');
        $data = '';
        /* Logo */
        if( $global_logo == '' ) {
            $global_logo = get_template_directory_uri() . '/images/logo.png';
        }
        if(isset($page_logo) && ($page_logo!='0' && $page_logo!='')) {
            $big_logo = $page_logo;
            $big_logo_height = get_option('anps_logo_height', '');
        } elseif(is_front_page() && $front_logo!='') {
            $big_logo = $front_logo;
            $big_logo_height = get_option('anps_front_logo_height', '');
        } elseif($text_logo != '') {
            $big_logo = $text_logo;
        } else {
            $big_logo = $global_logo;
            $big_logo_height = get_option('anps_logo_height', '');
        }
        /* Sticky logo */
        $sticky_logo_height = '';
        if(isset($sticky_page_logo) && ($sticky_page_logo!='0' && $sticky_page_logo!='')) {
            $sticky_logo = $sticky_page_logo;
        } elseif(anps_is_transparent()==' transparent' && get_option('anps_sticky_transparent_logo', '')!='') {
            $sticky_logo = get_option('anps_sticky_transparent_logo', '');
            $sticky_logo_height = get_option('anps_sticky_transparent_logo_height', '');
        } elseif(anps_is_transparent()==' classic' && get_option('anps_sticky_logo', '')!='') {
            $sticky_logo = $sticky_logo_option;
            $sticky_logo_height = get_option('anps_sticky_logo_height', '');
        } else {
            $sticky_logo = $big_logo;
        }
        /* Mobile logo */
        if(is_front_page() && $front_mobile_logo!='') {
            $mobile_logo = $front_mobile_logo;
        } elseif(isset($mobile_page_logo) && ($mobile_page_logo!='0' && $mobile_page_logo!='')) {
            $mobile_logo = $mobile_page_logo;
        } elseif(get_option('anps_mobile_logo', '')!='') {
            $mobile_logo = $mobile_logo_option;
        } else {
            $mobile_logo = $big_logo;
        }
        /* Logo height */
        $style_height_logo = '';
        if($big_logo_height!='') {
            $style_height_logo = " style='height:".$big_logo_height."px;'";
        }
        /* Sticky logo height */
        $style_height_sticky_logo = '';
        if($sticky_logo_height!='') {
            $style_height_sticky_logo = " style='height:".$sticky_logo_height."px;'";
        }
        if($big_logo != $text_logo) {
            $data .= "<span class='logo-wrap'><img src='$big_logo' alt='$logo_alt' class='logo-img'$style_height_logo></span>";
            $data .= "<span class='logo-sticky'><img src='$sticky_logo' alt='$logo_alt' class='logo-img'$style_height_sticky_logo></span>";
            $data .= "<span class='logo-mobile'><img src='$mobile_logo' alt='$logo_alt' class='logo-img'></span>";
        } else {
            $data .= "<span class='logo-wrap'>".str_replace('\\"', '"', $text_logo)."</span>";
            $data .= "<span class='logo-sticky'>".str_replace('\\"', '"', $text_logo)."</span>";
            $data .= "<span class='logo-mobile'>".str_replace('\\"', '"', $text_logo)."</span>";
        }
        return $data;
    }
}
/* Page title */
if(!function_exists('anps_page_title')) {
    function anps_page_title() {
        if(is_home()) {
            echo get_the_title(get_option('page_for_posts'));
        } else if( is_day() ) {
            echo esc_html__('Daily Archives', 'industrial') . ': ' . get_the_date();
        } else if( is_month() ) {
            echo esc_html__('Monthly Archives', 'industrial') . ': ' . get_the_time('F');
        } else if( is_year() ) {
            echo esc_html__('Yearly Archives', 'industrial') . ': ' . get_the_time('Y');
        }  else if( is_search() ) {
            echo esc_html__('Search results', 'industrial');
        }  else if( is_tag() ) {
            echo esc_html__('Posts tagged', 'industrial') . ' "' . single_tag_title('', false) . '"';
        }  else if( is_category() || (function_exists('is_product_category') && is_product_category()) ) {
            echo single_cat_title('', false);
        } else if( function_exists('is_shop') && is_shop() ) {
            echo get_the_title(get_option( 'woocommerce_shop_page_id' ));
        } else if( is_404() ) {
            echo esc_html__('Page not found', 'industrial');
        } else if( is_author() ) {
            echo esc_html__('Articles posted by', 'industrial') . ' ' . get_the_author();
        } elseif(is_archive()) {
            post_type_archive_title();
        } else {
            echo get_the_title();
        }
    }
}
/* Header image, video, gallery (blog) */
if(!function_exists('anps_header_media')) {
    function anps_header_media($id, $image_size) {
        /*
         * check for gallery
         * check for video
         * check for featured image
         */
        $header_media = '';
        if(get_post_meta($id, $key ='gallery_images', $single = true )) {
            /* Get all images and unset the empty one */
            $gallery_images = explode(",",get_post_meta($id, $key ='gallery_images', $single = true ));
            $header_media = '<div class="post-carousel owl-carousel">';
            foreach($gallery_images as $key=>$item) {
                $image_src = wp_get_attachment_image_src($item, 'full');
                $image_title = get_the_title($item);
                if($item == '') {
                    unset($gallery_images[$key]);
                }
                $header_media .= "<div class='item'><img alt='$image_title' src='$image_src[0]'></div>";
            }
            $header_media .= '</div>';
        } elseif(get_post_meta($id, $key ='anps_featured_video', $single = true )) {
            $header_media = do_shortcode("[vc_video link='".esc_attr(get_post_meta($id, $key ='anps_featured_video', $single = true))."']");
        } elseif(has_post_thumbnail($id)) {
            $header_media = get_the_post_thumbnail($id, $image_size);
        }
		//escaped above in code
        echo $header_media;
    }
}
if(!function_exists('anps_get_attachment_caption')) {
    function anps_get_attachment_caption($id) {
        $caption = '';
        $image = get_post($id);

        if ($image->post_excerpt !== '') {
            $caption = $image->post_excerpt;
        } else if ($image->post_title !== '') {
            $caption = $image->post_title;
        }

        return $caption;
    }
}
/* Header image, video, gallery (blog, portfolio) */
if(!function_exists('anps_header_media_single')) {
    function anps_header_media_single($id) { ?>
        <!-- Code for gallery images -->
        <?php if(get_post_meta($id, $key ='gallery_images', $single = true )) : ?>
        <?php
        /* Get all images and unset the empty one */
        $gallery_images = explode(",",get_post_meta($id, $key ='gallery_images', $single = true ));
        foreach($gallery_images as $key=>$item) {
            if($item == '') {
                unset($gallery_images[$key]);
            }
        }
        ?>
        <div class="gallery-fs">
            <!-- First image -->
            <figure>
                <?php
                $image_src_first = wp_get_attachment_image_src($gallery_images[0], 'full');
                $image_alt_first = get_post_meta($gallery_images[0], '_wp_attachment_image_alt', true);
                ?>
                <?php echo '<img src="' . $image_src_first[0] . '" alt="' . $image_alt_first . '">'; ?>
                <figcaption><?php echo anps_get_attachment_caption($gallery_images[0]); ?></figcaption>
            </figure>
            <div class="gallery-fs-nav">
                <a href="<?php echo esc_url($image_src_first[0]); ?>" class="gallery-fs-fullscreen"><i class="fa fa-arrows-alt"></i></a>
            </div>
            <!-- If there is more than 1 image, thumbnails gallery code s-->
            <?php if(count($gallery_images)>1) : ?>
            <div class="gallery-fs-thumbnails gallery-fs-thumbnails-col-5 owl-carousel">
                <?php $i=0;
                foreach ($gallery_images as $item) : ?>
                <?php
                $image_src_full = wp_get_attachment_image_src($item, 'full');
                $image_title = get_the_title($item);
                ?>
                <a href="<?php echo esc_url($image_src_full[0]); ?>" data-caption="<?php echo anps_get_attachment_caption($item); ?>" title="<?php echo esc_attr($image_title); ?>" <?php if($i==0) : ?>class="selected"<?php endif;?>>
                    <?php echo wp_get_attachment_image($item, 'anps-gallery-thumb'); ?>
                </a>
                <?php $i++;
                endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <!-- If there is no gallery, than show video (if exists) -->
        <?php elseif(get_post_meta($id, $key ='anps_featured_video', $single = true )) : ?>
        <div class="shadow">
            <!-- We are using visual composer shortcode -->
            <?php echo do_shortcode("[vc_video link='".esc_attr(get_post_meta($id, $key ='anps_featured_video', $single = true))."']")?>
        </div>
        <!-- If no gallery, no video, show feature image  -->
        <?php elseif(has_post_thumbnail($id)) : ?>
        <?php
        $image = get_post_thumbnail_id($id);
        $image_title = get_post($image);
        ?>
        <div class="gallery-fs">
            <figure>
                <?php the_post_thumbnail($id); ?>
                <figcaption><?php echo esc_html($image_title->post_title); ?></figcaption>
            </figure>
            <div class="gallery-fs-nav">
                <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id($id)); ?>" class="gallery-fs-fullscreen"><i class="fa fa-arrows-alt"></i></a>
            </div>
        </div>
        <?php endif;
    }
}
/* Custom favicon */
if(!function_exists('anps_include_favicon')) {
    function anps_include_favicon() {
        if(!function_exists('has_site_icon') || !has_site_icon()):
            if (get_option('anps_favicon', "")!="") : ?>
                <link rel="shortcut icon" href="<?php echo esc_url(get_option('anps_favicon')); ?>" type="image/x-icon" />
            <?php endif;
        endif;
    }
}
/* Check if it is sticky */
if(!function_exists('anps_is_sticky')) {
    function anps_is_sticky() {
        $class = '';
        if(get_option('anps_sticky_menu', '1')=='1' && get_option('anps_global_menu_type', 'classic-layout')!='vertical-layout') {
            wp_enqueue_script('waypoints_theme');
            $class .= ' stickyheader';
        }
        if(get_option('anps_sticky_menu_mobile', '1')=='1' && get_option('anps_global_menu_type', 'classic-layout')!='vertical-layout') {
            wp_enqueue_script('waypoints_theme');
            $class .= ' sticky-mobile';
        }
        return $class;
    }
}

/* Check for header/footer margin */
if(!function_exists('anps_header_margin')) {
    function anps_header_margin() {
        $class = '';
        $header_margin = get_post_meta(get_queried_object_id(), $key ='anps_header_options_header_margin', $single = true);
        $footer_margin = get_post_meta(get_queried_object_id(), $key ='anps_header_options_footer_margin', $single = true);
        if(isset($header_margin) && $header_margin=='on') {
            $class .= ' header-spacing-off';
        }
        if(isset($footer_margin) && $footer_margin=='on') {
            $class .= ' footer-spacing-off';
        }
        return $class;
    }
}

/*
 * Check if header is transparent
 * 1) check if it is enabled on current page (full screen heading option)
 * 2) check if it is front page and is enabled on front page (theme options)
 * 3) check if it is enabled checkbox front page and enabled checkbox set as global
 * 4) check if it is global transparent (theme options)
 */
if(!function_exists('anps_is_transparent')) {
    function anps_is_transparent() {
        //current page
        $transparent_page = get_post_meta(get_the_ID(), $key ='anps_page_heading_full', $single = true);
        //front page
        $transparent_front = get_option('anps_front_transparent_header', '0');
        //global checkbox + global transparent
        $global_checkbox = get_option('anps_set_settings_as_global_header', '0');
        $global_transparent_checkbox = get_option('anps_global_transparent_header', '0');

        //classic menu
        if(get_option('anps_global_menu_type', 'classic-layout')=='classic-layout') {
            if(isset($transparent_page) && $transparent_page=='on') {
                return ' transparent';
            } elseif(is_front_page() && $transparent_front=='1') {
                return ' transparent';
            } elseif($transparent_front=='1' && $global_checkbox=='1') {
                return ' transparent';
            } elseif($global_transparent_checkbox=='1' && $global_checkbox != '1') {
                return ' transparent';
            }
        }
        return ' classic';
    }
}
/* Check for menu centered
 * 1) check if it is front page and is enable on front page (theme options) and it is classic menu type top
 * 2) check if it is enabled checkbox front page and enabled checkbox set as global
 * 3) check if global menu center is enabled and global checkbox is not enabled and classic menu type is top
 * 4) check if global menu center is enabled and global checkbox is not enabled and is not front page and classic menu type is bottom
 */
if(!function_exists('anps_menu_is_centered')) {
    function anps_menu_is_centered() {
        //front page
        $menu_centered_front = get_option('anps_front_menu_center', '0');
        $default_front_value = ' right';
        if($menu_centered_front == 0 && get_option('anps_home_classic_menu_type', 'top') == 'style2') {
            $default_front_value = ' left';
        } elseif($menu_centered_front == 1) {
            $default_front_value = ' center';
        } elseif($menu_centered_front == 2) {
            $default_front_value = ' left';
        } elseif($menu_centered_front == 3) {
            $default_front_value = ' right';
        }
        //global checkbox + global transparent
        $global_checkbox = get_option('anps_set_settings_as_global_header', '0');
        $global_menu_center_checkbox = get_option('anps_global_menu_center', '0');
        $default_global_value = ' right';
        if($global_menu_center_checkbox == 0 && get_option('anps_home_classic_menu_type', 'top') == 'style2') {
            $default_global_value = ' left';
        } elseif($global_menu_center_checkbox == 1) {
            $default_global_value = ' center';
        } elseif($global_menu_center_checkbox == 2) {
            $default_global_value = ' left';
        } elseif($global_menu_center_checkbox == 3) {
            $default_global_value = ' right';
        }
        if(get_option('anps_global_menu_type', 'classic-layout')=='classic-layout') {
            if(is_front_page() && get_option('anps_home_classic_menu_type', 'top')=='top') {
                return " $default_front_value";
            } elseif(is_front_page() && get_option('anps_home_classic_menu_type', 'top')=='style2') {
                return " $default_front_value";
            } elseif($global_checkbox=='1') {
                return " $default_front_value";
            } elseif($global_checkbox=='' && get_option('anps_home_classic_menu_type', 'top')=='top') {
                return " $default_global_value";
            } elseif($global_checkbox=='' && get_option('anps_home_classic_menu_type', 'top')=='style2') {
                return " $default_global_value";
            } elseif($global_checkbox=='' && !is_front_page() && get_option('anps_home_classic_menu_type', 'top')=='bottom') {
                return " $default_global_value";
            }
        }
        return '';
    }
}
/* Check if header type = vertical, than add class vertical to body */
if(!function_exists('anps_is_vertical')) {
    function anps_is_vertical() {
        //blank page header value
        $header_value = get_post_meta(get_the_ID(), $key ='anps_blank_page_disable_header', $single = true );
        if(!isset($header_value) || $header_value!='on') {
            if(get_option('anps_global_menu_type')=='vertical-layout') {
                return ' vertical-menu';
            }
        }
    }
}
/* Check if header type = bellow menu, than add class bottom */
if(!function_exists('anps_is_bellowmenu')) {
    function anps_is_bellowmenu() {
        if(get_option('anps_home_classic_menu_type', 'top')=='bottom' && is_front_page()) {
            return ' bottom';
        }
        return '';
    }
}
/* Video types (for header) */
if(!function_exists('anps_heading_video')) {
    function anps_heading_video($video) {
        if(strpos($video,'vimeo') !== false) {
            $video_explode = explode('/', $video);
            $count = count($video_explode)-1;
            wp_enqueue_script( 'froogaloop2');
            return "<iframe id='vimeoplayer' src='https://player.vimeo.com/video/".esc_attr($video_explode[$count])."?api=1&player_id=vimeoplayer&title=0&byline=0&portrait=01&autoplay=1&loop=1' width='500' height='281' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
        } elseif(strpos($video,'youtube') !== false) {
            $video_explode = explode('v=', $video);
            return "<iframe id='ytplayer' src='https://www.youtube.com/embed/".esc_attr($video_explode[1])."?enablejsapi=1&autoplay=1&controls=0&showinfo=0&loop=1&playlist=".esc_attr($video_explode[1])."'></iframe>";
        } else {
            return "<video src='".esc_url($video)."' autoplay loop></video>";
        }
    }
}
/* adds fixed-footer class if it is selected in theme options */
if(!function_exists('anps_footer_style')) {
    function anps_footer_style() {
        if (get_option('anps_footer_style_fixed', 'classic') == 'fixed-footer') {
            return ' fixed-footer';
        }
        return '';
    }
}
/* Check if it is top bar */
if(!function_exists('anps_is_top_bar')) {
    function anps_is_top_bar() {
        $top_bar_global = get_option('anps_global_topmenu_style');
        $top_bar_site = get_post_meta(get_queried_object_id(), $key ='anps_header_options_top_bar', $single = true );
        /*
         * 1) check if top bar global is on or desktop only AND page top bar is default
         * 2) check if page top bar is on
         * 3) check if top bar global is on or desktop only AND page top bar is empty
        */
        if ((($top_bar_global==1 || $top_bar_global==2 || $top_bar_global==4) && isset($top_bar_site) && ($top_bar_site == '0' || $top_bar_site == '')) ||
            (isset($top_bar_site) && $top_bar_site == '2') ||
            (isset($top_bar_site) && $top_bar_site == '' && ($top_bar_global==1 || $top_bar_global==2))) {
            return '1';
        }
        return '';
    }
}
/* Menu and above navigation sidebar */
if(!function_exists('anps_get_menu')) {
    function anps_get_menu() {
    ?>
        <div class="mobile-wrap">
            <button class="burger"><span class="burger-top"></span><span class="burger-middle"></span><span class="burger-bottom"></span></button>
            <?php
            /* Include mobile search (check if it is enabled for mobile) */
            if(get_option('anps_global_search_icon_mobile', '1')=='1') {
                anps_mobile_search();
            }
            /* END Include mobile search */

            //above nav bar
            $above_nav_bar_global = get_option('anps_global_above_nav_bar', '1');
            $above_nav_bar_site = get_post_meta(get_queried_object_id(), $key ='anps_header_options_above_menu', $single = true );
            /*
             * 1) chcek if above nav global is on AND page above nav is default
             * 2) check if page above nav is on
             * 3) check if above nav global is on AND page above nav is empty
             */
            if((isset($above_nav_bar_site) && $above_nav_bar_site=='0' && $above_nav_bar_global=='1') || (isset($above_nav_bar_site) && $above_nav_bar_site=='2') || (isset($above_nav_bar_site) && $above_nav_bar_site=='' && $above_nav_bar_global=='1')) {
                $above_nav_bar = '1';
            } else {
                $above_nav_bar = '0';
            }
            /*
             * above navigation sidebar have to be enabled (theme options -> header options)
             * above-navigation-bar sidebars must be enabled
             * menu style has to be different than style2
             */
            if(($above_nav_bar == '1') && is_active_sidebar( 'above-navigation-bar') && get_option('anps_home_classic_menu_type', 'top')!='style2') : ?>
                <!-- Above nav sidebar -->
                <div class="above-nav-bar">
                    <?php dynamic_sidebar('above-navigation-bar');?>
                </div>
            <?php endif;
            $locations = get_theme_mod('nav_menu_locations');

            /* Check if menu is selected */
            $walker = '';
            $menu = '';
            $locations = get_theme_mod('nav_menu_locations');

            if($locations && isset($locations['primary'])) {
                $menu = $locations['primary'];
                if((isset($_GET['page']) && $_GET['page'] == 'one-page')) {
                    $menu = 21;
                }
                if(get_option('anps_global_menu_walker', '1')=='1') {
                    $walker = new anps_menu_walker();
                }
            }

            if(count(wp_get_nav_menu_items($menu)) === 0) {
                echo '<div class="menu-notice">' . esc_html__('No menu items added. Add them under Appearance - Menus.', 'industrial') . '</div>';
            } else if($menu === '') {
                echo '<div class="menu-notice">' . esc_html__('Primary menu not selected. Go to Appearance - Menus and select a menu.', 'industrial') . '</div>';
            } else {
                wp_nav_menu( array(
                    'container' => false,
                    'menu_class' => 'main-menu',
                    'menu_id' => 'main-menu',
                    'echo' => true,
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'items_wrap' =>_anps_search_menu_option(),
                    'link_after' => '',
                    'depth' => 0,
                    'walker' => $walker,
                    'menu'=> $menu
                ));
            }
            ?>
        </div>
        <button class="burger pull-right"><span class="burger-top"></span><span class="burger-middle"></span><span class="burger-bottom"></span></button>
        <?php
    }
}
/* For header type logo in the middle */
if(!function_exists('anps_menu_logo_center')) {
    function anps_menu_logo_center() {
        $locations = get_theme_mod('nav_menu_locations');
        ?>
        <div class="site-nav-wrap site-nav-wrap-left">
            <nav class="site-navigation site-navigation-left">
                <div class="mobile-wrap-left">
                    <button class="burger"><span class="burger-top"></span><span class="burger-middle"></span><span class="burger-bottom"></span></button>
                    <?php
                    if(get_option('anps_global_search_icon_mobile', '1')=='1') {
                        anps_mobile_search();
                    }

                    $location_left = '';
                    if($locations && isset($locations['primary'])) {
                        $location_left = $locations['primary'];
                    }
                    wp_nav_menu( array(
                        'container' => false,
                        'menu_class' => 'main-menu',
                        'menu_id' => 'left-menu',
                        'echo' => true,
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'depth' => 0,
                        'menu'=> $location_left
                    ));
                    ?>
                </div>
            </nav>
        </div>

        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php
                echo wp_kses(anps_logo(), array(
                    'span' => array(
                        'class' => array(),
                        'style' => array(),
                    ),
                    'img' => array(
                        'class' => array(),
                        'src' => array(),
                        'style' => array(),
                        'alt' => array(),
                    )
                ));
                ?>
            </a>
        </div>

        <div class="site-nav-wrap site-nav-wrap-right">
            <nav class="site-navigation site-navigation-right">
                <div class="mobile-wrap-right">
                    <?php
                    $location_right = '';
                    if($locations && isset($locations['anps_right'])) {
                        $location_right = $locations['anps_right'];
                    }
                    wp_nav_menu( array(
                        'container' => false,
                        'menu_class' => 'main-menu',
                        'menu_id' => 'right-menu',
                        'echo' => true,
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'items_wrap' =>_anps_search_menu_option(),
                        'link_after' => '',
                        'depth' => 0,
                        'menu'=> $location_right
                    ));
                    ?>
                </div>
            </nav>
        </div>
        <?php
    }
}

function _anps_search_menu_option() {
    /* Check if search on desktop is enabled */
    $woocommerce_cart_page = get_option('anps_shopping_cart_header', 'hide');
    $search_menu = '<ul id="%1$s" class="%2$s">%3$s</ul>';
    if(get_option('anps_global_search_icon', '1')=='1') {
        $search_menu = anps_search_menu_form();
    } elseif(function_exists('woocommerce_mini_cart') && ($woocommerce_cart_page == 'always' || (is_woocommerce() && $woocommerce_cart_page=='shop_only'))) {
        $search_menu = '<ul id="%1$s" class="%2$s">%3$s'.anps_menu_cart().'</ul>';
    }
    return $search_menu;
}

/* Load legacy files */
function anps_wc_override_template_path(){
    return 'woocommerce-legacy/';
}

if( function_exists('WC') && WC()->version < '3.0.0' ) {
    add_filter( 'woocommerce_template_path', 'anps_wc_override_template_path' );
}

function anps_products_per_page() {
    return get_option('anps_products_per_page', '12');
}
add_filter( 'loop_shop_per_page', 'anps_products_per_page', 20 );

/* Mini cart */
if(!function_exists('anps_mini_cart')) {
    function anps_mini_cart() {
        if(function_exists('woocommerce_mini_cart')) {
            ob_start();
            woocommerce_mini_cart();
            $mini_cart = ob_get_clean();
            $data = '';

            $data .= '<div class="mini-cart-wrap">';
                $data .= '<a href="' . wc_get_cart_url() . '" class="mini-cart-link"><i class="fa fa-shopping-basket"></i><span class="mini-cart-number">' . WC()->cart->get_cart_contents_count() . '</span></a>';
                $data .= '<div class="mini-cart-content">';
                $data .= $mini_cart;
                $data .= '</div>';
            $data .= '</div>';

            return $data;
        }
    }
}
/* Mini Cart AJAX */
function anps_add_to_cart_fragments( $fragments ) {
    global $woocommerce;

    $fragments['div.mini-cart-wrap'] = anps_mini_cart();

    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'anps_add_to_cart_fragments');
/* Demo notice */
function anps_demo_notice($notice) {
    echo '<div class="demo_store_wrapper"><div class="container">' . $notice . '</div></div>';
}
add_filter('woocommerce_demo_store', 'anps_demo_notice');
/* Switch single page order */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 50);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 11);
/* Search icon and form */
if(!function_exists('anps_search_menu_form')) {
    function anps_search_menu_form() {
        $data = '';
        $data .= '<ul id="%1$s" class="%2$s">%3$s';
        $data .= '<li class="menu-search">';
        $data .= '<button class="menu-search-toggle"><i class="fa fa-search"></i></button>';
        $data .= '<div class="menu-search-form hide">';
        $data .= "<form method='get' action='".urldecode(home_url("/"))."'>";
        $data .= "<input class='menu-search-field' name='s' type='text' placeholder='".esc_html__('Search...', 'industrial')."'>";
        $data .= '</form>';
        $data .= '</div>';
        $data .= '</li>';
        /* menu cart */
        $data .= anps_menu_cart();
        /* END menu cart */
        $data .= '</ul>';
        return $data;
    }
}

if(!function_exists('anps_menu_cart')) {
    function anps_menu_cart() {
        $woocommerce_cart_page = get_option('anps_shopping_cart_header', 'hide');
        $data = '';
        /*
         * 1) if enabled everywhere (themeoptions)
         * 2) if enabled only on shop (themeoptions) and page is woocommerce page
         */
        if(function_exists('woocommerce_mini_cart') && ($woocommerce_cart_page == 'always' || (is_woocommerce() && $woocommerce_cart_page=='shop_only'))) {
            $data .= '<li class="mini-cart">';
            $data .= anps_mini_cart();
            $data .= '</li>';
        }
        /* END if */
        return $data;
    }
}

/* MegaMenu Walker class */
class anps_menu_walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0) {
        $append = "";
        $prepend = "";
        if(get_post_meta($item->ID, 'anps-megamenu', true)=='1') {
            $megamenu_wrapper_class = ' megamenu-wrapper';
            unset($item->classes[0]);
        } else {
            $megamenu_wrapper_class = '';
        }

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names.$megamenu_wrapper_class ) . '"';

        $output .= $indent . '<li' . $value . $class_names .'>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url       ) .'"' : '';

        $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));

        /* Description */
        $description  = ! empty( $item->description ) ? '<span class="menu-item-desc">'.esc_attr( $item->description ).'</span>' : '';
        $description = do_shortcode($description);
        if($depth>0) {
            $description = "";
        }
        /* END Description */
        $locations = get_theme_mod('nav_menu_locations');
        if($locations['primary']) {
            $item_output = "";
            $item_output = $args->before;
            $item_output .= '<a'. $attributes . '>';

            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= '</a>';
            $item_output .= $description.$args->link_after;
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth = 0, $args, $args, $current_object_id = 0 );
        }
    }
}
if(!function_exists('anps_mobile_search')) {
    function anps_mobile_search() {
        ?>
        <!-- Only for mobile (search) -->
        <div class="site-search hidden-lg">
            <form method="get" id="searchform-header" class="searchform-header" action="<?php echo urldecode(home_url('/')); ?>">
                <input class="searchfield" name="s" type="text" placeholder="<?php esc_html_e('Search...', 'industrial'); ?>" />
                <button type="submit" class="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- END only for mobile -->
        <?php
    }
}
//get post_type
if(!function_exists('anps_get_current_post_type')) {
    function anps_get_current_post_type() {
        if (is_admin()) {
            global $post, $typenow, $current_screen;
            //we have a post so we can just get the post type from that
            if($post && $post->post_type) {
                return $post->post_type;
            }
            //check the global $typenow - set in admin.php
            elseif($typenow) {
                return $typenow;
            }
            //check the global $current_screen object - set in sceen.php
            elseif($current_screen && $current_screen->post_type) {
                return $current_screen->post_type;
            }
            //lastly check the post_type querystring
            elseif(isset($_REQUEST['post_type'])) {
                return sanitize_key($_REQUEST['post_type']);
            }
            elseif(isset($_REQUEST['post'])) {
                return get_post_type($_REQUEST['post']);
            }
            //we do not know the post type!
            return null;
        }
    }
}
/* Comments */
if(!function_exists('anps_comment')) {
    function anps_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <div id="div-comment-<?php comment_ID() ?>" class="the-comment">
                <div class="comment-avatar shadow">
                    <?php echo get_avatar( $comment, 86 ); ?>
                </div>

                <div class="comment-content">
                    <div class="comment-meta">
                        <strong class="comment-author"><?php comment_author_link(); ?></strong>
                        <span class="comment-date">
                            <i class="fa fa-calendar"></i> <?php comment_date(); ?>
                        </span>
                        <?php
                            $comment_link = get_comment_reply_link( array_merge( $args, array( 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'],  ) ) );

                            $comment_link = str_replace('comment-reply-link', 'btn btn-xs comment-reply-link', $comment_link);

                            echo wp_kses($comment_link,array(
                                    'a' => array(
                                        'rel' => array(),
                                        'class' => array(),
                                        'href' => array(),
                                        'onclick' => array(),
                                        'aria-label'=> array()
                                    )
                                    ));
                        ?>
                        <?php edit_comment_link(); ?>
                    </div>
                    <div class="comment-text">
                        <?php comment_text(); ?>

                        <?php if ( $comment->comment_approved == '0' ) : ?>
                            <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'industrial' ); ?></em>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    <?php
    }
}
/* If user is admin, he will see theme options */
if(!function_exists('anps_theme_options_add_page')) {
    function anps_theme_options_add_page() {
        if(current_user_can('manage_options')) {
            add_theme_page(esc_html__('Theme Options', 'industrial'), esc_html__('Theme Options', 'industrial'), 'read', 'theme_options', 'anps_theme_options_do_page');
        }
        //if plugin enabled add plugin options
        if(current_user_can('manage_options') && function_exists('anps_portfolio')) {
            add_theme_page(esc_html__('Plugin Options', 'industrial'), esc_html__('Plugin Options', 'industrial'), 'read', 'anps_plugin_options', 'anps_plugin_options_do_page');
        }
    }
}
add_action('admin_menu', 'anps_theme_options_add_page');
/* Load admin_view.php page */
if(!function_exists('anps_theme_options_do_page')) {
    function anps_theme_options_do_page() {
        include_once get_template_directory() . '/anps-framework/views/admin_view.php';
    }
}
/* Custom styles for buttons */
if(!function_exists('anps_custom_styles_buttons')) {
    function anps_custom_styles_buttons() {
        return;
    }
}
/*Get content for pages, posts and add the correct wrapper around it*/
if(!function_exists('anps_the_content')) {
    function anps_the_content($content=null) {
        $num_of_sidebars = anps_num_sidebars();
        $class = '';

        $class_size = ' col-md-' . (12-$num_of_sidebars*3);

        if( function_exists('is_account_page') && is_account_page() && is_user_logged_in() ) {
            $class_size = '';
        }

        if( $num_of_sidebars > 0 ) {
            $class = 'page-content';
        }
        ?>
        <div class="<?php echo esc_attr($class . $class_size); ?>">
            <?php
                if( $content == null ) {
                    the_content();
                } else {
                    echo esc_html($content);
                }

                if((comments_open() || get_comments_number()) && get_option('anps_page_comments', '1')=='1'){
                    comments_template();
                }
            ?>
        </div>
        <?php
    }
}
/* Get custom font extenstion */
if(!function_exists('anps_getExtCustomFonts')) {
    function anps_getExtCustomFonts($font) {
        $dir = get_template_directory().'/fonts';
        if ($handle = opendir($dir)) {
            $arr = array();
            //Get all files and store it to array
            while(false !== ($entry = readdir($handle))) {
                $explode_font=explode('.',$entry);
                if(strtolower($font)==strtolower($explode_font[0])) {
                    //Allow only .eot, .woff, .woff2, .otf and .ttf
                    if(strtolower($explode_font[1])=="eot" || strtolower($explode_font[1])=="woff" || strtolower($explode_font[1])=="otf" || strtolower($explode_font[1])=="ttf" || strtolower($explode_font[1])=="woff2") {
                        $arr[] = $entry;
                    }
                }
            }
            closedir($handle);
            return $arr;
        }
    }
}
/* Load custom font (CSS) */
if(!function_exists('anps_custom_font')) {
    function anps_custom_font($font) {
        $font_family = esc_attr($font);
        $font_has_eot = false;
        $font_count  = count( anps_getExtCustomFonts($font) );
        $i           = 0;
        $prefix      = 'url("' . get_template_directory_uri() . '/fonts/';
        $font_src = '';
        $font_srcs   = '';

        foreach(anps_getExtCustomFonts($font) as $item) {
            $explode_item = explode('.', $item);

            $name = $explode_item[0];
            $extension = $explode_item[1];
            $separator = ',';

            if( ++$i == $font_count ) {
                $separator = ';';
            }

            switch( $extension ) {
                case 'eot': $font_srcs .= $prefix . $name . '.eot?#iefix") format("embedded-opentype")' . $separator; $font_has_eot = true; break;
                case 'woff': $font_srcs .= $prefix . $name . '.woff") format("woff")' . $separator;  break;
                case 'otf': $font_srcs .= $prefix . $name . '.otf") format("opentype")' . $separator;  break;
                case 'ttf': $font_srcs .= $prefix . $name . '.ttf") format("ttf")' . $separator;  break;
                case 'woff2': $font_srcs .= $prefix . $name . '.woff2") format("woff2")' . $separator;  break;
            }
        } /* end foreach */

        if( $font_has_eot ) {
            $font_src = 'src: url("' . get_template_directory_uri() . '/fonts/' . $font_family . '.eot");';
        }
        ?>
        @font-face {
            font-family: "<?php echo esc_attr($font_family); ?>";
            <?php echo $font_src; ?>
            src: <?php echo $font_srcs; ?>
        }
        <?php
    }
}
/* Sets the post excerpt length (default 40) */
add_filter('excerpt_length', 'anps_excerpt_length');
if(!function_exists('anps_excerpt_length')) {
    function anps_excerpt_length($length) {
        return get_option('anps_excerpt_length', '40');
    }
}
/* Replaces default excerpt more text with an ellipsis */
add_filter('excerpt_more', 'anps_excerpt_more');
if(!function_exists('anps_excerpt_more')) {
    function anps_excerpt_more($more) {
        return ' &hellip;';
    }
}
if(!function_exists('anps_post_meta')) {
    function anps_post_meta( $single='') {
        $meta = '';

        if($single) {
            $single = '_single';
        }

        /* Author */
        if(  get_option('anps_post_meta_author'.$single, '1') == '1' ) {
            $meta .= '<li class="author vcard">
                <i class="fa fa-user"></i>
                <span class="text-lowercase">' . esc_html__( 'posted by:', 'industrial' ) . '</span> <span class="fn">' . get_the_author() . '</span>
            </li>';
        }

        /* Date */
        if(  get_option('anps_post_meta_date'.$single, '1') == '1' ) {
            $meta .= "<li>
                <i class='fa fa-calendar'></i>
                <time datetime='" . get_the_time("Y-m-d h:s") . "'>" . get_the_time( get_option( "date_format" ) ) . "</time>
            </li>";

        }

        /* Comments */
        if(  get_option('anps_post_meta_comments'.$single, '1') == '1' ) {
            ob_start();
            comments_number();
            $comments = ob_get_clean();

            $meta .= "<li>
                <i class='fa fa-commenting-o'></i>
                " . $comments . "
            </li>";
        }

        /* Categories */
        if( $single=='' && (get_option('anps_post_meta_categories', '1') == '1' )) {
            $category_list = get_the_category_list(', ');
            $meta .= '<li><i class="fa fa-folder-o"></i>';
            $meta .= $category_list;
            $meta .= '</li>';
        }

        if( $meta != '' ) {
            $meta = "<ul class='post-meta'>" . $meta . "</ul>";
        }
        //escaped above in code
        echo $meta;
    }
}
/* Add dropcaps option to TinyMCE, */
function anps_add_buttons( $plugin_array ) {
    $plugin_array['anps'] = get_template_directory_uri() . '/anps-framework/js/tinymce_extend.js';
    return $plugin_array;
}
add_filter( "mce_external_plugins", "anps_add_buttons" );
/* Add background option to TinyMCE */
if(!function_exists('anps_tinymce_add_buttons')) {
    function anps_tinymce_add_buttons($buttons) {
        $new_buttons = array();
        $counter = 0;

        foreach($buttons as $button) {
            $new_buttons[$counter++] = $button;

            /* Add the color right after color option */
            if( $button == 'forecolor' ) {
                $new_buttons[$counter++] = 'backcolor';
            }
        }

        /* Dropcap */

        array_push($new_buttons, 'dropcap');

        return $new_buttons;
    }
}
add_filter("mce_buttons_2", "anps_tinymce_add_buttons");
/* After setup theme */
if (!function_exists('anps_setup')) {
    function anps_setup() {
        // This theme uses post thumbnails
        add_theme_support('post-thumbnails');
        // Add default posts and comments RSS feed links to head
        add_theme_support('automatic-feed-links');

        // This theme uses wp_nav_menu() in one location.
        if(get_option('anps_home_classic_menu_type', 'top') == 'style4') {
            register_nav_menus(array(
                'primary' => esc_html__('Left Navigation', 'industrial'),
                'anps_right' => esc_html__('Right Navigation', 'industrial'),
            ));
        } else {
            register_nav_menus(array(
                'primary' => esc_html__('Primary Navigation', 'industrial'),
            ));
        }
    }
}
add_action('after_setup_theme', 'anps_setup');
/* Remove WooCommerce styling */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
/* Change comment form position (WordPress 4.4) */
function anps_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'anps_comment_field_to_bottom' );
/* Change WooCommerce loop title */
function woocommerce_template_loop_product_title() {
    echo '<a href="' . get_the_permalink() . '"><h3 class="product-title">' . get_the_title() . '</h3></a>';
}
/* Custom styles */
include_once get_template_directory() . '/anps-framework/custom_styles.php';
/* Wrap font with quotes */
if (!function_exists('anps_wrap_font')) {
    function anps_wrap_font($font) {
        $temp = explode(', ', $font);
        $return = '';

        if (count($temp) > 1) {
            foreach ($temp as $name) {
                if ($return === '') {
                    $return .= "'$name'";
                } else {
                    $return .= ", $name";
                }
            }
        } else {
            $return = "'$font'";
        }

        return $return;
    }
}

function anps_portfolio_404() {
    global $post, $wp_query;

    if (get_post_type($post->ID) === 'portfolio') {
        $wp_query->set_404();
        status_header(404);
        nocache_headers();
        include(get_query_template('404'));
        die();
    }
}
