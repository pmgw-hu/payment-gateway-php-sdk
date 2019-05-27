<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class OneClickTokenCancelAll extends InitBasicAbstract
{
	/**
	 * @param string $providerName
	 * @param string $userID
	 */
	public function __construct(string $providerName, string $userID)
	{
		$this->setProviderName($providerName);
		$this->data['userId'] = $userID;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_ONE_CLICK_TOKEN_CANCEL_ALL;
	}
}
