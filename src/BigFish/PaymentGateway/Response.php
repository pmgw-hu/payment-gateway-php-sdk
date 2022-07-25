<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 * 
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2015, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */
namespace BigFish\PaymentGateway;

use BigFish\PaymentGateway;

/**
 * API response class
 * 
 * @package PaymentGateway
 */
class Response
{
	/**
	 * Construct new response object from JSON encoded object
	 *
	 * @param string $json JSON encoded object
	 * @param array $sdkDebugInfo
	 * @return void
	 * @access public
	 * @throws Exception
	 */
	public function __construct($json, array $sdkDebugInfo = array())
	{
		if (is_object($json)) {
			$object = $json;
		} else {
			$object = json_decode($json);
		}

		if (is_object($object)) {
			$this->setObject($object);
		}

		if (!empty($sdkDebugInfo)){
			$this->setValue("sdkDebugInfo", $sdkDebugInfo);
		}
	}

	/**
	 * Set object
	 *
	 * @param object $object
	 * @return void
	 * @access protected
	 * @throws Exception
	 */
	protected function setObject($object)
	{
		foreach (get_object_vars($object) as $name => $value) {
			if (is_string($value) && is_object(json_decode($value))) {
				$this->{$name} = new Response($value);
			} else {
				$this->setValue($name, $value);
			}
		}
	}

	/**
	 * Set value
	 *
	 * @param string $name
	 * @param string|array $value
	 * @return void
	 * @access protected
	 * @throws Exception
	 */
	protected function setValue($name, $value)
	{
		if (is_string($value) && PaymentGateway::getConfig()->outCharset != "UTF-8") {
			$value = iconv("UTF-8", PaymentGateway::getConfig()->outCharset, $value);
		}
		
		if (is_string($value) && is_array(json_decode($value))) {
			$value = json_decode($value);
		}
		
		$this->{ucfirst($name)} = $value;
	}

}
