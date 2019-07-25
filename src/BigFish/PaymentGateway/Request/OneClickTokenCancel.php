<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class OneClickTokenCancel extends RequestAbstract
{
	/**
	 * @param string $transactionId
	 */
	public function __construct(string $transactionId)
	{
		$this->setData($transactionId, 'transactionId');
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_ONE_CLICK_TOKEN_CANCEL;
	}
}
