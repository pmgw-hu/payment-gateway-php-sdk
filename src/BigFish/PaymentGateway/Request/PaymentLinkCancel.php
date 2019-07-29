<?php

namespace BigFish\PaymentGateway\Request;


class PaymentLinkCancel extends RequestAbstract
{
	const REQUEST_TYPE = 'PaymentLinkCancel';

	public function setPaymentLinkName(string $paymentLinkName)
	{
		return $this->setData($paymentLinkName, 'paymentLinkName');
	}
}
