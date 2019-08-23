<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Request\Providers;
use BigFish\PaymentGateway\Request\RequestInterface;

class ProviderTest extends SimpleTransactionRequestAbstract
{
	protected function getRequest(string $transactionId): RequestInterface
	{
		$provider = new Providers();
		$provider->setStoreName(PaymentGateway::PROVIDER_OTPAY);
		return $provider;
	}

	protected function getDataKeys():array
	{
		return array(
			'storeName' => PaymentGateway::PROVIDER_OTPAY
		);
	}
}
