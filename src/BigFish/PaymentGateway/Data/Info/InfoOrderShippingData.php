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

class InfoOrderShippingData extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = array(
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
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setFirstName($firstName)
	{
		$this->setData($firstName, 'firstName');
		return $this;
	}

	/**
	 * @param string $lastName
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setLastName($lastName)
	{
		$this->setData($lastName, 'lastName');
		return $this;
	}

	/**
	 * @param string $phoneCc
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setPhoneCc($phoneCc)
	{
		$this->setData($phoneCc, 'phoneCc');
		return $this;
	}

	/**
	 * @param string $phone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setPhone($phone)
	{
		$this->setData($phone, 'phone');
		return $this;
	}

	/**
	 * @param string $city
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setCity($city)
	{
		$this->setData($city, 'city');
		return $this;
	}

	/**
	 * @param string $country
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setCountry($country)
	{
		$this->setData($country, 'country');
		return $this;
	}

	/**
	 * @param string $line1
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setLine1($line1)
	{
		$this->setData($line1, 'line1');
		return $this;
	}

	/**
	 * @param string $line2
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setLine2($line2)
	{
		$this->setData($line2, 'line2');
		return $this;
	}

	/**
	 * @param string $line3
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setLine3($line3)
	{
		$this->setData($line3, 'line3');
		return $this;
	}

	/**
	 * @param string $postalCode
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setPostalCode($postalCode)
	{
		$this->setData($postalCode, 'postalCode');
		return $this;
	}

	/**
	 * @param string $state
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setState($state)
	{
		$this->setData($state, 'state');
		return $this;
	}
}
