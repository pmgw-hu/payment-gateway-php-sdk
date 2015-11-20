<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class Refund extends RequestAbstract
{
	/**
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param float $amount
	 */
	public function __construct(\string $transactionId, \float $amount)
	{
		$this->data['transactionId'] = $transactionId;
		$this->data['amount'] = $amount;
	}

	/**
	 * @return string
	 */
	public function getMethod(): \string
	{
		return PaymentGateway::REQUEST_REFUND;
	}
}