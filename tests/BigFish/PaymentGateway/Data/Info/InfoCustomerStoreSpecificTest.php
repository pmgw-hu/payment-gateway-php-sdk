<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\InfoCustomerStoreSpecific;

class InfoCustomerStoreSpecificTest extends InfoAbstractTest
{
	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('2018-05-10', 'setUpdateDate'),
			array('03', 'setUpdateDateIndicator'),
			array('2016-04-01', 'setCreationDate'),
			array('05', 'setCreationDateIndicator'),
			array('2016-04-01', 'setPasswordChangeDate'),
			array('01', 'setPasswordChangeDateIndicator'),
			array('2019-04-28 12:00:01', 'setAuthenticationTimestamp'),
			array('05', 'setAuthenticationMethod'),
			array('01', 'setChallengeIndicator'),
			array('2016-05-05', 'setShippingAddressFirstUse'),
			array('04', 'setShippingAddressFirstUseIndicator'),
			array('5', 'setCardTransactionsLastDay'),
			array('2018-08-05', 'setCardCreationDate'),
			array('05', 'setCardCreationDateIndicator'),
			array('2', 'setTransactionsLastDay'),
			array('95', 'setTransactionsLastYear'),
			array('6', 'setPurchasesLastSixMonths'),
			array('01', 'setSuspiciousActivity')
		);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function updateDate_maxLengthCheck()
	{
		// max: 10
		$this->getObject()->setUpdateDate(str_repeat('A', 11));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function updateDateIndicator_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setUpdateDateIndicator(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function creationDate_maxLengthCheck()
	{
		// max: 10
		$this->getObject()->setCreationDate(str_repeat('A', 11));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function creationDateIndicator_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setCreationDateIndicator(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function passwordChangeDate_maxLengthCheck()
	{
		// max: 10
		$this->getObject()->setPasswordChangeDate(str_repeat('A', 11));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function passwordChangeDateIndicator_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setPasswordChangeDateIndicator(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function authenticationTimestamp_maxLengthCheck()
	{
		// max: 19
		$this->getObject()->setAuthenticationTimestamp(str_repeat('A', 20));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function authenticationMethod_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setAuthenticationMethod(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function challengeIndicator_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setChallengeIndicator(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function shippingAddressFirstUse_maxLengthCheck()
	{
		// max: 10
		$this->getObject()->setShippingAddressFirstUse(str_repeat('A', 11));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function shippingAddressFirstUseIndicator_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setShippingAddressFirstUseIndicator(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function cardTransactionsLastDay_maxLengthCheck()
	{
		// max: 3
		$this->getObject()->setCardTransactionsLastDay(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function cardCreationDate_maxLengthCheck()
	{
		// max: 10
		$this->getObject()->setCardCreationDate(str_repeat('A', 11));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function cardCreationDateIndicator_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setCreationDateIndicator(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function transactionsLastDay_maxLengthCheck()
	{
		// max: 3
		$this->getObject()->setTransactionsLastDay(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function transactionsLastYear_maxLengthCheck()
	{
		// max: 3
		$this->getObject()->setTransactionsLastYear(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function purchasesLastSixMonths_maxLengthCheck()
	{
		// max: 4
		$this->getObject()->setPurchasesLastSixMonths(str_repeat('A', 5));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function suspiciousActivity_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setSuspiciousActivity(str_repeat('A', 3));
	}

	protected function getObject(): InfoCustomerStoreSpecific
	{
		return new InfoCustomerStoreSpecific();
	}
}
