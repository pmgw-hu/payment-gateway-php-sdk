<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway;

class InfoOrderBillingData extends InfoOrderShippingData
{
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_ORDER_BILLING_DATA;
	}
}
