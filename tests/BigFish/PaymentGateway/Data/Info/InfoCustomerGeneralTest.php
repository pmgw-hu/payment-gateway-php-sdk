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

	protected function getObject(): InfoCustomerGeneral
	{
		return new InfoCustomerGeneral();
	}
}
