<?php
/*
 * Plugin Name:  Anps Menu Widget
 * Plugin URI:   http://anpsthemes.com
 * Description:  Anps menu widget in two columns.
 * Version:      1.0
 * Author:       Anpsthemes
 * Author URI:   http://anpsthemes.com

/**
 * Anps Menu Widget class
 *
 * @since 1.0
 */
class AnpsMenuWidget extends WP_Widget {

    /**
     * construct
     */
    function __construct() {
        $widget_ops  = array(
            'classname'   => 'anps_menu_widget',
            'description' => esc_html__( 'Double column menu display. Only one level menu supported', 'industrial' )
        );
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'anps_menu' );
        parent::__construct( 'anps_menu', esc_html__( 'AnpsThemes - Menu', 'industrial' ), $widget_ops, $control_ops );
    }
    
    public static function anps_register_widget() {
        return register_widget("AnpsMenuWidget");
    }

    /**
     * Display widget
     */
    public function widget( $args, $instance ) {
        $nav_menu = wp_get_nav_menu_object( $instance['nav_menu'] );
        if ( ! $nav_menu ) {
                return;
        }
        $instance['title'] = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
        }
        
        wp_nav_menu( array(
                'fallback_cb' => '',
                'menu'        => $nav_menu,
                'container'   => false
        ) );

        echo $args['after_widget'];
    }

    public function update( $new_instance, $old_instance ) {
        $instance['title']      = sanitize_text_field( $new_instance['title'] );
        $instance['nav_menu']   = $new_instance['nav_menu'];
        return $instance;
    }

    /**
     * form
     */
    public function form( $instance ) { 
        $title      = isset( $instance['title'] ) ? $instance['title'] : '';
        $nav_menu   = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';

        // Get menus list
        $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

        // If no menu exists, direct the user to create some.
        if ( ! $menus ) {
            echo '<p>' . sprintf( esc_html__( 'No menus have been created yet. <a href="%s">Create some</a>.', 'industrial' ), admin_url( 'nav-menus.php' ) ) . '</p>';
            return;
        }
        ?>

        <p><label
            for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'industrial' ) ?></label><input
            type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"
            name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_html( $title ); ?>"/>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'nav_menu' )); ?>"><?php esc_html_e( 'Select Menu:', 'industrial' ); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id( 'nav_menu' )); ?>"
                name="<?php echo esc_attr($this->get_field_name( 'nav_menu' )); ?>">
                <?php foreach ( $menus as $menu ) {
                    $selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
                    echo '<option' . $selected . ' value="' . $menu->term_id . '">' . $menu->name . '</option>';
                } ?>
            </select>
        </p>

    <?php }
} // end class
add_action( 'widgets_init', array('AnpsMenuWidget', 'anps_register_widget'));