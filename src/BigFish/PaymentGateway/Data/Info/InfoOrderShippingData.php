<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoOrderShippingData extends InfoAbstract
{
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

	/**
	 * @var array
	 */
	protected $maxLength = [
		self::FIRST_NAME => 45,
		self::LAST_NAME => 45,
		self::EMAIL => 254,
		self::PHONE_CC => 3,
		self::PHONE => 18,
		self::CITY => 50,
		self::COUNTRY => 50,
		self::COUNTRY_CODE_1 => 3,
		self::COUNTRY_CODE_2 => 2,
		self::COUNTRY_CODE_3 => 6,
		self::LINE_1 => 50,
		self::LINE_2 => 50,
		self::LINE_3 => 50,
		self::POSTAL_CODE => 16
	];

	/**
	 * @return string
	 */
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_ORDER_SHIPPING_DATA;
	}

	/**
	 * @param string $firstName
	 * @return InfoOrderShippingData
	 */
	public function setFirstName(string $firstName): InfoOrderShippingData
	{
		return $this->setData($firstName, self::FIRST_NAME);
	}

	/**
	 * @param string $lastName
	 * @return InfoOrderShippingData
	 */
	public function setLastName(string $lastName): InfoOrderShippingData
	{
		return $this->setData($lastName, self::LAST_NAME);
	}

	/**
	 * @param string $email
	 * @return InfoOrderShippingData
	 */
	public function setEmail(string $email): InfoOrderShippingData
	{
		return $this->setData($email, self::EMAIL);
	}

	/**
	 * @param string $phoneCc
	 * @return InfoOrderShippingData
	 */
	public function setPhoneCc(string $phoneCc): InfoOrderShippingData
	{
		return $this->setData($phoneCc, self::PHONE_CC);
	}

	/**
	 * @param string $phone
	 * @return InfoOrderShippingData
	 */
	public function setPhone(string $phone): InfoOrderShippingData
	{
		return $this->setData($phone, self::PHONE);
	}

	/**
	 * @param string $city
	 * @return InfoOrderShippingData
	 */
	public function setCity(string $city): InfoOrderShippingData
	{
		return $this->setData($city, self::CITY);
	}

	/**
	 * @param string $country
	 * @return InfoOrderShippingData
	 */
	public function setCountry(string $country): InfoOrderShippingData
	{
		return $this->setData($country, self::COUNTRY);
	}

	/**
	 * @param string $countryCode1
	 * @return InfoOrderShippingData
	 */
	public function setCountryCode1(string $countryCode1): InfoOrderShippingData
	{
		return $this->setData($countryCode1, self::COUNTRY_CODE_1);
	}

	/**
	 * @param string $countryCode2
	 * @return InfoOrderShippingData
	 */
	public function setCountryCode2(string $countryCode2): InfoOrderShippingData
	{
		return $this->setData($countryCode2, self::COUNTRY_CODE_2);
	}

	/**
	 * @param string $countryCode3
	 * @return InfoOrderShippingData
	 */
	public function setCountryCode3(string $countryCode3): InfoOrderShippingData
	{
		return $this->setData($countryCode3, self::COUNTRY_CODE_3);
	}

	/**
	 * @param string $line1
	 * @return InfoOrderShippingData
	 */
	public function setLine1(string $line1): InfoOrderShippingData
	{
		return $this->setData($line1, self::LINE_1);
	}

	/**
	 * @param string $line2
	 * @return InfoOrderShippingData
	 */
	public function setLine2(string $line2): InfoOrderShippingData
	{
		return $this->setData($line2, self::LINE_2);
	}

	/**
	 * @param string $line3
	 * @return InfoOrderShippingData
	 */
	public function setLine3(string $line3): InfoOrderShippingData
	{
		return $this->setData($line3, self::LINE_3);
	}

	/**
	 * @param string $postalCode
	 * @return InfoOrderShippingData
	 */
	public function setPostalCode(string $postalCode): InfoOrderShippingData
	{
		return $this->setData($postalCode, self::POSTAL_CODE);
	}
}
