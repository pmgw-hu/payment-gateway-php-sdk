<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */
namespace BigFish\PaymentGateway\Data;

class PayWallStoreSettings extends PayWallAbstract
{
	/**
	 * Displayed brand name on PayWall frontend
	 *
	 * @var string
	 * @access public
	 */
	public $brandName;

	/**
	 * Displayed company name on PayWall frontend
	 *
	 * @var string
	 * @access public
	 */
	public $companyName;

	/**
	 * Displayed phone number on PayWall frontend
	 *
	 * @var string
	 * @access public
	 */
	public $phone;

	/**
	 * Displayed email address on PayWall frontend
	 *
	 * @var string
	 * @access public
	 */
	public $email;
}
