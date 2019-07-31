<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info;

class InfoCustomer extends Info
{
	use StructurePathTrait;

	const PATH = 'Customer';

	public function getData(): array
	{
		return $this->data;
	}
}
