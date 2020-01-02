<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

echo '<a title="' . esc_html__( 'Proceed to checkout', 'woocommerce' ) . '" href="' . esc_url( wc_get_checkout_url() ) . '" class="checkout-button btn btn-lg alt wc-forward">' . esc_html__( 'Proceed to checkout', 'woocommerce' ) . '</a>';
