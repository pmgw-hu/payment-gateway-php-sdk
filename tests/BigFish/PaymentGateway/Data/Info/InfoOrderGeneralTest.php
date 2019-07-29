<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\Order\InfoOrderGeneral;

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
			array(100, 'setGiftCardAmount'),
			array(3, 'setGiftCardCount'),
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

	protected function getObject(): InfoOrderGeneral
	{
		return new InfoOrderGeneral();
	}
}
