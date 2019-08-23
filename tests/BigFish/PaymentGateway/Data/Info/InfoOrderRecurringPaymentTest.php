<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\Order\InfoOrderRecurringPayment;

class InfoOrderRecurringPaymentTest extends InfoAbstractTest
{
	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('2030-02-05', 'setExpireDate'),
			array(22, 'setFrequency')
		);
	}

	protected function getObject(): InfoOrderRecurringPayment
	{
		return new InfoOrderRecurringPayment();
	}
}
