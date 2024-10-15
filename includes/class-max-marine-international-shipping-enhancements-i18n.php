<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://dream-encode.com
 * @since      1.0.0
 *
 * @package    Max_Marine_International_Shipping_Enhancements
 * @subpackage Max_Marine_International_Shipping_Enhancements/includes
 */

namespace Max_Marine\International_Shipping_Enhancements\Core;

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Max_Marine_International_Shipping_Enhancements
 * @subpackage Max_Marine_International_Shipping_Enhancements/includes
 * @author     David Baumwald <david@dream-encode.com>
 */
class Max_Marine_International_Shipping_Enhancements_I18n {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'max-marine-international-shipping-enhancements',
			false,
			MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_PATH . 'languages/'
		);
	}
}
