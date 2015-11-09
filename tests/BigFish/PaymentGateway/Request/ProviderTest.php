<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Request\Providers;
use BigFish\PaymentGateway\Request\RequestInterface;

class ProviderTest extends SimpleRequestAbstract
{
	protected function getRequest(\string $transactionId): RequestInterface
	{
		$provider = new Providers();
		$provider->setStoreName(PaymentGateway::PROVIDER_OTPay);
		return $provider;
	}

	protected function getDataKeys():array
	{
		return array(
			'storeName' => PaymentGateway::PROVIDER_OTPay
		);
	}


}
