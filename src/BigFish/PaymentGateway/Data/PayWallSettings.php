<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */
namespace BigFish\PaymentGateway\Data;

class PayWallSettings extends PayWallAbstract
{
	/**
	 * Success page hosted by Payment Gateway
	 *
	 * @var bool
	 * @access public
	 */
	public $hostedSuccessPage;

	/**
	 * Enabled payment provider list (eg: [CIB, OTP])
	 *
	 * @var array
	 * @access public
	 */
	public $enabledPaymentProviders;

	/**
	 * Disabled payment provider list (eg: [CIB, OTP])
	 *
	 * @var array
	 * @access public
	 */
	public $disabledPaymentProviders;

	/**
	 * Payment provider order (eg: [CIB, OTP])
	 *
	 * @var array
	 * @access public
	 */
	public $paymentProviderOrder;

	/**
	 * Hide providers from payment options in case of provider outage
	 *
	 * @var bool
	 * @access public
	 */
	public $hidePaymentProviderOnDowntime;

	/**
	 * Fallback payment provider list (eg: [CIB => OTP])
	 * @var array
	 * @access public
	 */
	public $fallbackPaymentProviders;

	/**
	 * Enable one click payment on payment page
	 *
	 * @var bool
	 * @access public
	 */
	public $oneClickEnabled;
}
