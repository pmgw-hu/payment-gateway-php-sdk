<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser;

abstract class InfoAbstractTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * @test
	 * @dataProvider dataProviderFor_parameterTest
	 * @param $testData
	 * @param $method
	 */
	public function parameterSetTest($testData, $method)
	{
		$init = $this->getObject();
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
			array('value', 'field2')
		);
	}

	protected function getObject()
	{
		return new InfoCustomerBrowser();
	}
}
