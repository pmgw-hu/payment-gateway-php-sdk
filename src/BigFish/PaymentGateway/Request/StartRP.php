<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class StartRP extends SimpleRequestAbstract
{
	/**
	 * @return string
	 */
	public function getMethod(): \string
	{
		return PaymentGateway::REQUEST_START_RP;
	}
}