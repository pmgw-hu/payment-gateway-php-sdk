<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class InitRP extends InitAbstract
{
	/**
	 * Set the reference Payment Gateway transaction ID
	 *
	 * @param string $referenceTransactionId Identifier of the reference transaction ID
	 * @return InitRP
	 */
	public function setReferenceTransactionId(string $referenceTransactionId)
	{
		$this->data['referenceTransactionId'] = $referenceTransactionId;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_INIT_RP;
	}
}