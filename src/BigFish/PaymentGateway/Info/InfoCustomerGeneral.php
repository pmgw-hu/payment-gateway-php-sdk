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

class InfoCustomerGeneral extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxSize = array(
		'firstName' => 45,
		'lastName' => 45,
		'email' => 254,
		'ip' => 45,
		'homePhoneCc' => 3,
		'homePhone' => 18,
		'mobilePhoneCc' => 3,
		'mobilePhone' => 18,
		'workPhoneCc' => 3,
		'workPhone' => 18
	);

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_GENERAL;
	}

	/**
	 * @param string $lastName
	 * @return $this
	 */
	public function setLastName($lastName)
	{
		$this->saveData($lastName, 'lastName');
		return $this;
	}

	/**
	 * @param string $email
	 * @return $this
	 */
	public function setEmail($email)
	{
		$this->saveData($email, 'email');
		return $this;
	}

	/**
	 * @param string $ip
	 * @return $this
	 */
	public function setIp($ip)
	{
		$this->saveData($ip, 'ip');
		return $this;
	}

	/**
	 * @param string $homePhoneCc
	 * @return $this
	 */
	public function setHomePhoneCc($homePhoneCc)
	{
		$this->saveData($homePhoneCc, 'homePhoneCc');
		return $this;
	}

	/**
	 * @param string $homePhone
	 * @return $this
	 */
	public function setHomePhone($homePhone)
	{
		$this->saveData($homePhone, 'homePhone');
		return $this;
	}

	/**
	 * @param string $mobilePhoneCc
	 * @return $this
	 */
	public function setMobilePhoneCc($mobilePhoneCc)
	{
		$this->saveData($mobilePhoneCc, 'mobilePhoneCc');
		return $this;
	}

	/**
	 * @param string $mobilePhone
	 * @return $this
	 */
	public function setMobilePhone($mobilePhone)
	{
		$this->saveData($mobilePhone, 'mobilePhone');
		return $this;
	}

	/**
	 * @param string $workPhoneCc
	 * @return $this
	 */
	public function setWorkPhoneCc($workPhoneCc)
	{
		$this->saveData($workPhoneCc, 'workPhoneCc');
		return $this;
	}

	/**
	 * @param string $workPhone
	 * @return $this
	 */
	public function setWorkPhone($workPhone)
	{
		$this->saveData($workPhone, 'workPhone');
		return $this;
	}
}
