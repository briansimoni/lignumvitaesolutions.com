<?php
    $woocommerce_cart_page = get_option('anps_shopping_cart_header', 'hide');
    $class = 'site-header full-width';

    if(function_exists('woocommerce_mini_cart') && ($woocommerce_cart_page == 'always' || (is_woocommerce() && $woocommerce_cart_page=='shop_only'))) {
        $class .= ' full-width-has-cart';
    }

    if( get_option('anps_large_above_nav_style', '0') === '2' ) {
        $class .= ' above-nav-style-2';
    }

    if( get_option('anps_logo_background', '1') === '1' ) {
        $class .= ' logo-background';
    }
?>

<header class="<?php echo $class; ?>">
    <div class="container preheader-wrap">
        <!-- logo -->
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php
                echo wp_kses(anps_logo(), array(
                    'span' => array(
                        'class' => array(),
                        'style' => array(),
                    ),
                    'img' => array(
                        'class' => array(),
                        'src' => array(),
                        'style' => array(),
                        'alt' => array(),
                    )
                ));
                ?>
            </a>
        </div>
        <!-- /logo -->

        <?php if(is_active_sidebar('large-above-menu') && get_option('anps_home_classic_menu_type', 'top')=='style2') :
        ?>
            <?php if(get_option('anps_large_above_nav_style', 1) == 2 ){
                $large_class = " style-2";
            } else {
                $large_class = "";
            }?>
            <div class="large-above-menu<?php echo esc_attr($large_class);?>">
                <?php dynamic_sidebar('large-above-menu'); ?>
            </div>
        <?php endif; ?>
    </div><!-- /container -->
    <div class="header-wrap clearfix<?php echo esc_attr(anps_menu_is_centered()); ?>">
        <div class="container">
        <!-- Main menu & above nabigation -->
            <nav class="site-navigation">
                <?php if( get_option('anps_menu_button', '') == '1' ): ?>
                    <?php
                        $target = get_option('anps_menu_button_target', '_self');
                        if($target !== '0') {
                            $target = ' target="' . $target . '"';
                        } else {
                            $target = '';
                        }
                    ?>
                    <a href="<?php echo get_option('anps_menu_button_url', ''); ?>"<?php echo $target; ?>  class="menu-button"><i class="fa fa-globe"></i> <?php echo get_option('anps_menu_button_text', ''); ?></a>
                <?php endif; ?>
        
                <?php anps_get_menu(); ?>
            </nav>
            <!-- END Main menu and above navigation -->
        </div>
    </div>
</header>
