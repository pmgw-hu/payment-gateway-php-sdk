<?php

namespace BigFish\PaymentGateway\Request;


use BigFish\PaymentGateway;

class Start extends SimpleRequestAbstract implements RedirectLocationInterface
{
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