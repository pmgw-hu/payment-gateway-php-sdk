<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class PaymentLinkDetails extends RequestAbstract
{
	/**
	 * @param string $paymentLinkName
	 */
	public function __construct(string $paymentLinkName)
	{
		$this->data['paymentLinkName'] = $paymentLinkName;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_PAYMENT_LINK_DETAILS;
	}
}
