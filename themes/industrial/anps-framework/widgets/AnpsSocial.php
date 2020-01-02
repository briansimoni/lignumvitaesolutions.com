<?php
class AnpsSocial extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'AnpsSocial', esc_html__('AnpsThemes - Social icons', 'industrial'), array('description' => esc_html__('Enter social icons to show on page', 'industrial'),)
        );

        add_action( 'admin_enqueue_scripts', array( $this, 'anps_enqueue_scripts' ) );
        add_action( 'admin_footer-widgets.php', array( $this, 'anps_print_scripts' ), 9999 );
    }
    
    public static function anps_register_widget() {
        return register_widget("AnpsSocial");
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
        $instance = wp_parse_args((array) $instance, array(
            'title'  => '',
            'social' => '',
            'target' => '',
            'style'  => ''
        ));

        $socials = explode('|', $instance['social']);
        ?>

        <!-- Title -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'industrial'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>

        <!-- Style -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php esc_html_e('Style', 'industrial'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('style')); ?>" name="<?php echo esc_attr($this->get_field_name('style')); ?>">
                <option value=""<?php if( esc_attr($instance['style']) == '' ) { echo ' selected'; } ?>><?php esc_html_e('Default', 'industrial'); ?></option>
                <option value="minimal"<?php if( esc_attr($instance['style']) == 'minimal' ) { echo ' selected'; } ?>><?php esc_html_e('Minimal', 'industrial'); ?></option>
                <option value="border"<?php if( esc_attr($instance['style']) == 'border' ) { echo ' selected'; } ?>><?php esc_html_e('Border', 'industrial'); ?></option>
                <option value="transparent-border"<?php if( esc_attr($instance['style']) == 'transparent-border' ) { echo ' selected'; } ?>><?php esc_html_e('Transparent border', 'industrial'); ?></option>
            </select>
        </p>

        <!-- Target -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php esc_html_e("Open links as", 'industrial'); ?></label>
            <?php $target_array = array("_self", "_blank", "_parent", "_top");?>
            <select id="<?php echo esc_attr($this->get_field_id('target')); ?>" name="<?php echo esc_attr($this->get_field_name('target')); ?>">
                <?php foreach($target_array as $key=>$item) : ?>
                <option <?php if ($key == $instance['target']) {
                        echo 'selected="selected"';
                    } ?> value="<?php echo esc_attr($key); ?>"><?php echo esc_html($item); ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <!-- Social Iconpickers -->
        <div data-anps-repeat>
            <!-- Social Icons field (hidden) -->
            <input data-anps-repeat-field id="<?php echo esc_attr($this->get_field_id('social')); ?>" name="<?php echo esc_attr($this->get_field_name('social')); ?>" type="hidden" value="<?php echo esc_attr($instance['social']); ?>">

            <!-- Repeater items wrapper -->
            <div class="anps-repeat-items" data-anps-repeat-items>
                <?php foreach($socials as $social) : ?>
                <div class="anps-repeat-item" data-anps-repeat-item>
                    <!-- Fields -->
                    <p>

                        <?php
                            $social = explode(';', $social);
                            $social_icon = '';
                            $icon_color = '';
                            $social_url = '';

                            if( isset($social[0]) ) {
                                 $social_icon = $social[0];
                            }

                            if( isset($social[1]) ) {
                                 $social_url = $social[1];
                            }

                            if( isset($social[2]) ) {
                                 $icon_color = $social[2];
                            }
                        ?>
                        <div class="anps-iconpicker">
                            <i class="fa <?php echo esc_attr($social_icon); ?>"></i>
                            <input type="text" value="<?php echo esc_attr($social_icon); ?>">
                            <button type="button"><?php esc_html_e('Select icon', 'industrial'); ?></button>
                        </div>
                    </p>
                    <p>
                        <input type="text" class="widefat" value="<?php echo esc_attr($social_url); ?>" />
                    </p>
                    <!-- Icon color -->
                    <p>
                        <input class="anps-color-picker" type="text" value="<?php echo esc_attr($icon_color); ?>" />
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
        $instance['target'] = $new_instance['target'];
        $instance['social'] = $new_instance['social'];
        $instance['style'] = $new_instance['style'];
        return $instance;
    }

    function widget($args, $instance) {
        extract($args, EXTR_SKIP);

        /* Title */
        $title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );

        /* Style */
        $style = '';

        if( isset($instance['style']) ) {
            $style = ' social-' . $instance['style'];
        }

        /* Socials */
        $socials = '';

        if( isset($instance['social']) ) {
            $socials = $instance['social'];
        }
        $socials = explode('|', $socials);

        /* Target */
        $target = "";

        if(isset($instance['target'] )) {
            $instance['target'] = $instance['target'] ;
        } else {
            $instance['target'] = "";
        }

        switch($instance['target']) {
            case 0 :
                $target = "_self";
                break;
            case 1 :
                $target = "_blank";
                break;
            case 2 :
                $target = "_parent";
                break;
            case 3 :
                $target = "_top";
                break;
            default :
                $target = "_self";
        }

        echo $before_widget;
        ?>
        <?php if( $title ) : ?>
        <h3 class="widget-title"><?php echo esc_html($title); ?></h3>
        <?php endif; ?>

        <ul class="social<?php echo esc_attr($style); ?>">
        <?php
            foreach($socials as $social) {
                $social = explode(';', $social);
                $social_icon = '';
                $social_url = '';
                $icon_color = '';

                if( isset($social[0]) ) {
                    $social_icon = $social[0];
                }

                if( isset($social[1]) ) {
                    $social_url = $social[1];
                }

                if( isset($social[2]) ) {
                    $icon_color = ' style="color: ' . $social[2] . ';"';
                }

                echo '<li>';
                if( $social_url != '' ) {
                    echo '<a href="' . esc_url($social_url) . '"' . $icon_color . ' target="' . esc_attr($target) . '"><i class="fa ' . esc_attr($social_icon) . '"></i></a>';
                } else {
                    echo '<span><i class="fa ' . esc_attr($social_icon) . '"></i></span>';
                }
                echo '</li>';
            }
        ?>
        </ul>

        <?php
        echo $after_widget;
    }
}
add_action( 'widgets_init', array('AnpsSocial', 'anps_register_widget'));
