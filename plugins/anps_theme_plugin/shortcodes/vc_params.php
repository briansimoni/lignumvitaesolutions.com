<?php
/* Remove Default VC values */
$vc_values = array(
    'vc_gmaps',
);
foreach ($vc_values as $vc_value) {
    vc_remove_element($vc_value);
}
/* VC change bootstrap classes */
add_filter( 'vc_shortcodes_css_class', 'anps_bootstrap_classes', 10, 2 );
function anps_bootstrap_classes( $class_string, $tag ) {
  if ( $tag == 'vc_column' || $tag == 'vc_column_inner' ) {
    if (get_option('anps_vc_column_class', 'md') === 'md') {
        $class_string = preg_replace( '/vc_col-sm-(\d{1,2})/', 'vc_col-md-$1', $class_string ); // This will replace "vc_col-sm-%" with "my_col-sm-%"
    }
  }
  return $class_string; // Important: you should always return modified or original $class_string
}
/* Add anps style to backend vc_tta_tabs dropdown */
vc_add_param('vc_btn', array(
    "name" => esc_html__("Anps button styles", 'anps_theme_plugin'),
    "type" => "dropdown",
    "heading" => esc_html__( 'Anps button style', 'js_composer' ),
    'param_name' =>'anps_style',
        'value' => array(
            esc_html__( 'Normal', 'js_composer' ) => 'btn-normal',
            esc_html__( 'Gradient', 'js_composer' ) => 'btn-gradient',
            esc_html__( 'Dark', 'js_composer' ) => 'btn-dark',
            esc_html__( 'Light', 'js_composer' ) => 'btn-light',
            esc_html__( 'Minimal', 'js_composer' ) => 'btn-minimal',
        ),
    'dependency' => array(
        'element' => 'style',
        'value' => array( 'anps' ),
    ),
    'weight' => 1,
    'description' => esc_html__( 'Styling can be defined in theme options.', 'js_composer' )
    )
);

vc_add_param('vc_btn', array(
        "name" => esc_html__("Button shadow", 'anps_theme_plugin'),
        'type' => 'checkbox',
        'heading' => esc_html__( 'Add shadow?', 'js_composer' ),
        'param_name' => 'add_shadow',
        'dependency' => array(
            'element' => 'style',
            'value' => array( 'anps' ),
        ),
        'weight' => 1,
    )
);
/* Remove vc notifications and set as theme */
function anps_vcSetAsTheme() {
    vc_set_as_theme(true);
}
add_action( 'vc_before_init', 'anps_vcSetAsTheme' );
/* Include custom categories */
vc_add_shortcode_param('blog_categories' , 'anps_blog_categories_settings_field');
vc_add_shortcode_param('portfolio_categories' , 'anps_portfolio_categories_settings_field');
vc_add_shortcode_param('all_pages' , 'anps_all_pages_settings_field');
