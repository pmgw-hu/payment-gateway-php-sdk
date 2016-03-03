<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\Invoice;
use BigFish\PaymentGateway\Request\RequestInterface;

class InvoiceTest extends SimpleRequestAbstract
{
	protected function getRequest(string $transactionId): RequestInterface
	{
		return new Invoice($transactionId, array('test' => 'data'));
	}
}
