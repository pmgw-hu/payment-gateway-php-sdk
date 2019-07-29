<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info;

abstract class InfoOrder extends Info
{
	const PATH = 'Order';

	public function getStructurePath(): string
	{
		return sprintf('%s/%s', parent::getStructurePath(), self::PATH);
	}

	public function getData(): array
	{
		return $this->data;
	}
}
