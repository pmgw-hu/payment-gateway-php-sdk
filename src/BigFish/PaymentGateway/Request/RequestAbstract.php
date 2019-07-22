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
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public function getParams()
	{
		$params = array();
		foreach ($this as $name => $value) {
			$value = trim($value);

			if (!empty($value) && is_scalar($value)) {
				$params[] = ucfirst($name) . "=" . $value;
			}
		}
		return implode("&", $params);
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
				$this->{$key} = $value;
			}
		}
	}

	/**
	 * URL safe encode (base64)
	 * 
	 * @param string $string
	 * @return string
	 * @access protected
	 */
	protected function urlSafeEncode($string)
	{
		$data = str_replace(array('+', '/', '='), array('-', '_', '.'), base64_encode($string));
		return $data;
	}

	/**
	 * Uppercase object properties
	 * 
	 * @return void 
	 * @access public
	 */
	public function ucfirstProps()
	{
		foreach (get_object_vars($this) as $key => $value) {
			unset($this->{$key});

			$this->{ucfirst($key)} = $value;
		}
	}
}
