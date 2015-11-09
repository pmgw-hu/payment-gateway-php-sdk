<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\RequestInterface;

abstract class SimpleRequestAbstract extends \PHPUnit_Framework_TestCase
{

	abstract protected function getRequest(\string $transactionId): RequestInterface;

	/**
	 * @test
	 */
	public function getData()
	{
		$testTransactionId = substr(md5(rand(100, 10000)), 0, 20);
		$req = $this->getRequest($testTransactionId);
		$this->assertNotEmpty($req->getData());
		$this->assertEquals($req->getData()['transactionId'], $testTransactionId);
	}

	/**
	 * @test
	 */
	public function getUcFirstData()
	{
		$testTransactionId = substr(md5(rand(100, 10000)), 0, 20);
		$req = $this->getRequest($testTransactionId);
		$this->assertNotEmpty($req->getUcFirstData());
		$this->assertEquals($req->getUcFirstData()['TransactionId'], $testTransactionId);
	}
}
