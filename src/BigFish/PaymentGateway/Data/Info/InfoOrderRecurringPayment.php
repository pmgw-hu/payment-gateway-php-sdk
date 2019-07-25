<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoOrderRecurringPayment extends InfoAbstract
{
	const EXPIRE_DATE = 'expireDate';
	const FREQUENCY = 'frequency';
	/**
	 * @var array
	 */
	protected $maxLength = [
		self::EXPIRE_DATE => 10,
		self::FREQUENCY => 4
	];

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
		return $this->setData($expireDate, self::EXPIRE_DATE);
	}

	/**
	 * @param string $frequency
	 * @return InfoOrderRecurringPayment
	 */
	public function setFrequency(string $frequency): InfoOrderRecurringPayment
	{
		return $this->setData($frequency, self::FREQUENCY);
	}
}
