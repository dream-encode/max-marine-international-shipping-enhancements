<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://dream-encode.com
 * @since      1.0.0
 *
 * @package    Max_Marine_International_Shipping_Enhancements
 * @subpackage Max_Marine_International_Shipping_Enhancements/public
 */

namespace Max_Marine\International_Shipping_Enhancements\Frontend;

use Max_Marine\International_Shipping_Enhancements\Core\Upgrade\Max_Marine_International_Shipping_Enhancements_Upgrader;
use Max_Marine\International_Shipping_Enhancements\Core\RestApi\Max_Marine_International_Shipping_Enhancements_Core_API;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Max_Marine_International_Shipping_Enhancements
 * @subpackage Max_Marine_International_Shipping_Enhancements/public
 * @author     David Baumwald <david@dream-encode.com>
 */
class Max_Marine_International_Shipping_Enhancements_Public {

	/**
	 * Do stuff when plugin updates happen.
	 *
	 * @since  1.0.0
	 * @param  object  $upgrader_object  Upgrader object.
	 * @param  array   $options          Options.
	 * @return void
	 */
	public function upgrader_process_complete( $upgrader_object, $options ) {
		if ( isset( $options['plugins'] ) && is_array( $options['plugins'] ) ) {
			foreach ( $options['plugins'] as $index => $plugin ) {
				if ( 'max-marine-international-shipping-enhancements/max-marine-international-shipping-enhancements.php' === $plugin ) {
					as_enqueue_async_action( 'max_marine_international_shipping_enhancements_process_plugin_upgrade', array(), 'max-marine-international-shipping-enhancements' );
					return;
				}
			}
		}
	}

	/**
	 * Maybe perform database migrations when a plugin upgrade occurs.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function process_plugin_upgrade() {
		$upgrader = new Max_Marine_International_Shipping_Enhancements_Upgrader();

		$upgrader->maybe_upgrade();
	}

	/**
	 * Register plugin settings.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function register_plugin_settings() {
		$default = array(
			'enabled' => true,
			'message' => __( 'Example message', 'max-marine-international-shipping-enhancements' ),
		);

		$schema  = array(
			'type'       => 'object',
			'properties' => array(
				'enabled' => array(
					'type' => 'boolean',
				),
				'message' => array(
					'type' => 'string',
				),
			),
		);

		register_setting(
			'options',
			'max_marine_international_shipping_enhancements_plugin_settings',
			array(
				'type'         => 'object',
				'default'      => $default,
				'show_in_rest' => array(
					'schema' => $schema,
				),
			)
		);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function enqueue_styles() {
		if ( ! is_checkout() ) {
			return;
		}

		// WooCommerce checkout screen.
		$asset_base_url = MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_URL . 'public/';

		$asset_file = include( MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_PATH . 'public/assets/dist/js/woocommerce-checkout.min.asset.php' );

		wp_enqueue_style(
			'max-marine-international-shipping-enhancements-public-woocommerce-checkout-js',
			$asset_base_url . 'assets/dist/css/woocommerce-checkout.min.css',
			array(),
			(string) $asset_file['version'],
			'all'
		);
	}

	/**
	 * Register the JavaScript for the checkout page.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function enqueue_scripts() {
		if ( ! is_checkout() ) {
			return;
		}

		// WooCommerce checkout screen.
		$asset_base_url = MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_URL . 'public/';

		$asset_file = include( MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_PATH . 'public/assets/dist/js/woocommerce-checkout.min.asset.php' );

		wp_register_script(
			'max-marine-international-shipping-enhancements-public-woocommerce-checkout-js',
			$asset_base_url . 'assets/dist/css/woocommerce-checkout.min.css',
			array( 'jquery' ),
			(string) $asset_file['version'],
			true
		);

		$localization = array(
			'DOMESTIC_COUNTRY_CODES' => max_marine_international_shipping_enhancements_get_domestic_country_codes(),
		);

		wp_localize_script( 'max-marine-international-shipping-enhancements-public-woocommerce-checkout-js', 'MMISE', $localization );

		wp_enqueue_script( 'max-marine-international-shipping-enhancements-public-woocommerce-checkout-js' );
	}

	/**
	 * Output the markup for the notice, if enabled.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function woocommerce_checkout_after_order_review() {
		$options = get_option( 'max_marine_international_shipping_enhancements_plugin_settings' );

		if ( ! $options['enabled'] ) {
			return;
		}

		$is_domestic_shipping_country = in_array( strtoupper( WC()->customer->get_shipping_country() ), max_marine_international_shipping_enhancements_get_domestic_country_codes(), true );

		printf(
			'<div id="max-marine-international-shipping-enhancements-notice-container" class="%1$s">%2$s</div>',
			( $is_domestic_shipping_country ) ? esc_html( 'hidden' ) : '',
			esc_html( $options['message'] )
		);
	}
}
