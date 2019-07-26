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

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function expireDate_maxLengthCheck()
	{
		// max: 10
		$this->getObject()->setExpireDate(str_repeat('A', 11));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function frequency_maxLengthCheck()
	{
		// max: 4
		$this->getObject()->setFrequency(str_repeat('A', 5));
	}

	protected function getObject(): InfoOrderRecurringPayment
	{
		return new InfoOrderRecurringPayment();
	}
}
