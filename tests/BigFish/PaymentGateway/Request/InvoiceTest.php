<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\Invoice;
use BigFish\PaymentGateway\Request\RequestInterface;

class InvoiceTest extends SimpleTransactionRequestAbstract
{
	protected function getRequest(string $transactionId): RequestInterface
	{
		return (new Invoice())->setTransactionId($transactionId)->setInvoiceData(['test' => 'data']);
	}
}
