<?php

namespace BigFish\PaymentGateway\Request;

class Providers extends RequestAbstract
{

	/**
	 * @param string $storeName
	 */
	public function setStoreName(\string $storeName)
	{
		$this->data['storeName'] = $storeName;
	}

	/**
	 * @return string
	 */
	public function getMethod(): \string
	{
		return RequestAbstract::REQUEST_PROVIDERS;
	}
}