<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser;

class InfoCustomerBrowserTest extends InfoAbstractTest
{
	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8,application/json', 'setAcceptHeader'),
			array('1', 'setJavaEnabled'),
			array('en-US', 'setLanguage'),
			array('24', 'setColorDepth'),
			array('1024', 'setScreenHeight'),
			array('768', 'setScreenWidth'),
			array('+60', 'setTimeZone'),
			array('Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36', 'setUserAgent'),
			array('05', 'setWindowSize')
		);
	}

	/**
	 * @test
	 */
	public function setMultipleParameterTest()
	{
		$init = $this->getObject();
		$init->setJavaEnabled(0);
		$init->setScreenWidth('600');
		$init->setUserAgent('test');

		$this->assertArraySubset(
			array(
				'javaEnabled' => 0,
				'screenWidth' => '600',
				'userAgent' => 'test',
			),
			$init->getData()
		);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function acceptHeader_maxLengthCheck()
	{
		// max: 2048
		$this->getObject()->setAcceptHeader(str_repeat('A', 2049));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function javaEnabled_maxLengthCheck()
	{
		// max: 1
		$this->getObject()->setJavaEnabled(str_repeat('A', 2));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function language_maxLengthCheck()
	{
		// max: 8
		$this->getObject()->setLanguage(str_repeat('A', 9));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function colorDepth_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setColorDepth(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function screenHeight_maxLengthCheck()
	{
		// max: 6
		$this->getObject()->setScreenHeight(str_repeat('A', 7));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function screenWidth_maxLengthCheck()
	{
		// max: 6
		$this->getObject()->setScreenWidth(str_repeat('A', 7));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function timeZone_maxLengthCheck()
	{
		// max: 5
		$this->getObject()->setTimeZone(str_repeat('A', 6));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function userAgent_maxLengthCheck()
	{
		// max: 2048
		$this->getObject()->setUserAgent(str_repeat('A', 2049));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function windowSize_maxLengthCheck()
	{
		// max: 2
		$this->getObject()->setWindowSize(str_repeat('A', 3));
	}

	protected function getObject(): InfoCustomerBrowser
	{
		return new InfoCustomerBrowser();
	}
}
