<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/jet-woo-builder/woocommerce/cart/cart-empty.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="jet-woo-builder-woocommerce-empty-cart">
	<?php
	$template = apply_filters( 'jet-woo-builder/current-template/template-id', jet_woo_builder_integration_woocommerce()->get_current_empty_cart_template() );

	echo jet_woo_builder()->parser->get_template_content( $template, true );
	?>
</div>
