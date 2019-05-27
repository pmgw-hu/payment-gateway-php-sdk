<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class Details extends RequestAbstract
{
	/**
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param bool $getRelatedTransactions Get related transactions (true/false)
	 */
	public function __construct(string $transactionId, bool $getRelatedTransactions = true)
	{
		$this->data['transactionId'] = $transactionId;
		$this->data['getRelatedTransactions'] = $getRelatedTransactions;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_DETAILS;
	}
}