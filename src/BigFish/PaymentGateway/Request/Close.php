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
 * Close request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class Close extends RequestAbstract
{
	/**
	 * Transaction ID
	 * 
	 * @var string
	 * @access public
	 */
	public $transactionId;

	/**
	 * Approved
	 * 
	 * @var boolean
	 * @access public 
	 */
	public $approved;

	/**
	 * Construct new Close request instance
	 * 
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param boolean $approved Approve or decline transaction (true/false)
	 * @return void
	 * @access public
	 */
	public function __construct($transactionId, $approved = true)
	{
		$this->transactionId = $transactionId;
		$this->approved = (($approved === true || $approved == "true") ? "true" : "false");
	}

}
