<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway\Data\Info\StructurePathTrait;

class InfoOrderBillingData extends InfoOrderShippingData
{
	use StructurePathTrait;

	const PATH = 'BillingData';
}
