<?php
include_once(get_template_directory() . '/anps-framework/classes/AnpsStyle.php');
include_once(get_template_directory() . '/anps-framework/classes/AnpsOptions.php');
/* Enqueue style in script for custom colorpicker */
wp_enqueue_style('anps_colorpicker');
wp_enqueue_script('anps_colorpicker_theme');
wp_enqueue_script('anps_colorpicker_custom');
/* Save form */
if(isset($_GET['save_style'])) {
    $anps_options->anps_save_options('theme_style');
}
?>

<form action="themes.php?page=theme_options&save_style" method="post">
    <div class="content-inner">
        <!-- Predefined Colors -->
        <div class="row" id="anps_predefined_colors">
            <div class="col-md-12">
                <h3><i class="fa fa-tint"></i><?php esc_html_e('Predefined Color Schemes', 'industrial'); ?></h3>
                <h4><?php esc_html_e('Choose a predefined color scheme', 'industrial'); ?></h4>
                <p><?php esc_html_e("The schemes will replace the below colors with the predefined ones, which you can then edit as you like. Don't forget to save the color changes.", 'industrial'); ?></p>
            </div>
            <div class="col-md-fifth col-sm-6">
                <div class="palette <?php if (get_option('anps_text_color', 'not_saved') == 'not_saved'){echo esc_attr('active');};?>">
                    <input class="hidden" type="radio" name="anps_predefined_colors" value="default" />
                    <span class="colorspan palette-1"></span>
                    <span class="colorspantext"><?php esc_html_e('Default', 'industrial'); ?></span>
                </div>
            </div>
            <div class="col-md-fifth col-sm-6">
                <div class="palette">
                    <input class="hidden" type="radio" name="anps_predefined_colors" value="orange" />
                    <span class="colorspan palette-2"></span>
                    <span class="colorspantext"><?php esc_html_e('Orange', 'industrial'); ?></span>
                </div>
            </div>
            <div class="col-md-fifth col-sm-6">
                <div class="palette">
                    <input class="hidden" type="radio" name="anps_predefined_colors" value="green" />
                    <span class="colorspan palette-3"></span>
                    <span class="colorspantext"><?php esc_html_e('Green', 'industrial'); ?></span>
                </div>
            </div>
            <div class="col-md-fifth col-sm-6">
                <div class="palette">
                    <input class="hidden" type="radio" name="anps_predefined_colors" value="red" />
                    <span class="colorspan palette-4"></span>
                    <span class="colorspantext"><?php esc_html_e('Red', 'industrial'); ?></span>
                </div>
            </div>
            <div class="col-md-fifth col-sm-6">
                <div class="palette">
                    <input class="hidden" type="radio" name="anps_predefined_colors" value="yellow" />
                    <span class="colorspan palette-5"></span>
                    <span class="colorspantext"><?php esc_html_e('Yellow', 'industrial'); ?></span>
                </div>
            </div>
        </div>

        <!-- Main Theme Colors -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-tint"></i><?php esc_html_e("Main Theme Colors", 'industrial'); ?></h3>
                <h4><?php esc_html_e('Set your custom colors', 'industrial'); ?></h4>
                <p><?php esc_html_e('Not satisfied with the premade color schemes? Here you can set your custom colors.', 'industrial'); ?></p>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_text_color', '898989', esc_html__('Text color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_primary_color', '3498db', esc_html__('Primary color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_hovers_color', '2a76a9', esc_html__('Hovers color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_headings_color', '000000', esc_html__('Headings color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_main_divider_color', '69cd72', esc_html__('Heading divider color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_important_bg_color', '69cd72', esc_html__('Important background color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_important_text_color', '32853a', esc_html__('Important text color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_primary_text_top', 'ffffff', esc_html__('Text on top of primary color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_mobile_toolbar_color', '', esc_html__('Mobile address bar color', 'industrial')); ?>
            </div>
        </div>

        <!-- HEADER COLORS -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-tint"></i><?php esc_html_e("Header Colors", 'industrial'); ?></h3>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_menu_text_color', 'ffffff', esc_html__('Menu text color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_options->anps_create_color_option('anps_menu_bg_color', '16242e', esc_html__('Menu background color', 'industrial') );?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_page_header_background_color', 'f8f9f9', esc_html__('Page header background color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_page_title', '4e4e4e', esc_html__('Page title color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_top_bar_color', '8c8c8c', esc_html__('Top bar text color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_top_bar_bg_color', '16242e', esc_html__('Top bar background color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_submenu_background_color', 'ffffff', esc_html__('Submenu background color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_submenu_text_color', '8c8c8c', esc_html__('Submenu text color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_submenu_text_hover_color', 'fff', esc_html__('Submenu text hover color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_submenu_divider_color', 'ececec', esc_html__('Submenu divider color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_woo_cart_items_number_bg_color', '3daaf3', esc_html__('Shopping cart item number background color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_woo_cart_items_number_color', '2f4d60', esc_html__('Shoping cart item number text color', 'industrial')); ?>
            </div>
        </div>

        <!-- FOOTER COLORS -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-tint"></i><?php esc_html_e("Footer Colors", 'industrial'); ?></h3>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_footer_bg_color', '171717', esc_html__('Footer background color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_footer_text_color', '7f7f7f', esc_html__('Footer text color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_footer_border_color', '2e2e2e', esc_html__('Footer border color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_footer_heading_text_color', 'ffffff', esc_html__('Footer heading text color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_c_footer_text_color', '9C9C9C', esc_html__('Copyright footer text color', 'industrial')); ?>
            </div>

            <div class="col-md-3 col-sm-6">
                <?php $anps_style->anps_create_color_option('anps_c_footer_bg_color', '', esc_html__('Copyright footer background color', 'industrial')); ?>
            </div>
        </div>

        <!-- Button Colors -->
        <div class="row">
            <div class="col-md-12 ">
                <h3><i class="fa fa-tint"></i><?php esc_html_e("Button Colors", 'industrial'); ?></h3>
            </div>
        </div>

        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e('Normal button', 'industrial');?></h4>
                <a class="btn btn-normal btn-md"><?php esc_html_e('Button', 'industrial');?></a>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg">
                <?php $anps_style->anps_create_color_option('anps_normal_button_bg', '3498db', esc_html__('Background color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c">
                <?php $anps_style->anps_create_color_option('anps_normal_button_color', 'ffffff', esc_html__('Text color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg-h">
                <?php $anps_style->anps_create_color_option('anps_normal_button_hover_bg', '2a76a9', esc_html__('Hover background color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c-h">
                <?php $anps_style->anps_create_color_option('anps_normal_button_hover_color', 'ffffff', esc_html__('Hover text color', 'industrial')); ?>
            </div>
        </div>

        <!-- Button with Gradient -->
        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e("Button with gradient", 'industrial');?></h4>
                <a class="btn btn-md btn-gradient btn-shadow"><?php esc_html_e('Button', 'industrial');?></a>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg">
                <?php $anps_style->anps_create_color_option('anps_gradient_button_bg', '3498db', esc_html__('Background color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c">
                <?php $anps_style->anps_create_color_option('anps_gradient_button_color', 'ffffff', esc_html__('Text color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg-h">
                <?php $anps_style->anps_create_color_option('anps_gradient_button_hover_bg', '2a76a9', esc_html__('Hover background color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c-h">
                <?php $anps_style->anps_create_color_option('anps_gradient_button_hover_color', 'ffffff', esc_html__('Hover text color', 'industrial')); ?>
            </div>
        </div>

        <!-- Button Dark -->
        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e("Dark button", 'industrial');?></h4>
                <a class="btn btn-md btn-dark btn-shadow"><?php esc_html_e('Button', 'industrial');?></a>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg">
                <?php $anps_style->anps_create_color_option('anps_dark_button_bg', '242424', esc_html__('Background color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c">
                <?php $anps_style->anps_create_color_option('anps_dark_button_color', 'ffffff', esc_html__('Text color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg-h">
                <?php $anps_style->anps_create_color_option('anps_dark_button_hover_bg', 'ffffff', esc_html__('Hover background color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c-h">
                <?php $anps_style->anps_create_color_option('anps_dark_button_hover_color', '242424', esc_html__('Hover text color', 'industrial')); ?>
            </div>
        </div>

        <!-- Button Light -->
        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e("Light button", 'industrial');?></h4>
                <a class="btn btn-md btn-light"><?php esc_html_e('Button', 'industrial');?></a>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg">
                <?php $anps_style->anps_create_color_option('anps_light_button_bg', 'ffffff', esc_html__('Background color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c">
                <?php $anps_style->anps_create_color_option('anps_light_button_color', '242424', esc_html__('Text color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-bg-h">
                <?php $anps_style->anps_create_color_option('anps_light_button_hover_bg', '242424', esc_html__('Hover background color', 'industrial')); ?>
            </div>
            <div class="col-md-3 col-sm-6 btn-c-h">
                <?php $anps_style->anps_create_color_option('anps_light_button_hover_color', 'ffffff', esc_html__('Hover text color', 'industrial')); ?>
            </div>
        </div>

        <!-- Button Minimal -->
        <div class="section button-wrap row">
            <div class="col-md-12 padding-bottom">
                <h4><?php esc_html_e("Button minimal", 'industrial');?></h4>
                <a class="btn btn-md btn-minimal" ><?php esc_html_e('Button', 'industrial');?></a>
            </div>
            <div class="col-md-6 col-sm-6 btn-c">
                <?php $anps_style->anps_create_color_option('anps_minimal_button_color', '3498db', esc_html__('Text color', 'industrial')); ?>
            </div>
            <div class="col-md-6 col-sm-6 btn-c-h">
                <?php $anps_style->anps_create_color_option('anps_minimal_button_hover_color', '2a76a9', esc_html__('Hover text color', 'industrial')); ?>
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $anps_options->anps_save_button(); ?>
</form>
