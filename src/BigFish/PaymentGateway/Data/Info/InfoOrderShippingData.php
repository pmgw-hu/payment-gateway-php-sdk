<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway;

class InfoOrderShippingData extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = array(
		'firstName' => 45,
		'lastName' => 45,
		'email' => 254,
		'phoneCc' => 3,
		'phone' => 18,
		'city' => 50,
		'country' => 50,
		'countryCode1' => 3,
		'countryCode2' => 2,
		'countryCode3' => 6,
		'line1' => 50,
		'line2' => 50,
		'line3' => 50,
		'postalCode' => 16
	);

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
		$this->setData($firstName, 'firstName');
		return $this;
	}

	/**
	 * @param string $lastName
	 * @return InfoOrderShippingData
	 */
	public function setLastName(string $lastName): InfoOrderShippingData
	{
		$this->setData($lastName, 'lastName');
		return $this;
	}

	/**
	 * @param string $email
	 * @return InfoOrderShippingData
	 */
	public function setEmail(string $email): InfoOrderShippingData
	{
		$this->setData($email, 'email');
		return $this;
	}

	/**
	 * @param string $phoneCc
	 * @return InfoOrderShippingData
	 */
	public function setPhoneCc(string $phoneCc): InfoOrderShippingData
	{
		$this->setData($phoneCc, 'phoneCc');
		return $this;
	}

	/**
	 * @param string $phone
	 * @return InfoOrderShippingData
	 */
	public function setPhone(string $phone): InfoOrderShippingData
	{
		$this->setData($phone, 'phone');
		return $this;
	}

	/**
	 * @param string $city
	 * @return InfoOrderShippingData
	 */
	public function setCity(string $city): InfoOrderShippingData
	{
		$this->setData($city, 'city');
		return $this;
	}

	/**
	 * @param string $country
	 * @return InfoOrderShippingData
	 */
	public function setCountry(string $country): InfoOrderShippingData
	{
		$this->setData($country, 'country');
		return $this;
	}

	/**
	 * @param string $countryCode1
	 * @return InfoOrderShippingData
	 */
	public function setCountryCode1(string $countryCode1): InfoOrderShippingData
	{
		$this->setData($countryCode1, 'countryCode1');
		return $this;
	}

	/**
	 * @param string $countryCode2
	 * @return InfoOrderShippingData
	 */
	public function setCountryCode2(string $countryCode2): InfoOrderShippingData
	{
		$this->setData($countryCode2, 'countryCode2');
		return $this;
	}

	/**
	 * @param string $countryCode3
	 * @return InfoOrderShippingData
	 */
	public function setCountryCode3(string $countryCode3): InfoOrderShippingData
	{
		$this->setData($countryCode3, 'countryCode3');
		return $this;
	}

	/**
	 * @param string $line1
	 * @return InfoOrderShippingData
	 */
	public function setLine1(string $line1): InfoOrderShippingData
	{
		$this->setData($line1, 'line1');
		return $this;
	}

	/**
	 * @param string $line2
	 * @return InfoOrderShippingData
	 */
	public function setLine2(string $line2): InfoOrderShippingData
	{
		$this->setData($line2, 'line2');
		return $this;
	}

	/**
	 * @param string $line3
	 * @return InfoOrderShippingData
	 */
	public function setLine3(string $line3): InfoOrderShippingData
	{
		$this->setData($line3, 'line3');
		return $this;
	}

	/**
	 * @param string $postalCode
	 * @return InfoOrderShippingData
	 */
	public function setPostalCode(string $postalCode): InfoOrderShippingData
	{
		$this->setData($postalCode, 'postalCode');
		return $this;
	}
}
