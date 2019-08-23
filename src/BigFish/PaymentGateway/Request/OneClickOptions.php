<?php

namespace BigFish\PaymentGateway\Request;


class OneClickOptions extends InitBaseAbstract
{
	const REQUEST_TYPE = 'OneClickOptions';

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @param string $userId
	 * @return $this
	 */
	public function setUserId(string $userId): self
	{
		return $this->setData($userId, 'userId');
	}
}
