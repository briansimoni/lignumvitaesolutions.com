<?php
//Check classes/AnpsFramework.php for available field options and settings.
include_once(get_template_directory() . '/anps-framework/classes/AnpsOptions.php');
include_once(get_template_directory() . '/anps-framework/classes/AnpsStyle.php');
if (isset($_GET['save_page_setup'])) {
    $anps_options->anps_save_options("options_page_setup");
}
?>
<form action="themes.php?page=theme_options&sub_page=options_page_setup&save_page_setup" method="post">
    <div class="content-inner">
        <!-- Home page -->
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php esc_html_e('Home page', 'industrial'); ?></h3>
            </div>
            <div class="col-md-6">
                <?php $anps_style->anps_create_text_option('anps_slider_home_page', esc_html__('Slider shortcode', 'industrial'), esc_html__('Example: slider-1', 'industrial')); ?>
            </div>
        </div>
        <div class="row">
            <!-- Page setup -->
            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php esc_html_e('Page setup', 'industrial'); ?></h3>
            </div>
            <!-- Error page -->
            <div class="col-md-6">
                <?php $anps_style->anps_create_select('anps_error_page', $anps_style->anps_get_pages_array(), esc_html__('404 error page', 'industrial') );?>
            </div>
            <!-- Excerpt length -->
            <div class="col-md-6">
                <?php $anps_style->anps_create_number_option('anps_excerpt_length', 40, esc_html__('Excerpt length', 'industrial')); ?>
            </div>
            <!-- scroll to top -->
            <div class="col-md-6">
                <?php $anps_style->anps_create_checkbox('anps_scroll_to_top', esc_html__('Add "scroll to top" button', 'industrial'), '0');?>
            </div>

            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php esc_html_e('Portfolio', 'industrial'); ?></h3>
            </div>

            <!-- Portfolio single style -->
             <div class="col-md-6">
                <?php $anps_style->anps_create_text_option('anps_portfolio_slug', esc_html__('Portfolio slug', 'industrial')); ?>
             </div>

            <div class="col-md-6">
                <?php
                $anps_styles = array(
                    'style-1' => esc_html__('Style 1', 'industrial'),
                    'style-2' => esc_html__('Style 2', 'industrial'),
                    'style-3' => esc_html__('Style 3', 'industrial')
                );
                $anps_style->anps_create_select('anps_portfolio_single', $anps_styles, esc_html__('Portfolio single style', 'industrial'), 'style-1', '1');?>
            </div>

            <!-- Team -->
            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php esc_html_e('Team', 'industrial'); ?></h3>
            </div>
            <!-- Team slug -->
             <div class="col-md-6">
                <?php $anps_style->anps_create_text_option('anps_team_slug', esc_html__('Team slug', 'industrial')); ?>
             </div>
            <!-- Team member single page -->
            <div class="col-md-3">
                <?php $anps_style->anps_create_checkbox('anps_team_single_page', esc_html__('Team single page', 'industrial'), '1'); ?>
            </div>         
            <!-- END Team -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php esc_html_e('Post meta on blog / categories / tag / archive pages', 'industrial'); ?></h3>
            </div>
            <!-- Post meta enable/disable -->
            <?php $post_meta_arr = array(
                'anps_post_meta_comments'   => esc_html__('Comments', 'industrial'),
                'anps_post_meta_categories' => esc_html__('Categories', 'industrial'),
                'anps_post_meta_author'     => esc_html__('Author', 'industrial'),
                'anps_post_meta_date'       => esc_html__('Date', 'industrial')
            ); ?>
            <?php foreach($post_meta_arr as $key=>$item) :?>
                <div class="col-md-3">
                    <?php $anps_style->anps_create_checkbox($key, $item, '1'); ?>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-cog"></i><?php esc_html_e('Post meta on single post', 'industrial'); ?></h3>
            </div>
            <!-- Post meta enable/disable -->
            <?php $post_meta_arr = array(
                'anps_post_meta_comments_single'   => esc_html__('Comments', 'industrial'),
                'anps_post_meta_categories_single' => esc_html__('Categories', 'industrial'),
                'anps_post_meta_author_single'     => esc_html__('Author', 'industrial'),
                'anps_post_meta_date_single'       => esc_html__('Date', 'industrial'),
                'anps_post_meta_tags_single'       => esc_html__('Tags', 'industrial')
            ); ?>
            <?php foreach($post_meta_arr as $key=>$item) :?>
                <div class="col-md-3">
                    <?php $anps_style->anps_create_checkbox($key, $item, '1'); ?>
                </div>
            <?php endforeach; ?>

        </div>
    </div>

    <!-- Save form -->
    <?php $anps_options->anps_save_button(); ?>
</form>
