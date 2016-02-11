<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 * 
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2015, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */
namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

/**
 * Base class for all request classes
 * 
 * @package PaymentGateway
 * @subpackage Request
 * @abstract
 */
abstract class RequestAbstract
{
	/**
	 * Construct query string from object properties
	 * 
	 * @return string Constructed query string
	 * @access public
	 */
	public function getParams()
	{
		foreach ($this as $name => $value) {
			$value = trim($value);

			if (!empty($value) && is_scalar($value)) {
				$params[] = ucfirst($name) . "=" . $this->encodeValue($value);
			}
		}
		return implode("&", $params);
	}

	/**
	 * Encode value
	 * 
	 * @param string $value
	 * @return string
	 * @access protected
	 */
	protected function encodeValue($value)
	{
		if (
			PaymentGateway::getConfig()->useApi != PaymentGateway::API_SOAP &&
			PaymentGateway::getConfig()->useApi != PaymentGateway::API_REST
		) {
			if (preg_match("/\s+/", $value)) {
				$value = urlencode($value);
			}
		}
		return $value;
	}

	/**
	 * Encode object parameter values
	 * 
	 * @return void
	 * @access public
	 */
	public function encodeValues()
	{
		foreach (get_object_vars($this) as $key => $value) {
			if (is_scalar($value)) {
				$value = trim($value);
				$this->{$key} = $this->encodeValue($value);
			}
		}
	}

}
