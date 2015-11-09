<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Request\Result;

class ResultTest extends SimpleRequestAbstract
{
	protected function getRequest(\string $transactionId): RequestInterface
	{
		return new Result($transactionId);
	}
}
