<?php

namespace BigFish\PaymentGateway\Request;


class PaymentLinkDetails extends RequestAbstract
{
	const REQUEST_TYPE = 'PaymentLinkDetails';

	public function setPaymentLinkName(string $paymentLinkName)
	{
		return $this->setData($paymentLinkName, 'paymentLinkName');
	}

	/**
	 * @param bool $getInfoData Get info data block (true/false)
	 * @return $this
	 */
	public function setGetInfoData(bool $getInfoData)
	{
		return $this->setData($getInfoData, 'getInfoData');
	}
}
