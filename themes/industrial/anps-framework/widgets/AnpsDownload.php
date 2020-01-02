<?php

class AnpsDownload extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'AnpsDownload', esc_html__('AnpsThemes - Download', 'industrial'), array('description' => esc_html__('Choose a image to show on page', 'industrial'),)
        );
        add_action( 'admin_enqueue_scripts', array( $this, 'anps_enqueue_scripts' ) );
        add_action( 'admin_footer-widgets.php', array( $this, 'anps_print_scripts' ), 9999 );
    }
    
    public static function anps_register_widget() {
        return register_widget("AnpsDownload");
    }

    function anps_enqueue_scripts( $hook_suffix ) {
        wp_enqueue_style('fontawesome');
    }

    function anps_print_scripts() {
        ?>
        <script>
            jQuery(function($) {
                $(document).on('widget-added widget-updated', anpsColorPickerUpdate);
                $(document).ready(anpsColorPickerReady);
            });
        </script>
        <?php
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'file' => '', 'file_title' => '', 'icon'=>'', 'icon_color'=>'', 'bg_color'=>'', 'file_external'=>''));

        $file = $instance['file'];
        $file_external = $instance['file_external'];
        $title = $instance['title'];
        $file_title = $instance['file_title'];
        $icon = $instance['icon'];
        $icon_color = $instance['icon_color'];
        $bg_color = $instance['bg_color'];
        ?>
        <!-- Widget title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e("Title", 'industrial'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <!-- File title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('file_title')); ?>"><?php esc_html_e("File title", 'industrial'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('file_title')); ?>" name="<?php echo esc_attr($this->get_field_name('file_title')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['file_title']); ?>" />
        </p>
        <!-- File -->
        <p>
            <?php $files = get_children('post_type=attachment'); ?>
            <label for="<?php echo esc_attr($this->get_field_id('file')); ?>"><?php esc_html_e("File", 'industrial'); ?></label><br />
            <select id="<?php echo esc_attr($this->get_field_id('file')); ?>" name="<?php echo esc_attr($this->get_field_name('file')); ?>">
                <option value=""><?php esc_html_e("Select a file", 'industrial'); ?></option>
                <?php foreach ($files as $item) : ?>
                    <option <?php if ($item->guid == $file) {
                        echo 'selected="selected"';
                    } ?> value="<?php echo esc_attr($item->guid); ?>"><?php echo esc_html($item->post_title); ?></option>
            <?php endforeach; ?>
            </select>
        </p>
        <!-- Icon -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon')); ?>"><?php esc_html_e("Icon", 'industrial'); ?></label><br />
            <div class="anps-iconpicker">
                <i class="fa <?php echo esc_attr($icon); ?>"></i>
                <input type="text" value="<?php echo esc_attr($icon); ?>" id="<?php echo esc_attr($this->get_field_id('icon')); ?>" name="<?php echo esc_attr($this->get_field_name('icon')); ?>">
                <button type="button"><?php esc_html_e('Select icon', 'industrial'); ?></button>
            </div>
        </p>
        <!-- Icon color -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icon_color')); ?>"><?php esc_html_e("Icon color", 'industrial'); ?></label><br />
            <input class="anps-color-picker" id="<?php echo esc_attr($this->get_field_id('icon_color')); ?>" name="<?php echo esc_attr($this->get_field_name('icon_color')); ?>" type="text" value="<?php echo esc_attr($instance['icon_color']); ?>" />
        </p>
        <!-- Background color -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('bg_color')); ?>"><?php esc_html_e("Background color", 'industrial'); ?></label><br />
            <input class="anps-color-picker" id="<?php echo esc_attr($this->get_field_id('bg_color')); ?>" name="<?php echo esc_attr($this->get_field_name('bg_color')); ?>" type="text" value="<?php echo esc_attr($instance['bg_color']); ?>" />
        </p>
        <!-- File external -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('file_external')); ?>"><?php esc_html_e("File external", 'industrial'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('file_external')); ?>" name="<?php echo esc_attr($this->get_field_name('file_external')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['file_external']); ?>" />
        </p>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['file'] = $new_instance['file'];
        $instance['file_external'] = $new_instance['file_external'];
        $instance['title'] = $new_instance['title'];
        $instance['file_title'] = $new_instance['file_title'];
        $instance['icon'] = $new_instance['icon'];
        $instance['icon_color'] = $new_instance['icon_color'];
        $instance['bg_color'] = $new_instance['bg_color'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);
        $title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );

        /* File */
        $file = '';
        if( isset($instance['file']) ) {
           $file = $instance['file'];
        }

        /* File external */
        $file_external = '';
        if( isset($instance['file_external']) ) {
           $file_external = $instance['file_external'];
        }

        /* File title */
        $file_title = '';
        if( isset($instance['file_title']) ) {
           $file_title = $instance['file_title'];
        }

        $icon = $instance['icon'];
        $icon_color = $instance['icon_color'];
        $bg_color = $instance['bg_color'];

        if($file) {
            $file_url = $file;
        } elseif($file_external) {
            $file_url = $file_external;
        } else {
            $file_url = "#";
        }

        echo $before_widget;
        ?>

        <?php if($title) : ?>
            <h3 class="widget-title"><?php echo esc_html($title); ?></h3>
        <?php endif; ?>
            <div class="download">
                <a href="<?php echo esc_url($file_url); ?>" target="_blank" style="background-color: <?php echo esc_attr($bg_color); ?>">
                    <span class="download-icon"><i class="fa <?php echo esc_attr($icon); ?>" style="color: <?php echo esc_attr($icon_color); ?>"></i></span>
                    <span class="download-title" style="color: <?php echo esc_attr($icon_color); ?>"><?php echo esc_html($file_title); ?></span>
                </a>
            </div>
        <?php
        echo $after_widget;
    }
}

add_action( 'widgets_init', array('AnpsDownload', 'anps_register_widget'));
