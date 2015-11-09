<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Request\StartPR;

class StartPRTest extends SimpleRequestAbstract
{
	protected function getRequest(\string $transactionId): RequestInterface
	{
		return new StartPR($transactionId);
	}
}
