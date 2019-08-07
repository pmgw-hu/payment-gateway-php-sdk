<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway\Data\Info\StructurePathTrait;

class InfoOrderBillingData extends BaseAddress
{
	use StructurePathTrait;

	const PATH = 'BillingData';
}
