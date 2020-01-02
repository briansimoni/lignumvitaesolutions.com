<?php
class AnpsGoogleMaps extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'AnpsGoogleMaps', esc_html__('AnpsThemes - Google Maps', 'industrial'), array('description' => esc_html__('Show Google Maps in sidebar and footer widget areas', 'industrial'),)
        );
    }
    
    public static function anps_register_widget() {
        return register_widget("AnpsGoogleMaps");
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title'  => '',
            'markers' => '',
            'zoom' => '',
            'height' => '',
        ));

        $markers = explode('|', $instance['markers']);
        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'industrial'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <!-- Zoom -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('zoom')); ?>"><?php esc_html_e('Zoom', 'industrial'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('zoom')); ?>" name="<?php echo esc_attr($this->get_field_name('zoom')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['zoom']); ?>" />
        </p>

        <!-- Height -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('height')); ?>"><?php esc_html_e('Height', 'industrial'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('height')); ?>" name="<?php echo esc_attr($this->get_field_name('height')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['height']); ?>" />
        </p>

        <!-- Markers -->
        <label><?php esc_html_e('Markers', 'industrial'); ?></label>
        <div data-anps-repeat>
            <!-- Social Icons field (hidden) -->
            <input data-anps-repeat-field id="<?php echo esc_attr($this->get_field_id('markers')); ?>" name="<?php echo esc_attr($this->get_field_name('markers')); ?>" type="hidden" value="<?php echo esc_attr($instance['markers']); ?>">

            <!-- Repeater items wrapper -->
            <div class="anps-repeat-items" data-anps-repeat-items>
                <?php foreach($markers as $marker) : ?>
                <div class="anps-repeat-item" data-anps-repeat-item>
                    <?php
                        $marker = explode(';', $marker);
                        $location = '';
                        $pin = '';
                        $info = '';

                        if( isset($marker[0]) ) {
                             $location = $marker[0];
                        }

                        if( isset($marker[1]) ) {
                             $pin = $marker[1];
                        }

                        if( isset($marker[2]) ) {
                             $info = $marker[2];
                        }
                    ?>

                    <!-- Location -->
                    <p>
                        <label><?php esc_html_e('Location', 'industrial'); ?></label>
                        <input type="text" class="widefat" value="<?php echo esc_attr($location); ?>" />
                    </p>

                    <!-- Marker Image (URL) -->
                    <p>
                        <label><?php esc_html_e('Pin', 'industrial'); ?></label>
                        <input type="text" class="widefat" value="<?php echo esc_attr($pin); ?>" />
                    </p>

                    <!-- Info -->
                    <p>
                        <label><?php esc_html_e('Info', 'industrial'); ?></label>
                        <input type="text" class="widefat" value="<?php echo esc_attr($info); ?>" />
                    </p>

                    <!-- Repeater buttons -->
                    <div class="anps-repeat-buttons">
                        <button class="anps-repeat-remove" type="button" data-anps-repeat-remove>-</button>
                        <button class="anps-repeat-add" type="button" data-anps-repeat-add>+</button>
                    </div>
                </div>
                <?php endforeach; ?>
             </div>
        </div>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['markers'] = $new_instance['markers'];
        $instance['zoom'] = $new_instance['zoom'];
        $instance['height'] = $new_instance['height'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);

        /* Title */
        $title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );

        /* Zoom */
        $zoom = '';

        if( isset($instance['zoom']) ) {
            $zoom = $instance['zoom'];
        }

        /* Height */
        $height = '';

        if( isset($instance['height']) ) {
            $height = $instance['height'];
        }

        /* Markers */
        $markers = '';

        if( isset($instance['markers']) ) {
            $markers = $instance['markers'];
            $markers = explode('|', $markers);
        }

        $markers_shortcodes = '';

        foreach($markers as $marker) {
            $marker = explode(';', $marker);
            $location = '';
            $pin = '';
            $info = '';

            if( isset($marker[0]) ) {
                 $location = $marker[0];
            }

            if( isset($marker[1]) ) {
                 $pin = $marker[1];
            }

            if( isset($marker[2]) ) {
                 $info = $marker[2];
            }

            $markers_shortcodes .= "[google_maps_item pin_url='{$pin}' location='{$location}']{$info}[/google_maps_item]";
        }

        echo $before_widget;
        ?>
        <?php if( $title ) : ?>
        <h3 class="widget-title"><?php echo esc_html($title); ?></h3>
        <?php endif; ?>

        <?php echo do_shortcode("[google_maps zoom='{$zoom}' height='{$height}']{$markers_shortcodes}[/google_maps]"); ?>

        <?php
        echo $after_widget;
    }
}
add_action( 'widgets_init', array('AnpsGoogleMaps', 'anps_register_widget'));
