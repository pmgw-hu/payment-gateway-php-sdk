<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish\PaymentGateway\Info;


use BigFish\PaymentGateway;

class InfoOrderShippingData extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxSize = array(
		'firstName' => 45,
		'lastName' => 45,
		'phoneCc' => 3,
		'phone' => 18,
		'city' => 50,
		'country' => 3,
		'line1' => 50,
		'line2' => 50,
		'line3' => 50,
		'postalCode' => 16,
		'state' => 3
	);

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_ORDER_SHIPPING_DATA;
	}

	/**
	 * @param string $firstName
	 * @return InfoOrderShippingData
	 */
	public function setFirstName($firstName)
	{
		$this->saveData($firstName, 'firstName');
		return $this;
	}

	/**
	 * @param string $lastName
	 * @return InfoOrderShippingData
	 */
	public function setLastName($lastName)
	{
		$this->saveData($lastName, 'lastName');
		return $this;
	}

	/**
	 * @param string $phoneCc
	 * @return InfoOrderShippingData
	 */
	public function setPhoneCc($phoneCc)
	{
		$this->saveData($phoneCc, 'phoneCc');
		return $this;
	}

	/**
	 * @param string $phone
	 * @return InfoOrderShippingData
	 */
	public function setPhone($phone)
	{
		$this->saveData($phone, 'phone');
		return $this;
	}

	/**
	 * @param string $city
	 * @return InfoOrderShippingData
	 */
	public function setCity($city)
	{
		$this->saveData($city, 'city');
		return $this;
	}

	/**
	 * @param string $country
	 * @return InfoOrderShippingData
	 */
	public function setCountry($country)
	{
		$this->saveData($country, 'country');
		return $this;
	}

	/**
	 * @param string $line1
	 * @return InfoOrderShippingData
	 */
	public function setLine1($line1)
	{
		$this->saveData($line1, 'line1');
		return $this;
	}

	/**
	 * @param string $line2
	 * @return InfoOrderShippingData
	 */
	public function setLine2($line2)
	{
		$this->saveData($line2, 'line2');
		return $this;
	}

	/**
	 * @param string $line3
	 * @return InfoOrderShippingData
	 */
	public function setLine3($line3)
	{
		$this->saveData($line3, 'line3');
		return $this;
	}

	/**
	 * @param string $postalCode
	 * @return InfoOrderShippingData
	 */
	public function setPostalCode($postalCode)
	{
		$this->saveData($postalCode, 'postalCode');
		return $this;
	}

	/**
	 * @param string $state
	 * @return InfoOrderShippingData
	 */
	public function setState($state)
	{
		$this->saveData($state, 'state');
		return $this;
	}
}
