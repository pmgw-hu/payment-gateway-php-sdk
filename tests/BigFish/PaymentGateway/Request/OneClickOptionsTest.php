<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Request\OneClickOptions;
use BigFish\PaymentGateway\Request\RequestInterface;

class OneClickOptionsTest extends SimpleRequestAbstract
{

	protected function getRequest(\string $transactionId): RequestInterface
	{
		return new OneClickOptions(PaymentGateway::PROVIDER_OTPay, '12345');
	}

	protected function getDataKeys():array
	{
		return array(
			'providerName' => PaymentGateway::PROVIDER_OTPay,
			'userId' => '12345'
		);
	}


}
