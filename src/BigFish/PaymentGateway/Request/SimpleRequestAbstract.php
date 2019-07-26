<?php

namespace BigFish\PaymentGateway\Request;


abstract class SimpleRequestAbstract extends RequestAbstract
{
	/**
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 */
	public function __construct(string $transactionId)
	{
		$this->setData($transactionId, 'transactionId');
	}
}