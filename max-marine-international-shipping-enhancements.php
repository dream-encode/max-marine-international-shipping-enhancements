<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://dream-encode.com
 * @since             1.0.0
 * @package           Max_Marine_International_Shipping_Enhancements
 *
 * @wordpress-plugin
 * Plugin Name:       Max Marine - International Shipping Enhancements
 * Plugin URI:        https://example.com
 * Description:       A custom plugin that customizes international shipping options for customers.
 * Version:           1.0.0
 * Author:            David Baumwald
 * Author URI:        https://dream-encode.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       max-marine-international-shipping-enhancements
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/GH_REPO_URL
 * Primary Branch:    main
 * Release Asset:     true
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Constants
 */
require_once 'includes/max-marine-international-shipping-enhancements-constants.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-max-marine-international-shipping-enhancements-activator.php
 *
 * @return void
 */
function max_marine_international_shipping_enhancements_activate() {
	require_once MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_PATH . 'includes/class-max-marine-international-shipping-enhancements-activator.php';
	Max_Marine\International_Shipping_Enhancements\Core\Max_Marine_International_Shipping_Enhancements_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-max-marine-international-shipping-enhancements-deactivator.php
 *
 * @return void
 */
function max_marine_international_shipping_enhancements_deactivate() {
	require_once MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_PATH . 'includes/class-max-marine-international-shipping-enhancements-deactivator.php';
	Max_Marine\International_Shipping_Enhancements\Core\Max_Marine_International_Shipping_Enhancements_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'max_marine_international_shipping_enhancements_activate' );
register_deactivation_hook( __FILE__, 'max_marine_international_shipping_enhancements_deactivate' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since  1.0.0
 * @return void
 */
function max_marine_international_shipping_enhancements_init() {
	/**
	 * Import some common functions.
	 */
	require_once MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_PATH . 'includes/max-marine-international-shipping-enhancements-core-functions.php';

	/**
	 * Main plugin loader class.
	 */
	require_once MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_PATH . 'includes/class-max-marine-international-shipping-enhancements.php';

	$plugin = new Max_Marine\International_Shipping_Enhancements\Core\Max_Marine_International_Shipping_Enhancements();
	$plugin->run();
}

max_marine_international_shipping_enhancements_init();
