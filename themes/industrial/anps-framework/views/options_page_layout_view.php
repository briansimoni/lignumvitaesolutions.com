<?php
//Check classes/AnpsFramework.php for available field options and settings.
include_once(get_template_directory() . '/anps-framework/classes/AnpsOptions.php');
include_once(get_template_directory() . '/anps-framework/classes/AnpsStyle.php');
wp_enqueue_style('anps_colorpicker');
wp_enqueue_script('anps_colorpicker_theme');
wp_enqueue_script('anps_colorpicker_custom');
wp_enqueue_script("my-upload");
wp_enqueue_style("thickbox");
wp_enqueue_script('anps_pattern');

if (isset($_GET['save_page'])) {
     $anps_options->anps_save_options("options_page");
}
?>
<form action="themes.php?page=theme_options&sub_page=options_page&save_page" method="post">
    <div class="content-inner">
        <div class="row layout">
            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e("Page layout:", 'industrial'); ?></h3>
            </div>

            <div class="info col-md-6">
                <!-- Boxed -->
                <?php
                    if(get_option("anps_is_boxed", "0")=="0"){
                        $checked='';

                    } else {
                        $checked = 'checked';
                    }
                ?>

                <?php $anps_style->anps_create_checkbox('anps_is_boxed', esc_html__('Boxed version', 'industrial'), '0');?>

            </div>
            <div class="clearfix"></div>
            <!-- Pattern -->
            <div class="boxed-wrapper">
                <div id="pattern-select-wrapper">
                    <label class="col-md-12" for="anps_pattern"><?php esc_html_e("Choose a pattern:", 'industrial'); ?></label>
                    <div class="admin-patern-radio col-md-12 hidden">
                        <?php for($i = 0; $i < 10; $i++):
                            if(get_option('anps_pattern') == $i) {
                                $checked = 'checked';

                            } else {
                                $checked = '';

                            }
                            ?>
                            <input type="radio" id="anps_pattern" name="anps_pattern" value="<?php echo esc_attr($i); ?>" <?php echo esc_attr($checked); ?>/>
                        <?php endfor; ?>
                    </div>
                    <div class="admin-patern-select col-md-12">
                        <?php for ($i = 0; $i < 10; $i++) : ?>
                            <?php if (get_option('anps_pattern') == $i): ?>
                                <img id="selected-pattern" src="<?php echo get_template_directory_uri(); ?>/css/boxed/pattern-<?php echo esc_attr($i); ?>.png" />
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/css/boxed/pattern-<?php echo esc_attr($i); ?>.png" />
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
                <!-- Custom background -->
                <div class="input col-md-12" <?php if(get_option('anps_is_boxed', "0")=="0" || get_option('anps_pattern',"") != 0) echo 'style="display: none"'; ?> id="patern-type-wrapper">
                    <label for="anps_type"><?php esc_html_e("Custom background type", 'industrial' ); ?></label>
                    <div class="patern-type">
                        <?php $types = array(
                            'stretched' => esc_html__('Stretched', 'industrial'),
                            'tilled' => esc_html__('Tiled', 'industrial'),
                            'custom-color' => esc_html__('Custom color', 'industrial')
                        );
                        foreach ($types as $value => $type) :
                            if(get_option('anps_type', "") == $value) {
                                $checked='checked';
                            } else {
                                $checked = '';
                            }
                            ?>
                        <span class="onethird">
                            <input type="radio" id="back-type-<?php echo esc_attr($value); ?>" name="anps_type" value="<?php echo esc_attr($value); ?>" <?php echo esc_attr($checked); ?>/>
                            <label for="back-type-<?php echo esc_attr($value); ?>"><?php echo esc_attr($type); ?></label>
                        </span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Custom pattern -->
                <div class="col-md-12"  <?php if ( (get_option('anps_is_boxed', "0")=="0") || ( get_option('anps_pattern', "") != 0 ) ) echo 'style="display: none"'; ?> id="custom-patern-wrapper">
                    <?php $anps_style->anps_create_upload('anps_custom_pattern', esc_html__('Custom background image/pattern', 'industrial')); ?>
                </div>
                <!-- Custom background color -->

                <div id="custom-background-color-wrapper" class="col-md-12" >
                    <?php $anps_style->anps_create_color_option('anps_bg_color', 'transparent', esc_html__('Background color', 'industrial')); ?>
                </div>
            </div>

            <div class="info col-md-6">
                <!-- Shadow -->
                <?php
                    if(get_option('anps_shadows', '1')=='0'){
                        $checked='';

                    } else {
                        $checked = 'checked';
                    }
                ?>

                <?php $anps_style->anps_create_checkbox('anps_shadows', esc_html__('Display shadow on certain elements', 'industrial'), '1');?>

            </div>
        </div>
        <!-- Page Sidebars (global settings) -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e('Page Sidebars', 'industrial'); ?></h3>
                <p><?php esc_html_e('This will change the default sidebar value on all pages. It can be changed on each page individually.', 'industrial'); ?></p>
            </div>

            <!-- Left sidebar -->
            <div class="col-md-6">
                <?php $anps_style->anps_create_select( 'anps_page_sidebar_left', $anps_style->anps_get_sidebars_array(), esc_html__('Left sidebar', 'industrial'));?>
            </div>

            <!-- Right sidebar -->
            <div class="col-md-6">
                <?php $anps_style->anps_create_select( 'anps_page_sidebar_right', $anps_style->anps_get_sidebars_array(), esc_html__('Right sidebar', 'industrial'));?>
            </div>

            <div class="col-md-6">
                <?php $anps_style->anps_create_checkbox('anps_page_sidebar_after', esc_html__('Show sidebars on mobile after main content', 'industrial'));?>
            </div>

            <div class="col-md-6">
                <?php $anps_style->anps_create_checkbox('anps_page_sidebar_hide', esc_html__('Hide sidebars on mobile', 'industrial'));?>
            </div>

            <!-- Post Sidebars (global settings) -->
            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e("Post Sidebars", 'industrial'); ?></h3>
                <p><?php esc_html_e('This will change the default sidebar value on all posts. It can be changed on each post individually.', 'industrial'); ?></p>
            </div>

            <!-- Left sidebar -->
            <div class="col-md-6">
                <?php $anps_style->anps_create_select( 'anps_post_sidebar_left', $anps_style->anps_get_sidebars_array(), esc_html__('Left sidebar', 'industrial'));?>
            </div>

            <!-- Right sidebar -->
            <div class="col-md-6">
                <?php $anps_style->anps_create_select( 'anps_post_sidebar_right', $anps_style->anps_get_sidebars_array(), esc_html__('Right sidebar', 'industrial'));?>
            </div>

            <div class="col-md-6">
                <?php $anps_style->anps_create_checkbox('anps_post_sidebar_after', esc_html__('Show sidebars on mobile after main content', 'industrial'));?>
            </div>

            <div class="col-md-6">
                <?php $anps_style->anps_create_checkbox('anps_post_sidebar_hide', esc_html__('Hide sidebars on mobile', 'industrial'));?>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <h3 style="margin-bottom:0px;"><i class="fa fa-columns"></i><?php esc_html_e('Page Heading', 'industrial'); ?></h3>
            </div>
           <!-- Enable/Disable page title and background -->
            <div class="col-md-6">
                <?php $anps_style->anps_create_checkbox('anps_heading_status', esc_html__('Enable page heading and background', 'industrial'), '1');?>
            </div>
             <!-- Breadcrumbs enable/disable -->
            <div class="col-md-6">
                <?php $anps_style->anps_create_checkbox('anps_breadcrumbs_status', esc_html__('Enable breadcrumbs', 'industrial'), '1');?>
            </div>

        </div>

        <div class="row">
            <!-- Comments on page (enable/disable) -->
            <div class="col-md-12">
                <h3 style="margin-bottom:0px;"><i class="fa fa-columns"></i><?php esc_html_e('Page Comments', 'industrial'); ?></h3>
            </div>
            <div class="col-md-6">
                <?php $anps_style->anps_create_checkbox('anps_page_comments', esc_html__('Enable page comments', 'industrial'), '1');?>
            </div>
            <!-- END Comments on page (enable/disable) -->
            <!-- Mobile layout -->

            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e('Blog Layout', 'industrial'); ?></h3>
            </div>
            <div class="col-md-12">
                <p><?php esc_html_e('This option defines default display of blog, archive pages, categories and tags.', 'industrial'); ?></p>
                <?php $anps_options = array('col-md-12'=>esc_html__('1 column', 'industrial'), 'col-md-6'=>esc_html__('2 columns', 'industrial'), 'col-md-4'=>esc_html__('3 columns', 'industrial'), 'col-md-3'=>esc_html__('4 columns', 'industrial'));
                 $anps_style->anps_create_select('anps_blog_columns', $anps_options, false, 'col-md-12', '1') ;?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-columns"></i><?php esc_html_e('Visual Composer', 'industrial'); ?></h3>
            </div>
            <div class="col-md-12">
                <?php
                    $anps_options = array(
                        'md' => esc_html__('Medium - vc_col-md', 'industrial'),
                        'sm' => esc_html__('Small - vc_col-sm', 'industrial'),
                    );
                    $anps_style->anps_create_select('anps_vc_column_class', $anps_options, __('Default column class', 'industrial'), 'md', '1') ;
                ?>
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $anps_style->anps_save_button(); ?>
</form>
