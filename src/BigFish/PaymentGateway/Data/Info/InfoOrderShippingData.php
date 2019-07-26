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
		return $this->setData($firstName, 'firstName');
	}

	/**
	 * @param string $lastName
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setLastName($lastName)
	{
		return $this->setData($lastName, 'lastName');
	}

	/**
	 * @param string $email
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setEmail($email)
	{
		return $this->setData($email, 'email');
	}

	/**
	 * @param string $phoneCc
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setPhoneCc($phoneCc)
	{
		return $this->setData($phoneCc, 'phoneCc');
	}

	/**
	 * @param string $phone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setPhone($phone)
	{
		return $this->setData($phone, 'phone');
	}

	/**
	 * @param string $city
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setCity($city)
	{
		return $this->setData($city, 'city');
	}

	/**
	 * @param string $country
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setCountry($country)
	{
		return $this->setData($country, 'country');
	}

	/**
	 * @param string $countryCode1
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setCountryCode1($countryCode1)
	{
		return $this->setData($countryCode1, 'countryCode1');
	}

	/**
	 * @param string $countryCode2
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setCountryCode2($countryCode2)
	{
		return $this->setData($countryCode2, 'countryCode2');
	}

	/**
	 * @param string $countryCode3
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setCountryCode3($countryCode3)
	{
		return $this->setData($countryCode3, 'countryCode3');
	}

	/**
	 * @param string $line1
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setLine1($line1)
	{
		return $this->setData($line1, 'line1');
	}

	/**
	 * @param string $line2
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setLine2($line2)
	{
		return $this->setData($line2, 'line2');
	}

	/**
	 * @param string $line3
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setLine3($line3)
	{
		return $this->setData($line3, 'line3');
	}

	/**
	 * @param string $postalCode
	 * @return \BigFish\PaymentGateway\Data\Info\InfoOrderShippingData
	 */
	public function setPostalCode($postalCode)
	{
		return $this->setData($postalCode, 'postalCode');
	}
}
