<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class Result extends RequestAbstract
{
	/**
	 * @param string $transactionId
	 */
	public function __construct(\string $transactionId)
	{
		$this->data['transactionId'] = $transactionId;
	}

	/**
	 * @return string
	 */
	public function getMethod(): \string
	{
		return PaymentGateway::REQUEST_RESULT;
	}
}