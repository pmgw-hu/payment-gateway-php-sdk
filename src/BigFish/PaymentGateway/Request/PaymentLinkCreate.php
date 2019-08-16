<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class PaymentLinkCreate extends InitAbstract
{
	use ExtraTrait, SzepCardTrait;

	const REQUEST_TYPE = 'PaymentLinkCreate';

	public function __construct()
	{
		parent::__construct();
		$this->setEmailNotificationOnlySuccess(false);
	}

	/**
	 * @param string $notificationEmail
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setNotificationEmail(string $notificationEmail): self
	{
		if (filter_var($notificationEmail, FILTER_VALIDATE_EMAIL) === false) {
			throw new PaymentGatewayException('Invalid notification email');
		}

		return $this->setData($notificationEmail, 'notificationEmail');
	}

	/**
	 * @param bool $value
	 * @return $this
	 */
	public function setEmailNotificationOnlySuccess(bool $value): self
	{
		return $this->setData($value, 'emailNotificationOnlySuccess');
	}

	/**
	 * @param string $expirationTime
	 * @return $this
	 */
	public function setExpirationTime(string $expirationTime): self
	{
		return $this->setData($expirationTime, 'expirationTime');
	}

	/**
	 * @param string $notificationUrl
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setNotificationUrl(string $notificationUrl): self
	{
		if (filter_var($notificationUrl, FILTER_VALIDATE_URL) === false) {
			throw new PaymentGatewayException('Invalid notification url');
		}

		return $this->setData($notificationUrl, 'notificationUrl');
	}

	/**
	 * @param string $language
	 * @return $this
	 */
	public function setLanguage(string $language): self
	{
		return $this->setData($language, 'language');
	}

	/**
	 * @param bool $value
	 * @return $this
	 */
	public function setAutoCommit(bool $value = true): self
	{
		return $this->setData($value, 'autoCommit');
	}
}
