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

class InfoCustomerGeneral extends InfoAbstract
{
	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_GENERAL;
	}

	/**
	 * @param string $firstName
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setFirstName($firstName)
	{
		return $this->setData($firstName, 'firstName');
	}

	/**
	 * @param string $lastName
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setLastName($lastName)
	{
		return $this->setData($lastName, 'lastName');
	}

	/**
	 * @param string $email
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setEmail($email)
	{
		return $this->setData($email, 'email');
	}

	/**
	 * @param string $ip
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setIp($ip)
	{
		return $this->setData($ip, 'ip');
	}

	/**
	 * @param string $homePhoneCc
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setHomePhoneCc($homePhoneCc)
	{
		return $this->setData($homePhoneCc, 'homePhoneCc');
	}

	/**
	 * @param string $homePhone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setHomePhone($homePhone)
	{
		return $this->setData($homePhone, 'homePhone');
	}

	/**
	 * @param string $mobilePhoneCc
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setMobilePhoneCc($mobilePhoneCc)
	{
		return $this->setData($mobilePhoneCc, 'mobilePhoneCc');
	}

	/**
	 * @param string $mobilePhone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setMobilePhone($mobilePhone)
	{
		return $this->setData($mobilePhone, 'mobilePhone');
	}

	/**
	 * @param string $workPhoneCc
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setWorkPhoneCc($workPhoneCc)
	{
		return $this->setData($workPhoneCc, 'workPhoneCc');
	}

	/**
	 * @param string $workPhone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerGeneral
	 */
	public function setWorkPhone($workPhone)
	{
		return $this->setData($workPhone, 'workPhone');
	}
}
