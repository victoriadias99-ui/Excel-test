<?php
/**
 * My Addresses
 *
 * This template can be overridden by copying it to yourtheme/jet-woo-builder/woocommerce/myaccount/my-address.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

defined( 'ABSPATH' ) || exit; ?>

<div class="jet-woo-account-address-content">
	<?php
	$template = apply_filters( 'jet-woo-builder/current-template/template-id', jet_woo_builder_integration_woocommerce()->get_current_myaccount_address_template() );

	echo jet_woo_builder()->parser->get_template_content( $template );
	?>
</div>
