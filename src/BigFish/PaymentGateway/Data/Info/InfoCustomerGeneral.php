<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoCustomerGeneral extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = array(
		'firstName' => 45,
		'lastName' => 45,
		'email' => 254,
		'ip' => 45,
		'homePhoneCc' => 3,
		'homePhone' => 18,
		'mobilePhoneCc' => 3,
		'mobilePhone' => 18,
		'workPhoneCc' => 3,
		'workPhone' => 18
	);

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_GENERAL;
	}

	/**
	 * @param string $firstName
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setFirstName($firstName)
	{
		$this->setData($firstName, 'firstName');
		return $this;
	}

	/**
	 * @param string $lastName
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setLastName($lastName)
	{
		$this->setData($lastName, 'lastName');
		return $this;
	}

	/**
	 * @param string $email
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setEmail($email)
	{
		$this->setData($email, 'email');
		return $this;
	}

	/**
	 * @param string $ip
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setIp($ip)
	{
		$this->setData($ip, 'ip');
		return $this;
	}

	/**
	 * @param string $homePhoneCc
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setHomePhoneCc($homePhoneCc)
	{
		$this->setData($homePhoneCc, 'homePhoneCc');
		return $this;
	}

	/**
	 * @param string $homePhone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setHomePhone($homePhone)
	{
		$this->setData($homePhone, 'homePhone');
		return $this;
	}

	/**
	 * @param string $mobilePhoneCc
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setMobilePhoneCc($mobilePhoneCc)
	{
		$this->setData($mobilePhoneCc, 'mobilePhoneCc');
		return $this;
	}

	/**
	 * @param string $mobilePhone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setMobilePhone($mobilePhone)
	{
		$this->setData($mobilePhone, 'mobilePhone');
		return $this;
	}

	/**
	 * @param string $workPhoneCc
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setWorkPhoneCc($workPhoneCc)
	{
		$this->setData($workPhoneCc, 'workPhoneCc');
		return $this;
	}

	/**
	 * @param string $workPhone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setWorkPhone($workPhone)
	{
		$this->setData($workPhone, 'workPhone');
		return $this;
	}
}
