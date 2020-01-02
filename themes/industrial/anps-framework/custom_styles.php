<?php
function anps_custom_styles_font_family() {
    /* Font Default Values */
    $font_1 = "Montserrat";
    $font_2 = 'PT Sans';
    $font_3 = "Montserrat";

    /* logo font */

    $logo_font_explode = urldecode(get_option('anps_text_logo_font'));
	$logo_font_e = explode('|', $logo_font_explode);

	$logo_font = $logo_font_e[0];

	if( get_option('anps_text_logo_source_1') == 'Custom fonts' ) {
		anps_custom_font($logo_font);
	}

    /* Font 1 */
    if( get_option('font_source_1') == 'System fonts' ||
        get_option('font_source_1') == 'Custom fonts' ||
        get_option('font_source_1') == 'Google fonts' ) {

        $font_1 = urldecode(get_option('font_type_1'));
    }

    if( get_option('font_source_1') == 'Custom fonts' ) {
        anps_custom_font($font_1);
    }

    /* Font 2 */
    if( get_option('font_source_2') == 'System fonts' ||
        get_option('font_source_2') == 'Custom fonts' ||
        get_option('font_source_2') == 'Google fonts' ) {

        $font_2 = urldecode(get_option('font_type_2'));
    }

    if( get_option('font_source_2') == 'Custom fonts' ) {
        anps_custom_font($font_2);
    }

    /* Font 3 (navigation) */
    if( get_option('font_source_navigation') == 'System fonts' ||
        get_option('font_source_navigation') == 'Custom fonts' ||
        get_option('font_source_navigation') == 'Google fonts' ) {

        $font_3 = urldecode(get_option('font_type_navigation'));
    }

    if( get_option('font_source_navigation') == 'Custom fonts' ) {
        anps_custom_font($font_3);
    }

    /* logo font */
	?>
	.logo .logo-wrap {
		font-family: <?php echo anps_wrap_font(esc_attr($logo_font));?>;
	}

	<?php
    /* Font 1 */
    ?>
	.featured-title,
	.quantity .quantity-field,
	.cart_totals th,
	.rev_slider,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.h5,
	.title.h5,
	table.table > tbody th,
	table.table > thead th,
	table.table > tfoot th,
	.search-notice-label,
	.nav-tabs a,
	.filter-dark button,
	.filter:not(.filter-dark) button,
	.orderform .quantity-field,
	.product-top-meta,
	.price,
	.onsale,
	.page-header .page-title,
	*:not(.widget) > .download,
	.btn,
	.button,
	.contact-number,
    .site-footer .widget_recent_entries a,
    .timeline-year,
    .font1 {
  		font-family: <?php echo anps_wrap_font(esc_attr($font_1)); ?>;
        <?php if($font_1 === 'Montserrat'): ?>
            font-weight: 500;
        <?php endif; ?>
	}

    .top-bar-style-0,
    .top-bar-style-1,
    .site-header .contact-info,
    .breadcrumb,
	.site-navigation .contact-info {
        font-family: <?php echo anps_wrap_font(esc_attr($font_1)); ?>;
    }

    <?php
    /* Font 2 */
    ?>

	.btn.btn-xs,
	body,
	.alert,
	div.wpcf7-mail-sent-ng,
	div.wpcf7-validation-errors,
	.search-result-title,
	.contact-form .form-group label,
	.contact-form .form-group .wpcf7-not-valid-tip,
	.wpcf7 .form-group label,
	.wpcf7 .form-group .wpcf7-not-valid-tip,
    .heading-subtitle,
    .top-bar-style-2,
    .large-above-menu.style-2 .widget_anpstext {
  		font-family: <?php echo anps_wrap_font(esc_attr($font_2)); ?>;
	}

    <?php
    /* Font 3 (Navigation Font) */
    ?>

	nav.site-navigation ul li a,
	.menu-button,
	.megamenu-title {
  		font-family: <?php echo anps_wrap_font(esc_attr($font_3)); ?>;

        <?php if($font_1 === 'Montserrat'): ?>
            font-weight: 500;
        <?php endif; ?>
	}

	@media (max-width: 1199px) {
	  .site-navigation .main-menu li a {
	    font-family: <?php echo anps_wrap_font(esc_attr($font_3)); ?>;

        <?php if($font_1 === 'Montserrat'): ?>
            font-weight: 500;
        <?php endif; ?>
	  }
	}
    <?php
}
function anps_custom_styles_colors() {
    /* Main colors */
    $anps_text_color = get_option('anps_text_color', '898989');
    $anps_primary_color = get_option('anps_primary_color', '3498db');
    $anps_hovers_color = get_option('anps_hovers_color', '2a76a9');
    $anps_headings_color = get_option('anps_headings_color', '000000');

    /* Menu colors */
    $anps_menu_text_color = get_option('anps_menu_text_color', 'ffffff');
    $anps_menu_text_hover_color = $anps_hovers_color;
    $anps_menu_bg_color = get_option('anps_menu_bg_color', '16242e');
    $anps_vertical_menu_background =  get_option('anps_vertical_menu_background', '');
    $anps_submenu_background_color = get_option('anps_submenu_background_color', 'ffffff');
    $anps_submenu_text_color = get_option('anps_submenu_text_color', '8c8c8c');
    $anps_submenu_text_hover_color = get_option('anps_submenu_text_hover_color', 'fff');
    $anps_submenu_divider_color = get_option('anps_submenu_divider_color', 'ececec');

    $anps_vertical_divider_color = get_option('anps_vertical_divider_color', 'ececec');

    $anps_logo_bg_color = get_option('anps_logo_bg_color', '');
    $anps_above_menu_bg_color = get_option('anps_above_menu_bg_color', 'fff');

    /* Top bar colors */
    $anps_top_bar_color = get_option('anps_top_bar_color', '8c8c8c');
    $anps_top_bar_bg_color = get_option('anps_top_bar_bg_color', '16242e');

    /* Footer colors */
    $anps_footer_bg_color = get_option('anps_footer_bg_color', '171717');
    $anps_footer_text_color = get_option('anps_footer_text_color', '7f7f7f');
    $anps_footer_border_color = get_option('anps_footer_border_color', '2e2e2e');
    $anps_footer_heading_text_color = get_option('anps_footer_heading_text_color', 'ffffff');
    $anps_c_footer_text_color = get_option('anps_c_footer_text_color', '9C9C9C');
    $anps_c_footer_bg_color = get_option('anps_c_footer_bg_color', '');

    /* Header colors */
    $anps_page_header_background_color = get_option('anps_page_header_background_color', 'f8f9f9');
    $anps_page_title = get_option('anps_page_title', '4e4e4e');

    /* Text on top of primary color */
    $anps_primary_text_top = get_option('anps_primary_text_top', 'ffffff');

	/* Shopping cart colors */
    $anps_woo_cart_items_number_bg_color = get_option('anps_woo_cart_items_number_bg_color', '3daaf3');
    $anps_woo_cart_items_number_color = get_option('anps_woo_cart_items_number_color', '2f4d60');

    /* Important colors */
    $anps_important_bg_color = get_option('anps_important_bg_color', '69cd72');
    $anps_important_text_color = get_option('anps_important_text_color', '32853a');

    /* Buttons */
    // Normal
    $anps_normal_button_bg = get_option('anps_normal_button_bg', '3498db');
    $anps_normal_button_color = get_option('anps_normal_button_color', 'ffffff');
    $anps_normal_button_hover_bg = get_option('anps_normal_button_hover_bg', '2a76a9');
    $anps_normal_button_hover_color = get_option('anps_normal_button_hover_color', 'ffffff');

    // Gradient
    $anps_gradient_button_bg = get_option('anps_gradient_button_bg', '3498db');
    $anps_gradient_button_color = get_option('anps_gradient_button_color', 'ffffff');
    $anps_gradient_button_hover_bg = get_option('anps_gradient_button_hover_bg', '2a76a9');
    $anps_gradient_button_hover_color = get_option('anps_gradient_button_hover_color', 'ffffff');

    // Dark
    $anps_dark_button_bg = get_option('anps_dark_button_bg', '242424');
    $anps_dark_button_color = get_option('anps_dark_button_color', 'ffffff');
    $anps_dark_button_hover_bg = get_option('anps_dark_button_hover_bg', 'ffffff');
    $anps_dark_button_hover_color = get_option('anps_dark_button_hover_color', '242424');

    // Light
    $anps_light_button_bg = get_option('anps_light_button_bg', 'ffffff');
    $anps_light_button_color = get_option('anps_light_button_color', '242424');
    $anps_light_button_hover_bg = get_option('anps_light_button_hover_bg', '242424');
    $anps_light_button_hover_color = get_option('anps_light_button_hover_color', 'ffffff');

    // Minimal
    $anps_minimal_button_color = get_option('anps_minimal_button_color', '3498db');
    $anps_minimal_button_hover_color = get_option('anps_minimal_button_hover_color', '2a76a9');

    // dividers
	$anps_main_divider_color = get_option('anps_main_divider_color', '69cd72');
    /*
		CONDITIONAL COLORS
    */

    /* Global option is set to transparent */
    if( get_option('anps_global_transparent_header', '0') == '1' ) {
    	$anps_menu_text_color = get_option('anps_global_text_color', '');
    	$anps_menu_text_hover_color = get_option('anps_global_text_hover_color', '');
    	$anps_menu_bg_color = 'transparent';
    }

    /* Is front page or options set as global */
    if( is_front_page() || get_option('anps_set_settings_as_global_header', '0') == '1' ) {
    	if( get_option('anps_front_text_color', '') ) {
    		$anps_menu_text_color = get_option('anps_front_text_color', '');
    	}

    	if( get_option('anps_front_text_hover_color', '') ) {
			$anps_menu_text_hover_color = get_option('anps_front_text_hover_color', '');
		}

		if( get_option('anps_front_bg_color', '') ) {
			$anps_menu_bg_color = get_option('anps_front_bg_color', '');
		}
    }

    $page_meta = get_post_meta(get_queried_object_id());

    /* Page meta options */
    if( isset($page_meta['anps_page_heading_full']) && $page_meta['anps_page_heading_full'][0] == 'on' ) {
    	// Top bar
    	$anps_top_bar_color = str_replace('#', '', $page_meta['anps_full_color_top_bar'][0]);

    	// Menu, title, bredcrumbs
    	$anps_menu_text_color = str_replace('#', '', $page_meta['anps_full_color_title'][0]);
        if( $page_meta['anps_full_color_title'][0] != '' ) {
	       $anps_page_title = str_replace('#', '', $page_meta['anps_full_color_title'][0]);
        }

    	// Hover
        if( $page_meta['anps_full_hover_color'][0] != '' ) {
            $anps_menu_text_hover_color = str_replace('#', '', $page_meta['anps_full_hover_color'][0]);
        }
    }

    if( isset($page_meta['anps_color_title']) && $page_meta['anps_color_title'][0] != '' ) {
        $anps_page_title = str_replace('#', '', $page_meta['anps_color_title'][0]);
    }


    /* Text Color */
    ?>
  	.select2-container .select2-choice,
	.select2-container .select2-choice > .select2-chosen,
	.select2-results li,
	.widget_rss .widget-title:hover,
	.widget_rss .widget-title:focus,
	.sidebar a,
	body,
	.ghost-nav-wrap.site-navigation ul.social > li a:not(:hover),
	.ghost-nav-wrap.site-navigation .widget,
	#lang_sel a.lang_sel_sel,
	.search-notice-field,
	.product_meta .posted_in a,
	.product_meta > span > span,
	.price del,
	.post-meta li a,
	.social.social-transparent-border a,
	.social.social-border a,
	.top-bar .social a,
	.site-main .social.social-minimal a:hover,
	.site-main .social.social-minimal a:focus,
	.info-table-content strong,
	.site-footer .download-icon,
	.mini-cart-list .empty,
	.mini-cart-content,
	ol.list span,
	.product_list_widget del,
	.product_list_widget del .amount {
		color: #<?php echo esc_attr($anps_text_color); ?>;
	}

    <?php
    /* Primary Color */
    ?>

    aside .widget_shopping_cart_content .buttons a,
	.site-footer .widget_shopping_cart_content .buttons a,
	.demo_store_wrapper,
	.mini-cart-content .buttons a,
	.mini-cart-link,
	.widget_calendar caption,
	.widget_calendar a,
	.woocommerce-MyAccount-navigation .is-active > a,
	.bg-primary,
	mark,
	.onsale,
	.nav-links > *:not(.dots):hover,
	.nav-links > *:not(.dots):focus,
	.nav-links > *:not(.dots).current,
	ul.page-numbers > li > *:hover,
	ul.page-numbers > li > *:focus,
	ul.page-numbers > li > *.current,
	.social a,
	.sidebar .download a,
	.panel-heading a,
	aside .widget_price_filter .price_slider_amount button.button,
	.site-footer .widget_price_filter .price_slider_amount button.button,
	aside .widget_price_filter .ui-slider .ui-slider-range,
	.site-footer .widget_price_filter .ui-slider .ui-slider-range,
	article.post.sticky .post-title:before,
	article.post.sticky .post-meta:before,
	article.post.sticky .post-content:before,
	aside.sidebar .widget_nav_menu .current-menu-item > a,
	table.table > tbody.bg-primary tr,
	table.table > tbody tr.bg-primary,
	table.table > thead.bg-primary tr,
	table.table > thead tr.bg-primary,
	table.table > tfoot.bg-primary tr,
	table.table > tfoot tr.bg-primary,
	.pika-prev, .pika-next,
	.owl-nav button,
    .featured-has-icon .featured-title:before,
    .tnp-widget .tnp-submit,
    .timeline-item:before,
    .subscribe .tnp-button,
	.woocommerce-product-gallery__trigger,
	.woocommerce .flex-control-thumbs.owl-carousel .owl-prev,
	.woocommerce .flex-control-thumbs.owl-carousel .owl-next,
	.cart_totals .shipping label::after,
	.wc_payment_methods label::after {
		background-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	.featured-header,
	.panel-heading a {
		border-bottom-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	::-moz-selection {
		background-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	::selection {
		background-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	aside .widget_price_filter .price_slider_amount .from,
	aside .widget_price_filter .price_slider_amount .to,
	.site-footer .widget_price_filter .price_slider_amount .from,
	.site-footer .widget_price_filter .price_slider_amount .to,
	.mini-cart-content .total .amount,
	.widget_calendar #today,
	.widget_rss ul .rsswidget,
	.site-footer a:not(.btn):hover,
	.site-footer a:not(.btn):focus,
	b,
	a,
	.ghost-nav-wrap.site-navigation ul.social > li a:hover,
	.site-header.vertical .social li a:hover,
	.site-header.vertical .contact-info li a:hover,
	.site-header.classic .above-nav-bar .contact-info li a:hover,
	.site-header.transparent .contact-info li a:hover,
	.ghost-nav-wrap.site-navigation .contact-info li a:hover,
	header a:focus,
	nav.site-navigation ul li a:hover,
	nav.site-navigation ul li a:focus,
	nav.site-navigation ul li a:active,
	.counter-wrap .title,
	.vc_gitem_row .vc_gitem-col.anps-grid .vc_gitem-post-data-source-post_date > div:before,
	.vc_gitem_row .vc_gitem-col.anps-grid-mansonry .vc_gitem-post-data-source-post_date > div:before,
	ul.testimonial-wrap .rating,
	.nav-tabs a:hover,
	.nav-tabs a:focus,
	.projects-item .project-title,
	.filter-dark button.selected,
	.filter:not(.filter-dark) button:focus,
	.filter:not(.filter-dark) button.selected,
	.product_meta .posted_in a:hover,
	.product_meta .posted_in a:focus,
	.price,
	.post-info td a:hover,
	.post-info td a:focus,
	.post-meta i,
	.stars a:hover,
	.stars a:focus,
	.stars,
	.star-rating,
	.site-header.transparent .social.social-transparent-border a:hover,
	.site-header.transparent .social.social-transparent-border a:focus,
	.social.social-transparent-border a:hover,
	.social.social-transparent-border a:focus,
	.social.social-border a:hover,
	.social.social-border a:focus,
	.top-bar .social a:hover,
	.top-bar .social a:focus,
	.list li:before,
	.info-table-icon,
	.icon-media,
	.site-footer .download a:hover,
	.site-footer .download a:focus,
	header.site-header.classic nav.site-navigation .above-nav-bar .contact-info li a:hover,
	.top-bar .contact-info a:hover,
	.comment-date i,
	[itemprop="datePublished"]:before,
	.breadcrumb a:hover,
	.breadcrumb a:focus,
	.panel-heading a.collapsed:hover,
	.panel-heading a.collapsed:focus,
	ol.list,
	.product_list_widget .amount,
	.product_list_widget ins,
	ul.testimonial-wrap .user-data .name-user,
	.site-footer .anps_menu_widget .menu .current-menu-item > a,
	.site-footer .widget_nav_menu li.current_page_item > a,
	.site-footer .widget_nav_menu li.current-menu-item > a,
	.wpcf7-form-control-wrap[class*="date-"]:after,
	.copyright-footer a,
	.contact-info i,
    .featured-has-icon.simple-style .featured-title i,
    a.featured-lightbox-link,
    .jobtitle,
    .site-footer .widget_recent_entries .post-date:before,
    .site-footer .social.social-minimal a:hover,
    .site-footer .social.social-minimal a:focus,
    .timeline-year,
    .heading-middle span:before,
	.heading-left span:before,
    .anps-info-it-wrap,
    .anps-info-icons-wrap,
    .testimonials-style-3 .testimonials-wrap .name-user,
	.testimonials-style-3 .testimonials-wrap .content p::before,
	.sidebar .anps_menu_widget .menu .current-menu-item > a:after,
	.sidebar .anps_menu_widget .menu .current-menu-item > a {
		color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

    @media (min-width: 768px) {
        .featured-has-icon:hover .featured-title i,
        .featured-has-icon:focus .featured-title i {
            color: #<?php echo esc_attr($anps_primary_color); ?>;
        }
    }

    a.featured-lightbox-link svg {
        fill: #<?php echo esc_attr($anps_primary_color); ?>;
    }

	nav.site-navigation .current-menu-item > a,
	.important,
	.megamenu-title {
  		color: #<?php echo esc_attr($anps_primary_color); ?> !important;
	}

	.large-above-menu.style-2 .important {
		color: #<?php echo esc_attr($anps_page_title); ?>!important;
	}

	.gallery-fs .owl-item a:hover:after,
	.gallery-fs .owl-item a:focus:after,
	.gallery-fs .owl-item a.selected:after,
	blockquote:not([class]) p,
    .blockquote-style-1 p,
    .blockquote-style-2 p,
    .featured-content,
    .post-minimal-wrap {
		border-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

	@media(min-width: 1200px) {
  		.site-header.vertical .above-nav-bar > ul.contact-info > li a:hover,
  		.site-header.vertical .above-nav-bar > ul.contact-info > li a:focus,
  		.site-header.vertical .above-nav-bar > ul.social li a:hover i,
  		.site-header.vertical .main-menu > li:not(.mini-cart):hover > a,
  		.site-header.vertical .main-menu > li:not(.mini-cart).current-menu-item > a,
  		header.site-header nav.site-navigation .main-menu .megamenu ul li a:hover,
  		header.site-header nav.site-navigation .main-menu .megamenu ul li a:focus {
			color: #<?php echo esc_attr($anps_primary_color); ?>;
		}

        .site-header.full-width:not(.above-nav-style-2) .mini-cart .mini-cart-link,
        .site-header.full-width:not(.above-nav-style-2) .mini-cart-link {
            color: #<?php echo esc_attr($anps_primary_color); ?> !important;
        }

		header.site-header.classic nav.site-navigation ul li a:hover,
		header.site-header.classic nav.site-navigation ul li a:focus {
			border-color: #<?php echo esc_attr($anps_primary_color); ?>;
		}

		nav.site-navigation ul li > ul.sub-menu a:hover {
			background-color: #<?php echo esc_attr($anps_primary_color); ?>;
            color: #fff;
		}

        <?php if($anps_vertical_menu_background != ''): ?>
        .site-header.vertical {
            background-image: url(<?php echo esc_attr($anps_vertical_menu_background); ?>);
            background-size: cover;
            background-position: center;
        }
        <?php endif; ?>

        .site-header.vertical .main-menu > li:not(.mini-cart) {
            border-color: #<?php echo esc_attr($anps_vertical_divider_color); ?>;
        }
	}

	@media(max-width: 1199px) {
		.site-navigation .main-menu li a:hover,
		.site-navigation .main-menu li a:active,
		.site-navigation .main-menu li a:focus,
		.site-navigation .main-menu li.current-menu-item > a,
		.site-navigation .mobile-showchildren:hover,
  		.site-navigation .mobile-showchildren:active {
			color: #<?php echo esc_attr($anps_primary_color); ?>;
		}
	}
    <?php
    /* Hovers Color */
    ?>
	aside .widget_shopping_cart_content .buttons a:hover,
	aside .widget_shopping_cart_content .buttons a:focus,
	.site-footer .widget_shopping_cart_content .buttons a:hover,
	.site-footer .widget_shopping_cart_content .buttons a:focus,
	.mini-cart-content .buttons a:hover,
	.mini-cart-content .buttons a:focus,
	.mini-cart-link:hover,
	.mini-cart-link:focus,
    .full-width:not(.above-nav-style-2) .mini-cart-link:hover,
    .full-width:not(.above-nav-style-2) .mini-cart-link:focus,
	.widget_calendar a:hover,
	.widget_calendar a:focus,
	.social a:hover,
	.social a:focus,
	.sidebar .download a:hover,
	.sidebar .download a:focus,
	.site-footer .widget_price_filter .price_slider_amount button.button:hover,
	.site-footer .widget_price_filter .price_slider_amount button.button:focus,
	.owl-nav button:hover, .owl-nav button:focus,
    .woocommerce-product-gallery__trigger:hover,
    .woocommerce-product-gallery__trigger:focus {
		background-color: #<?php echo esc_attr($anps_hovers_color); ?>;
	}

	.sidebar a:hover,
	.sidebar a:focus,
	a:hover,
	a:focus,
	.post-meta li a:hover,
	.post-meta li a:focus,
	.site-header.classic .above-nav-bar ul.social > li > a:hover,
	.site-header .above-nav-bar ul.social > li > a:hover,
	.site-header .menu-search-toggle:hover,
	.site-header .menu-search-toggle:focus,
	.copyright-footer a:hover,
	.copyright-footer a:focus,
    .scroll-top:hover,
    .scroll-top:focus {
		color: #<?php echo esc_attr($anps_hovers_color); ?>;
	}

	@media (min-width: 1200px) {
		header.site-header.classic .site-navigation .main-menu > li > a:hover,
		header.site-header.classic .site-navigation .main-menu > li > a:focus {
			color: #<?php echo esc_attr($anps_hovers_color); ?>;
		}
	}

	.form-group input:not([type="submit"]):hover,
	.form-group input:not([type="submit"]):focus,
	.form-group textarea:hover,
	.form-group textarea:focus,
	.wpcf7 input:not([type="submit"]):hover,
	.wpcf7 input:not([type="submit"]):focus,
	.wpcf7 textarea:hover,
	.wpcf7 textarea:focus,
	input,
	.input-text:hover,
	.input-text:focus {
		outline-color: #<?php echo esc_attr($anps_hovers_color); ?>;
	}


	.scrollup a:hover {
		border-color: #<?php echo esc_attr($anps_hovers_color); ?>;
	}

    <?php
    /* Menu Colors */
    ?>
    .transparent .burger {
		color: #<?php echo esc_attr($anps_menu_text_color); ?>;
    }

    @media(min-width: 1200px) {
	    header.site-header.classic .site-navigation .main-menu > li > a,
	    header.site-header.transparent .site-navigation .main-menu > li > a,
        header.site-header.vertical .site-navigation .main-menu > li > a,
	    .menu-search-toggle,
	    .transparent .menu-search-toggle,
	    .site-header.full-width .site-navigation .main-menu > li > a,
	    .site-header.full-width .menu-search-toggle,
	    .site-header.transparent .contact-info li, .ghost-nav-wrap.site-navigation .contact-info li,
	    .site-header.transparent .contact-info li *, .ghost-nav-wrap.site-navigation .contact-info li *,
        .menu-notice {
			color: #<?php echo esc_attr($anps_menu_text_color); ?>;
	    }

		.site-header.classic.sticky .site-navigation .main-menu > li > a,
		header.site-header.transparent.sticky .site-navigation .main-menu > li > a,
		.sticky .site-navigation a,
		.sticky .menu-search-toggle,
		.site-header.transparent.sticky .contact-info li, .ghost-nav-wrap.site-navigation .contact-info li,
	    .site-header.transparent.sticky .contact-info li *, .ghost-nav-wrap.site-navigation .contact-info li * {
			color: #<?php echo get_option('anps_menu_text_color', 'ffffff'); ?>;
		}

	    header.site-header.classic .site-navigation .main-menu > li > a:hover,
	    header.site-header.classic .site-navigation .main-menu > li > a:focus,
        header.site-header.vertical .site-navigation .main-menu > li > a:hover,
	    header.site-header.vertical .site-navigation .main-menu > li > a:focus,
	    header.site-header.transparent .site-navigation .main-menu > li > a:hover,
	    header.site-header.transparent .site-navigation .main-menu > li > a:focus,
	    .site-header.full-width .site-navigation .main-menu > li > a:hover,
	    .site-header.full-width .site-navigation .main-menu > li > a:focus,
	    header.site-header .menu-search-toggle:hover,
		header.site-header .menu-search-toggle:focus,
		.site-header.full-width .menu-search-toggle:hover,
		.site-header.full-width .menu-search-toggle:focus {
			color: #<?php echo esc_attr($anps_menu_text_hover_color); ?>;
	    }

	    .site-header.full-width .site-navigation {
			background-color: #<?php echo esc_attr($anps_menu_bg_color); ?>;
		}

        <?php
            if( $anps_logo_bg_color == '' ) {
                $anps_logo_bg_color = $anps_primary_color;
            }
        ?>

        .full-width {
            background-color: #<?php echo esc_attr($anps_above_menu_bg_color); ?>;
        }

		.full-width.logo-background .logo {
			color: #<?php echo esc_attr($anps_logo_bg_color); ?>;
		}

		header.site-header nav.site-navigation .main-menu ul .menu-item > a:hover,
        header.site-header nav.site-navigation .main-menu ul .menu-item > a:focus {
			color: #<?php echo esc_attr($anps_submenu_text_hover_color); ?>;
    	}

    header.site-header.classic,
    header.site-header.vertical {
		background-color: #<?php echo esc_attr($anps_menu_bg_color); ?>;
	}
}
	.menu-button,
	.menu-button:hover,
	.menu-button:focus {
		color: #<?php echo esc_attr($anps_menu_text_color); ?>;
	}

	.menu-button:hover,
	.menu-button:focus {
		background-color: #<?php echo esc_attr($anps_menu_text_hover_color); ?>;
	}

	.menu-button {
		background-color: #<?php echo esc_attr($anps_primary_color); ?>;
	}

    <?php
    /* Headings Color */
    ?>
    .featured-title,
	.woocommerce form label,
	.mini-cart-content .total,
	.quantity .minus:hover,
	.quantity .minus:focus,
	.quantity .plus:hover,
	.quantity .plus:focus,
	.cart_totals th,
	.cart_totals .order-total,
	.widget_rss ul .rss-date,
	.widget_rss ul cite,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.h5,
	.title.h5,
	em,
	.dropcap,
	table.table > tbody th,
	table.table > thead th,
	table.table > tfoot th,
	.sidebar .working-hours td,
	.orderform .minus:hover,
	.orderform .minus:focus,
	.orderform .plus:hover,
	.orderform .plus:focus,
	.product-top-meta .price,
	.post-info th,
	.post-author-title strong,
	.site-main .social.social-minimal a,
	.info-table-content,
	.comment-author,
	[itemprop="author"],
	.breadcrumb a,
	aside .mini-cart-list + p.total > strong,
	.site-footer .mini-cart-list + p.total > strong,
	.mini-cart-list .remove {
		color: #<?php echo esc_attr($anps_headings_color); ?>;
    }
    .mini_cart_item_title {
    	color: #<?php echo esc_attr($anps_headings_color); ?> !important;
    }
    <?php
    /* Top Bar Text Color */
    ?>
    .top-bar {
		color: #<?php echo esc_attr($anps_top_bar_color); ?>;
    }
    <?php
    /* Top Bar Background Color */
    ?>
    .top-bar {
		background-color: #<?php echo esc_attr($anps_top_bar_bg_color); ?>;
    }
    <?php
    /* Footer Background  Color */
    ?>
    .site-footer {
		background-color: #<?php echo esc_attr($anps_footer_bg_color); ?>;
    }
    <?php
    /* Footer Text Color */
    ?>
    .site-footer {
		color: #<?php echo esc_attr($anps_footer_text_color); ?>;
    }
    <?php
    /* Footer Border Color */
    ?>
    .site-footer .widget-title,
    .site-footer-default .working-hours,
    .site-footer .widget_calendar table,
    .site-footer .widget_calendar table td,
    .site-footer .widget_calendar table th,
    .site-footer .searchform input[type="text"],
    .site-footer .searchform #searchsubmit,
    .site-footer .woocommerce-product-search input.search-field,
    .site-footer .woocommerce-product-search input[type="submit"],
    .site-footer .download a,
    .copyright-footer,
    .site-footer .widget_categories li,
    .site-footer .widget_recent_entries li,
    .site-footer .widget_recent_comments li,
    .site-footer .widget_archive li,
    .site-footer .widget_product_categories li,
    .site-footer .widget_layered_nav li,
    .site-footer .widget_meta li,
    .site-footer .widget_pages li,
    .site-footer .woocommerce-MyAccount-navigation li a,
    .site-footer .widget_nav_menu li a,
    .site-footer-modern .contact-info li,
    .site-footer-modern .working-hours td,
    .site-footer-modern .working-hours th {
		border-color: #<?php echo esc_attr($anps_footer_border_color); ?>;
    }

    .site-footer .widget_calendar th:after,
    .site-footer .download i:after,
    .site-footer .widget_pages a:after {
        background-color: #<?php echo esc_attr($anps_footer_border_color); ?>;
    }
    <?php
    /* Footer Heading Text Color */
    ?>
    .site-footer .widget-title,
    .site-footer .widget_recent_entries a,
    .site-footer .social.social-minimal a,
    .site-footer-modern .working-hours td {
		color: #<?php echo esc_attr($anps_footer_heading_text_color); ?>;
    }
    .site-footer-modern .working-hours .important {
        color: #<?php echo esc_attr($anps_footer_heading_text_color); ?> !important;
    }
    <?php
    /* Copyright Footer Text & Background Color */
    ?>
    .copyright-footer {
        background-color: #<?php echo esc_attr($anps_c_footer_bg_color); ?>;
		color: #<?php echo esc_attr($anps_c_footer_text_color); ?>;
    }
    <?php
    /* Page Header Background Color */
    ?>
    .page-header {
    	background-color: #<?php echo esc_attr($anps_page_header_background_color); ?>;
    }
    <?php
    /* Page Title Color */
    ?>
    .page-header .page-title {
    	color: #<?php echo esc_attr($anps_page_title); ?>;
    }
    <?php
    /* Submenu Background Color */
    ?>
    nav.site-navigation ul li > ul.sub-menu {
    	background-color: #<?php echo esc_attr($anps_submenu_background_color); ?>;
    }
    @media(min-width: 1200px) {
	    header.site-header nav.site-navigation .main-menu .megamenu {
	    	background-color: #<?php echo esc_attr($anps_submenu_background_color); ?>;
	    }
    }
    <?php
    /* Submenu Text Color */
    ?>
    header.site-header.classic nav.site-navigation ul li a,
    header.site-header.transparent nav.site-navigation ul li a,
    nav.site-navigation ul li > ul.sub-menu a {
    	color: #<?php echo esc_attr($anps_submenu_text_color); ?>;
    }
    <?php
    /* Submenu Divider Color */
    ?>
    header.site-header nav.site-navigation .main-menu .megamenu ul li:not(:last-of-type),
    nav.site-navigation ul li > ul.sub-menu li:not(:last-child) {
    	border-color: #<?php echo esc_attr($anps_submenu_divider_color); ?>;
    }
    <?php
    /* Text On Top Primary Color */
    ?>
    .social a,
    .social a:hover,
    .social a:focus,
    .widget_calendar caption,
    .sidebar .download a {
    	color: #<?php echo esc_attr($anps_primary_text_top); ?>;
    }

    .mini-cart-link,
    .mini-cart-content .buttons a,
    .site-header.full-width .mini-cart .mini-cart-link:hover,
    .site-header.full-width .mini-cart-link:focus,
    aside .widget_shopping_cart_content .buttons a,
    .site-footer .widget_shopping_cart_content .buttons a {
    	color: #<?php echo esc_attr($anps_primary_text_top); ?> !important;
    }
    <?php
    /* Shopping Cart Item Number Background Color */
    ?>
	.mini-cart-number {
  		background-color: #<?php echo esc_attr($anps_woo_cart_items_number_bg_color); ?>;
	}
    <?php
    /* Shopping Cart Item Number Text Color */
    ?>
	.mini-cart-number {
  		color: #<?php echo esc_attr($anps_woo_cart_items_number_color); ?>;
	}
    <?php
    /* Important Background Color */
    ?>
	.anps-imprtn {
  		background-color: #<?php echo esc_attr($anps_important_bg_color); ?>;
	}
    <?php
    /* Important Text Color */
    ?>
	.site-footer .working-hours th.important {
  		color: #<?php echo esc_attr($anps_important_text_color); ?> !important;
	}
	<?php
    /* Button Normal */
    ?>
    .btn,
    .button {
   		background-color: #<?php echo esc_attr($anps_normal_button_bg); ?>;
    	color: #<?php echo esc_attr($anps_normal_button_color); ?>;
    }
	.btn:hover,
	.btn:focus,
    .button:hover,
    .button:focus,
    aside .widget_price_filter .price_slider_amount button.button:hover,
    aside .widget_price_filter .price_slider_amount button.button:focus,
    .site-footer .widget_price_filter .price_slider_amount button.button:hover,
    .site-footer .widget_price_filter .price_slider_amount button.button:focus {
    	background-color: #<?php echo esc_attr($anps_normal_button_hover_bg); ?>;
    	color: #<?php echo esc_attr($anps_normal_button_hover_color); ?>;
    }
    <?php
    /* Button Gradient */
    ?>
    .btn.btn-gradient {
   		background-color: #<?php echo esc_attr($anps_gradient_button_bg); ?>;
    	color: #<?php echo esc_attr($anps_gradient_button_color); ?>;
    }
	.btn.btn-gradient:hover,
	.btn.btn-gradient:focus {
    	background-color: #<?php echo esc_attr($anps_gradient_button_hover_bg); ?>;
    	color: #<?php echo esc_attr($anps_gradient_button_hover_color); ?>;
    }
    <?php
    /* Button Dark */
    ?>
    .btn.btn-dark {
   		background-color: #<?php echo esc_attr($anps_dark_button_bg); ?>;
    	color: #<?php echo esc_attr($anps_dark_button_color); ?>;
    }
	.btn.btn-dark:hover,
	.btn.btn-dark:focus {
    	background-color: #<?php echo esc_attr($anps_dark_button_hover_bg); ?>;
    	color: #<?php echo esc_attr($anps_dark_button_hover_color); ?>;
    }
    <?php
    /* Button Light */
    ?>
    .btn.btn-light {
   		background-color: #<?php echo esc_attr($anps_light_button_bg); ?>;
    	color: #<?php echo esc_attr($anps_light_button_color); ?>;
    }
	.btn.btn-light:hover,
	.btn.btn-light:focus {
    	background-color: #<?php echo esc_attr($anps_light_button_hover_bg); ?>;
    	color: #<?php echo esc_attr($anps_light_button_hover_color); ?>;
    }
    <?php
    /* Button Light */
    ?>
    .btn.btn-minimal {
    	color: #<?php echo esc_attr($anps_minimal_button_color); ?>;
    }
	.btn.btn-minimal:hover,
	.btn.btn-minimal:focus {
    	color: #<?php echo esc_attr($anps_minimal_button_hover_color); ?>;
    }

	.heading-left.divider-sm span:before,
	.heading-middle.divider-sm span:before,
	.heading-middle span:before,
	.heading-left span:before,
    .title:after, .widgettitle:after,
    .site-footer .widget-title:after,
    .divider-modern:not(.heading-content) span:after {
		background-color: #<?php echo esc_attr($anps_main_divider_color); ?>;
	}


    <?php
}
function anps_custom_styles_font_size() {
	$anps_body_font_size = get_option('anps_body_font_size', '14');

	$anps_h1_font_size = get_option('anps_h1_font_size', '32');
	$anps_h2_font_size = get_option('anps_h2_font_size', '28');
	$anps_h3_font_size = get_option('anps_h3_font_size', '24');
	$anps_h4_font_size = get_option('anps_h4_font_size', '21');
	$anps_h5_font_size = get_option('anps_h5_font_size', '16');

	$anps_menu_font_size = get_option('anps_menu_font_size', '13');
	$anps_submenu_font_size = get_option('anps_submenu_font_size', '12');
    $anps_top_bar_font_size = get_option('anps_top_bar_font_size', '12');

	$anps_page_heading_h1_font_size = get_option('anps_page_heading_h1_font_size', '36');
	$anps_blog_heading_h1_font_size = get_option('anps_blog_heading_h1_font_size', '36');

    $anps_footer_font_size = get_option('anps_footer_font_size', '14');
    $anps_c_footer_font_size = get_option('anps_c_footer_font_size', '14');

    /* Body Font Size */
    ?>
	body,
	.panel-title,
	.site-main .wp-caption p.wp-caption-text,
	.mini-cart-link i,
	.anps_menu_widget .menu a:before,
	.vc_gitem_row .vc_gitem-col.anps-grid .post-desc,
	.vc_gitem_row .vc_gitem-col.anps-grid-mansonry .post-desc,
	.alert,
	div.wpcf7-mail-sent-ng,
	div.wpcf7-validation-errors,
	.contact-form .form-group label,
	.contact-form .form-group .wpcf7-not-valid-tip,
	.wpcf7 .form-group label,
	.wpcf7 .form-group .wpcf7-not-valid-tip,
	.projects-item .project-title,
	.product_meta,
	.btn.btn-wide,
	.btn.btn-lg,
	.breadcrumb li:before {
		font-size: <?php echo esc_attr($anps_body_font_size); ?>px;
	}

	h1, .h1 { font-size: <?php echo esc_attr($anps_h1_font_size); ?>px; }
	h2, .h2 { font-size: <?php echo esc_attr($anps_h2_font_size); ?>px; }
	h3, .h3 { font-size: <?php echo esc_attr($anps_h3_font_size); ?>px; }
	h4, .h4 { font-size: <?php echo esc_attr($anps_h4_font_size); ?>px; }
	h5, .h5 { font-size: <?php echo esc_attr($anps_h5_font_size); ?>px; }

	nav.site-navigation,
	nav.site-navigation ul li a {
		font-size: <?php echo esc_attr($anps_menu_font_size); ?>px;
	}

	@media (min-width: 1200px) {
		nav.site-navigation ul li > ul.sub-menu a,
		header.site-header nav.site-navigation .main-menu .megamenu {
			font-size: <?php echo esc_attr($anps_submenu_font_size); ?>px;
		}
	}

    .top-bar {
        font-size: <?php echo esc_attr($anps_top_bar_font_size); ?>px;
    }

    .site-footer {
        font-size: <?php echo esc_attr($anps_footer_font_size); ?>px;
    }

    .copyright-footer {
        font-size: <?php echo esc_attr($anps_c_footer_font_size); ?>px;
    }

	@media (min-width: 1000px) {
		.page-header .page-title {
			font-size: <?php echo esc_attr($anps_page_heading_h1_font_size); ?>px;
		}

		.single .page-header .page-title {
			font-size: <?php echo esc_attr($anps_blog_heading_h1_font_size); ?>px;
		}
	}
	<?php
}

function anps_other_styles_css() {
	/* header height */
	$anps_classic_header_height = get_option('anps_classic_header_height', '70');
	if ($anps_classic_header_height < 70) {
		$anps_classic_header_height = 70;
	} else if ($anps_classic_header_height > 280) {
		$anps_classic_header_height = 280;
	};  ?>

	@media (min-width: 1200px) {
		header.classic:not(.sticky) .header-wrap {
			min-height: <?php echo esc_attr($anps_classic_header_height);?>px;
		}

		header.classic:not(.center) .header-wrap .logo + * {
			<?php $initial_margin = ($anps_classic_header_height - 45) / 2;?>
		 	margin-top: <?php echo esc_attr($initial_margin);?>px;
		}

		header.classic.center .header-wrap .logo {
			<?php $initial_margin = ($anps_classic_header_height - 75) / 2;?>
		 	margin-top: <?php echo esc_attr($initial_margin);?>px;
		}
	}
	<?php
}

function anps_theme_options_custom_css() {
	echo get_option( 'anps_custom_css', '');
}

/* Custom styles */
function anps_custom_styles() {
	anps_custom_styles_font_family();
	anps_custom_styles_font_size();
	anps_custom_styles_colors();
	anps_other_styles_css();
    anps_theme_options_custom_css();
}
