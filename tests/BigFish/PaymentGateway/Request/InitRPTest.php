<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Request\Init;
use BigFish\PaymentGateway\Request\InitRP;

class InitRPTest extends \PHPUnit\Framework\TestCase
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
	 * @return InitRP
	 */
	protected function getRequest()
	{
		return new InitRP();
	}

	public function testInitRPDefaultData()
	{
		$initRp = new InitRP();
		$this->assertEquals(PaymentGateway::NAME, $initRp->getData()['moduleName']);
		$this->assertEquals(PaymentGateway::VERSION, $initRp->getData()['moduleVersion']);
	}

	public function testInitRPSetModuleName()
	{
		$initRp = new InitRP();
		$initRp->setModuleName('test');

		$this->assertArrayHasKey('moduleName', $initRp->getData());
		$this->assertEquals('test', $initRp->getData()['moduleName']);
	}

	public function testInitRPSetModuleVersion()
	{
		$initRp = new InitRP();
		$initRp->setModuleVersion('42');

		$this->assertArrayHasKey('moduleVersion', $initRp->getData());
		$this->assertEquals('42', $initRp->getData()['moduleVersion']);
	}

}
