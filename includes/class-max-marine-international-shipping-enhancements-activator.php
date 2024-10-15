<?php
/**
 * Fired during plugin activation.
 *
 * @link       https://dream-encode.com
 * @since      1.0.0
 *
 * @package    Max_Marine\International_Shipping_Enhancements
 * @subpackage Max_Marine\International_Shipping_Enhancements/includes
 */

namespace Max_Marine\International_Shipping_Enhancements\Core;

use Max_Marine\International_Shipping_Enhancements\Core\Upgrade\Max_Marine_International_Shipping_Enhancements_Upgrader;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Max_Marine\International_Shipping_Enhancements
 * @subpackage Max_Marine\International_Shipping_Enhancements/includes
 * @author     David Baumwald <david@dream-encode.com>
 */
class Max_Marine_International_Shipping_Enhancements_Activator {
	/**
	 * Activator.
	 *
	 * Runs on plugin activation.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public static function activate() {
		Max_Marine_International_Shipping_Enhancements_Upgrader::install();
	}
}
