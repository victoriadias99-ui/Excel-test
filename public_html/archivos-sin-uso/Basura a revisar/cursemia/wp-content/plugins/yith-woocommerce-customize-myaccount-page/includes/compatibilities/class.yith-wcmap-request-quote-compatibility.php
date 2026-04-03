<?php
/**
 * YITH WooCommerce Request a Quote Compatibility Class
 *
 * @author  YITH
 * @package YITH WooCommerce Customize My Account Page
 * @version 3.0.0
 */

defined( 'YITH_WCMAP' ) || exit;

if ( ! class_exists( 'YITH_WCMAP_Request_Quote_Compatibility' ) ) {
	/**
	 * Class YITH_WCMAP_Request_Quote_Compatibility
	 *
	 * @since 3.0.0
	 */
	class YITH_WCMAP_Request_Quote_Compatibility extends YITH_WCMAP_Compatibility {

		/**
		 * Constructor
		 *
		 * @since 3.0.0
		 */
		public function __construct() {
			$this->endpoint_key = 'view-quote';
			$this->endpoint     = array(
				'slug'    => 'view-quote',
				'label'   => __( 'My Quotes', 'yith-woocommerce-customize-myaccount-page' ),
				'icon'    => 'pencil',
				'content' => '[yith_ywraq_myaccount_quote]',
			);

			$this->register_endpoint();

			add_action( 'template_redirect', array( $this, 'hooks' ), 5 );
			add_filter( 'yith_wcmap_account_page_title', array( $this, 'account_page_title' ), 10, 2 );

			// Banner options
			add_filter( 'yith_wcmap_banner_counter_type_options', array( $this, 'add_counter_type' ), 10 );
			add_filter( 'yith_wcmap_banner_request_a_quote_counter_value', array( $this, 'count_quotes' ), 10, 2 );
		}

		/**
		 * Compatibility hooks and filter
		 *
		 * @since 3.0.0
		 * @author Francesco Licandro
		 */
		public function hooks() {
			if ( class_exists( 'YITH_YWRAQ_Order_Request' ) ) {
				// remove content in my account
				remove_action( 'woocommerce_before_my_account', array( YITH_YWRAQ_Order_Request(), 'my_account_my_quotes' ) );
				remove_action( 'template_redirect', array( YITH_YWRAQ_Order_Request(), 'load_view_quote_page' ) );
			}
		}

		/**
		 * Change my account page title on quote section
		 *
		 * @since  3.0.0
		 * @author Francesco Licandro
		 * @param string $title
		 * @param array $endpoint
		 * @return string
		 */
		public function account_page_title( $title, $endpoint ) {

			global $wp;

			// Search for active endpoints.
			$active = yith_wcmap_get_current_endpoint();

			if ( isset( $endpoint[ $this->endpoint_key ] ) && ! empty( $wp->query_vars[ $active ] ) ) {
				$title = sprintf( __( 'Quote #%s', 'yith-woocommerce-request-a-quote' ), $wp->query_vars[ $active ] );
			}

			return $title;
		}


		/**
		 * Add request a qupte count option to available counter types
		 *
		 * @since 3.0.4
		 * @author Alessio Torrisi
		 * @param array $options
		 * @return array
		 */
		public function add_counter_type( $options ) {
			$options['request_a_quote'] = _x( 'Quotes', 'Banner counter option', 'yith-woocommerce-customize-myaccount-page' );
			return $options;
		}

		/**
		 * Return the number of quotes associated to the customer
		 *
		 * @since 3.0.4
		 * @author Alessio Torrisi
		 * @param integer $value
		 * @param integer $customer_id
		 * @return integer
		 */
		public function count_quotes( $value, $customer = 0 ) {
			$quotes = wc_get_orders(
				apply_filters( 'ywraq_my_account_my_quotes_query',
					array(
						'limit'       => 15,
						'ywraq_raq' => 'yes',
						'customer'    => get_current_user_id() ,
						'status'      => array_merge( YITH_YWRAQ_Order_Request()->raq_order_status, array_keys( wc_get_order_statuses() ) ),
					)
				)
					);
			return count( $quotes  );
		}
	}
}

new YITH_WCMAP_Request_Quote_Compatibility();