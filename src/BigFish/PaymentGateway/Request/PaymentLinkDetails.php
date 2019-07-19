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
 * Payment link details request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class PaymentLinkDetails extends RequestAbstract
{
	/**
	 * Payment link name
	 * 
	 * @var string
	 * @access public
	 */
	public $paymentLinkName;

	/**
	 * Get related Info data
	 *
	 * @var boolean
	 * @access public
	 */
	public $getInfoData;

	/**
	 * Construct payment link details request instance
	 *
	 * @param string $paymentLinkName Payment Link Name received from Payment Gateway
	 * @param boolean $getInfoData Get related Info data (true/false)
	 * @access public
	 */
	public function __construct($paymentLinkName, $getInfoData = false)
	{
		$this->paymentLinkName = $paymentLinkName;
		$this->getInfoData = (($getInfoData === true || $getInfoData == "true") ? true : false);
	}
}
