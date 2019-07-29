<?php

namespace BigFish\PaymentGateway\Request;

class Close extends SimpleRequestAbstract
{
	const REQUEST_TYPE = 'Close';

	/**
	 * @param bool $approve Approve or decline transaction (true/false)
	 * @return $this
	 */
	public function setApprove(bool $approve)
	{
		return $this->setData($approve, 'approved');
	}
}