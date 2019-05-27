<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Request\Settlement;

class SettlementTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @test
	 */
	public function setCurrency_defaultHUF()
	{
		$init = $this->getRequest();
		$init->setTransactionCurrency();
		$data = $init->getData();
		$this->assertEquals('HUF', $data['transactionCurrency']);
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
			array('store-name', 'setStoreName'),
			array(110, 'setLimit'),
			array(10, 'setOffset'),
			array(false, 'setGetItems'),
			array(false, 'setGetBatches'),
			array('transfer-notice', 'setTransferNotice'),
			array('2020-01-01', 'setSettlementDate'),
			array('MID-8822', 'setTerminalId'),
			array('EUR', 'setTransactionCurrency'),
		);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function terminalId_maxSizeCheck()
	{
		// max: 64
		$this->getRequest()->setTerminalId(str_repeat('A', 65));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function settlementDate_maxSizeCheck()
	{
		// max: 10
		$this->getRequest()->setSettlementDate(str_repeat('A', 11));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function currency_maxSizeCheck()
	{
		// max: 4
		$this->getRequest()->setTransactionCurrency(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function transferNotice_maxSizeCheck()
	{
		// max: 255
		$this->getRequest()->setTransferNotice(str_repeat('A', 256));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function limit_maxSizeCheck()
	{
		// max: 1000
		$this->getRequest()->setLimit(1001);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function storeName_maxSizeCheck()
	{
		// max: 20
		$this->getRequest()->setStoreName(str_repeat('A', 21));
	}

	/**
	 * @return Settlement
	 */
	protected function getRequest()
	{
		return new Settlement();
	}

	public function testSettlementDefaultData()
	{
		$settlement = $this->getRequest();
		$this->assertEquals(PaymentGateway::NAME, $settlement->getData()['moduleName']);
		$this->assertEquals(PaymentGateway::VERSION, $settlement->getData()['moduleVersion']);
	}

	public function testSettlementSetModuleName()
	{
		$settlement = $this->getRequest();
		$settlement->setModuleName('test');

		$this->assertArrayHasKey('moduleName', $settlement->getData());
		$this->assertEquals('test', $settlement->getData()['moduleName']);
	}

	public function testSettlementSetModuleVersion()
	{
		$settlement = $this->getRequest();
		$settlement->setModuleVersion('42');

		$this->assertArrayHasKey('moduleVersion', $settlement->getData());
		$this->assertEquals('42', $settlement->getData()['moduleVersion']);
	}
}
