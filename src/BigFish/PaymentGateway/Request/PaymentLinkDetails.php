<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class PaymentLinkDetails extends RequestAbstract
{
	/**
	 * @param string $paymentLinkName
	 * @param bool $getInfoData Get info data block (true/false)
	 */
	public function __construct(string $paymentLinkName, bool $getInfoData = false)
	{
		$this->data['paymentLinkName'] = $paymentLinkName;
		$this->data['getInfoData'] = $getInfoData;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_PAYMENT_LINK_DETAILS;
	}
}
