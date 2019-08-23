<?php

namespace BigFish\Tests\PaymentGateway;


use BigFish\PaymentGateway;

class IntegrationAbstract extends \PHPUnit\Framework\TestCase
{
	protected function getMock($originalClassName, $methods = [], array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false, $callOriginalMethods = false, $proxyTarget = null)
	{
		$builder = $this->getMockBuilder($originalClassName);

		if (is_array($methods)) {
			$builder->setMethods($methods);
		}

		if (is_array($arguments)) {
			$builder->setConstructorArgs($arguments);
		}

		$callOriginalConstructor ? $builder->enableOriginalConstructor() : $builder->disableOriginalConstructor();
		$callOriginalClone ? $builder->enableOriginalClone() : $builder->disableOriginalClone();
		$callAutoload ? $builder->enableAutoload() : $builder->disableAutoload();
		$cloneArguments ? $builder->enableOriginalClone() : $builder->disableOriginalClone();
		$callOriginalMethods ? $builder->enableProxyingToOriginalMethods() : $builder->disableProxyingToOriginalMethods();

		if ($mockClassName) {
			$builder->setMockClassName($mockClassName);
		}

		if ($proxyTarget) {
			$builder->setProxyTarget($proxyTarget);
		}

		$mockObject = $builder->getMock();
		return $mockObject;
	}

	/**
	 * @param PaymentGateway\Request\RequestInterface $requestInterface
	 * @return PaymentGateway\Transport\Response\ResponseInterface
	 */
	protected function assertApiResponse(PaymentGateway\Request\RequestInterface $requestInterface)
	{
		$paymentGateWay = $this->getPaymentGateway();
		$response = $paymentGateWay->send($requestInterface);
		$this->assertNotEmpty($response->getData());

		return $response;
	}

	/**
	 * @return PaymentGateway\Config
	 */
	protected function getConfig() :PaymentGateway\Config
	{
		$config = new PaymentGateway\Config();
		$config->testMode = true;
		return $config;
	}

	/**
	 * @return \PHPUnit_Framework_MockObject_MockObject|\BigFish\PaymentGateway
	 */
	protected function getPaymentGateway()
	{
		$config = $this->getConfig();
		$paymentGateWay = $this->getMock('\BigFish\PaymentGateway', array('terminate'), array($config));
		return $paymentGateWay;
	}

	/**
	 * @return PaymentGateway\Request\Init
	 * @throws PaymentGateway\Exception\PaymentGatewayException
	 */
	protected function getConvertOutPutInitRequest()
	{
		$init = new PaymentGateway\Request\Init();
		$init->setAmount(150)
				->setProviderName('invalid_Rovider')
				->setResponseUrl('http://integration.test.bigfish.hu');
		return $init;
	}
}
