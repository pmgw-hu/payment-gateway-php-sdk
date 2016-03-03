<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class OneClickOptions extends RequestAbstract
{
	/**
	 * @param string $providerName
	 * @param string $userID

	 */
	public function __construct(string $providerName, string $userID)
	{
		$this->data['providerName'] = $providerName;
		$this->data['userId'] = $userID;
	}

	/**
	 * @param string $storeName
	 * @return OneClickOptions
	 */
	public function setStoreName(string $storeName)
	{
		$this->data['storeName'] = $storeName;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_ONE_CLICK_OPTIONS;
	}
}