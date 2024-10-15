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
	 * Send the CORS header on REST requests.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function rest_api_cors() {
		if ( 'production' === wp_get_environment_type() ) {
			return;
		}

		header( 'Access-Control-Allow-Origin: *' );
	}

	/**
	 * Initialize rest api instances.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function rest_init() {
		$api = new Max_Marine_International_Shipping_Enhancements_Core_API();
	}

	/**
	 * Example function.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  string  $param  First function parameter.
	 * @return string
	 */
	public function example_function( $param ) {
		return $param;
	}
}
