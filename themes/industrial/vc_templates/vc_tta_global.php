<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * @var $this WPBakeryShortCode_VC_Tta_Accordion|WPBakeryShortCode_VC_Tta_Tabs|WPBakeryShortCode_VC_Tta_Tour|WPBakeryShortCode_VC_Tta_Pageable
 */
$el_class = $css = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$this->resetVariables( $atts, $content );
extract( $atts );

$this->setGlobalTtaInfo();

if(method_exists($this, 'enqueueTtaStyles')) {
    $this->enqueueTtaStyles();
}
$this->enqueueTtaScript();

// It is required to be before tabs-list-top/left/bottom/right for tabs/tours
$prepareContent = $this->getTemplateVariable( 'content' );

$class_to_filter = $this->getTtaGeneralClasses();
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$is_anps_tabs = false;
$is_anps_accordion = false;

if(isset($atts['style']) && ($atts['style']=='anps-style-1' || $atts['style'] == 'anps-style-2' || $atts['style'] == 'anps-style-3' || $atts['style'] == 'anps-style-4')) {
	if( $this->layout == 'tabs' ) {
		$is_anps_tabs = true;
	} else if( $this->layout == 'accordion' ) {
		$is_anps_accordion = true;
	}
}

$output = '';
if($is_anps_accordion) {
	$sections = WPBakeryShortCode_VC_Tta_Section::$section_info;
	$active_section = 1;
	$class = 'panel-group';

	/* Extra class and Design options */
	if($atts['el_class'] != '') {
		$class .= ' ' . $atts['el_class'];
	}
	if($atts['css'] != '') {
		$class .= ' ' . vc_shortcode_custom_css_class( $css, ' ' );
	}
	if( $atts['c_icon'] != '' ) {
		$class .= ' panel-icon-' . esc_html($atts['c_icon']) . ' panel-icon-align-' . esc_html($atts['c_position']);
	}

	/* Shape */

	$class .= ' panel-shape-' . $atts['shape'];

	/* Title */
	if ($atts['title']) {
		$output .= '<h2 class="title">' . esc_html($atts['title']) . '</h2>';
	}

	/* Active section */
	if($atts['active_section'] != '') {
		$active_section = $atts['active_section'];
	}

	/* ID */
	global $anps_accordion_id;
	if( is_null($anps_accordion_id) ) {
		$anps_accordion_id = 0;
	} else {
		$anps_accordion_id++;
	}

	/* Menu style */
	$panel_style = '';

	if($atts['spacing'] != '') {
		$class .= ' panel-spacing';
	}

	/* Collapsible all */
	$parent = '';

	if( $atts['collapsible_all'] != 'true' ) {
		$parent = 'data-parent="#accordion-' . esc_attr($anps_accordion_id) . '"';
	}

	$output .= '<div class="' . esc_attr($class) . '" id="accordion-' . esc_attr($anps_accordion_id) . '" role="tablist" aria-multiselectable="true">';

	$section_count = 0;

	foreach ($sections as $section) {
		$panel_collapse_class = 'panel-collapse collapse';
		$panel_button_class = '';

		if( $section_count == $active_section - 1 ) {
			$panel_collapse_class .= ' in';
		}

		if( $section_count != $active_section - 1 ) {
			$panel_button_class .= ' collapsed';
		}

		if( $section_count != 0 ) {
			if($atts['spacing'] != '') {
				$panel_style = ' margin-top: ' . $atts['spacing'] . 'px;';
			}
		}

		$section_icon = '';

		if( $section['add_icon'] == 'true' ) {
			$section_icon = $section['i_icon_' . $section['i_type']];
		}

        $output .= '<div class="panel" style="' . esc_attr($panel_style) . '">';
            $output .= '<div class="panel-heading" role="tab" id="acc-heading-' . esc_attr($section['tab_id']) . '">';
            	$output .= '<h4 class="panel-title text-' . esc_attr($atts['c_align']) . ' small-margin">';
			        $output .= '<a ' . $parent . ' class="'  . esc_attr($panel_button_class) . '" role="button" data-toggle="collapse" href="#acc-' . esc_attr($section['tab_id']) . '" aria-expanded="true" aria-controls="acc-' . esc_attr($section['tab_id']) . '">';
	            		if( $section['add_icon'] == 'true' && $section['i_position'] == 'left' ) {
	            			$output .= '<i class="' . esc_attr($section_icon) . '"></i>';
	            		}
			        	$output .= '<span>' . esc_html($section['title']) . '</span>';
	            		if( $section['add_icon'] == 'true' && $section['i_position'] == 'right' ) {
	            			$output .= '<i class="' . esc_attr($section_icon) . '"></i>';
	            		}
			        $output .= '</a>';
		      	 $output .= '</h4>';
		    $output .= '</div>';
            $output .= '<div id="acc-' . esc_attr($section['tab_id']) . '" class="' . esc_attr($panel_collapse_class) . '" role="tabpanel" aria-labelledby="acc-heading-' . esc_attr($section['tab_id']) . '">';
            	$output .= '<div class="panel-body">' . $section['content'] . '</div>';
            $output .= '</div>';
        $output .= '</div>';

        $section_count++;
	}
	$output .= '</div>';

} else if($is_anps_tabs) {
	$sections = WPBakeryShortCode_VC_Tta_Section::$section_info;
	$active_section = 1;

	/* Class */
	$class = 'default';

	if($atts['style'] == 'anps-style-1' && ($atts['tab_position'] == 'left' || $atts['tab_position'] == 'right') ) {
		 $class = 'side';
	} else if($atts['style'] == 'anps-style-2') {
		$class = 'minimal';
	} else if($atts['style'] == 'anps-style-3') {
		$class = 'default tabs-small';
	} else if($atts['style'] == 'anps-style-4') {
		$class = 'minimal tabs-minimal-small';
	}

	if($atts['el_class'] != '') {
		$class .= ' ' . $atts['el_class'];
	}
	if($atts['css'] != '') {
		$class .= ' ' . vc_shortcode_custom_css_class( $css, ' ' );
	}
	$class .= ' tabs-shape-' . $atts['shape'];
	$class .= ' tabs-align-' . $atts['alignment'];
	if( $atts['tab_position'] == 'left' || $atts['tab_position'] == 'right' ) {
		$class .= ' tabs-side-' . $atts['tab_position'];
	} else {
		$class .= ' tabs-position-' . $atts['tab_position'];
	}

	/* Tabs menu style */
	$menu_style = '';
	$menu_item_style = '';

	if($atts['spacing'] != '') {
		if($atts['tab_position'] == 'top') {
			$menu_style = 'padding-bottom: ' . $atts['spacing'] . 'px';
		} else if($atts['tab_position'] == 'bottom') {
			$menu_style = 'padding-top: ' . $atts['spacing'] . 'px';
		} else {
			$menu_item_style = 'margin-top: ' . $atts['spacing'] . 'px';
			$class .= ' tabs-spacing';
		}
	}

	/* Title */
	if ($atts['title']) {
		$output .= '<h2 class="title">' . $atts['title'] . '</h2>';
	}

	/* Active section */
	if($atts['active_section'] != '') {
		$active_section = $atts['active_section'];
	}

	/* ID */
	global $anps_tabs_id;
	if( is_null($anps_tabs_id) ) {
		$anps_tabs_id = 0;
	} else {
		$anps_tabs_id++;
	}

    $output .= '<div class="tabs tabs-' . esc_attr($class) . '">';
    	/* Create tab menu */
    	$menu = '<div class="nav-tabs-wrap" style="' . esc_attr($menu_style) . '">';
           $menu .= '<ul class="nav nav-tabs" role="tablist">';
           		$section_count = 0;
          		foreach ($sections as $section) {
          			$section_class = '';
          			$section_id = '';

	        		if( $section_count == $active_section - 1 ) {
	        			$section_class .= ' active';
	        		}

					$section_icon = '';

					if( $section['add_icon'] == 'true' ) {
						$section_icon = $section['i_icon_' . $section['i_type']];
					}

					if( isset($section['tab_id']) && $section['tab_id'] != '' ) {
						$section_id = $section['tab_id'];
					} else {
						$section_id = 'tabs-' . $anps_tabs_id . '-' . $section_count;
					}

          			$menu .= '<li style="' . esc_attr($menu_item_style) . '" role="presentation" class="' . esc_attr($section_class) . '">';
          				$menu .= '<a href="#' . esc_attr($section_id) . '" aria-controls="' . esc_attr($section_id) . '" role="tab" data-toggle="tab">';
		            		if( $section['add_icon'] == 'true' && $section['i_position'] == 'left' ) {
		            			$menu .= '<i class="' . esc_attr($section_icon) . '"></i>';
		            		}
				        	$menu .= '<span>' . esc_html($section['title']) . '</span>';
		            		if( $section['add_icon'] == 'true' && $section['i_position'] == 'right' ) {
		            			$menu .= '<i class="' . esc_attr($section_icon) . '"></i>';
		            		}
          				$menu .= '</a>';
          			$menu .= '</li>';
          			$section_count++;
          		}
           $menu .= '</ul>';
        $menu .= '</div>';

        /* If menu position is set to top */
        if($atts['tab_position'] != 'bottom') {
        	$output .= $menu;
        }

        /* Content */
        $output .= '<div class="tab-content">';
        	$section_count = 0;
        	foreach ($sections as $section) {
        		$section_class = 'tab-pane';
        		$section_id = '';

        		if( $section_count == $active_section - 1 ) {
        			$section_class .= ' active';
        		}

				if( isset($section['tab_id']) && $section['tab_id'] != '' ) {
					$section_id = $section['tab_id'];
				} else {
					$section_id = 'tabs-' . $anps_tabs_id . '-' . $section_count;
				}

				$output .= '<div role="tabpanel" class="' . esc_attr($section_class) . '" id="' . esc_attr($section_id) . '">';
				$output .= $section['content'];
				$output .= '</div>';
				$section_count++;
			}
        $output .= '</div>';

        /* If menu position is set to bottom */
        if($atts['tab_position'] == 'bottom') {
        	$output .= $menu;
        }
    $output .= '</div>';
} else {
    $output = '<div ' . $this->getWrapperAttributes() . '>';
    $output .= $this->getTemplateVariable( 'title' );
    $output .= '<div class="' . esc_attr( $css_class ) . '">';
    $output .= $this->getTemplateVariable( 'tabs-list-top' );
    $output .= $this->getTemplateVariable( 'tabs-list-left' );
    $output .= '<div class="vc_tta-panels-container">';
    $output .= $this->getTemplateVariable( 'pagination-top' );
    $output .= '<div class="vc_tta-panels">';
    $output .= $prepareContent;
    $output .= '</div>';
    $output .= $this->getTemplateVariable( 'pagination-bottom' );
    $output .= '</div>';
    $output .= $this->getTemplateVariable( 'tabs-list-bottom' );
    $output .= $this->getTemplateVariable( 'tabs-list-right' );
    $output .= '</div>';
    $output .= '</div>';
}

echo $output;
