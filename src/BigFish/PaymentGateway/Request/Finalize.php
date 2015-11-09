<?php

namespace BigFish\PaymentGateway\Request;

class Finalize extends RequestAbstract implements RedirectLocationInterface
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
		return RequestAbstract::REQUEST_FINALIZE;
	}

	/**
	 * @return string
	 */
	public function getRedirectUrl()
	{
		return '/Finalize?' . http_build_query($this->getUcFirstData());
	}
}