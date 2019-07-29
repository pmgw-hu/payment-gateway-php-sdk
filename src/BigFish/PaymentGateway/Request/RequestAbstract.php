<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway\Common\BaseAbstract;

abstract class RequestAbstract extends BaseAbstract implements RequestInterface
{
	const REQUEST_TYPE = 'RequestAbstract';

	/**
	 * @return null|string
	 */
	public function getMethod(): string
	{
		return static::REQUEST_TYPE;
	}
}
