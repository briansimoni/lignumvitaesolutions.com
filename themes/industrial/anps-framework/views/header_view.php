<?php
include_once(get_template_directory() . '/anps-framework/classes/AnpsOptions.php');

/* Enqueue style in script for custom colorpicker */
wp_enqueue_style('anps_colorpicker');
wp_enqueue_script('anps_colorpicker_theme');
wp_enqueue_script('anps_colorpicker_custom');

wp_enqueue_script('my-upload');
wp_enqueue_style("thickbox");


if (isset($_GET['save_options'])) {
    $anps_options->anps_save_options("header");
}
?>

<form action="themes.php?page=theme_options&sub_page=header&save_options" method="post">
    <div class="content-inner">
        <div class="row">

            <div class="col-md-12">
                <h3><i class="fa fa-bars"></i><?php esc_html_e('Menu Layout Options', 'industrial'); ?></h3>
            </div>

            <div class="global-layout">

                <?php $radiooptions = array (
                    'classic-layout' => array (
                        'imgbefore' => '<div class="imagewrap">',
                        'image' => 'top-background-menu.jpg',
                        'imgafter' => '</div>',
                        'value' => 'classic-layout',
                    ),
                    'vertical-layout' => array (
                        'imgbefore' => '<div class="imagewrap">',
                        'image' => 'vertical-menu.jpg',
                        'imgafter' => '</div>',
                        'value' => 'vertical-layout',
                    )
                );

                $anps_options->anps_create_radio('anps_global_menu_type', $radiooptions, 'col-xs-6 col-xxs-12 headerstyles', true, "", "classic-layout", true );?>

                <div class="options-to-toggle">

                    <div class="col-md-12 show-classic-layout onoff">

                        <h4><span><?php esc_html_e('Set Your Header Options', 'industrial');?></span></h4>
                        <p><?php esc_html_e('You have 2 menu/header option to set. Each option has additional settings which corespond to its style, with different variations you can customise you menu/header in numerious ways.', 'industrial'); ?></p>

                        <div class="row">

                            <?php $horizontal_options = array (
                                'top' => array (
                                    'image' => 'top-background-menu.jpg',
                                    'value' => 'top',
                                ),
                                'style2' => array (
                                    'image' => 'top-style-2-background-menu.jpg',
                                    'value' => 'style2',
                                ),
                                'bottom' => array (
                                    'image' => 'bottom-background-menu.jpg',
                                    'value' => 'bottom',
                                ),
                                'style4' => array (
                                    'image' => 'logo-middle-menu.jpg',
                                    'value' => 'style4',
                                )
                            );

                            $anps_options->anps_create_radio('anps_home_classic_menu_type', $horizontal_options, 'col-md-3 col-sm-4 col-xs-6 col-xxs-12 top-or-bottom', true, '', 'top' );?>
                            <div class="clearfix"></div>

                            <div class="options-to-toggle">
                                <div class="col-md-12">
                                    <h4><?php printf(esc_html__('Set Your %s Home Page %s Menu Options', 'industrial'), '<span>', '</span>');?></h4>
                                </div>
                                <!-- Text color -->
                                <div class="col-md-4">
                                    <?php $anps_options->anps_create_color_option('anps_front_text_color', '', esc_html__('Text color', 'industrial') );?>
                                </div>

                                <!-- Background color -->
                                <div class="col-md-4 dimmreverse">
                                    <?php $anps_options->anps_create_color_option('anps_front_bg_color', '', esc_html__('Background color', 'industrial') );?>
                                </div>

                                <!-- Text hover color -->
                                <div class="col-md-4">
                                    <?php $anps_options->anps_create_color_option('anps_front_text_hover_color', '', esc_html__('Text hover color', 'industrial') );?>
                                </div>

                                <!-- Above menu background color -->
                                <div class="col-md-4 onoff show-style2">
                                    <?php $anps_options->anps_create_color_option('anps_above_menu_bg_color', '', esc_html__('Above menu background color', 'industrial') );?>
                                </div>

                                <!-- Logo background color -->
                                <div class="col-md-4 onoff show-style2">
                                    <?php $anps_options->anps_create_color_option('anps_logo_bg_color', '', esc_html__('Logo background color', 'industrial') );?>
                                </div>

                                <!-- Menu centered checkbox -->
                                <div class="col-md-4 onoff show-top show-style2 show-bottom">
                                    <?php
                                    $menu_positions = array(
                                        2 => esc_html__('Left', 'industrial'),
                                        1 => esc_html__('Center', 'industrial'),
                                        3 => esc_html__('Right', 'industrial'),
                                    );
                                    $anps_options->anps_create_select('anps_front_menu_center', $menu_positions, esc_html__('Menu position', 'industrial'));
                                    ?>
                                </div>

                               <!-- top bar color -->
                                <div class="col-md-4 onoff show-top dimm">
                                    <?php $anps_options->anps_create_color_option('anps_front_topbar_color', '', esc_html__('Top bar color', 'industrial') );?>
                                </div>

                                <!-- Menu transparent checkbox -->
                                <div class="col-md-4 dimm-master onoff show-top show-bottom">
                                    <?php $anps_options->anps_create_checkbox('anps_front_transparent_header', esc_html__('Transparent header', 'industrial') );?>
                                </div>
                                <!-- Menu height -->
                                <div class="col-md-4 dimm-master onoff show-top">
                                    <?php $anps_options->anps_create_number_option('anps_classic_header_height',"", esc_html__('Header height', 'industrial'), 'px',  esc_html__('Accepts values between 70 and 280', 'industrial') );?>
                                </div>

                                <!-- Set global checkbox -->
                                <div class="col-md-4 onoff show-top set-global show-style2">
                                    <?php $anps_options->anps_create_checkbox('anps_set_settings_as_global_header', esc_html__('Set this settings as global', 'industrial'), '0');?>
                                </div>
                            </div>

                            <div class="options-to-toggle show-style2">
                                <!-- Menu button checkbox -->
                                <div class="col-md-4 onoff dimm-master show-style2">
                                    <?php $anps_options->anps_create_checkbox('anps_menu_button', esc_html__('Menu button', 'industrial') );?>
                                </div>

                                <!-- Menu button text -->
                                <div class="col-md-4 onoff dimm show-style2">
                                    <?php $anps_options->anps_create_text_option('anps_menu_button_text', esc_html__('Menu button text', 'industrial') );?>
                                </div>

                                <!-- Menu button URL -->
                                <div class="col-md-4 onoff dimm show-style2">
                                    <?php $anps_options->anps_create_text_option('anps_menu_button_url', esc_html__('Menu button URL', 'industrial') );?>
                                </div>

                                <!-- Menu button target -->
                                <div class="col-md-4 onoff dimm show-style2">
                                    <?php $menu_button_target = array('_self' => '_self', '_blank' => '_blank', '_parent' => '_parent', '_top' => '_top');
                                    $anps_options->anps_create_select('anps_menu_button_target', $menu_button_target,  esc_html__('Menu button target', 'industrial'));?>
                                </div>

                                <!--Large above nav style-->
                                <div class="col-md-4 onoff show-style2">
                                    <?php $large_above_nav_style = array('1'=>esc_html__('Style 1', 'industrial'), '2'=>esc_html__('Style 2', 'industrial'));
                                    $anps_options->anps_create_select('anps_large_above_nav_style', $large_above_nav_style,  esc_html__('Large above navigation style', 'industrial'));?>
                                </div>
                            </div>
                        </div>

                        <div class="row global-options">

                            <div class="col-md-12 ">
                                <h4><?php printf(esc_html__('Set Your %s Global Menu %s Options', 'industrial'), '<span>', '</span>'); ?></h4>

                                <p><?php printf(esc_html__('These options apply globaly - on all pages. %s For additional customization, you can override these options on each page individually. %s', 'industrial'), '<span class="blue">', '</span>');?></p>

                            </div>


                            <!-- Menu transparent checkbox -->
                            <div class="col-md-6 dimm-master hideifstle2" >
                                <?php $anps_options->anps_create_checkbox('anps_global_transparent_header', esc_html__('Transparent header', 'industrial'), '0' );?>
                            </div>

                              <!-- Menu centered checkbox -->
                            <div class="col-md-6 hideifstyle4">
                                <?php
                                $menu_positions = array(
                                    2 => esc_html__('Left', 'industrial'),
                                    1 => esc_html__('Center', 'industrial'),
                                    3 => esc_html__('Right', 'industrial'),
                                );
                                $anps_options->anps_create_select('anps_global_menu_center', $menu_positions, esc_html__('Menu position', 'industrial'));
                                ?>
                            </div>

                            <!-- Text color -->
                            <div class="col-md-4 dimm">
                                <?php $anps_options->anps_create_color_option('anps_global_text_color', '', esc_html__('Text color', 'industrial') );?>
                            </div>

                            <!-- Text hover color -->
                            <div class="col-md-4 dimm">
                                <?php $anps_options->anps_create_color_option('anps_global_text_hover_color', '', esc_html__('Text hover color', 'industrial') );?>
                            </div>

                           <!-- top bar color -->
                            <div class="col-md-4 onoff show-top dimm">
                                <?php $anps_options->anps_create_color_option('anps_global_topbar_color', '', esc_html__('Top bar color', 'industrial') );?>
                            </div>



                        </div>

                    </div>
                    <div class="col-md-12 show-vertical-layout onoff">

                        <h3><i class="fa fa-bars"></i><?php esc_html_e('Set Your Global Menu Vertical Options', 'industrial'); ?></h3>
                        <p><?php esc_html_e('This options will be applied on all pages (including the home page).', 'industrial'); ?></p>
                        <div class="row">
                          <!-- Text color -->
                              <div class="col-md-4">
                                  <?php $anps_options->anps_create_color_option('anps_vertical_divider_color', '', esc_html__('Divider color', 'industrial') );?>
                              </div>

                            <!-- Background upload -->
                            <div class="col-md-4 ">
                                <?php $anps_options->anps_create_upload('anps_vertical_menu_background', esc_html__('Background image', 'industrial'), false );?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <h3><i class="fa fa-bars"></i><?php esc_html_e('Global Header Options', 'industrial'); ?></h3>
                <div class="row">

                    <!--Top bar select-->
                    <div class="col-md-4">
                        <?php
                        $top_bar_options = array(
                            '1'=> esc_html__('Yes', 'industrial'),
                            '3'=> esc_html__('No', 'industrial'),
                            '2' => esc_html__('Only on desktop', 'industrial'),
                            '4' => esc_html__('On desktop & inside mobile menu', 'industrial')
                        );
                        $anps_options->anps_create_select('anps_global_topmenu_style', $top_bar_options,  esc_html__('Display top bar', 'industrial'));?>
                    </div>

                    <!--Top bar style-->
                    <div class="col-md-4">
                        <?php $top_bar_style_options = array('1'=>esc_html__('Style 1', 'industrial'), '2'=>esc_html__('Style 2', 'industrial'));
                        $anps_options->anps_create_select('anps_global_top_bar_style', $top_bar_style_options,  esc_html__('Top bar style', 'industrial'));?>
                    </div>

                    <!-- Set above nav bar checkbox -->
                    <div class="col-md-4">
                        <?php
                        $above_nav_options = array(
                            '1' => esc_html__('on', 'industrial'),
                            '2' => esc_html__('off', 'industrial'),
                        );
                        $anps_options->anps_create_select('anps_global_above_nav_bar', $above_nav_options,  esc_html__('Display above menu bar', 'industrial') );?>
                    </div>

                    <!-- Sticky menu checkbox -->
                    <div class="col-md-4">
                       <?php $anps_options->anps_create_checkbox('anps_sticky_menu', esc_html__('Sticky menu', 'industrial'), '1');?>
                    </div>

                    <!-- Sticky menu mobile checkbox -->
                    <div class="col-md-4">
                       <?php $anps_options->anps_create_checkbox('anps_sticky_menu_mobile', esc_html__('Sticky menu mobile', 'industrial'), '');?>
                    </div>

                    <!-- Display search mobile checkbox -->
                    <div class="col-md-4">
                       <?php $anps_options->anps_create_checkbox('anps_global_search_icon_mobile', esc_html__('Display search on mobile and tablets?', 'industrial'), '1');?>
                    </div>

                    <!-- Display search desktop checkbox -->
                    <div class="col-md-4">
                       <?php $anps_options->anps_create_checkbox('anps_global_search_icon', esc_html__('Display search icon in menu (desktop)?', 'industrial'), '1');?>
                    </div>

                    <!-- Enable menu walker for our mega menu -->
                    <div class="col-md-4">
                        <?php $anps_options->anps_create_checkbox('anps_global_menu_walker', esc_html__('Enable menu walker (mega menu)', 'industrial'), '1');?>
                    </div>

                    <!-- Logo Background -->
                    <div class="col-md-4">
                        <?php $anps_options->anps_create_checkbox('anps_logo_background', esc_html__('Display background color behind logo', 'industrial'), '1');?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <h3><i class="fa fa-bars"></i> <?php esc_html_e('Heading Backgrounds', 'industrial'); ?></h3>
                <h4><?php esc_html_e('Select Your Heading Backgrounds', 'industrial'); ?></h4>
                <p><?php esc_html_e('The selected bacground will apply globaly over all pages. On each page you can upload its own background which will override the current
                setting in this panel for that page alone.', 'industrial'); ?></p><br><br>
            </div>

            <!-- Page heading background upload -->
            <div class="col-md-4 ">
                <?php $anps_options->anps_create_upload('anps_page_heading_bg', esc_html__('Page heading background', 'industrial'), true );?>
            </div>

            <!-- Search page content background upload -->
            <div class="col-md-4 ">
                <?php $anps_options->anps_create_upload('anps_search_content_bg', esc_html__('Search page content background', 'industrial'), true );?>
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $anps_options->anps_save_button(); ?>
</form>
