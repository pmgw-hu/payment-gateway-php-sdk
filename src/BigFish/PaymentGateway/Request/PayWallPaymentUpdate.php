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
 * PayWall payment update request class
 *
 * @package PaymentGateway
 * @subpackage Request
 */
class PayWallPaymentUpdate extends RequestAbstract
{
	/**
	 * PayWall payment identifier
	 *
	 * @var string
	 * @access public
	 */
	public $paywallPaymentName;

	/**
	 * Amount
	 *
	 * @var float
	 * @access public
	 */
	public $amount;

	/**
	 * Construct new PayWall payment update request instance
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
	 * Set payment transaction amount
	 *
	 * @param float $amount Transaction amount
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentUpdate
	 * @access public
	 */
	public function setAmount($amount)
	{
		$this->amount = $amount;
		return $this;
	}
}
