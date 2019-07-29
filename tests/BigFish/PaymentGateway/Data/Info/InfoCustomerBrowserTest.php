<?php

namespace BigFish\Tests\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Data\Info\Customer\InfoCustomerBrowser;

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

	protected function getObject(): InfoCustomerBrowser
	{
		return new InfoCustomerBrowser();
	}
}
