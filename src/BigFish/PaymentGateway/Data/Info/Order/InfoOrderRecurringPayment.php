<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway\Data\Info\InfoOrder;

class InfoOrderRecurringPayment extends InfoOrder
{
	const PATH = 'RecurringPayment';

	const EXPIRE_DATE = 'expireDate';
	const FREQUENCY = 'frequency';

	public function getStructurePath(): string
	{
		return sprintf('%s/%s', parent::getStructurePath(), self::PATH);
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
