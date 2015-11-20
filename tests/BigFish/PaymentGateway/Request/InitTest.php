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

		$this->assertEquals(
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
	public function providerName_maxSizeCheck()
	{
		// max: 20
		$this->getRequest()->setProviderName(str_repeat('A', 21));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function storeName_maxSizeCheck()
	{
		// max: 20
		$this->getRequest()->setStoreName(str_repeat('A', 21));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setNotificationUrl_invalidUrl()
	{
		$this->getRequest()->setNotificationUrl(str_repeat('A', 256));
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
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setMppPhoneNumber_sizeCheck()
	{
		$this->getRequest()->setMppPhoneNumber(str_repeat('A', 33));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setOtpCardNumber_sizeCheck()
	{
		$this->getRequest()->setOtpCardNumber(str_repeat('A', 17));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setOtpExpiration_sizeCheck()
	{
		$this->getRequest()->setOtpExpiration(str_repeat('A', 5));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setOtpCvc_sizeCheck()
	{
		$this->getRequest()->setOtpCvc(str_repeat('A', 4));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setOtpCardPocketId_sizeCheck()
	{
		$this->getRequest()->setOtpCardPocketId(str_repeat('A', 3));
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function language_maxSizeCheck()
	{
		// 2
		$this->getRequest()->setLanguage(str_repeat('A', 3));
	}

	/**
	 * @test
	 */
	public function setLanguage_defaultLANG()
	{
		$init = $this->getRequest();
		$init->setLanguage();
		$data = $init->getData();
		$this->assertEquals(PaymentGateway\Config::DEFAULT_LANG, $data['language']);
	}

	/**
	 * @test
	 */
	public function setLanguage_defaultCurrency()
	{
		$init = $this->getRequest();
		$init->setCurrency();
		$data = $init->getData();
		$this->assertEquals(PaymentGateway\Config::DEFAULT_CURRENCY, $data['currency']);
	}

	/**
	 * @test
	 * @expectedException \BigFish\PaymentGateway\Exception\PaymentGatewayException
	 */
	public function setMkbSzepCvv_sizeCheck()
	{
		$this->getRequest()->setMkbSzepCvv(str_repeat('A', 4));
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
		$init->setProviderName(PaymentGateway::PROVIDER_BARION);
		$config = new PaymentGateway\Config();
		$init->setEncryptKey($config->getEncryptPublicKey());
		$init->setExtra(array('test' => 'foo'));

		$data = $init->getData();
		$this->assertArrayHasKey('extra', $data);
		$this->assertNotEmpty($data['extra']    );
	}

	/**
	 * @test
	 */
	public function setExtra_OneClickProvider()
	{
		$init = $this->getRequest();
		$init->setProviderName(PaymentGateway::PROVIDER_FHB);
		$config = new PaymentGateway\Config();
		$init->setEncryptKey($config->getEncryptPublicKey());
		$init->setOneClickPayment();
		$init->setOneClickReferenceId('testData');
		$init->setExtra();

		$data = $init->getData();
		$this->assertArrayNotHasKey('oneClickPayment', $data);
		$this->assertArrayNotHasKey('oneClickReferenceId', $data);
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

	/**
	 * @test
	 * @depends providerName_maxSizeCheck
	 *
	 * should not throw an exception
	 */
	public function lengthCheck_mbCheck_shouldNotThrowException()
	{
		// max: 20
		$this->getRequest()->setProviderName(str_repeat('¥', 11));
	}

}
