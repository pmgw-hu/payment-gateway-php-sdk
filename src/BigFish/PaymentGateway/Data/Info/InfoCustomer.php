<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info;

abstract class InfoCustomer extends Info
{
	const PATH = 'Customer';

	public function getStructurePath(): string
	{
		return sprintf('%s/%s', parent::getStructurePath(), self::PATH);
	}

	public function getData(): array
	{
		return $this->data;
	}
}
