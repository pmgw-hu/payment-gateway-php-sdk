<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\Log;
use BigFish\PaymentGateway\Request\RequestInterface;

class LogTest extends SimpleTransactionRequestAbstract
{
	protected function getRequest(string $transactionId): RequestInterface
	{
		return (new Log())->setTransactionId($transactionId);
	}
}
