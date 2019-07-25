<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class Invoice extends RequestAbstract
{
	/**
	 * @param string $transactionId Transaction ID received from Payment Gateway
	 * @param array $invoiceData
	 */
	public function __construct(string $transactionId, array $invoiceData)
	{
		$this->setData($transactionId, 'transactionId');
		$this->data['invoiceData'] = $invoiceData;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_INVOICE;
	}
}