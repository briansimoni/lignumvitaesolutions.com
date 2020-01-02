<?php
include_once(get_template_directory() . '/anps-framework/classes/AnpsOptions.php');
include_once(get_template_directory() . '/anps-framework/classes/AnpsStyle.php');
if (isset($_GET['save_woo'])) {
    $anps_options->anps_save_options('woocommerce');
}
?>
<form action="themes.php?page=theme_options&sub_page=woocommerce&save_woo" method="post">
    <div class="content-inner">
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-shopping-basket"></i><?php esc_html_e('Settings', 'industrial'); ?></h3>
            </div>
            <div class="input col-md-4">
                <?php
                    $wooarray = array(
                        'hide'      => esc_html__('Never display', 'industrial'),
                        'shop_only' => esc_html__('only on Woo pages', 'industrial'),
                        'always'    => esc_html__('Display everywhere', 'industrial')
                    );
                    $anps_style->anps_create_select('anps_shopping_cart_header', $wooarray, esc_html__('Display shopping cart icon in header?', 'industrial') );
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-shopping-basket"></i><?php esc_html_e('Layout', 'industrial'); ?></h3>
            </div>
            <div class="input col-md-4">
                <?php
                    $woo_col_array = array(
                        'col-md-3' => esc_html__('4 columns', 'industrial'),
                        'col-md-4' => esc_html__('3 columns', 'industrial')
                    );
                    $anps_style->anps_create_select('anps_woo_products_layout', $woo_col_array, esc_html__('How many products in column?', 'industrial'), 1, 'col-md-3'  );
                ?>
            </div>
            <div class="input col-md-4">
                <?php $anps_style->anps_create_number_option('anps_products_per_page', '12', esc_html__('Products per page', 'industrial')); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3><i class="fa fa-shopping-basket"></i><?php esc_html_e('Product', 'industrial'); ?></h3>
            </div>
            <div class="input col-md-4">
                <?php $anps_style->anps_create_checkbox('anps_product_zoom', esc_html__('Product image zoom', 'industrial'), '1');?>
            </div>
            <div class="input col-md-4">
                <?php $anps_style->anps_create_checkbox('anps_product_lightbox', esc_html__('Product image lightbox', 'industrial'), '1');?>
            </div>
            <div class="input col-md-4">
                <?php $anps_style->anps_create_checkbox('anps_product_thumb_slider', esc_html__('Product thumbnails slider', 'industrial'), '');?>
            </div>
        </div>
    </div>

    <!-- Save form -->
    <?php $anps_options->anps_save_button(); ?>
</form>
