<?php

namespace BigFish\PaymentGateway\Data\Info\Customer;


use BigFish\PaymentGateway\Data\Info\InfoCustomer;
use BigFish\PaymentGateway\Data\Info\StructurePathTrait;

class InfoCustomerBrowser extends InfoCustomer
{
	use StructurePathTrait;

	const PATH = 'Browser';

	const ACCEPT_HEADER = 'acceptHeader';
	const JAVA_ENABLED = 'javaEnabled';
	const LANGUAGE = 'language';
	const COLOR_DEPTH = 'colorDepth';
	const SCREEN_HEIGHT = 'screenHeight';
	const SCREEN_WIDTH = 'screenWidth';
	const TIME_ZONE = 'timeZone';
	const USER_AGENT = 'userAgent';
	const WINDOWS_SIZE = 'windowSize';

	public function setAcceptHeader(string $acceptHeader): self
	{
		return $this->setData($acceptHeader, self::ACCEPT_HEADER);
	}

	public function setJavaEnabled(string $javaEnabled): self
	{
		return $this->setData($javaEnabled, self::JAVA_ENABLED);
	}

	public function setLanguage(string $language): self
	{
		return $this->setData($language, self::LANGUAGE);
	}

	public function setColorDepth(string $colorDepth): self
	{
		return $this->setData($colorDepth, self::COLOR_DEPTH);
	}

	public function setScreenHeight(string $screenHeight): self
	{
		return $this->setData($screenHeight, self::SCREEN_HEIGHT);
	}

	public function setScreenWidth(string $screenWidth): self
	{
		return $this->setData($screenWidth, self::SCREEN_WIDTH);
	}

	public function setTimeZone(string $timeZone): self
	{
		return $this->setData($timeZone, self::TIME_ZONE);
	}

	public function setUserAgent(string $userAgent): self
	{
		return $this->setData($userAgent, self::USER_AGENT);
	}

	public function setWindowSize(string $windowSize): self
	{
		return $this->setData($windowSize, self::WINDOWS_SIZE);
	}
}
