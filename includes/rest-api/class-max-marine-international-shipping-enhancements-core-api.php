<?php
/**
 * Class Max_Marine_International_Shipping_Enhancements_Core_API
 *
 * @since 1.0.0
 */

namespace Max_Marine\International_Shipping_Enhancements\Core\RestApi;

use Max_Marine\International_Shipping_Enhancements\Core\Abstracts\Max_Marine_International_Shipping_Enhancements_Abstract_API;

defined( 'ABSPATH' ) || exit;

/**
 * Class Max_Marine_International_Shipping_Enhancements_Core_API
 *
 * @since 1.0.0
 */
class Max_Marine_International_Shipping_Enhancements_Core_API extends Max_Marine_International_Shipping_Enhancements_Abstract_API {
	/**
	 * Includes files
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function rest_api_includes() {
		parent::rest_api_includes();

		$path_version = 'includes/rest-api' . DIRECTORY_SEPARATOR . $this->version . DIRECTORY_SEPARATOR . 'frontend';

		include_once MAX_MARINE_INTERNATIONAL_SHIPPING_ENHANCEMENTS_PLUGIN_PATH . $path_version . '/class-max-marine-international-shipping-enhancements-rest-user-controller.php';
	}

	/**
	 * Register all routes.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function rest_api_register_routes() {
		$controllers = array(
			'Max_Marine_International_Shipping_Enhancements_REST_User_Controller',
		);

		$this->controllers = $controllers;

		parent::rest_api_register_routes();
	}
}
