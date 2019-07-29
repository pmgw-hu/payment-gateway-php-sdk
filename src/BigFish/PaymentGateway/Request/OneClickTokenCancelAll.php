<?php

namespace BigFish\PaymentGateway\Request;


class OneClickTokenCancelAll extends InitBasicAbstract
{
	const REQUEST_TYPE = 'OneClickTokenCancelAll';

	/**
	 * @param string $userId
	 * @return $this
	 */
	public function setUserId(string $userId): self
	{
		return $this->setData($userId, 'userId');
	}
}
