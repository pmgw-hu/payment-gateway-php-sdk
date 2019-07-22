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

class InfoCustomerBrowser extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = array(
		'acceptHeader' => 2048,
		'javaEnabled' => 1,
		'language' => 8,
		'colorDepth' => 2,
		'screenHeight' => 6,
		'screenWidth' => 6,
		'timeZone' => 5,
		'userAgent' => 2048,
		'windowSize' => 2
	);

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_BROWSER;
	}

	/**
	 * @param string $acceptHeader
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setAcceptHeader($acceptHeader)
	{
		$this->setData($acceptHeader, 'acceptHeader');
		return $this;
	}

	/**
	 * @param string $javaEnabled
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setJavaEnabled($javaEnabled)
	{
		$this->setData($javaEnabled, 'javaEnabled');
		return $this;
	}

	/**
	 * @param string $language
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setLanguage($language)
	{
		$this->setData($language, 'language');
		return $this;
	}

	/**
	 * @param string $colorDepth
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setColorDepth($colorDepth)
	{
		$this->setData($colorDepth, 'colorDepth');
		return $this;
	}

	/**
	 * @param string $screenHeight
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setScreenHeight($screenHeight)
	{
		$this->setData($screenHeight, 'screenHeight');
		return $this;
	}

	/**
	 * @param string $screenWidth
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setScreenWidth($screenWidth)
	{
		$this->setData($screenWidth, 'screenWidth');
		return $this;
	}

	/**
	 * @param string $timeZone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setTimeZone($timeZone)
	{
		$this->setData($timeZone, 'timeZone');
		return $this;
	}

	/**
	 * @param string $userAgent
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setUserAgent($userAgent)
	{
		$this->setData($userAgent, 'userAgent');
		return $this;
	}

	/**
	 * @param string $value
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setWindowSize($value)
	{
		$this->setData($value, 'windowSize');
		return $this;
	}
}
