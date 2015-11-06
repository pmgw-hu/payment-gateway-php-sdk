<?php

namespace BigFish\Tests\PaymentGateway\Transport;


use BigFish\PaymentGateway\Config;
use BigFish\PaymentGateway\Transport\RestTransport;

class RestTransportTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @__test: disable test (untestable)
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function curlFunctionNotExits()
	{
		$restTransport = new RestTransport(new Config());
		$restTransport->sendRequest();
	}

	/**
	 * @test
	 */
	public function a()
	{
		$this->assertTrue(true);
	}


}

