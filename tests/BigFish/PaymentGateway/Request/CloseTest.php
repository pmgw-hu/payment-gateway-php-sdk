<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\Close;
use BigFish\PaymentGateway\Request\RequestInterface;

class CloseTest extends SimpleRequestAbstract
{
	protected function getRequest(string $transactionId): RequestInterface
	{
		return new Close($transactionId);
	}
}
