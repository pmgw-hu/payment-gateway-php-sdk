<?php

namespace BigFish\PaymentGateway\Data\Info\Customer;


use BigFish\PaymentGateway\Data\Info\InfoCustomer;
use BigFish\PaymentGateway\Data\Info\StructurePathTrait;

class InfoCustomerGeneral extends InfoCustomer
{
	use StructurePathTrait;

	const PATH = 'General';

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

	public function setFirstName(string $firstName): self
	{
		return $this->setData($firstName, self::FIRST_NAME);
	}

	public function setLastName(string $lastName): self
	{
		return $this->setData($lastName, self::LAST_NAME);
	}

	public function setEmail(string $email): self
	{
		return $this->setData($email, self::EMAIL);
	}

	public function setIp(string $ip): self
	{
		return $this->setData($ip, self::IP);
	}

	public function setHomePhoneCc(string $homePhoneCc): self
	{
		return $this->setData($homePhoneCc, self::HOME_PHONE_CC);
	}

	public function setHomePhone(string $homePhone): self
	{
		return $this->setData($homePhone, self::HOME_PHONE);
	}

	public function setMobilePhoneCc(string $mobilePhoneCc): self
	{
		return $this->setData($mobilePhoneCc, self::MOBILE_PHONE_CC);
	}

	public function setMobilePhone(string $mobilePhone): self
	{
		return $this->setData($mobilePhone, self::MOBILE_PHONE);
	}

	public function setWorkPhoneCc(string $workPhoneCc): self
	{
		return $this->setData($workPhoneCc, self::WORK_PHONE_CC);
	}

	public function setWorkPhone(string $workPhone): self
	{
		return $this->setData($workPhone, self::WORK_PHONE);
	}
}
