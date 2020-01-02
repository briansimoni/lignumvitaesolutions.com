<header class="site-header<?php echo esc_attr(anps_is_transparent()); ?><?php echo esc_attr(anps_is_bellowmenu()); ?><?php echo esc_attr(anps_menu_is_centered()); ?>">
    <div class="container">
        <div class="header-wrap clearfix row">
            <!-- logo -->
            <div class="logo pull-left">
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

            <!-- Large above nav (next to main navigation) -->
            <?php if(is_active_sidebar('large-above-menu')) : ?>
                <div class="large-above-menu  large-above-menu-right">
                    <?php dynamic_sidebar('large-above-menu'); ?>
                </div>
            <?php endif; ?>
            <!-- /Large above nav (next to main navigation) -->

            <!-- Main menu & above navigation -->
            <nav class="site-navigation pull-right">
                <?php anps_get_menu(); ?>
            </nav>
            <!-- END Main menu and above navigation -->
        </div>
    </div><!-- /container -->
</header>
