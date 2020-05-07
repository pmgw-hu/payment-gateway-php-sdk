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
 * Refund request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class Refund extends RequestAbstract
{
	/**
	 * Payment Gateway transaction ID
	 * 
	 * @var string
	 * @access public
	 */
	public $transactionId;

	/**
	 * Refund amount
	 * 
	 * @var float
	 * @access public
	 */
	public $amount;

	/**
	 * Extra data
	 * 
	 * @var string
	 * @access public
	 */
	public $extra;

	/**
	 * Construct new Refund request instance
	 * 
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param float $amount Amount to refund
	 * @return void
	 * @access public
	 */
	public function __construct($transactionId, $amount)
	{
		$this->transactionId = $transactionId;
		$this->amount = (float)$amount;
	}

	/**
	 * Set extra data
	 * 
	 * @param array $extra Extra information
	 * @return \BigFish\PaymentGateway\Request\Refund
	 * @access public
	 */
	public function setExtra(array $extra = array())
	{
		if (!empty($extra)) {
			$this->extra = $this->urlSafeEncode(json_encode($extra));
		}

		return $this;
	}
}
