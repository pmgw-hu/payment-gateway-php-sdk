<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/pmgw-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2024, BIG FISH Payment Services Ltd.
 */
namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

/**
 * Get Payment Registrations request class
 *
 * @package PaymentGateway
 * @subpackage Request
 */
class GetPaymentRegistrations extends RequestAbstract
{
	/**
	 * Store name
	 *
	 * @var string
	 * @access public
	 */
	public $storeName;

	/**
	 * Provider name
	 *
	 * @var string
	 * @access public
	 */
	public $providerName;

	/**
	 * User identifier
	 *
	 * @var string
	 * @access public
	 */
	public $userId;

	/**
	 * Payment registration type
	 *
	 * @var string | null
	 * @access public
	 */
	public $paymentRegistrationType;

	/**
	 * Construct new Get Payment Registrations request instance
	 *
	 * @param string $providerName Provider name
	 * @param string $userId User identifier
	 * @param string | null $paymentRegistrationType Payment registration type
	 * @throws \BigFish\PaymentGateway\Exception
	 * @return void
	 * @access public
	 */
	public function __construct($providerName, $userId, $paymentRegistrationType = null)
	{
		$this->storeName = PaymentGateway::getConfig()->storeName;
		$this->providerName = $providerName;
		$this->userId = $userId;
		$this->paymentRegistrationType = $paymentRegistrationType;
	}
}
