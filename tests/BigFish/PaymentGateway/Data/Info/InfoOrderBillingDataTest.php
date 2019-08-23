<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\Order\InfoOrderBillingData;

class InfoOrderBillingDataTest extends InfoOrderShippingDataTest
{
	/**
	 * @return InfoOrderBillingData
	 */
	protected function getObject()
	{
		return new InfoOrderBillingData();
	}
}
