<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info;

class InfoOrder extends Info
{
	use StructurePathTrait;

	const PATH = 'Order';

	public function getData(): array
	{
		return $this->data;
	}
}
