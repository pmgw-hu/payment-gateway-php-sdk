<?php


namespace BigFish\Tests\PaymentGateway;


use BigFish\PaymentGateway;

class AcceptanceRestApiTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @_test
	 * @throws PaymentGateway\Exception\PaymentGatewayException
	 */
	public function ApiCall()
	{
		$config = $this->getConfig();
		$paymentGateWay = new PaymentGateway($config);
		$init = new PaymentGateway\Request\Init();
		$init->setAmount(10)
			->setCurrency()
			->setProviderName('provider');

		$paymentGateWay->send($init);

	}

	/**
	 * @return PaymentGateway\Config
	 */
	protected function getConfig() :PaymentGateway\Config
	{
		$config = new PaymentGateway\Config();
		$config->testMode = true;
		$config->useApi = true;
		return $config;
	}

	/**
	 * @test
	 * @todo: remove
	 */

	public function testFoo()
	{
		$this->assertTrue(true);
	}
}