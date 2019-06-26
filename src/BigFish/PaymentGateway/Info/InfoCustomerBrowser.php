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

class InfoCustomerBrowser extends InfoAbstract
{
	/**
	 * @var array
	 */
	protected $maxSize = array(
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
	 * @return $this
	 */
	public function setAcceptHeader($acceptHeader)
	{
		$this->saveData($acceptHeader, 'acceptHeader');
		return $this;
	}

	/**
	 * @param string $javaEnabled
	 * @return $this
	 */
	public function setJavaEnabled($javaEnabled)
	{
		$this->saveData($javaEnabled, 'javaEnabled');
		return $this;
	}

	/**
	 * @param string $language
	 * @return $this
	 */
	public function setLanguage($language)
	{
		$this->saveData($language, 'language');
		return $this;
	}

	/**
	 * @param string $colorDepth
	 * @return $this
	 */
	public function setColorDepth($colorDepth)
	{
		$this->saveData($colorDepth, 'colorDepth');
		return $this;
	}

	/**
	 * @param string $screenHeight
	 * @return $this
	 */
	public function setScreenHeight($screenHeight)
	{
		$this->saveData($screenHeight, 'screenHeight');
		return $this;
	}

	/**
	 * @param string $screenWidth
	 * @return $this
	 */
	public function setScreenWidth($screenWidth)
	{
		$this->saveData($screenWidth, 'screenWidth');
		return $this;
	}

	/**
	 * @param string $timeZone
	 * @return $this
	 */
	public function setTimeZone($timeZone)
	{
		$this->saveData($timeZone, 'timeZone');
		return $this;
	}

	/**
	 * @param string $userAgent
	 * @return $this
	 */
	public function setUserAgent($userAgent)
	{
		$this->saveData($userAgent, 'userAgent');
		return $this;
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setWindowSize($value)
	{
		$this->saveData($value, 'windowSize');
		return $this;
	}
}
