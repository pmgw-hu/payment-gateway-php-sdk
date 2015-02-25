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
 * BIG FISH Payment Gateway Configuration
 * 
 * @property string $storeName Store name
 * @property string $apiKey API key
 * @property boolean $testMode Use testing environment (default: true)
 * @property string $outCharset Output character set
 * @property string $useApi API type (SOAP or REST)
 * @property string $encryptPublicKey Public key used for encryption
 * @package PaymentGateway
 */
class Config
{
	/**
	 * Merchant's unique identifier used in Payment Gateway.
	 * 
	 * @var string
	 * @access private
	 */
	private $storeName = PaymentGateway::SDK_TEST_STORE_NAME;

	/**
	 * Private API key
	 * 
	 * @var string
	 * @access private
	 */
	private $apiKey = PaymentGateway::SDK_TEST_API_KEY;

	/**
	 * Please change this to false in your production environment.
	 * 
	 * @var boolean
	 * @access private
	 */
	private $testMode = true;

	/**
	 * Payment Gateway sends all messages in UTF-8 character encoding.
	 * If your system uses a different character encoding, this parameter should be changed.
	 * (e.g. ISO-8859-2)
	 * 
	 * @var string
	 * @access private
	 */
	private $outCharset = 'UTF-8';

	/**
	 * Possible values:
	 * - "SOAP": RPC SOAP API
	 * - "REST": HTTP REST API
	 * 
	 * @var string
	 * @access private
	 * @see PaymentGateway
	 */
	private $useApi = PaymentGateway::API_REST;

	/**
	 * It is used to encrypt sensitive data.
	 * Each merchant has unique private and public keys.
	 * 
	 * @var string
	 * @access private
	 */
	private $encryptPublicKey = PaymentGateway::SDK_TEST_ENCRYPT_PUBLIC_KEY;

	/**
	 * Contructor
	 * 
	 * @param array $config
	 * @return void
	 * @access public
	 */
	public function __construct(array $config = array())
	{
		if (!empty($config)) {
			foreach ($config as $key => $value) {
				$this->__set($key, $value);
			}
		}
	}

	/**
	 * Set magic method
	 * 
	 * @param string $name
	 * @param string $value
	 * @return void
	 * @access public
	 */
	public function __set($name, $value)
	{
		if (property_exists($this, $name)) {
			if ($name == 'testMode') {
				$this->{$name} = (boolean)$value;
			} else {
				$this->{$name} = (string)$value;
			}
		}
	}

	/**
	 * Get magic method
	 * 
	 * @param string $name
	 * @return string | null
	 * @access public
	 */
	public function __get($name)
	{
		if (property_exists($this, $name)) {
			return $this->{$name};
		}
		return null;
	}

}
