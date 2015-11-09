<?php


namespace BigFish\Tests\PaymentGateway;


use BigFish\PaymentGateway;

class IntegrationRestApiTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 * @throws PaymentGateway\Exception\PaymentGatewayException
	 */
	public function init()
	{
		$paymentGateWay = $this->getPaymentGateway();
		$init = new PaymentGateway\Request\Init();
		$init->setAmount(10)
			->setCurrency()
			->setProviderName(PaymentGateway::PROVIDER_OTPay)
			->setResponseUrl('http://integration.test.bigfish.hu');

		$result = $paymentGateWay->send($init);
		$this->assertNotEmpty($result->TransactionId, 'No transaction id. Error: ' . $result->ResultMessage);
		return $result->TransactionId;
	}

	/**
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function start()
	{
		$transactionId = $this->init();
		$paymentGateWay = $this->getPaymentGateway();
		$paymentGateWay
				->expects($this->atLeastOnce())
				->method('terminate');

		$request = new PaymentGateway\Request\Start($transactionId);
		$paymentGateWay->send($request);

		$data = file_get_contents($paymentGateWay->getRedirectUrl($request));
		$this->assertNotContains('alert alert-error', $data);
	}

	/**
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function finalize()
	{
		$transactionId = $this->init();
		$paymentGateWay = $this->getPaymentGateway();
		$paymentGateWay
				->expects($this->atLeastOnce())
				->method('terminate');

		$request = new PaymentGateway\Request\Finalize($transactionId, 1000);
		$paymentGateWay->send($request);

		$data = file_get_contents($paymentGateWay->getRedirectUrl($request));
		$this->assertNotContains('alert alert-error', $data);
	}

	/**
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function result()
	{
		$this->assertApiResponse(
			new PaymentGateway\Request\Result($this->init())
		);
	}

	/**
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function close_approved()
	{
		$this->assertApiResponse(
			new PaymentGateway\Request\Close($this->init(), true)
		);
	}

	/**
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function close_notApproved()
	{
		$this->assertApiResponse(
			new PaymentGateway\Request\Details($this->init())
		);
	}

	/**
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function invoice()
	{
		$this->assertApiResponse(
			new PaymentGateway\Request\Invoice($this->init(), array(
				'name' => 'test'
			))
		);
	}

	/**
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function log()
	{
		$this->assertApiResponse(
			new PaymentGateway\Request\Log($this->init())
		);
	}

	/**
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function OneClickOptions()
	{
		$this->assertApiResponse(
			new PaymentGateway\Request\OneClickOptions(PaymentGateway::PROVIDER_OTPay, '12345')
		);
	}

	/**
	 * @test
	 * @runInSeparateProcess
	 */
	public function provider()
	{
		$this->assertApiResponse(
			new PaymentGateway\Request\Providers()
		);
	}

	/**
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function refund()
	{
		$this->assertApiResponse(
			new PaymentGateway\Request\Refund($this->init(), 1000)
		);
	}

	/**
	 * @param PaymentGateway\Request\RequestInterface $requestInterface
	 */
	protected function assertApiResponse(PaymentGateway\Request\RequestInterface $requestInterface)
	{
		$paymentGateWay = $this->getPaymentGateway();
		$response = $paymentGateWay->send($requestInterface);
		$this->assertNotEmpty($response->getData());
	}

	/**
	 * @return PaymentGateway\Config
	 */
	protected function getConfig() :PaymentGateway\Config
	{
		$config = new PaymentGateway\Config();
		$config->testMode = true;
		$config->useApi = true;
		return $config;
	}

	/**
	 * @return \PHPUnit_Framework_MockObject_MockObject|\BigFish\PaymentGateway
	 */
	protected function getPaymentGateway()
	{
		$config = $this->getConfig();
		$paymentGateWay = $this->getMock('\BigFish\PaymentGateway', array('terminate'), array($config));
		//$paymentGateWay = new PaymentGateway($config);
		return $paymentGateWay;
	}
}