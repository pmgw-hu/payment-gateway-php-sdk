<?php

namespace BigFish\Tests\PaymentGateway\Request;

use BigFish\PaymentGateway\Request\Finalize;
use BigFish\PaymentGateway\Request\RequestInterface;

class FinalizeTest extends SimpleTransactionRequestAbstract
{
	protected function getRequest(string $transactionId): RequestInterface
	{
		return (new Finalize())->setTransactionId($transactionId)->setAmount(1000);
	}

	protected function getDataKeys():array
	{
		$result = parent::getDataKeys();
		$result['amount'] = 1000;
		return $result;
	}

}
