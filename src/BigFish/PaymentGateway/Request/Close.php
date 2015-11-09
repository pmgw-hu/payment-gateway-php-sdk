<?php

namespace BigFish\PaymentGateway\Request;

class Close extends RequestAbstract
{
	/**
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param bool $approve
	 */
	public function __construct(\string $transactionId, \bool $approve = true)
	{
		$this->data['transactionId'] = $transactionId;
		$this->data['approved'] = $approve;
	}

	/**
	 * @return string
	 */
	public function getMethod(): \string
	{
		return RequestAbstract::REQUEST_CLOSE;
	}
}