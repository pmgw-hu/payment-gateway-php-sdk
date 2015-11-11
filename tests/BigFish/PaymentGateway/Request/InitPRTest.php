<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\Init;
use BigFish\PaymentGateway\Request\InitRP;

class InitPRTest extends \PHPUnit_Framework_TestCase
{

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

	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('TestProvider', 'setProviderName'),
			array('http://test.hu', 'setResponseUrl'),
			array(100, 'setAmount'),
			array('23234', 'setReferenceTransactionId'),
			array(12345, 'setOrderId'),
			array(54321, 'setUserId'),
			array('EUR', 'setCurrency'),
		);
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
	public function setResponseUrl_invalidUrl()
	{
		$request = $this->getRequest();
		$request->setResponseUrl('invalidUrl');
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
		return new InitRP();
	}

}
