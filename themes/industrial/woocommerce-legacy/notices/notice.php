<?php
/**
 * Show messages
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $messages ){
	return;
}

?>

<?php foreach ( $messages as $message ) : ?>
	<div class="alert alert-useful">
		<i class="fa fa-lightbulb-o"></i>
		<?php echo wp_kses_post( $message ); ?>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-remove"></i></button>
	</div>
<?php endforeach; ?>
