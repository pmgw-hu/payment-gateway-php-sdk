<?php

namespace BigFish\PaymentGateway\Request;


use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Init implements RequestInterface
{
	/**
	 * Extra data
	 * 
	 * @var string
	 * @access public
	 */
	public $extra;

	/**
	 * Valid OneClickPayment providers
	 * 
	 * @var array
	 */
	protected static $oneClickProviders = array(
		'Escalion',
		'PayU',
	);

	/**
	 * @var string
	 */
	protected $providerName;

	/**
	 * @var string
	 */
	protected $responseUrl;

	/**
	 * @var string
	 */
	protected $notificationUrl;

	/**
	 * @var float
	 */
	protected $amount;

	/**
	 * @var string
	 */
	protected $orderId;

	/**
	 * @var string
	 */
	protected $userId;

	/**
	 * @var string
	 */
	protected $currency;

	/**
	 * @var string
	 */
	protected $language;

	/**
	 * @var string
	 */
	protected $mppPhoneNumber;

	/**
	 * @var string
	 */
	protected $otpCardNumber;

	/**
	 * @var bool;
	 */
	protected $autoCommit;

	/**
	 * @var string
	 */
	protected $oneClickReferenceId;

	/**
	 * @var bool
	 */
	protected $oneClickPayment;

	/**
	 * @var string
	 */
	protected $mkbSzepCvv;

	/**
	 * @var string
	 */
	protected $mkbSzepCardNumber;

	/**
	 * @var string
	 */
	protected $otpCardPocketId;

	/**
	 * @var string
	 */
	protected $otpCvc;

	/**
	 * @var string
	 */
	protected $otpExpiration;

	/**
	 * @var string
	 */
	protected $otpConsumerRegistrationId;

	/**
	 * @var int
	 */
	protected $mkbSzepCafeteriaId;

	/**
	 * @var array
	 */
	protected $data = array();

	/**
	 * @return array
	 */
	public function getData(): array
	{
		return $this->data;
	}

	/**
	 * @param string $providerName
	 * @return $this
	 */
	public function setProviderName(\string $providerName)
	{
		$this->checkLengthAndSaveData($providerName, 'providerName', 20);
		return $this;
	}

	/**
	 * @param string $responseUrl
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setResponseUrl(\string $responseUrl)
	{
		if (filter_var($responseUrl, FILTER_VALIDATE_URL) === false) {
			throw new PaymentGatewayException('Invalid response url');
		}
		$this->data['responseUrl'] = $responseUrl;
		return $this;
	}

	/**
	 * @param string $notificationUrl
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setNotificationUrl(\string $notificationUrl)
	{
		if (filter_var($notificationUrl, FILTER_VALIDATE_URL) === false) {
			throw new PaymentGatewayException('Invalid notification url');
		}

		$this->checkLengthAndSaveData($notificationUrl, 'notificationUrl', 255);
		return $this;
	}

	/**
	 * @param float $amount
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setAmount(\float $amount)
	{
		if ($amount <= 0) {
			throw new PaymentGatewayException('Only positive numbers allowed.');
		}
		$this->data['amount'] = $amount;
		return $this;
	}

	/**
	 * @param string $orderId
	 * @return $this
	 */
	public function setOrderId(\string $orderId)
	{
		$this->checkLengthAndSaveData($orderId, 'orderId', 255);
		return $this;
	}

	/**
	 * @param string $userId
	 * @return $this
	 */
	public function setUserId(\string $userId)
	{
		$this->checkLengthAndSaveData($userId, 'userId', 255);
		return $this;
	}

	/**
	 * @param string $currency
	 * @return $this
	 */
	public function setCurrency(\string $currency = '')
	{
		if (!$currency) {
			$currency = 'HUF';
		}
		$this->checkLengthAndSaveData($currency, 'currency', 3);
		return $this;
	}

	/**
	 * @param string $language
	 * @return $this
	 */
	public function setLanguage(\string $language = '')
	{
		if (!$language) {
			$language = 'HU';
		}
		$this->checkLengthAndSaveData($language, 'language', 2);
		return $this;
	}

	/**
	 * @param string $mppPhoneNumber
	 * @return $this
	 */
	public function setMppPhoneNumber(\string $mppPhoneNumber)
	{
		$this->checkLengthAndSaveData($mppPhoneNumber, 'mppPhoneNumber', 32);
		return $this;
	}

	public function setOtpCardNumber(\string $otpCardNumber)
	{
		$this->data['otpCardNumber'] = $otpCardNumber;
		$this->checkLengthAndSaveData($otpCardNumber, 'otpCardNumber', 16);
		return $this;
	}

	/**
	 * @param string $otpExpiration
	 * @return $this
	 */
	public function setOtpExpiration(\string $otpExpiration)
	{
		$this->checkLengthAndSaveData($otpExpiration, 'otpExpiration', 4);
		return $this;
	}

	/**
	 * @param string $otpCvc
	 * @return $this
	 */
	public function setOtpCvc(\string $otpCvc)
	{
		$this->checkLengthAndSaveData($otpCvc, 'otpCvc', 3);
		return $this;
	}

	/**
	 * @param string $otpCardPocketId
	 * @return $this
	 */
	public function setOtpCardPocketId(\string $otpCardPocketId)
	{
		$this->checkLengthAndSaveData($otpCardPocketId, 'otpCardPocketId', 2);
		return $this;
	}

	/**
	 * @param string $otpConsumerRegistrationId
	 * @return $this
	 */
	public function setOtpConsumerRegistrationId(\string $otpConsumerRegistrationId)
	{
		$this->data['otpConsumerRegistrationId'] = $otpConsumerRegistrationId;
		return $this;
	}

	/**
	 * @param int $mkbSzepCafeteriaId
	 * @return $this
	 */
	public function setMkbSzepCafeteriaId(\int $mkbSzepCafeteriaId)
	{
		$this->data['mkbSzepCafeteriaId'] = $mkbSzepCafeteriaId;
		return $this;
	}

	/**
	 * @param string $mkbSzepCardNumber
	 * @return $this
	 */
	public function setMkbSzepCardNumber(\string $mkbSzepCardNumber)
	{
		$this->data['mkbSzepCardNumber'] = $mkbSzepCardNumber;
		return $this;
	}

	/**
	 * @param string $mkbSzepCvv
	 * @return $this
	 */
	public function setMkbSzepCvv(\string $mkbSzepCvv)
	{
		$this->checkLengthAndSaveData($mkbSzepCvv, 'mkbSzepCvv', 3);
		return $this;
	}

	/**
	 * @param bool|false $oneClickPayment
	 * @return $this
	 */
	public function setOneClickPayment(\bool $oneClickPayment = false)
	{
		$this->data['oneClickPayment'] = $oneClickPayment;
		return $this;
	}

	/**
	 * @param string $oneClickReferenceId
	 * @return $this
	 */
	public function setOneClickReferenceId(\string $oneClickReferenceId)
	{
		$this->data['oneClickReferenceId']= $oneClickReferenceId;
		return $this;
	}

	/**
	 * @param bool|true $autoCommit
	 * @return $this
	 */
	public function setAutoCommit(\bool $autoCommit = true)
	{
		$this->data['autoCommit'] = $autoCommit;
		return $this;
	}

	/**
	 * @param int $maxLength
	 * @param string $fieldName
	 * @param string $value
	 * @throws PaymentGatewayException
	 */
	protected function checkFieldSize(\int $maxLength, \string $fieldName, \string $value)
	{
		if (strlen($value) > $maxLength) {
			throw new PaymentGatewayException(
				sprintf(
					'%s is longer than permitted. Max value is: %i',
					$fieldName,
					$maxLength
				)
			);
		}
	}

	/**
	 * @param string $value
	 * @param string $fieldName
	 * @param int $maxLength
	 * @throws PaymentGatewayException
	 */
	protected function checkLengthAndSaveData(\string $value, \string $fieldName, \int $maxLength)
	{
		$this->checkFieldSize($maxLength, $fieldName, $value);
		$this->data[$fieldName] = $value;
	}
}
