<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Request\StartRP;

class StartRPTest extends SimpleTransactionRequestAbstract
{
	protected function getRequest(string $transactionId): RequestInterface
	{
		return (new StartRP())->setTransactionId($transactionId);
	}
}
