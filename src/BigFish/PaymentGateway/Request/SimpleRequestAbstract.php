<?php

namespace BigFish\PaymentGateway\Request;


abstract class SimpleRequestAbstract extends RequestAbstract
{
	/**
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @return $this
	 */
	public function setTransactionId(string $transactionId)
	{
		return $this->setData($transactionId, 'transactionId');
	}
}