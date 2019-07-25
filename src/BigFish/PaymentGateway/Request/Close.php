<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class Close extends RequestAbstract
{
	/**
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param bool $approve Approve or decline transaction (true/false)
	 */
	public function __construct(string $transactionId, bool $approve = true)
	{
		$this->setData($transactionId, 'transactionId');
		$this->setData($approve, 'approved');
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_CLOSE;
	}
}