<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\OneClickTokenCancel;
use BigFish\PaymentGateway\Request\RequestInterface;

class OneClickTokenCancelTest extends SimpleTransactionRequestAbstract
{

	protected function getRequest(string $transactionId): RequestInterface
	{
		return (new OneClickTokenCancel())->setTransactionId($transactionId);
	}
}
