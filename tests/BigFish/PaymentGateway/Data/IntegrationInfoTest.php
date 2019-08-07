<?php

namespace BigFish\Tests\PaymentGateway\Data;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Request\Init;
use BigFish\PaymentGateway\Transport\Response\ResponseInterface;
use BigFish\Tests\PaymentGateway\IntegrationAbstract;

class IntegrationInfoTest extends IntegrationAbstract
{
	/**
	 * @return array
	 */
	public function dataProviderFor_methodTest()
	{
		return array(
			array('getInitTransactionWithOneInfoData', 'validateTransaction', 'validateOneInfoDetails'),
			array('getInitTransactionWithMoreInfoData','validateTransaction', 'validateMoreInfoDetails'),
			array('getInitPaymentLinkWithOneInfoData', 'validatePaymentLink', 'validatePaymentLinkOneInfoDetails'),
			array('getInitPaymentLinkWithMoreInfoData', 'validatePaymentLink', 'validatePaymentLinkMoreInfoDetails'),
		);
	}

	/**
	 * @test
	 * @dataProvider dataProviderFor_methodTest
	 * @param $testFunction
	 * @param $validateMethod
	 * @param $validateFunction
	 */
	public function methodTest($testFunction, $validateMethod, $validateFunction)
	{
		$paymentGateWay = $this->getPaymentGateway();
		$result = $paymentGateWay->send($this->$testFunction());

		$this->$validateMethod($result);
		$this->$validateFunction($result);

		$this->start($result);
	}

	/**
	 * @test
	 */
	public function transactionWithoutInfoData()
	{
		$paymentGateWay = $this->getPaymentGateway();
		$init = $this->getInit();
		$result = $paymentGateWay->send($init);

		$this->validateTransaction($result);

		$response = $this->assertApiResponse(
			(new PaymentGateway\Request\Details())->setTransactionId($result->TransactionId)
		);

		$this->assertEmpty($response->InfoData, 'InfoData not empty');

	}

	public function getInitTransactionWithOneInfoData()
	{
		$init = $this->getInit();
		$info = $this->getSimpleInfoObject();

		return $init->setInfo($info);
	}

	public function getInitTransactionWithMoreInfoData()
	{
		$init = $this->getInit();
		$info = $this->getMultipleInfoObject();

		return $init->setInfo($info);
	}

	public function getInitPaymentLinkWithOneInfoData()
	{
		$init = $this->getPaymentLinkInit();
		$info = $this->getSimpleInfoObject();

		return $init->setInfo($info);
	}

	public function getInitPaymentLinkWithMoreInfoData()
	{
		$init = $this->getPaymentLinkInit();
		$info = $this->getMultipleInfoObject();

		return $init->setInfo($info);
	}

	public function validateTransaction(ResponseInterface $result)
	{
		$this->assertNotEmpty($result->TransactionId, 'No transaction id. Error: ' . $result->ResultMessage);
	}

	public function validatePaymentLink(ResponseInterface $result)
	{
		$this->assertNotEmpty($result->PaymentLinkName, 'No paymentLink name. Error: ' . $result->ResultMessage);
	}

	public function validateOneInfoDetails(ResponseInterface $result)
	{
		$response = $this->assertApiResponse(
			(new PaymentGateway\Request\Details())
				->setTransactionId($result->TransactionId)
				->setGetRelatedTransactions(false)
				->setGetInfoData(true)
		);
		$this->assertNotEmpty($response->InfoData, 'InfoData empty');
		$this->assertArraySubset($this->getSimpleInfoObject()->getData(), $response->InfoData);

		$response = $this->assertApiResponse(
			(new PaymentGateway\Request\Details())
				->setTransactionId($result->TransactionId)
				->setGetRelatedTransactions(false)
				->setGetInfoData(false)
		);
		$this->assertEmpty($response->InfoData, 'InfoData not empty');
	}

	public function validateMoreInfoDetails(ResponseInterface $result)
	{
		$response = $this->assertApiResponse(
			(new PaymentGateway\Request\Details())
				->setTransactionId($result->TransactionId)
				->setGetRelatedTransactions(false)
				->setGetInfoData(true)
		);
		$this->assertNotEmpty($response->InfoData, 'InfoData empty');
		$this->assertArraySubset($this->getMultipleInfoObject()->getData(), $response->InfoData);

		$response = $this->assertApiResponse(
			(new PaymentGateway\Request\Details())
				->setTransactionId($result->TransactionId)
				->setGetRelatedTransactions(false)
				->setGetInfoData(false)
		);
		$this->assertEmpty($response->InfoData, 'InfoData not empty');
	}

	public function validatePaymentLinkOneInfoDetails(ResponseInterface $result)
	{
		$response = $this->assertApiResponse(
			(new PaymentGateway\Request\PaymentLinkDetails())
				->setPaymentLinkName($result->PaymentLinkName)
				->setGetInfoData(true)
		);
		$this->assertNotEmpty($response->InfoData, 'InfoData empty');
		$this->assertArraySubset($this->getSimpleInfoObject()->getData(), $response->InfoData);

		$response = $this->assertApiResponse(
			(new PaymentGateway\Request\PaymentLinkDetails())
				->setPaymentLinkName($result->PaymentLinkName)
				->setGetInfoData(false)
		);
		$this->assertEmpty($response->InfoData, 'InfoData not empty');
	}

	public function validatePaymentLinkMoreInfoDetails(ResponseInterface $result)
	{
		$response = $this->assertApiResponse(
			(new PaymentGateway\Request\PaymentLinkDetails())
				->setPaymentLinkName($result->PaymentLinkName)
				->setGetInfoData(true)
		);
		$this->assertNotEmpty($response->InfoData, 'InfoData empty');
		$this->assertArraySubset($this->getMultipleInfoObject()->getData(), $response->InfoData);

		$response = $this->assertApiResponse(
			(new PaymentGateway\Request\PaymentLinkDetails())
				->setPaymentLinkName($result->PaymentLinkName)
				->setGetInfoData(false)
		);
		$this->assertEmpty($response->InfoData, 'InfoData not empty');
	}

	public function start(ResponseInterface $result)
	{
		$url = '';
		if ($result->PaymentLinkUrl) {
			$url = $result->PaymentLinkUrl;
		}

		if ($result->TransactionId) {
			$paymentGateWay = $this->getPaymentGateway();
			$request = (new PaymentGateway\Request\Start())->setTransactionId($result->TransactionId);
			$url = $paymentGateWay->getRedirectUrl($request);
		}

		$data = file_get_contents($url);
		$this->assertNotContains('alert alert-error', $data);
	}

	public function getInit()
	{
		$init = new Init();
		$init->setAmount(10)
			->setCurrency('HUF')
			->setProviderName(PaymentGateway::PROVIDER_OTPAY)
			->setResponseUrl('http://integration.test.bigfish.hu')
			->setAutoCommit();

		return $init;
	}

	public function getPaymentLinkInit()
	{
		$createPaylink = new PaymentGateway\Request\PaymentLinkCreate();
		$createPaylink->setAmount(99)
			->setCurrency('HUF')
			->setProviderName(PaymentGateway::PROVIDER_OTPAY)
			->setNotificationUrl('http://integration.test.bigfish.hu')
			->setNotificationEmail('test@test.com')
			->setAutoCommit();

		return $createPaylink;
	}

	public function getSimpleInfoObject()
	{
		$info = new PaymentGateway\Data\Info();
		$browser = new PaymentGateway\Data\Info\Customer\InfoCustomerBrowser();
		$browser->setUserAgent('test');
		$browser->setScreenWidth('500');
		$browser->setAcceptHeader('header');

		return $info->setObject($browser);
	}

	public function getMultipleInfoObject()
	{
		$info = $this->getSimpleInfoObject();

		$recurring = new PaymentGateway\Data\Info\Order\InfoOrderRecurringPayment();
		$recurring->setFrequency('12');

		$shipping = new PaymentGateway\Data\Info\Order\InfoOrderShippingData();
		$shipping->setFirstName('First Name');
		$shipping->setLastName('Last Name');
		$shipping->setLine2('Line2');

		$billing = new PaymentGateway\Data\Info\Order\InfoOrderBillingData();
		$billing->setFirstName('First Name');
		$billing->setLastName('Last Name');
		$billing->setLine1('Line1');
		$billing->setEmail('test@email.com');

		$orderGeneral = new PaymentGateway\Data\Info\Order\InfoOrderGeneral();
		$orderGeneral->setGiftCardCount('12');
		$orderGeneral->setReorderItems('02');
		$orderGeneral->setTransactionType('01');

		return $info->setObject($orderGeneral)->setObject($recurring)->setObject($shipping)->setObject($billing);
	}
}
