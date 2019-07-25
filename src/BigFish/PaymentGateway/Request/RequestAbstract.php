<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway\Common\BaseAbstract;

abstract class RequestAbstract extends BaseAbstract implements RequestInterface
{
	/**
	 * @return null|string
	 */
	public function getMethod(): string
	{
		return null;
	}
}
