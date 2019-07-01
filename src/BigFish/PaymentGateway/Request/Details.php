<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 * 
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2015, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */
namespace BigFish\PaymentGateway\Request;

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
	 * Get related Info data
	 *
	 * @var boolean
	 * @access public
	 */
	public $getInfoData;

	/**
	 * Construct new Details request instance
	 *
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param boolean $getRelatedTransactions Get related transactions (true/false)
	 * @param bool $getInfoData Get related Info data (true/false)
	 * @access public
	 */
	public function __construct($transactionId, $getRelatedTransactions = true, $getInfoData = false)
	{
		$this->transactionId = $transactionId;
		$this->getRelatedTransactions = (($getRelatedTransactions === true || $getRelatedTransactions == "true") ? true : false);
		$this->getInfoData = (($getInfoData === true || $getInfoData == "true") ? true : false);
	}

}
