<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 * 
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2015, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */
namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway\Request\RequestAbstract;

/**
 * Finalize request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class Finalize extends RequestAbstract
{
	/**
	 * Payment Gateway transaction ID
	 * 
	 * @var string
	 * @access public
	 */
	public $transactionId;

	/**
	 * Finalize amount
	 * 
	 * @var float
	 * @access public
	 */
	public $amount;

	/**
	 * Construct new Finalize request instance
	 * 
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param float $amount Amount to finalize
	 * @return void
	 * @access public
	 */
	public function __construct($transactionId, $amount)
	{
		$this->transactionId = $transactionId;
		$this->amount = (float)$amount;
	}
	
	/**
	 * Get object parameters
	 * 
	 * @return string
	 * @access public
	 */
	public function getParams()
	{
		unset($this->responseMode);
		return parent::getParams();
	}

}