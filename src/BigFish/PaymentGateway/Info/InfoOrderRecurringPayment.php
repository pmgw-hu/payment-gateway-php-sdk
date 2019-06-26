<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish\PaymentGateway\Info;


use BigFish\PaymentGateway;

class InfoOrderRecurringPayment extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxSize = array(
		'expireDate' => 10,
		'frequency' => 4,
	);

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_ORDER_RECURRING_PAYMENT;
	}

	/**
	 * @param string $expireDate
	 * @return InfoOrderRecurringPayment
	 */
	public function setExpireDate($expireDate)
	{
		$this->saveData($expireDate, 'expireDate');
		return $this;
	}

	/**
	 * @param string $frequency
	 * @return InfoOrderRecurringPayment
	 */
	public function setFrequency($frequency)
	{
		$this->saveData($frequency, 'frequency');
		return $this;
	}
}
