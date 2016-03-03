<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class Details extends SimpleRequestAbstract
{
	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_DETAILS;
	}
}