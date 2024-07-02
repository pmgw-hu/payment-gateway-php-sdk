<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/pmgw-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2024, BIG FISH Payment Services Ltd.
 */
namespace BigFish\PaymentGateway\Request;

/**
 * PayWall payment details request class
 *
 * @package PaymentGateway
 * @subpackage Request
 */
class PayWallPaymentDetails extends RequestAbstract
{
	/**
	 * PayWall payment identifier
	 *
	 * @var string
	 * @access public
	 */
	public $paywallPaymentName;

	/**
	 * GetTransactions
	 *
	 * @var boolean
	 * @access public
	 */
	public $getTransactions;

	/**
	 * Construct new PayWall payment details request instance
	 *
	 * @param string $paywallPaymentName PayWall identifier received from Payment Gateway
	 * @return void
	 * @access public
	 */
	public function __construct($paywallPaymentName)
	{
		$this->paywallPaymentName = $paywallPaymentName;
	}

	/**
	 * Set if Details response should include transactions data
	 *
	 * @param bool $getTransactions getTransactions flag
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentDetails
	 * @access public
	 */
	public function setGetTransactions($getTransactions)
	{
		$this->getTransactions = $getTransactions;
		return $this;
	}
}
