<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/jet-woo-builder/woocommerce/myaccount/my-account.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="jet-woo-builder-my-account-content">
	<?php
	$endpoint_enable = 'yes' === jet_woo_builder_shop_settings()->get( 'custom_myaccount_page_endpoints' );
	$template        = apply_filters( 'jet-woo-builder/current-template/template-id', jet_woo_builder_integration_woocommerce()->get_current_myaccount_template() );

	if ( ! $endpoint_enable ) {
		remove_action( 'woocommerce_account_content', 'woocommerce_account_content' );
		do_action( 'woocommerce_account_content' );
	}

	echo jet_woo_builder()->parser->get_template_content( $template );
	?>
</div>
