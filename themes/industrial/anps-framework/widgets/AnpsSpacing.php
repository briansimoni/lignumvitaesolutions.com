<?php

class AnpsSpacing extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'AnpsSpacings', esc_html__('AnpsThemes - Spacing', 'industrial'), array('description' => esc_html__('Add extra white space', 'industrial'))
        );
    }
    
    public static function anps_register_widget() {
        return register_widget("AnpsSpacing");
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('spacing' => '15'));
        $spacing = $instance['spacing'];

        if (!isset($spacing)) {
            $spacing = '15';
        }

        ?>
        <p>Add empty space height
        <span class="spacing-w"><input type="number" name="<?php echo esc_attr($this->get_field_name('spacing')); ?>" min="1" max="500" value="<?php echo esc_attr($spacing); ?>">
        px
        </span>

        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['spacing'] = $new_instance['spacing'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);

        $spacing = $instance['spacing'];

        echo $before_widget;
        ?>
        <div class="empty-space block" style="height:<?php echo esc_attr($spacing); ?>px;"></div>

        <?php
        echo $after_widget;
    }

}

add_action( 'widgets_init', array('AnpsSpacing', 'anps_register_widget'));
