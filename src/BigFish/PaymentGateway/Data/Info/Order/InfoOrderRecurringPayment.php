<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway\Data\Info\InfoOrder;
use BigFish\PaymentGateway\Data\Info\StructurePathTrait;

class InfoOrderRecurringPayment extends InfoOrder
{
	use StructurePathTrait;

	const PATH = 'RecurringPayment';

	const EXPIRE_DATE = 'expireDate';
	const FREQUENCY = 'frequency';

	public function setExpireDate(string $expireDate): self
	{
		return $this->setData($expireDate, self::EXPIRE_DATE);
	}

	public function setFrequency(string $frequency): self
	{
		return $this->setData($frequency, self::FREQUENCY);
	}
}
