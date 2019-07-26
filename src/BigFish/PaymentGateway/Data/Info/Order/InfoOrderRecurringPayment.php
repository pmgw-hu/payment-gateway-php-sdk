<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Data\Info\InfoAbstract;

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

	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_ORDER_RECURRING_PAYMENT;
	}

	public function setExpireDate(string $expireDate): self
	{
		return $this->setData($expireDate, self::EXPIRE_DATE);
	}

	public function setFrequency(string $frequency): self
	{
		return $this->setData($frequency, self::FREQUENCY);
	}
}
