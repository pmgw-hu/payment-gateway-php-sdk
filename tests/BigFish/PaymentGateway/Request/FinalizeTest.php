<?php

namespace BigFish\Tests\PaymentGateway\Request;

use BigFish\PaymentGateway\Request\Finalize;
use BigFish\PaymentGateway\Request\RequestInterface;

class FinalizeTest extends SimpleRequestAbstract
{
	protected function getRequest(\string $transactionId): RequestInterface
	{
		return new Finalize($transactionId, 1000);
	}
}
