<?php

class AnpsMiniCart extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'AnpsMiniCart', esc_html__('AnpsThemes - Mini Cart', 'industrial'), array('description' => esc_html__('Woocommerce mini cart', 'industrial'),)
        );
    }
    
    public static function anps_register_widget() {
        return register_widget("AnpsMiniCart");
    }
    
    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        echo $before_widget;
        ?>
        <div class="mini-cart"><?php echo anps_mini_cart(); ?></div>
        <?php
        echo $after_widget;
    }

}
add_action( 'widgets_init', array('AnpsMiniCart', 'anps_register_widget'));
