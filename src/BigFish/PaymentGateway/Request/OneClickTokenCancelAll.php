<?php

namespace BigFish\PaymentGateway\Request;


class OneClickTokenCancelAll extends InitBaseAbstract
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
