<?php

namespace BigFish\Tests\Request;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Request\Init;
use BigFish\Tests\PaymentGateway\Request\InitRPTest;

class InitTest extends InitRPTest
{
	/**
	 * @return array
	 */
	public function dataProviderFor_parameterTest()
	{
		return array(
			array('TestProvider', 'setProviderName'),
			array('http://test.hu', 'setResponseUrl'),
			array('http://test.hu', 'setNotificationUrl'),
			array(100, 'setAmount'),
			array(12345, 'setOrderId'),
			array(54321, 'setUserId'),
			array('EUR', 'setCurrency'),
			array('US', 'setLanguage'),
			array('+36305551234', 'setMppPhoneNumber'),
			array('4908366099900425', 'setOtpCardNumber'),
			array('1014', 'setOtpExpiration'),
			array('823', 'setOtpCvc'),
			array('07', 'setOtpCardPocketId'),
			array('&#!aBd2', 'setOtpConsumerRegistrationId'),
			array('823', 'setMkbSzepCafeteriaId'),
			array('1122-3344-5566-777', 'setMkbSzepCardNumber'),
			array('823', 'setMkbSzepCvv'),
			array(true, 'setOneClickPayment'),
			array(true, 'setOneClickForcedRegistration'),
			array('7612312312', 'setOneClickReferenceId'),
			array(true, 'setAutoCommit'),
			array('something', 'setStoreName')
		);
	}

	/**
	 * @test
	 */
	public function setAutocommit_false()
	{
		$init = $this->getRequest();
		$result = $init->setAutoCommit(false);

		// test chain
		$this->assertInstanceOf(get_class($init), $result);
		$this->assertArrayHasKey('autoCommit', $init->getData());
		$this->assertFalse($init->getData()['autoCommit']);
	}

	/**
	 * @test
	 */
	public function setMultipleParameterTest()
	{
		$init = $this->getRequest();
		$init->setAmount(10);
		$init->setCurrency('EUR');
		$init->setProviderName('test');

		$this->assertArraySubset(
			array(
				'amount' => 10,
				'currency' => 'EUR',
				'providerName' => 'test',
			),
			$init->getData()
		);

	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setNotificationUrl_sizeCheck()
	{
		$request = $this->getRequest();
		$request->setNotificationUrl('invalidUrl');
	}

	/**
	 * @test
	 */
	public function setExtra_OTPConsumerConsumerReg()
	{
		$init = $this->getRequest();
		$init->setProviderName(PaymentGateway::PROVIDER_OTP);
		$init->setOtpConsumerRegistrationId("test");
		$config = new PaymentGateway\Config();
		$init->setEncryptKey($config->getEncryptPublicKey());
		$init->setExtra();

		$data = $init->getData();
		$this->assertArrayHasKey('extra', $data);
		$this->assertNotEmpty($data['extra']);
		$this->assertArrayNotHasKey('otpCardPocketId', $data);
	}

	/**
	 * @test
	 */
	public function setExtra_OTP_TWO_PATY()
	{
		$init = $this->getRequest();
		$init->setProviderName(PaymentGateway::PROVIDER_OTP_TWO_PARTY);
		$init->setOtpCardNumber('123456');
		$init->setOtpExpiration('1120');
		$init->setOtpCvc('234');
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
	public function setExtra_noOneClickProvider()
	{
		$init = $this->getRequest();
		$init->setProviderName(PaymentGateway::PROVIDER_FHB);
		$config = new PaymentGateway\Config();
		$init->setEncryptKey($config->getEncryptPublicKey());
		$init->setOneClickPayment();
		$init->setOneClickReferenceId('testData');
		$init->setOneClickForcedRegistration();
		$init->setExtra();

		$data = $init->getData();
		$this->assertArrayNotHasKey('oneClickPayment', $data);
		$this->assertArrayNotHasKey('oneClickReferenceId', $data);
		$this->assertArrayNotHasKey('oneClickForcedRegistration', $data);
	}

	/**
	 * @test
	 */
	public function setExtra_OneClickProvider()
	{
		$init = $this->getRequest();
		$init->setProviderName(PaymentGateway::PROVIDER_BORGUN2);
		$init->setOneClickPayment();
		$init->setOneClickReferenceId('testData');
		$init->setOneClickForcedRegistration();
		$init->setExtra();

		$data = $init->getData();
		$this->assertArrayHasKey('oneClickPayment', $data);
		$this->assertArrayHasKey('oneClickReferenceId', $data);
		$this->assertArrayNotHasKey('oneClickForcedRegistration', $data);
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
		$init->setOtpCardNumber('2345');
		$init->setOtpExpiration('3300');
		$init->setOtpCvc('evc');
		$init->setOtpConsumerRegistrationId('2423423');
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
	 * @return Init
	 */
	protected function getRequest()
	{
		return new Init();
	}

	public function testInitDefaultData()
	{
		$init = new Init();
		$this->assertEquals(PaymentGateway::NAME, $init->getData()['moduleName']);
		$this->assertEquals(PaymentGateway::VERSION, $init->getData()['moduleVersion']);
	}

	public function testInitSetModuleName()
	{
		$init = new Init();
		$init->setModuleName('test');

		$this->assertArrayHasKey('moduleName', $init->getData());
		$this->assertEquals('test', $init->getData()['moduleName']);
	}

	public function testInitSetModuleVersion()
	{
		$init = new Init();
		$init->setModuleVersion('42');

		$this->assertArrayHasKey('moduleVersion', $init->getData());
		$this->assertEquals('42', $init->getData()['moduleVersion']);
	}
}
