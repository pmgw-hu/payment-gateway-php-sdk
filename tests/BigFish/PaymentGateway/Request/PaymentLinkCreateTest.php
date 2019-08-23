<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Request\PaymentLinkCreate;

class PaymentLinkCreateTest extends \PHPUnit\Framework\TestCase
{
	/**
	 * @test
	 * @dataProvider dataProviderFor_parameterTest
	 * @param $testData
	 * @param $method
	 */
	public function parameterSetTest($testData, $method)
	{
		$init = $this->getRequest();
		$result = $init->$method($testData);

		$variableName = lcfirst(substr($method, 3));

		// test chain
		$this->assertInstanceOf(get_class($init), $result);
		$this->assertArrayHasKey($variableName, $init->getData());
		$this->assertEquals($testData, $init->getData()[$variableName]);
	}

	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('TestProvider', 'setProviderName'),
			array('TestProvider', 'setProviderName'),
			array('http://test.hu', 'setResponseUrl'),
			array(100, 'setAmount'),
			array(true, 'setEmailNotificationOnlySuccess'),
			array('test@test.com', 'setNotificationEmail'),
			array('2020-01-01 01:01:01', 'setExpirationTime'),
			array(12345, 'setOrderId'),
			array(54321, 'setUserId'),
			array('EUR', 'setCurrency'),
		);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function amount_positiveNumberCheck()
	{
		$this->getRequest()->setAmount(-1);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setResponseUrl_invalidUrl()
	{
		$request = $this->getRequest();
		$request->setResponseUrl('invalidUrl');
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setAmount_isZero()
	{
		$request = $this->getRequest();
		$request->setAmount(0);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setNotificationEmail_invalidEmail()
	{
		$request = $this->getRequest();
		$request->setNotificationEmail('test');
	}

	/**
	 * @test
	 */
	public function setExtra_MKB_SZEP()
	{
		$init = $this->getRequest();
		$init->setProviderName(PaymentGateway::PROVIDER_MKB_SZEP);
		$init->setMkbSzepCardNumber('123456');
		$init->setMkbSzepCvv('112');
		$config = new PaymentGateway\Config();
		$init->setEncryptKey($config->getEncryptPublicKey());
		$init->setExtra();

		$data = $init->getData();
		$this->assertArrayHasKey('extra', $data);
		$this->assertNotEmpty($data['extra']);
	}

	/**
	 * @test
	 */
	public function setExtra_extra()
	{
		$init = $this->getRequest();
		$init->setProviderName(PaymentGateway::PROVIDER_ABAQOOS);
		$config = new PaymentGateway\Config();
		$init->setEncryptKey($config->getEncryptPublicKey());
		$init->setExtra(array('test' => 'foo'));

		$data = $init->getData();
		$this->assertArrayHasKey('extra', $data);
		$this->assertNotEmpty($data['extra']);
	}

	/**
	 * @test
	 */
	public function setExtra_testUnSets()
	{
		$init = $this->getRequest();
		$init->setProviderName(PaymentGateway::PROVIDER_UNICREDIT);
		$config = new PaymentGateway\Config();
		$init->setEncryptKey($config->getEncryptPublicKey());
		$init->setMkbSzepCardNumber('23123');
		$init->setMkbSzepCvv('evc');
		$init->setExtra();

		$data = $init->getData();

		$this->assertArrayNotHasKey('otpCardNumber', $data);
		$this->assertArrayNotHasKey('otpExpiration', $data);
		$this->assertArrayNotHasKey('otpCvc', $data);
		$this->assertArrayNotHasKey('otpConsumerRegistrationId', $data);
		$this->assertArrayNotHasKey('mkbSzepCardNumber', $data);
		$this->assertArrayNotHasKey('mkbSzepCvv', $data);
	}

	/**
	 * @test
	 */
	public function setExtra_notToUnset()
	{
		$init = $this->getRequest();
		$init->setProviderName(PaymentGateway::PROVIDER_UNICREDIT);
		$config = new PaymentGateway\Config();
		$init->setEncryptKey($config->getEncryptPublicKey());
		$init->setExtra();

		$data = $init->getData();
		$this->assertArrayNotHasKey('otpCardNumber', $data);
		$this->assertArrayNotHasKey('otpExpiration', $data);
		$this->assertArrayNotHasKey('otpCvc', $data);
		$this->assertArrayNotHasKey('otpConsumerRegistrationId', $data);
		$this->assertArrayNotHasKey('mkbSzepCardNumber', $data);
		$this->assertArrayNotHasKey('mkbSzepCvv', $data);
	}

	/**
	 * @return PaymentLinkCreate
	 */
	protected function getRequest()
	{
		return new PaymentLinkCreate();
	}

	public function testCreatePaylinkDefaultData()
	{
		$initRp = new PaymentLinkCreate();
		$this->assertEquals(PaymentGateway::NAME, $initRp->getData()['moduleName']);
		$this->assertEquals(PaymentGateway::VERSION, $initRp->getData()['moduleVersion']);
	}

	public function testCreatePaylinkSetModuleName()
	{
		$initRp = new PaymentLinkCreate();
		$initRp->setModuleName('test');

		$this->assertArrayHasKey('moduleName', $initRp->getData());
		$this->assertEquals('test', $initRp->getData()['moduleName']);
	}

	public function testCreatePaylinkSetModuleVersion()
	{
		$initRp = new PaymentLinkCreate();
		$initRp->setModuleVersion('42');

		$this->assertArrayHasKey('moduleVersion', $initRp->getData());
		$this->assertEquals('42', $initRp->getData()['moduleVersion']);
	}

}
