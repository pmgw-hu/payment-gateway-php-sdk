<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


class InfoOrderBillingData extends InfoOrderShippingData
{
	const PATH = 'BillingData';

	public function getStructurePath(): string
	{
		return sprintf('%s/%s', parent::getStructurePath(), self::PATH);
	}
}
