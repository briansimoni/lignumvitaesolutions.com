<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<div class="tabs tabs-default tabs-small">
		<div class="nav-tabs-wrap">
			<ul class="nav nav-tabs" role="tablist">
				<?php $first_tab = true; ?>
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<?php
						$class = $key;

						if( $first_tab ) {
							$class .= ' active';
							$first_tab = false;
						} 
					?>
					<li role="presentation" class="<?php echo esc_attr( $class ); ?>">
						<a href="#tab-<?php echo esc_attr( $key ); ?>" aria-controls="#tab-<?php echo esc_attr( $key ); ?>" role="tab" data-toggle="tab"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="tab-content">
			<?php $first_tab = true; ?>
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<?php
					$class = 'tab-pane';

					if( $first_tab ) {
						$class .= ' active';
						$first_tab = false;
					} 
				?>
				<div role="tabpanel" class="<?php echo esc_attr( $class ); ?>" id="tab-<?php echo esc_attr( $key ); ?>">
					<?php call_user_func( $tab['callback'], $key, $tab ); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

<?php endif; ?>
