<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\RequestInterface;

abstract class SimpleTransactionRequestAbstract extends SimpleRequestAbstract
{

	const TRANSACTION_ID = 'transactionId';

	/**
	 * @param string $transactionId
	 * @return RequestInterface
	 */
	abstract protected function getRequest(string $transactionId): RequestInterface;

	/**
	 * @return array
	 */
	protected function getDataKeys():array
	{
		return array(
			self::TRANSACTION_ID => substr(md5(rand(100, 10000)), 0, 20)
		);
	}

	/**
	 * @param \Closure $function
	 */
	protected function getDataWithRequestFunction(\Closure $function)
	{
		$dataKeys = $this->getDataKeys();
		$transactionId = $dataKeys[self::TRANSACTION_ID] ?? 0;
		$req = $this->getRequest($transactionId);
		$this->assertNotEmpty($req->getData());
		foreach ($dataKeys as $dataKey => $value) {
			$function($dataKey, $value, $req);
		}
	}
}
