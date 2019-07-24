<?php

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
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_ORDER_RECURRING_PAYMENT;
	}

	/**
	 * @param string $expireDate
	 * @return InfoOrderRecurringPayment
	 */
	public function setExpireDate(string $expireDate): InfoOrderRecurringPayment
	{
		$this->setData($expireDate, 'expireDate');
		return $this;
	}

	/**
	 * @param string $frequency
	 * @return InfoOrderRecurringPayment
	 */
	public function setFrequency(string $frequency): InfoOrderRecurringPayment
	{
		$this->setData($frequency, 'frequency');
		return $this;
	}
}
