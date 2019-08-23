<?php

namespace BigFish\PaymentGateway\Data\Info\Order;


use BigFish\PaymentGateway\Data\Info\InfoOrder;

class BaseAddress extends InfoOrder
{
	const PATH = 'BaseAddress';

	const FIRST_NAME = 'firstName';
	const LAST_NAME = 'lastName';
	const EMAIL = 'email';
	const PHONE_CC = 'phoneCc';
	const PHONE = 'phone';
	const CITY = 'city';
	const COUNTRY = 'country';
	const COUNTRY_CODE_1 = 'countryCode1';
	const COUNTRY_CODE_2 = 'countryCode2';
	const COUNTRY_CODE_3 = 'countryCode3';
	const LINE_1 = 'line1';
	const LINE_2 = 'line2';
	const LINE_3 = 'line3';
	const POSTAL_CODE = 'postalCode';

	public function getStructurePath(): string
	{
		return parent::getStructurePath();
	}

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

	public function setPhoneCc(string $phoneCc): self
	{
		return $this->setData($phoneCc, self::PHONE_CC);
	}

	public function setPhone(string $phone): self
	{
		return $this->setData($phone, self::PHONE);
	}

	public function setCity(string $city): self
	{
		return $this->setData($city, self::CITY);
	}

	public function setCountry(string $country): self
	{
		return $this->setData($country, self::COUNTRY);
	}

	public function setCountryCode1(string $countryCode1): self
	{
		return $this->setData($countryCode1, self::COUNTRY_CODE_1);
	}

	public function setCountryCode2(string $countryCode2): self
	{
		return $this->setData($countryCode2, self::COUNTRY_CODE_2);
	}

	public function setCountryCode3(string $countryCode3): self
	{
		return $this->setData($countryCode3, self::COUNTRY_CODE_3);
	}

	public function setLine1(string $line1): self
	{
		return $this->setData($line1, self::LINE_1);
	}

	public function setLine2(string $line2): self
	{
		return $this->setData($line2, self::LINE_2);
	}

	public function setLine3(string $line3): self
	{
		return $this->setData($line3, self::LINE_3);
	}

	public function setPostalCode(string $postalCode): self
	{
		return $this->setData($postalCode, self::POSTAL_CODE);
	}
}
