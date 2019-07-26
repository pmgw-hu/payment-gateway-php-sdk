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
		return $this->setData($acceptHeader, 'acceptHeader');
	}

	/**
	 * @param string $javaEnabled
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setJavaEnabled($javaEnabled)
	{
		return $this->setData($javaEnabled, 'javaEnabled');
	}

	/**
	 * @param string $language
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setLanguage($language)
	{
		return $this->setData($language, 'language');
	}

	/**
	 * @param string $colorDepth
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setColorDepth($colorDepth)
	{
		return $this->setData($colorDepth, 'colorDepth');
	}

	/**
	 * @param string $screenHeight
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setScreenHeight($screenHeight)
	{
		return $this->setData($screenHeight, 'screenHeight');
	}

	/**
	 * @param string $screenWidth
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setScreenWidth($screenWidth)
	{
		return $this->setData($screenWidth, 'screenWidth');
	}

	/**
	 * @param string $timeZone
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setTimeZone($timeZone)
	{
		return $this->setData($timeZone, 'timeZone');
	}

	/**
	 * @param string $userAgent
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setUserAgent($userAgent)
	{
		return $this->setData($userAgent, 'userAgent');
	}

	/**
	 * @param string $value
	 * @return \BigFish\PaymentGateway\Data\Info\InfoCustomerBrowser
	 */
	public function setWindowSize($value)
	{
		return $this->setData($value, 'windowSize');
	}
}
