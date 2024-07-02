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
 * Cancel All Payment Registrations request class
 *
 * @package PaymentGateway
 * @subpackage Request
 */
class CancelAllPaymentRegistrations extends RequestAbstract
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
	 * User ID
	 *
	 * @var string
	 * @access public
	 */
	public $userId;

	/**
	 * Construct new Cancel All Payment Registrations request instance
	 *
	 * @param string $providerName
	 * @param string $userId
	 * @throws \BigFish\PaymentGateway\Exception
	 * @return void
	 * @access public
	 */
	public function __construct($providerName, $userId)
	{
		$this->storeName = PaymentGateway::getConfig()->storeName;
		$this->providerName = $providerName;
		$this->userId = $userId;
	}
}
