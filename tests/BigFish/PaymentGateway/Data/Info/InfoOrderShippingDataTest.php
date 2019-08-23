<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\Order\InfoOrderShippingData;

class InfoOrderShippingDataTest extends InfoAbstractTest
{
	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('John', 'setFirstName'),
			array('Doe', 'setLastName'),
			array('test@testmail.com', 'setEmail'),
			array('36', 'setPhoneCc'),
			array('801234567', 'setPhone'),
			array('Budapest', 'setCity'),
			array('Hungary', 'setCountry'),
			array('348', 'setCountryCode1'),
			array('HU', 'setCountryCode2'),
			array('HU-BU', 'setCountryCode3'),
			array('Nyugati tér', 'setLine1'),
			array('1-2', 'setLine2'),
			array('7. emelet', 'setLine3'),
			array('1066', 'setPostalCode')
		);
	}

	/**
	 * @return InfoOrderShippingData
	 */
	protected function getObject()
	{
		return new InfoOrderShippingData();
	}
}
