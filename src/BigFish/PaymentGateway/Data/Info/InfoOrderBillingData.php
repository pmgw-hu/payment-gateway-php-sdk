<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoOrderBillingData extends InfoOrderShippingData
{
	/**
	 * @return string
	 */
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_ORDER_BILLING_DATA;
	}
}
