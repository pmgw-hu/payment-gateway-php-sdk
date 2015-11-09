<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\Details;
use BigFish\PaymentGateway\Request\RequestInterface;

class DetailsTest extends SimpleRequestAbstract
{
	protected function getRequest(\string $transactionId): RequestInterface
	{
		return new Details($transactionId);
	}
}
