<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway\Data\Info\StructurePathTrait;

class InfoOrderShippingData extends BaseAddress
{
	use StructurePathTrait;

	const PATH = 'ShippingData';
}
