<?php

namespace BigFish\Tests\Request;


use BigFish\PaymentGateway\Request\Init;

class InitTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 * @dataProvider dataProviderFor_parameterTest
	 * @param $testData
	 * @param $method
	 */
	public function parameterSetTest($testData, $method)
	{
		$init = $this->getRequest();
		$result = $init->$method($testData);

		$variableName = lcfirst(substr($method, 3));

		// test chain
		$this->assertInstanceOf(get_class($init), $result);
		$this->assertArrayHasKey($variableName, $init->getData());
		$this->assertEquals($testData, $init->getData()[$variableName]);
	}

	public function dataProviderFor_parameterTest()
	{
		return array(
			array('TestProvider', 'setProviderName'),
			array('http://test.hu', 'setResponseUrl'),
			array('http://test.hu', 'setNotificationUrl'),
			array(100, 'setAmount'),
			array(12345, 'setOrderId'),
			array(54321, 'setUserId'),
			array('EUR', 'setCurrency'),
			array('US', 'setLanguage'),
			array('+36305551234', 'setMppPhoneNumber'),
			array('4908366099900425', 'setOtpCardNumber'),
			array('1014', 'setOtpExpiration'),
			array('823', 'setOtpCvc'),
			array('07', 'setOtpCardPocketId'),
			array('&#!aBd2', 'setOtpConsumerRegistrationId'),
			array('823', 'setMkbSzepCafeteriaId'),
			array('1122-3344-5566-777', 'setMkbSzepCardNumber'),
			array('823', 'setMkbSzepCvv'),
			array(true, 'setOneClickPayment'),
			array('7612312312', 'setOneClickReferenceId'),
			array(true, 'setAutoCommit'),
		);
	}

	/**
	 * @test
	 */
	public function disableAutoCommit()
	{
		$init = $this->getRequest();
		$result = $init->disableAutoCommit();

		// test chain
		$this->assertInstanceOf(get_class($init), $result);
		$this->assertArrayHasKey('autoCommit', $init->getData());
		$this->assertFalse($init->getData()['autoCommit']);
	}

	/**
	 * @test
	 */
	public function setCurrency_defaultHUF()
	{
		$init = $this->getRequest();
		$init->setCurrency();
		$data = $init->getData();
		$this->assertEquals('HUF', $data['currency']);
	}

	/**
	 * @test
	 * @depends setCurrency_defaultHUF
	 */
	public function setMultipleParameterTest()
	{
		$init = $this->getRequest();
		$init->setAmount(10);
		$init->setCurrency('EUR');
		$init->setProviderName('test');

		$this->assertEquals(
			array(
				'amount' => 10,
                'currency' => 'EUR',
                'providerName' => 'test'
			),
			$init->getData()
		);
	}

	/**
	 * @test
	 */
	public function setLanguage_defaultHU()
	{
		$init = $this->getRequest();
		$init->setLanguage();
		$data = $init->getData();
		$this->assertEquals('HU', $data['language']);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function providerName_maxSizeCheck()
	{
		// max: 20
		$this->getRequest()->setProviderName(str_repeat('A', 21));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function amount_positiveNumberCheck()
	{
		$this->getRequest()->setAmount(-1);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function orderId_maxSizeCheck()
	{
		// max: 255
		$this->getRequest()->setOrderId(str_repeat('A', 256));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function userId_maxSizeCheck()
	{
		// max: 255
		$this->getRequest()->setUserId(str_repeat('A', 256));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function currency_maxSizeCheck()
	{
		// max: 4
		$this->getRequest()->setCurrency(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function language_maxSizeCheck()
	{
		// 2
		$this->getRequest()->setLanguage(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setResponseUrl_invalidUrl()
	{
		$request = $this->getRequest();
		$request->setResponseUrl('invalidUrl');
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setNotificationUrl_invalidUrl()
	{
		$this->getRequest()->setNotificationUrl(str_repeat('A', 256));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setNotificationUrl_sizeCheck()
	{
		$request = $this->getRequest();
		$request->setNotificationUrl('invalidUrl');
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setMppPhoneNumber_sizeCheck()
	{
		$this->getRequest()->setMppPhoneNumber(str_repeat('A', 33));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setOtpCardNumber_sizeCheck()
	{
		$this->getRequest()->setOtpCardNumber(str_repeat('A', 17));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setOtpExpiration_sizeCheck()
	{
		$this->getRequest()->setOtpExpiration(str_repeat('A', 5));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setOtpCvc_sizeCheck()
	{
		$this->getRequest()->setOtpCvc(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setOtpCardPocketId_sizeCheck()
	{
		$this->getRequest()->setOtpCardPocketId(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setMkbSzepCvv_sizeCheck()
	{
		$this->getRequest()->setMkbSzepCvv(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setAmount_isZero()
	{
		$request = $this->getRequest();
		$request->setAmount(0);
	}

	/**
	 * @return Init
	 */
	protected function getRequest()
	{
		return new Init();
	}

}
