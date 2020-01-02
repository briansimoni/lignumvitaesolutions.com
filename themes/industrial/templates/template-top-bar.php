<?php
// Number of widget areas in top bar:
$anps_top_bar_w_nr = 0;

if (is_active_sidebar( 'top-bar-left')) {
	$anps_top_bar_w_nr ++;
} if (is_active_sidebar( 'top-bar-right')) {
	$anps_top_bar_w_nr ++;
}
/* if no sidebars, don't display anything */
if ($anps_top_bar_w_nr == 0) {return;}

/* Calculate bootstrap grid class */
$anps_top_bar_col = "col-md-".(12 / $anps_top_bar_w_nr);
/* Desktop only add new class */
$class_mobile = '';
if(get_option('anps_global_topmenu_style')=='2') {
    $class_mobile = ' visible-lg-block';
} else if(get_option('anps_global_topmenu_style')=='4') {
    $class_mobile = ' top-bar-mobile-menu';
}
?>
<!--actual HTML output:-->
<div class="top-bar top-bar-style-<?php echo get_option('anps_global_top_bar_style', '1'); ?> clearfix<?php echo esc_attr(anps_is_transparent());?><?php echo esc_attr($class_mobile);?>">
    <div class="container">
        <div class="row">
            <?php
            //top-bar-left widget
            if (is_active_sidebar('top-bar-left')) : ?>
                <div class="<?php echo esc_attr($anps_top_bar_col); ?>">
                    <div class="top-bar-left">
                        <?php do_shortcode(dynamic_sidebar('top-bar-left'));?>
                    </div>
                </div>
            <?php endif;?>
            <?php
            //top-bar-right widget
            if (is_active_sidebar('top-bar-right')) : ?>
                <div class="<?php echo esc_attr($anps_top_bar_col); ?>">
                    <div class="top-bar-right">
                        <?php do_shortcode(dynamic_sidebar('top-bar-right'));?>
                    </div>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>
