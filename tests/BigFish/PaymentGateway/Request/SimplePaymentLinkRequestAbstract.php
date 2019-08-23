<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\RequestInterface;

abstract class SimplePaymentLinkRequestAbstract extends SimpleRequestAbstract
{

	const PAYMENT_LINK_NAME = 'paymentLinkName';

	/**
	 * @param string $paymentLinkName
	 * @return RequestInterface
	 */
    abstract protected function getRequest(string $paymentLinkName): RequestInterface;

	/**
	 * @return array
	 */
	protected function getDataKeys():array
	{
		return array(
			self::PAYMENT_LINK_NAME => 'pl_' . substr(md5(rand(100, 10000)), 0, 20)
		);
	}

    /**
     * @param \Closure $function
     */
    protected function getDataWithRequestFunction(\Closure $function)
    {
        $dataKeys = $this->getDataKeys();
		$transactionId = $dataKeys[self::PAYMENT_LINK_NAME] ?? 0;
        $req = $this->getRequest($transactionId);
        $this->assertNotEmpty($req->getData());
        foreach ($dataKeys as $dataKey => $value) {
            $function($dataKey, $value, $req);
        }
    }
}
