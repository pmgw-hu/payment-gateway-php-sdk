<?php

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
	public function getStructurePath(): string
	{
		return PaymentGateway::PATH_INFO_CUSTOMER_BROWSER;
	}

	/**
	 * @param string $acceptHeader
	 * @return InfoCustomerBrowser
	 */
	public function setAcceptHeader(string $acceptHeader): InfoCustomerBrowser
	{
		$this->setData($acceptHeader, 'acceptHeader');
		return $this;
	}

	/**
	 * @param string $javaEnabled
	 * @return InfoCustomerBrowser
	 */
	public function setJavaEnabled(string $javaEnabled): InfoCustomerBrowser
	{
		$this->setData($javaEnabled, 'javaEnabled');
		return $this;
	}

	/**
	 * @param string $language
	 * @return InfoCustomerBrowser
	 */
	public function setLanguage(string $language): InfoCustomerBrowser
	{
		$this->setData($language, 'language');
		return $this;
	}

	/**
	 * @param string $colorDepth
	 * @return InfoCustomerBrowser
	 */
	public function setColorDepth(string $colorDepth): InfoCustomerBrowser
	{
		$this->setData($colorDepth, 'colorDepth');
		return $this;
	}

	/**
	 * @param string $screenHeight
	 * @return InfoCustomerBrowser
	 */
	public function setScreenHeight(string $screenHeight): InfoCustomerBrowser
	{
		$this->setData($screenHeight, 'screenHeight');
		return $this;
	}

	/**
	 * @param string $screenWidth
	 * @return InfoCustomerBrowser
	 */
	public function setScreenWidth(string $screenWidth): InfoCustomerBrowser
	{
		$this->setData($screenWidth, 'screenWidth');
		return $this;
	}

	/**
	 * @param string $timeZone
	 * @return InfoCustomerBrowser
	 */
	public function setTimeZone(string $timeZone): InfoCustomerBrowser
	{
		$this->setData($timeZone, 'timeZone');
		return $this;
	}

	/**
	 * @param string $userAgent
	 * @return InfoCustomerBrowser
	 */
	public function setUserAgent(string $userAgent): InfoCustomerBrowser
	{
		$this->setData($userAgent, 'userAgent');
		return $this;
	}

	/**
	 * @param string $windowSize
	 * @return InfoCustomerBrowser
	 */
	public function setWindowSize(string $windowSize): InfoCustomerBrowser
	{
		$this->setData($windowSize, 'windowSize');
		return $this;
	}
}
