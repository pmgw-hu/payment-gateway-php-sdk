<?php

namespace BigFish\Tests\PaymentGateway;

use BigFish\PaymentGateway;

class AcceptanceSoapApiTest extends AcceptanceRestApiTest
{
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
}