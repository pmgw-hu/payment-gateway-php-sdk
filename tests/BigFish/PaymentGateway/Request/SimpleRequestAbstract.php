<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\RequestInterface;

abstract class SimpleRequestAbstract extends \PHPUnit_Framework_TestCase
{

	const TRANSACTION_ID = 'transactionId';

	/**
	 * @param string $transactionId
	 * @return RequestInterface
	 */
	abstract protected function getRequest(\string $transactionId): RequestInterface;

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
	 * @test
	 */
	public function getData()
	{
		$this->getDataWithRequestFunction(
			function ($dataKey, $value, RequestInterface $request) {
				$this->assertEquals($request->getData()[$dataKey], $value);
			}
		);
	}

	/**
	 * @test
	 */
	public function getUcFirstData()
	{
		$this->getDataWithRequestFunction(
			function ($dataKey, $value, RequestInterface $request) {
				$this->assertEquals($request->getUcFirstData()[ucfirst($dataKey)], $value);
			}
		);
	}

	/**
	 * @param \Closure $function
	 */
	protected function getDataWithRequestFunction(\Closure $function)
	{
		$dataKeys = $this->getDataKeys();
		$transactionId = isset($dataKeys[self::TRANSACTION_ID]) ? $dataKeys[self::TRANSACTION_ID] : 0;
		$req = $this->getRequest($transactionId);
		$this->assertNotEmpty($req->getData());
		foreach ($dataKeys as $dataKey => $value) {
			$function($dataKey, $value, $req);
		}
	}
}
