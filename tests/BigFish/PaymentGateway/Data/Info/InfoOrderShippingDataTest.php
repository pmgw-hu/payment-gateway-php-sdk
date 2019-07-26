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
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function firstName_maxLengthCheck()
	{
		// max: 45
		$this->getObject()->setFirstName(str_repeat('A', 46));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function lastName_maxLengthCheck()
	{
		// max: 45
		$this->getObject()->setLastName(str_repeat('A', 46));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function email_maxLengthCheck()
	{
		// max: 254
		$this->getObject()->setEmail(str_repeat('A', 255));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function phoneCc_maxLengthCheck()
	{
		// max: 3
		$this->getObject()->setPhoneCc(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function phone_maxLengthCheck()
	{
		// max: 18
		$this->getObject()->setPhone(str_repeat('A', 19));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function city_maxLengthCheck()
	{
		// max: 50
		$this->getObject()->setCity(str_repeat('A', 51));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function country_maxLengthCheck()
	{
		// max: 50
		$this->getObject()->setCountry(str_repeat('A', 51));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function countryCode1_maxLengthCheck()
	{
		// max: 3
		$this->getObject()->setCountryCode1(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function countryCode2_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setCountryCode2(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function countryCode3_maxLengthCheck()
	{
		// max: 6
		$this->getObject()->setCountryCode3(str_repeat('A', 7));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function line1_maxLengthCheck()
	{
		// max: 50
		$this->getObject()->setLine1(str_repeat('A', 51));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function line2_maxLengthCheck()
	{
		// max: 50
		$this->getObject()->setLine2(str_repeat('A', 51));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function line3_maxLengthCheck()
	{
		// max: 50
		$this->getObject()->setLine3(str_repeat('A', 51));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function postalCode_maxLengthCheck()
	{
		// max: 16
		$this->getObject()->setPostalCode(str_repeat('A', 17));
	}

	/**
	 * @return InfoOrderShippingData
	 */
	protected function getObject()
	{
		return new InfoOrderShippingData();
	}
}
