<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/jet-woo-builder/woocommerce/myaccount/dashboard.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="jet-woo-account-dashboard-content">
	<?php
	$template = apply_filters( 'jet-woo-builder/current-template/template-id', jet_woo_builder_integration_woocommerce()->get_current_myaccount_dashboard_template() );

	echo jet_woo_builder()->parser->get_template_content( $template );
	?>
</div>

<?php do_action( 'woocommerce_account_dashboard' );
