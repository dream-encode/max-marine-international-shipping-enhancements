<?php
/**
 * Class Max_Marine_International_Shipping_Enhancements_REST_Response.
 *
 * @since 1.0.0
 */

namespace Max_Marine\International_Shipping_Enhancements\Core\RestApi;

use stdClass;

defined( 'ABSPATH' ) || exit;

/**
 * Class Max_Marine_International_Shipping_Enhancements_REST_Response
 *
 * @since 1.0.0
 */
class Max_Marine_International_Shipping_Enhancements_REST_Response {
	/**
	 * Status.
	 *
	 * @var string.
	 */
	public $status = 'error';

	/**
	 * Message.
	 *
	 * @var string .
	 */
	public $message = '';

	/**
	 * Extra data
	 *
	 * @var mixed
	 */
	public $data;

	/**
	 * Success
	 *
	 * @var bool
	 */
	public $success;

	/**
	 * Max_Marine_International_Shipping_Enhancements_REST_Response constructor.
	 */
	public function __construct() {
		$this->data = new stdClass();
	}
}
