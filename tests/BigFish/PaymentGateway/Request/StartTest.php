<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Request\Start;

class StartTest extends SimpleRequestAbstract
{
	protected function getRequest(string $transactionId): RequestInterface
	{
		return new Start($transactionId);
	}
}
