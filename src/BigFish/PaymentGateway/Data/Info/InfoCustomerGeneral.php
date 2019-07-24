<?php

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
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_GENERAL;
	}

	/**
	 * @param string $firstName
	 * @return InfoCustomerGeneral
	 */
	public function setFirstName(string $firstName): InfoCustomerGeneral
	{
		$this->setData($firstName, 'firstName');
		return $this;
	}

	/**
	 * @param string $lastName
	 * @return InfoCustomerGeneral
	 */
	public function setLastName(string $lastName): InfoCustomerGeneral
	{
		$this->setData($lastName, 'lastName');
		return $this;
	}

	/**
	 * @param string $email
	 * @return InfoCustomerGeneral
	 */
	public function setEmail(string $email): InfoCustomerGeneral
	{
		$this->setData($email, 'email');
		return $this;
	}

	/**
	 * @param string $ip
	 * @return InfoCustomerGeneral
	 */
	public function setIp(string $ip): InfoCustomerGeneral
	{
		$this->setData($ip, 'ip');
		return $this;
	}

	/**
	 * @param string $homePhoneCc
	 * @return InfoCustomerGeneral
	 */
	public function setHomePhoneCc(string $homePhoneCc): InfoCustomerGeneral
	{
		$this->setData($homePhoneCc, 'homePhoneCc');
		return $this;
	}

	/**
	 * @param string $homePhone
	 * @return InfoCustomerGeneral
	 */
	public function setHomePhone(string $homePhone): InfoCustomerGeneral
	{
		$this->setData($homePhone, 'homePhone');
		return $this;
	}

	/**
	 * @param string $mobilePhoneCc
	 * @return InfoCustomerGeneral
	 */
	public function setMobilePhoneCc(string $mobilePhoneCc): InfoCustomerGeneral
	{
		$this->setData($mobilePhoneCc, 'mobilePhoneCc');
		return $this;
	}

	/**
	 * @param string $mobilePhone
	 * @return InfoCustomerGeneral
	 */
	public function setMobilePhone(string $mobilePhone): InfoCustomerGeneral
	{
		$this->setData($mobilePhone, 'mobilePhone');
		return $this;
	}

	/**
	 * @param string $workPhoneCc
	 * @return InfoCustomerGeneral
	 */
	public function setWorkPhoneCc(string $workPhoneCc): InfoCustomerGeneral
	{
		$this->setData($workPhoneCc, 'workPhoneCc');
		return $this;
	}

	/**
	 * @param string $workPhone
	 * @return InfoCustomerGeneral
	 */
	public function setWorkPhone(string $workPhone): InfoCustomerGeneral
	{
		$this->setData($workPhone, 'workPhone');
		return $this;
	}
}
