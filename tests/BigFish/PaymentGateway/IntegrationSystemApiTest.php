<?php

namespace BigFish\Tests\PaymentGateway;


use BigFish\PaymentGateway;

class IntegrationSystemApiTest extends IntegrationAbstract
{
	/**
	 * @test
	 * @return
	 * @throws PaymentGateway\Exception\PaymentGatewayException
	 */
	public function init()
	{
		$paymentGateWay = $this->getPaymentGateway();
		$init = new PaymentGateway\Request\Init();
		$init->setAmount(10)
			->setCurrency()
			->setProviderName(PaymentGateway::PROVIDER_OTPAY)
			->setResponseUrl('http://integration.test.bigfish.hu')
			->setAutoCommit();

		$result = $paymentGateWay->send($init);
		$this->assertNotEmpty($result->TransactionId, 'No transaction id. Error: ' . $result->ResultMessage);
		return $result->TransactionId;
	}

	/**
	 * @test
	 * @return
	 * @throws PaymentGateway\Exception\PaymentGatewayException
	 */
	public function initBorgun()
	{
		$paymentGateWay = $this->getPaymentGateway();
		$init = new PaymentGateway\Request\Init();
		$init->setAmount(99)
			->setUserId(123)
			->setOrderId(123)
			->setCurrency()
			->setOneClickPayment()
			->setOneClickForcedRegistration()
			->setProviderName(PaymentGateway::PROVIDER_BORGUN2)
			->setResponseUrl('http://integration.test.bigfish.hu')
			->setAutoCommit()
			->setExtra();

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
			new PaymentGateway\Request\Details($this->init(), false)
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
			new PaymentGateway\Request\OneClickOptions(PaymentGateway::PROVIDER_OTP_SIMPLE, 'BF-TEST-USER-REG')
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
	 * @test
	 * @depends init
	 * @runInSeparateProcess
	 */
	public function oneClickTokenCancelAll()
	{
		$this->assertApiResponse(
			new PaymentGateway\Request\OneClickTokenCancelAll(PaymentGateway::PROVIDER_BORGUN2, 'sdk_test')
		);
	}

	/**
	 * @test
	 * @return PaymentGateway\Transport\Response\ResponseInterface
	 */
	public function initPaylink()
	{
		$paymentGateWay = $this->getPaymentGateway();
		$createPaylink = new PaymentGateway\Request\PaymentLinkCreate();
		$createPaylink->setAmount(99)
			->setCurrency()
			->setProviderName(PaymentGateway::PROVIDER_OTPAY)
			->setNotificationUrl('http://integration.test.bigfish.hu')
			->setNotificationEmail('test@test.com')
			->setAutoCommit();

		$result = $paymentGateWay->send($createPaylink);

		$this->assertNotEmpty($result->PaymentLinkName, 'No paymentLink name. Error: ' . $result->ResultMessage);
		return $result;
	}

	/**
	 * @test
	 * @return PaymentGateway\Transport\Response\ResponseInterface
	 */
	public function initPaylink_missingParameter()
	{
		$paymentGateWay = $this->getPaymentGateway();
		$createPaylink = new PaymentGateway\Request\PaymentLinkCreate();
		$createPaylink->setAmount(99)
			->setCurrency()
			->setProviderName(PaymentGateway::PROVIDER_OTPAY)
			->setNotificationUrl('http://integration.test.bigfish.hu')
			->setAutoCommit();

		$result = $paymentGateWay->send($createPaylink);

		$this->assertNotEquals('SUCCESSFUL', $result->ResultCode);
		return $result;
	}

	/**
	 * @test
	 * @depends initPaylink
	 * @runInSeparateProcess
	 */
	public function startPaylink()
	{
		$paylinkResult = $this->initPaylink();
		$data = file_get_contents($paylinkResult->PaymentLinkUrl);

		$this->assertNotContains('alert alert-error', $data);
	}

	/**
	 * @test
	 * @depends initPaylink
	 * @runInSeparateProcess
	 */
	public function cancelPaylink()
	{
		$paylinkResult = $this->initPaylink();
		$paymentGateWay = $this->getPaymentGateway();
		$createPaylink = new PaymentGateway\Request\PaymentLinkCancel($paylinkResult->PaymentLinkName);
		$result = $paymentGateWay->send($createPaylink);

		$this->assertNotEmpty($result->PaymentLinkName, sprintf('Error: %s %s', $result->ResultCode, $result->ResultMessage));
	}

	/**
	 * @test
	 * @depends initPaylink
	 * @runInSeparateProcess
	 */
	public function detailsPaymentLink()
	{
		$paymentlink = $this->initPaylink()->PaymentLinkName;
		$this->assertApiResponse(
			new PaymentGateway\Request\PaymentLinkDetails($paymentlink)
		);
	}

	/**
	 * @test
	 * @return PaymentGateway\Transport\Response\ResponseInterface
	 */
	public function settlement()
	{
		$paymentGateWay = $this->getPaymentGateway();
		$settlement = new PaymentGateway\Request\Settlement();
		$settlement->setStoreName('sdk_test')
			->setProviderName(PaymentGateway::PROVIDER_OTP_SIMPLE)
			->setTerminalId('P000401')
			->setSettlementDate('2019-03-25')
			->setTransactionCurrency('HUF')
			->setLimit(100);

		$result = $paymentGateWay->send($settlement);

		$this->assertNotEmpty($result->Data, sprintf('Error: %s - %s', $result->ResultCode, $result->ResultMessage));
		return $result;
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function unknownTransport()
	{
		$config = $this->getConfig();
		$config->apiType = 'non exist transport type';

		$paymentGateWay = new PaymentGateway($config);
		$init = new PaymentGateway\Request\Init();
		$init->setAmount(50)
				->setProviderName(PaymentGateway::PROVIDER_OTPAY)
				->setResponseUrl('http://integration.test.bigfish.hu');
		$paymentGateWay->send($init);
	}

	/**
	 * @test
	 */
	public function convertOutPut()
	{
		$config = $this->getConfig();
		$config->outCharset = PaymentGateway\Config::CHARSET_LATIN1;
		$paymentGateWay = new PaymentGateway($config);
		$init = $this->getConvertOutPutInitRequest();
		$response = $paymentGateWay->send($init);
		$testString = 'Ismeretlen szolgáltató (invalid_Rovider)';
		$this->assertNotEquals($testString, $response->ResultMessage);

		$this->assertEquals(iconv("UTF-8", PaymentGateway\Config::CHARSET_LATIN1, $testString), $response->ResultMessage);
	}
}
