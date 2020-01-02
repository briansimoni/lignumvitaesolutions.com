<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

anps_left_sidebar();

$class = '';
$num_of_sidebars = anps_num_sidebars();

if( $num_of_sidebars > 0 ) {
    $class = 'page-content';
}

echo '<div class="' . $class . ' col-md-' . (12-esc_attr($num_of_sidebars)*3) . '">';