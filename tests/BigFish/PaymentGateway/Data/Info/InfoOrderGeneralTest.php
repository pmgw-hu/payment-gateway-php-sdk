<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\InfoOrderGeneral;

class InfoOrderGeneralTest extends InfoAbstractTest
{
	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('test@testdomain.com', 'setDeliveryEmail'),
			array('04', 'setDeliveryTimeFrame'),
			array('100', 'setGiftCardAmount'),
			array('3', 'setGiftCardCount'),
			array('HUF', 'setGiftCardCurrency'),
			array('2019-09-05', 'setPreorderDate'),
			array('01', 'setAvailability'),
			array('02', 'setReorderItems'),
			array('02', 'setShippingMethod'),
			array('1', 'setAddressMatchIndicator'),
			array('01', 'setDifferentShippingName'),
			array('01', 'setTransactionType')
		);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function deliveryEmail_maxLengthCheck()
	{
		// max: 254
		$this->getObject()->setDeliveryEmail(str_repeat('A', 255));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function deliveryTimeFrame_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setDeliveryTimeFrame(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function giftCardAmount_maxLengthCheck()
	{
		// max: 15
		$this->getObject()->setGiftCardAmount(str_repeat('A', 16));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function giftCardCount_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setGiftCardCount(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function giftCardCurrency_maxLengthCheck()
	{
		// max: 3
		$this->getObject()->setGiftCardCurrency(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function preorderDate_maxLengthCheck()
	{
		// max: 10
		$this->getObject()->setPreorderDate(str_repeat('A', 11));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function availability_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setAvailability(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function reorderItems_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setReorderItems(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function shippingMethod_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setShippingMethod(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function addressMatchIndicator_maxLengthCheck()
	{
		// max: 1
		$this->getObject()->setAddressMatchIndicator(str_repeat('A', 2));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function differentShippingName_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setDifferentShippingName(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function transactionType_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setTransactionType(str_repeat('A', 3));
	}

	protected function getObject(): InfoOrderGeneral
	{
		return new InfoOrderGeneral();
	}
}
