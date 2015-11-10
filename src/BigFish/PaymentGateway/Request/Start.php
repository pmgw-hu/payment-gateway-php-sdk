<?php

namespace BigFish\PaymentGateway\Request;


use BigFish\PaymentGateway;

class Start extends RequestAbstract implements RedirectLocationInterface
{
	/**
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 */
	public function __construct($transactionId)
	{
		$this->data['transactionId'] = $transactionId;
	}

	/**
	 * @return string
	 */
	public function getMethod(): \string
	{
		return PaymentGateway::REQUEST_START;
	}

	/**
	 * @return string
	 */
	public function getRedirectUrl(): \string
	{
		return  '/Start?' . http_build_query($this->getUcFirstData());
	}
}