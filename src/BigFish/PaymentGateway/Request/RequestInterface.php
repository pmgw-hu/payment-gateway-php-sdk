<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway\Common\BaseInterface;

interface RequestInterface extends BaseInterface
{
	/**
	 * @return string
	 */
	public function getMethod(): string;
}
