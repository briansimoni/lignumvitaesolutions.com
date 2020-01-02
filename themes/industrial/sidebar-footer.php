<?php
$footer_columns = get_option('anps_footer_style', '4');
$footer_enable = get_option('anps_enable_footer', '1');
$copyright_footer = get_option('anps_copyright_footer', '1');
$footer_mobile_columns = get_option('anps_mobile_footer_columns', '0');
$footer_style = get_option('anps_footer_design', 'default');

/*is any of the copyright footer widgets active? */
$display_copyright_footer = false;
if (is_active_sidebar( 'copyright-1') || is_active_sidebar( 'copyright-2' )) {
    $display_copyright_footer = true;
}

/*options for displaying copyright footer on mobile*/
$footer_class = "";

if($footer_mobile_columns == "1") {
    $footer_class = "col-xs-12";
} else {
    $footer_class = "col-xs-6";
} ?>


<?php //actual HTML output ?>

<footer class="site-footer site-footer-<?php echo $footer_style; ?>">
    <?php //Footer
    if($footer_enable=="1") : ?>
    <div class="container">
        <div class="row">
            <?php if($footer_columns=='2') : ?>
                <div class="col-md-6 <?php echo esc_attr($footer_class); ?>"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                <div class="col-md-6 <?php echo esc_attr($footer_class); ?>"><?php dynamic_sidebar( 'footer-2' ); ?></div>
            <?php elseif($footer_columns=='3') : ?>
                <div class="col-md-4 <?php echo esc_attr($footer_class); ?>"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                <div class="col-md-4 <?php echo esc_attr($footer_class); ?>"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                <div class="col-md-4 <?php echo esc_attr($footer_class); ?>"><?php dynamic_sidebar( 'footer-3' ); ?></div>
            <?php elseif($footer_columns=='4' || $footer_columns=='0') : ?>
                <div class="col-md-3 <?php echo esc_attr($footer_class); ?>"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                <div class="col-md-3 <?php echo esc_attr($footer_class); ?>"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                <div class="col-md-3 <?php echo esc_attr($footer_class); ?>"><?php dynamic_sidebar( 'footer-3' ); ?></div>
                <div class="col-md-3 <?php echo esc_attr($footer_class); ?>"><?php dynamic_sidebar( 'footer-4' ); ?></div>
            <?php endif; ?>
	   </div>
    </div>
    <?php endif; ?>

<?php //Copyright footer
if ($display_copyright_footer == true) : ?>
    <div class="copyright-footer">
        <div class="container">
            <div class="row">
                <?php if($copyright_footer=="1" || $copyright_footer=="0") : ?>
                    <div class="text-center col-md-12"><?php dynamic_sidebar( 'copyright-1' ); ?></div>
                <?php elseif($copyright_footer=="2") : ?>
                    <div class="col-md-6"><?php dynamic_sidebar( 'copyright-1' ); ?></div>
                    <div class="col-md-6 text-right"><?php dynamic_sidebar( 'copyright-2' ); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif;?>
</footer>
