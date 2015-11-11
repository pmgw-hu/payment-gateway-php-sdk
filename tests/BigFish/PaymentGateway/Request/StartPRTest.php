<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Request\StartRP;

class StartPRTest extends SimpleRequestAbstract
{
	protected function getRequest(\string $transactionId): RequestInterface
	{
		return new StartRP($transactionId);
	}
}
