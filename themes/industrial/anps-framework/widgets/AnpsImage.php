<?php

class AnpsImage extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'AnpsImages', esc_html__('AnpsThemes - Images', 'industrial'), array('description' => esc_html__('Choose a image to show on page', 'industrial'),)
        );
    }
    
    public static function anps_register_widget() {
        return register_widget("AnpsImage");
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'image' => ''));

        $image = $instance['image'];
        $title = $instance['title'];
        $images = get_children('post_type=attachment&post_mime_type=image');
        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e("Title", 'industrial'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <!-- Image -->
        <select id="<?php echo esc_attr($this->get_field_id('image')); ?>" name="<?php echo esc_attr($this->get_field_name('image')); ?>">
            <option value="">Select an image</option>
            <?php foreach ($images as $item) : ?>
                <option <?php if ($item->guid == $image) {
                    echo 'selected="selected"';
                } ?> value="<?php echo esc_attr($item->guid); ?>"><?php echo esc_html($item->post_title); ?></option>
        <?php endforeach; ?>
        </select>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['image'] = $new_instance['image'];
        $instance['title'] = $new_instance['title'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
        $image = $instance['image'];

        if(is_ssl()) {
            $image = str_replace('http:', 'https:', $image);
        }

        echo $before_widget;
        ?>

        <?php if(isset($title) && $title != '') : ?>
            <h3 class="widget-title"><?php echo esc_html($title); ?></h3>
        <?php endif; ?>

        <img alt="<?php echo get_bloginfo('name'); ?>" src="<?php echo esc_url($image); ?>" />

        <?php
        echo $after_widget;
    }

}

add_action( 'widgets_init', array('AnpsImage', 'anps_register_widget'));
