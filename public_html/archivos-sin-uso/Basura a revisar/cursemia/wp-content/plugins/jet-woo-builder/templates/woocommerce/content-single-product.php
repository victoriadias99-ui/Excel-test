<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/jet-woo-builder/woocommerce/content-single-product.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$elementor = Elementor\Plugin::instance();

if ( $elementor->editor->is_edit_mode() ) {
	if ( is_product() || ( ! empty( $post->post_content ) && strstr( $post->post_content, '[product_page' ) ) ) {
		printf(
			'<h5>%s</h5>',
			esc_html__( 'JetWooBuilder Template is enabled, however, it can&rsquo;t be displayed in shortcode when you&rsquo;re on Elementor editor page.', 'jet-woo-builder' )
		);

		return;
	}
}

do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form();
	return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$template = apply_filters( 'jet-woo-builder/current-template/template-id', jet_woo_builder_integration_woocommerce()->current_single_template() );

	if ( class_exists( 'Elementor\Plugin' ) ) {
		echo $elementor->frontend->get_builder_content( $template, false );
	}
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>