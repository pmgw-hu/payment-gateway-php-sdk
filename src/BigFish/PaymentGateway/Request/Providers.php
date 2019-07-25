<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class Providers extends RequestAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = [
		'storeName' => 20
	];

	/**
	 * @param string $storeName
	 * @return Providers
	 */
	public function setStoreName(string $storeName)
	{
		return $this->setData($storeName, 'storeName');
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_PROVIDERS;
	}
}
