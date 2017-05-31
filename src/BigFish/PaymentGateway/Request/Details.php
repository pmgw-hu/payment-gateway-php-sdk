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
 * Details request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class Details extends RequestAbstract
{
	/**
	 * Transaction ID
	 * 
	 * @var string
	 * @access public
	 */
	public $transactionId;

	/**
	 * Get related transactions
	 * 
	 * @var boolean
	 * @access public 
	 */
	public $getRelatedTransactions;

	/**
	 * Construct new Details request instance
	 * 
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param boolean $getRelatedTransactions Get related transactions (true/false)
	 * @return void
	 * @access public
	 */
	public function __construct($transactionId, $getRelatedTransactions = true)
	{
		$this->transactionId = $transactionId;
		$this->getRelatedTransactions = (($getRelatedTransactions === true || $getRelatedTransactions == "true") ? true : false);
	}

}
