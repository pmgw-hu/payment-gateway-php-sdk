<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\PaymentLinkDetails;
use BigFish\PaymentGateway\Request\RequestInterface;

class PaymentLinkDetailsTest extends SimplePaymentLinkRequestAbstract
{

	protected function getRequest(string $paymentLinkName): RequestInterface
	{
		return (new PaymentLinkDetails())->setPaymentLinkName($paymentLinkName)->setGetInfoData(true);
	}

	protected function getDataKeys():array
	{
		return array(
			self::PAYMENT_LINK_NAME => 'pl_' . substr(md5(rand(100, 10000)), 0, 20),
			'getInfoData' => true
		);
	}
}
