<?php
if(!function_exists('anps_portfolio_func')) {
    function anps_portfolio_func($atts, $content) {
        extract( shortcode_atts( array(
            'filter' => 'on',
            'columns' => '3',
            'category'=> '',
            'orderby' => '',
            'order' => '',
            'per_page' => -1,
            'mobile_class' => '2',
            'item_bg_color' => '',
            'item_text_color' => '',
            'item_title_color' => '',
        ), $atts ) );
        wp_enqueue_script('anps-isotope');

        $tax_query='';
        $parent_cat = "";
        $attr = '';
        $hover_style = '';
        $hover_text_style = '';
        $hover_title_style = '';

        if($category && $category!='All') {
            $parent_cat = $category;
            $tax_query = array(
                array(
                    'taxonomy' => 'portfolio_category',
                    'field' => 'id',
                    'terms' => (int)$category
                )
           );
        }

        if ($item_bg_color != '') {
            $hover_style = ' style="background-color: ' . $item_bg_color . ';"';
        }

        if ($item_text_color != '') {
            $hover_text_style = ' style="color: ' . $item_text_color . ';"';
        }

        if ($item_title_color != '') {
            $hover_title_style = ' style="color: ' . $item_title_color . ';"';
        }

        $args = array(
            'post_type' => 'portfolio',
            'orderby' => $orderby,
            'order' => $order,
            'showposts' => $per_page,
            'tax_query' => $tax_query
        );
        $portfolio_posts = new WP_Query( $args );

        /*desktop-class*/
        $mdclass = " col-md-4";
        if($columns=="2") {
            $mdclass = " col-md-6";
        } else if($columns=="4") {
            $mdclass = " col-md-3";
        } else if($columns=="6") {
            $mdclass = " col-md-2";
        }

        /* Mobile class */
        $m_class = " col-xs-6";
        if($mobile_class=="1") {
            $m_class = " col-xs-12";
        }

        /* Portfolio isotope filter */
        $portfolio_data = "";
        $portfolio_data .= '<div class="projects">';
        if($filter=="on") {
            $portfolio_data .= "<ul class='filter'>";
            $portfolio_data .= '<li><button data-filter="*" class="selected">'.esc_html__("All projects", 'anps_theme_plugin')."</button></li>";
            $filters = get_terms('portfolio_category', "orderby=none&hide_empty=true&parent=$parent_cat");
            foreach ($filters as $item) {
                $portfolio_data .= '<li><button data-filter="' . strtolower(str_replace(" ", "-", $item->name)) . '">' . $item->name . '</button></li>';
            }
            $portfolio_data .= "</ul>";
        }
        /* Portfolio isotope filter enabled posts */
        $portfolio_data .= "<div class='row projects-content'>";
        while($portfolio_posts->have_posts()) :
            $portfolio_posts->the_post();
            $portfolio_cat = "";
            if (get_the_terms(get_the_ID(), 'portfolio_category')) {
                $first_item = false;
                foreach (get_the_terms(get_the_ID(), 'portfolio_category') as $cat) {
                    if($first_item) {
                        $portfolio_cat .= " ";
                    }
                    $first_item = true;
                    $portfolio_cat .= strtolower(str_replace(" ", "-", $cat->name));
                }
            }
            $image_class = 'anps-portfolio';
            if(has_post_thumbnail(get_the_ID())) {
                $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

                $image = '<img src="' . get_the_post_thumbnail_url(get_the_ID(), $image_class) . '" alt="' . $alt . '" />';
            } elseif(get_post_meta(get_the_ID(), $key ='gallery_images', $single = true )) {
                $exploded_images = explode(',',get_post_meta(get_the_ID(), $key ='gallery_images', $single = true ));
                $image =  wp_get_attachment_image($exploded_images[0], $image_class, null, array('srcset' => ''));
            }
            $portfolio_data .= "<div class='projects-item ".$portfolio_cat.$mdclass.$m_class."'>";
            if($columns!="6" && $columns!="4") {
                $portfolio_data .= "<div class='projects-item-wrap'>";
                if(isset($image)&&$image!="") {
                    $portfolio_data .= $image;
                }
                $portfolio_data .= '<div class="project-hover-bg"' . $hover_style . '></div>';
                $portfolio_data .= '<div class="project-hover">';
                $portfolio_data .= "<h3 class='project-title text-uppercase'" . $hover_title_style . ">".get_the_title()."</h3>";
                $portfolio_data .= "<p" . $hover_text_style . " class='project-desc'>".get_the_excerpt()."</p>";
                $portfolio_data .= "<a class='btn btn-md' href='".get_permalink()."'>".esc_html__('Read more', 'anps_theme_plugin')."</a>";
                $portfolio_data .= "</div>";

                $portfolio_data .= "</div>";
            } else {
                $portfolio_data .= "<div class='projects-item-wrap'>";
                if(isset($image)&&$image!="") {
                    $portfolio_data .= $image;
                }
                $portfolio_data .= '<a href="'.get_permalink().'" class="project-hover-small">';
                $portfolio_data .= '<i class="fa fa-link"></i>';
                $portfolio_data .= "</a>";
                $portfolio_data .= "</div>";
            }
            $portfolio_data .= "</div>";
        endwhile;
        wp_reset_postdata();
        $portfolio_data .= "</div>";
        $portfolio_data .= "</div>";
        return $portfolio_data;
    }
}
add_shortcode('portfolio', 'anps_portfolio_func');
