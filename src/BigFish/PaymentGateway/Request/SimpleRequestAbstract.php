<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

abstract class SimpleRequestAbstract extends RequestAbstract
{
	/**
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 */
	public function __construct(\string $transactionId)
	{
		$this->data['transactionId'] = $transactionId;
	}
}