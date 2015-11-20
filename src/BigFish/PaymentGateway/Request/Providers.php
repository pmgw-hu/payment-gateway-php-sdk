<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class Providers extends RequestAbstract
{
	/**
	 * @param string $storeName
	 * @return Providers
	 */
	public function setStoreName(\string $storeName)
	{
		$this->data['storeName'] = $storeName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethod(): \string
	{
		return PaymentGateway::REQUEST_PROVIDERS;
	}
}