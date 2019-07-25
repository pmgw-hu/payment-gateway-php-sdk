<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoCustomerGeneral extends InfoAbstract
{
	const FIRST_NAME = 'firstName';
	const LAST_NAME = 'lastName';
	const EMAIL = 'email';
	const IP = 'ip';
	const HOME_PHONE_CC = 'homePhoneCc';
	const HOME_PHONE = 'homePhone';
	const MOBILE_PHONE_CC = 'mobilePhoneCc';
	const MOBILE_PHONE = 'mobilePhone';
	const WORK_PHONE_CC = 'workPhoneCc';
	const WORK_PHONE = 'workPhone';

	/**
	 * @var array
	 */
	protected $maxLength = [
		self::FIRST_NAME => 45,
		self::LAST_NAME => 45,
		self::EMAIL => 254,
		self::IP => 45,
		self::HOME_PHONE_CC => 3,
		self::HOME_PHONE => 18,
		self::MOBILE_PHONE_CC => 3,
		self::MOBILE_PHONE => 18,
		self::WORK_PHONE_CC => 3,
		self::WORK_PHONE => 18
	];

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
	public function setFirstName(string $firstName): self
	{
		return $this->setData($firstName, 'firstName');
	}

	/**
	 * @param string $lastName
	 * @return InfoCustomerGeneral
	 */
	public function setLastName(string $lastName): self
	{
		return $this->setData($lastName, 'lastName');
	}

	/**
	 * @param string $email
	 * @return InfoCustomerGeneral
	 */
	public function setEmail(string $email): self
	{
		return $this->setData($email, 'email');
	}

	/**
	 * @param string $ip
	 * @return InfoCustomerGeneral
	 */
	public function setIp(string $ip): self
	{
		return $this->setData($ip, 'ip');
	}

	/**
	 * @param string $homePhoneCc
	 * @return InfoCustomerGeneral
	 */
	public function setHomePhoneCc(string $homePhoneCc): self
	{
		return $this->setData($homePhoneCc, 'homePhoneCc');
	}

	/**
	 * @param string $homePhone
	 * @return InfoCustomerGeneral
	 */
	public function setHomePhone(string $homePhone): self
	{
		return $this->setData($homePhone, 'homePhone');
	}

	/**
	 * @param string $mobilePhoneCc
	 * @return InfoCustomerGeneral
	 */
	public function setMobilePhoneCc(string $mobilePhoneCc): self
	{
		return $this->setData($mobilePhoneCc, 'mobilePhoneCc');
	}

	/**
	 * @param string $mobilePhone
	 * @return InfoCustomerGeneral
	 */
	public function setMobilePhone(string $mobilePhone): self
	{
		return $this->setData($mobilePhone, 'mobilePhone');
	}

	/**
	 * @param string $workPhoneCc
	 * @return InfoCustomerGeneral
	 */
	public function setWorkPhoneCc(string $workPhoneCc): self
	{
		return $this->setData($workPhoneCc, 'workPhoneCc');
	}

	/**
	 * @param string $workPhone
	 * @return InfoCustomerGeneral
	 */
	public function setWorkPhone(string $workPhone): self
	{
		return $this->setData($workPhone, 'workPhone');
	}
}
