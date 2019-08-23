<?php

namespace BigFish\PaymentGateway\Request;


class InitRP extends InitAbstract
{
	const REQUEST_TYPE = 'InitRP';

	/**
	 * Set the reference Payment Gateway transaction ID
	 *
	 * @param string $referenceTransactionId Identifier of the reference transaction ID
	 * @return InitRP
	 */
	public function setReferenceTransactionId(string $referenceTransactionId)
	{
		return $this->setData($referenceTransactionId, 'referenceTransactionId');
	}
}