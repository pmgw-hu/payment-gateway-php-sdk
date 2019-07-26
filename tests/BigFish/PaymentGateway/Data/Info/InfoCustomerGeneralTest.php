<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\Customer\InfoCustomerGeneral;

class InfoCustomerGeneralTest extends InfoAbstractTest
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
			array('10.0.0.1', 'setIp'),
			array('36', 'setHomePhoneCc'),
			array('801231212', 'setHomePhone'),
			array('36', 'setMobilePhoneCc'),
			array('901231212', 'setMobilePhone'),
			array('36', 'setWorkPhoneCc'),
			array('901231212', 'setWorkPhone')
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
	public function ip_maxLengthCheck()
	{
		// max: 45
		$this->getObject()->setIp(str_repeat('A', 46));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function homePhoneCc_maxLengthCheck()
	{
		// max: 3
		$this->getObject()->setHomePhoneCc(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function homePhone_maxLengthCheck()
	{
		// max: 18
		$this->getObject()->setHomePhone(str_repeat('A', 19));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function mobilePhoneCc_maxLengthCheck()
	{
		// max: 3
		$this->getObject()->setMobilePhoneCc(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function mobilePhone_maxLengthCheck()
	{
		// max: 18
		$this->getObject()->setMobilePhone(str_repeat('A', 19));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function workPhoneCc_maxLengthCheck()
	{
		// max: 3
		$this->getObject()->setWorkPhoneCc(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function workPhone_maxLengthCheck()
	{
		// max: 18
		$this->getObject()->setWorkPhone(str_repeat('A', 19));
	}

	protected function getObject(): InfoCustomerGeneral
	{
		return new InfoCustomerGeneral();
	}
}
