<?php

class AnpsButton extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'AnpsButton', esc_html__('AnpsThemes - Button', 'industrial'), array('description' => __('Displays the theme button.', 'industrial'),)
        );
        add_action( 'admin_enqueue_scripts', array( $this, 'anps_enqueue_scripts' ) );
        add_action( 'admin_footer-widgets.php', array( $this, 'anps_print_scripts' ), 9999 );
    }
    
    public static function anps_register_widget() {
        return register_widget("AnpsButton");
    }

    function anps_enqueue_scripts( $hook_suffix ) {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
    }

    function anps_print_scripts() {
        ?>
        <script>
            ( function( $ ){
                function initColorPicker( widget ) {
                    widget.find( '.anps-color-picker' ).wpColorPicker();
                }

                function onFormUpdate( event, widget ) {
                    initColorPicker( widget );
                }

                $( document ).on( 'widget-added widget-updated', onFormUpdate );
                $( document ).ready( function() {
                    $( '#widgets-right .widget:has(.anps-color-picker)' ).each( function () {
                        initColorPicker( $( this ) );
                    } );
                } );
            }( jQuery ) );
        </script>
        <?php
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
                'text'   => '',
                'link'   => '',
                'target' => '',
                'size'   => '',
                'style'  => '',
                'align'  => ''
            )
        );

        $target_options = array('_self', '_blank', '_parent', '_top');
        $size_options = array('Small', 'Medium', 'Large');
        $style_options = array(
            esc_html__('Normal button', 'industrial')        => 'btn-normal',
            esc_html__('Button with gradient', 'industrial') => 'btn-gradient btn-shadow',
            esc_html__('Dark button', 'industrial')          => 'btn-dark btn-shadow',
            esc_html__('Light button', 'industrial')         => 'btn-light',
            esc_html__('Minimal button', 'industrial')       => 'btn-minimal'
        );
        $align_options = array('Left', 'Right', 'Center');
        ?>

        <!-- Text -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php _e('Text', 'industrial'); ?></label><br />
            <input id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['text']); ?>" />
        </p>

        <!-- Link -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php _e('Link', 'industrial'); ?></label><br />
            <input id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['link']); ?>" />
        </p>

        <!-- Target -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php _e('Target', 'industrial'); ?></label><br />
            <select id="<?php echo esc_attr($this->get_field_id('target')); ?>" name="<?php echo esc_attr($this->get_field_name('target')); ?>">
                <?php foreach ($target_options as $target):
                    $selected = $target == $instance['target'] ? ' selected': '';
                ?>
                    <option value="<?php echo esc_attr($target); ?>"<?php echo $selected; ?>><?php echo esc_html($target); ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <!-- Size -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php _e('Size', 'industrial'); ?></label><br />
            <select id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>">
                <?php foreach ($size_options as $size):
                    $selected = sanitize_title($size) == $instance['size'] ? ' selected': '';
                ?>
                    <option value="<?php echo esc_attr(sanitize_title($size)); ?>"<?php echo $selected; ?>><?php echo esc_html($size); ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <!-- Style -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('size')); ?>"><?php _e('Style', 'industrial'); ?></label><br />
            <select id="<?php echo esc_attr($this->get_field_id('style')); ?>" name="<?php echo esc_attr($this->get_field_name('style')); ?>">
                <?php foreach ($style_options as $label => $val):
                    $selected = $val == $instance['style'] ? ' selected': '';
                ?>
                    <option value="<?php echo esc_attr($val); ?>"<?php echo $selected; ?>><?php echo esc_html($label); ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <!-- Align -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('align')); ?>"><?php _e('Align', 'industrial'); ?></label><br />
            <select id="<?php echo esc_attr($this->get_field_id('align')); ?>" name="<?php echo esc_attr($this->get_field_name('align')); ?>">
                <?php foreach ($align_options as $align):
                    $selected = sanitize_title($align) == $instance['align'] ? ' selected': '';
                ?>
                    <option value="<?php echo esc_attr(sanitize_title($align)); ?>"<?php echo $selected; ?>><?php echo esc_html($align); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['text'] = $new_instance['text'];
        $instance['link'] = $new_instance['link'];
        $instance['target'] = $new_instance['target'];
        $instance['size'] = $new_instance['size'];
        $instance['style'] = $new_instance['style'];
        $instance['align'] = $new_instance['align'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);

        $text = isset($instance['text']) ? $instance['text'] : '';
        $link = isset($instance['link']) ? $instance['link'] : '#';
        $target = isset($instance['target']) ? $instance['target'] : '_self';
        $size = isset($instance['size']) ? $instance['size'] : 'medium';
        $style = isset($instance['style']) ? $instance['style'] : 'style-1';
        $align = isset($instance['align']) ? $instance['align'] : 'left';

        switch($size) {
            case 'large': $size = 'lg'; break;
            case 'medium': $size = 'md'; break;
            case 'small': $size = 'sm'; break;
        }

        echo $before_widget;
        ?>
        <div class="text-<?php echo esc_attr($align); ?>">
            <a href="<?php echo esc_attr($link); ?>"
               target="<?php echo esc_attr($target); ?>"
               class="btn <?php echo esc_attr($style); ?> btn-<?php echo esc_attr($size); ?>">
               <?php echo esc_html($text); ?>
           </a>
       </div>
        <?php
        echo $after_widget;
    }

}

add_action( 'widgets_init', array('AnpsButton', 'anps_register_widget'));
