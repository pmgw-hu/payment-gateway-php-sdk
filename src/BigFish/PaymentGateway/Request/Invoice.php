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
 * Invoice request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class Invoice extends RequestAbstract
{
	/**
	 * Payment Gateway transaction ID
	 * 
	 * @var string
	 * @access public
	 */
	public $transactionId;

	/**
	 * Invoice data
	 * 
	 * @var array
	 * @access public
	 */
	public $invoiceData;

	/**
	 * Construct new Invoice request instance
	 * 
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param array $invoiceData Invoice data
	 * @return void
	 * @access public
	 */
	public function __construct($transactionId, array $invoiceData)
	{
		$this->transactionId = $transactionId;
		$this->invoiceData = (array)$invoiceData;
	}
}
