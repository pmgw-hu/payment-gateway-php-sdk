<?php

namespace BigFish\PaymentGateway\Request;


use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Init extends InitPR
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
	protected $storeName;

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
	 * @param string $storeName
	 * @return $this
	 */
	public function setStoreName(\string $storeName)
	{
		$this->checkLengthAndSaveData($storeName, 'storeName', 20);
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

	/**
	 * @param string $otpCardNumber
	 * @return $this
	 */
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
	 * @return $this
	 */
	public function setOneClickPayment()
	{
		$this->data['oneClickPayment'] = true;
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
	 * @return $this
	 */
	public function setAutoCommit()
	{
		$this->data['autoCommit'] = true;
		return $this;
	}

	/**t
	 * @return $this
	 */
	public function disableAutoCommit()
	{
		$this->data['autoCommit'] = false;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethod(): \string
	{
		return RequestAbstract::REQUEST_INIT;
	}
}
