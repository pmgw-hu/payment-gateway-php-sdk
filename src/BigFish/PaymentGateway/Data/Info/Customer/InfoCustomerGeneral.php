<?php

namespace BigFish\PaymentGateway\Data\Info\Customer;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Data\Info\InfoAbstract;

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

	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_GENERAL;
	}

	public function setFirstName(string $firstName): self
	{
		return $this->setData($firstName, 'firstName');
	}

	public function setLastName(string $lastName): self
	{
		return $this->setData($lastName, 'lastName');
	}

	public function setEmail(string $email): self
	{
		return $this->setData($email, 'email');
	}

	public function setIp(string $ip): self
	{
		return $this->setData($ip, 'ip');
	}

	public function setHomePhoneCc(string $homePhoneCc): self
	{
		return $this->setData($homePhoneCc, 'homePhoneCc');
	}

	public function setHomePhone(string $homePhone): self
	{
		return $this->setData($homePhone, 'homePhone');
	}

	public function setMobilePhoneCc(string $mobilePhoneCc): self
	{
		return $this->setData($mobilePhoneCc, 'mobilePhoneCc');
	}

	public function setMobilePhone(string $mobilePhone): self
	{
		return $this->setData($mobilePhone, 'mobilePhone');
	}

	public function setWorkPhoneCc(string $workPhoneCc): self
	{
		return $this->setData($workPhoneCc, 'workPhoneCc');
	}

	public function setWorkPhone(string $workPhone): self
	{
		return $this->setData($workPhone, 'workPhone');
	}
}
