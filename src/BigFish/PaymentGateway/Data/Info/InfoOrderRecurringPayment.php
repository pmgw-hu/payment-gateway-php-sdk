<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoOrderRecurringPayment extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = array(
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
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderRecurringPayment
	 */
	public function setExpireDate($expireDate)
	{
		$this->setData($expireDate, 'expireDate');
		return $this;
	}

	/**
	 * @param string $frequency
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderRecurringPayment
	 */
	public function setFrequency($frequency)
	{
		$this->setData($frequency, 'frequency');
		return $this;
	}
}
