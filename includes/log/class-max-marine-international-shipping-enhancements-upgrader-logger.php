<?php
/**
 * Simple wrapper class for custom logs.
 *
 * @uses \WC_Logger();
 *
 * @link       https://dream-encode.com
 * @since      1.0.0
 *
 * @package    Max_Marine_International_Shipping_Enhancements
 * @subpackage Max_Marine_International_Shipping_Enhancements/includes
 */

namespace Max_Marine\International_Shipping_Enhancements\Core\Log;

use Max_Marine\International_Shipping_Enhancements\Core\Abstracts\Max_Marine_International_Shipping_Enhancements_Abstract_WC_Logger;

/**
 * Logger class.
 *
 * Log stuff to files.
 *
 * @since      1.0.0
 * @package    Max_Marine_International_Shipping_Enhancements
 * @subpackage Max_Marine_International_Shipping_Enhancements/includes
 * @author     David Baumwald <david@dream-encode.com>
 */
final class Max_Marine_International_Shipping_Enhancements_Upgrader_Logger extends Max_Marine_International_Shipping_Enhancements_Abstract_WC_Logger {
	/**
	 * Log namespace.
	 *
	 * @since   1.0.0
	 * @access  protected
	 * @var     string  $namespace  Log namespace.
	 */
	public static $namespace = 'max-marine-international-shipping-enhancements-upgrader';
}
