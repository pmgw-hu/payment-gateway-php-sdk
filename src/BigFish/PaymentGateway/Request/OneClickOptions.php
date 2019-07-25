<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class OneClickOptions extends InitBasicAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = [
		'providerName' => 20,
		'storeName' => 20,
		'userId' => 255
	];

	/**
	 * @param string $providerName
	 * @param string $userID
	 */
	public function __construct(string $providerName, string $userID)
	{
		$this->setProviderName($providerName);
		$this->setData($userID, 'userId');
		parent::__construct();
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_ONE_CLICK_OPTIONS;
	}
}