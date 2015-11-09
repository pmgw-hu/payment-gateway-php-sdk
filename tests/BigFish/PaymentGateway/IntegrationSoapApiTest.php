<?php

namespace BigFish\Tests\PaymentGateway;

use BigFish\PaymentGateway;

class IntegrationSoapApiTest extends IntegrationRestApiTest
{
	/**
	 * @return PaymentGateway\Config
	 */
	protected function getConfig() :PaymentGateway\Config
	{
		$config = new PaymentGateway\Config();
		$config->testMode = true;
		$config->useApi = false;
		return $config;
	}

	/**
	 * Disable test
	 */
	public function invoice()
	{

	}

	/**
	 * Disable test
	 */
	public function OneClickOptions()
	{

	}

	/**
	 * Disable test
	 */
	public function provider()
	{

	}

	/**
	 * Disable test
	 */
	public function finalize()
	{

	}


}