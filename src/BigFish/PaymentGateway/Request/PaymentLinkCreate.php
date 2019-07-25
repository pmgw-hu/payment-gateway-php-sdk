<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class PaymentLinkCreate extends InitAbstract
{

	public function __construct()
	{
		parent::__construct();
		$this->setEmailNotificationOnlySuccess(false);
	}

	/**
	 * Extra data
	 *
	 * @var string
	 * @access public
	 */
	public $extra;

	/**
	 * @var array
	 */
	protected $maxLength = [
		'orderId' => 255,
		'userId' => 255,
		'currency' => 3,
		'providerName' => 20,
		'storeName' => 20,
		'notificationUrl' => 255,
		'language' => 2,
		'notificationEmail' => 255,
	];

	/**
	 * @param string $notificationEmail
	 * @return PaymentLinkCreate
	 * @throws PaymentGatewayException
	 */
	public function setNotificationEmail(string $notificationEmail = '')
	{
		if (filter_var($notificationEmail, FILTER_VALIDATE_EMAIL) === false) {
			throw new PaymentGatewayException('Invalid notification email');
		}

		return $this->setData($notificationEmail, 'notificationEmail');
	}

	/**
	 * @param bool $value
	 * @return PaymentLinkCreate
	 */
	public function setEmailNotificationOnlySuccess(bool $value = true)
	{
		return $this->setData($value, 'emailNotificationOnlySuccess');
	}

	/**
	 * @param string $expirationTime
	 * @return PaymentLinkCreate
	 */
	public function setExpirationTime(string $expirationTime = '')
	{
		return $this->setData($expirationTime, 'expirationTime');
	}

	/**
	 * @param string $notificationUrl
	 * @return PaymentLinkCreate
	 * @throws PaymentGatewayException
	 */
	public function setNotificationUrl(string $notificationUrl)
	{
		if (filter_var($notificationUrl, FILTER_VALIDATE_URL) === false) {
			throw new PaymentGatewayException('Invalid notification url');
		}

		return $this->setData($notificationUrl, 'notificationUrl');
	}

	/**
	 * @param string $language
	 * @return PaymentLinkCreate
	 */
	public function setLanguage(string $language = '')
	{
		if (!$language) {
			$language = PaymentGateway\Config::DEFAULT_LANG;
		}

		return $this->setData($language, 'language');
	}

	/**
	 * @param bool $value
	 * @return PaymentLinkCreate
	 */
	public function setAutoCommit(bool $value = true)
	{
		$this->data['autoCommit'] = $value;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_PAYMENT_LINK_CREATE;
	}
}
