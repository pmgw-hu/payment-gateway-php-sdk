<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/pmgw-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2024, BIG FISH Payment Services Ltd.
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

	/**
	 * URL of General Terms and Condition on PayWall frontend
	 *
	 * @var string
	 */
	public $generalTermsAndConditionsUrl;

	/**
	 * Displayed checkbox for General Terms and Conditions on PayWall frontend
	 *
	 * @var bool
	 */
	public $generalTermsAndConditionsCheckboxEnabled;

	/**
	 * URL of Privacy Policy on PayWall frontend
	 *
	 * @var string
	 */
	public $privacyPolicyUrl;

	/**
	 * Displayed checkbox for Privacy Policy on PayWall frontend
	 *
	 * @var bool
	 */
	public $privacyPolicyCheckboxEnabled;

	/**
	 * Displayed checkbox for Implicitly Accept Notification on PayWall frontend
	 *
	 * @var bool
	 */
	public $implicitlyAcceptNoticeEnabled;
}
