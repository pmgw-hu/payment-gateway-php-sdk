<?php

namespace BigFish\PaymentGateway\Request;

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
		return RequestAbstract::REQUEST_RESULT;
	}
}