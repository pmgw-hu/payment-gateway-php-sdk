<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Data\Info;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Init extends InitAbstract
{
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
		'mppPhoneNumber' => 32,
		'otpCardNumber' => 16,
		'otpExpiration' => 4,
		'otpCardPocketId' => 2,
		'otpCvc' => 3,
		'mkbSzepCvv' => 3
    ];

	/**
	 * Valid OneClickPayment providers
	 * 
	 * @var array
	 */
	protected static $oneClickProviders = [
		PaymentGateway::PROVIDER_ESCALION,
		PaymentGateway::PROVIDER_OTP_SIMPLE,
		PaymentGateway::PROVIDER_SAFERPAY,
		PaymentGateway::PROVIDER_PAYPAL,
		PaymentGateway::PROVIDER_BARION2,
		PaymentGateway::PROVIDER_BORGUN2,
		PaymentGateway::PROVIDER_GP,
		PaymentGateway::PROVIDER_VIRPAY,
	];

	/**
	 * BIG FISH Payment Gateway payment page (MKBSZEP)
	 *
	 * @var boolean
	 * @access public
	 */
	public $gatewayPaymentPage = false;

	/**
	 * @var string
	 */
	protected $encryptPublicKey;

	/**
	 * @param string $notificationUrl
	 * @return Init
	 * @throws PaymentGatewayException
	 */
	public function setNotificationUrl(string $notificationUrl)
	{
		if (filter_var($notificationUrl, FILTER_VALIDATE_URL) === false) {
			throw new PaymentGatewayException('Invalid notification url');
		}

		$this->setData($notificationUrl, 'notificationUrl');
		return $this;
	}

	/**
	 * @param string $language
	 * @return Init
	 */
	public function setLanguage(string $language = '')
	{
		if (!$language) {
			$language = PaymentGateway\Config::DEFAULT_LANG;
		}
		$this->setData($language, 'language');
		return $this;
	}

	/**
	 * @param string $mppPhoneNumber
	 * @return Init
	 */
	public function setMppPhoneNumber(string $mppPhoneNumber)
	{
		$this->setData($mppPhoneNumber, 'mppPhoneNumber');
		return $this;
	}

	/**
	 * @param string $otpCardNumber
	 * @return Init
	 */
	public function setOtpCardNumber(string $otpCardNumber)
	{
		$this->data['otpCardNumber'] = $otpCardNumber;
		$this->setData($otpCardNumber, 'otpCardNumber');
		return $this;
	}

	/**
	 * @param string $otpExpiration
	 * @return Init
	 */
	public function setOtpExpiration(string $otpExpiration)
	{
		$this->setData($otpExpiration, 'otpExpiration');
		return $this;
	}

	/**
	 * @param string $otpCvc
	 * @return Init
	 */
	public function setOtpCvc(string $otpCvc)
	{
		$this->setData($otpCvc, 'otpCvc');
		return $this;
	}

	/**
	 * @param string $otpCardPocketId
	 * @return Init
	 */
	public function setOtpCardPocketId(string $otpCardPocketId)
	{
		$this->setData($otpCardPocketId, 'otpCardPocketId');
		return $this;
	}

	/**
	 * @param string $otpConsumerRegistrationId
	 * @return Init
	 */
	public function setOtpConsumerRegistrationId(string $otpConsumerRegistrationId)
	{
		$this->data['otpConsumerRegistrationId'] = $otpConsumerRegistrationId;
		return $this;
	}

	/**
	 * @param string $mkbSzepCafeteriaId
	 * @return Init
	 */
	public function setMkbSzepCafeteriaId(string $mkbSzepCafeteriaId)
	{
		$this->data['mkbSzepCafeteriaId'] = $mkbSzepCafeteriaId;
		return $this;
	}

	/**
	 * @param string $mkbSzepCardNumber
	 * @return Init
	 */
	public function setMkbSzepCardNumber(string $mkbSzepCardNumber)
	{
		$this->data['mkbSzepCardNumber'] = $mkbSzepCardNumber;
		return $this;
	}

	/**
	 * @param string $mkbSzepCvv
	 * @return Init
	 */
	public function setMkbSzepCvv(string $mkbSzepCvv)
	{
		$this->setData($mkbSzepCvv, 'mkbSzepCvv');
		return $this;
	}

	/**
	 * @return Init
	 */
	public function setOneClickPayment()
	{
		$this->data['oneClickPayment'] = true;
		return $this;
	}

	/**
	 * @return Init
	 */
	public function setOneClickForcedRegistration()
	{
		$this->data['oneClickForcedRegistration'] = true;
		return $this;
	}

	/**
	 * @param string $oneClickReferenceId
	 * @return Init
	 */
	public function setOneClickReferenceId(string $oneClickReferenceId)
	{
		$this->data['oneClickReferenceId']= $oneClickReferenceId;
		return $this;
	}

	/**
	 * @param bool $value
	 * @return Init
	 */
	public function setAutoCommit(bool $value = true): Init
	{
		$this->data['autoCommit'] = $value;
		return $this;
	}

	/**
	 * Card data handling on BIG FISH Payment Gateway payment page or Merchant website
	 * Works with MKBSZEP provider
	 *
	 * @param boolean $gatewayPaymentPage true or false
	 * @return Init
	 * @access public
	 */
	public function setGatewayPaymentPage(bool $gatewayPaymentPage = false): Init
	{
		$this->gatewayPaymentPage = $gatewayPaymentPage;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_INIT;
	}

	/**
	 * @param array $extra
	 * @return Init
	 * @throws PaymentGatewayException
	 */
	public function setExtra(array $extra = []): Init
	{
		$providerName = $this->data['providerName'];
		$encryptData = [];

		if (in_array($providerName, self::$oneClickProviders) && isset($this->data['oneClickForcedRegistration'])) {
			$extra['oneClickForcedRegistration'] = true;
		}

		if (
			in_array($providerName, array(PaymentGateway::PROVIDER_OTP, PaymentGateway::PROVIDER_OTP_TWO_PARTY)) &&
			!empty($this->data['otpConsumerRegistrationId'])
		) {
			$encryptData['otpConsumerRegistrationId'] = $this->data['otpConsumerRegistrationId'];
		} elseif ($providerName == PaymentGateway::PROVIDER_OTP_TWO_PARTY) {
			if (
					!empty($this->data['otpCardNumber']) &&
					!empty($this->data['otpExpiration']) &&
					!empty($this->data['otpCvc'])
			) {
				$encryptData = [
						'otpCardNumber' => $this->data['otpCardNumber'],
						'otpExpiration' => $this->data['otpExpiration'],
						'otpCvc' => $this->data['otpCvc']
                ];
			}
		} elseif ($providerName == PaymentGateway::PROVIDER_MKB_SZEP) {
			if (
				!$this->gatewayPaymentPage &&
				!empty($this->data['mkbSzepCardNumber']) &&
				!empty($this->data['mkbSzepCvv'])
			) {
				$encryptData = [
					'mkbSzepCardNumber' => $this->data['mkbSzepCardNumber'],
					'mkbSzepCvv' => $this->data['mkbSzepCvv']
                ];
			}
		} elseif (!empty($extra)) {
			$this->data['extra'] = $this->urlSafeEncode(json_encode($extra));
		}

		if (!empty($encryptData)) {
			if (!$this->encryptExtra($encryptData)) {
				throw new PaymentGatewayException('Error occurred when encrypting data.');
			}
		}

		$this->removeSensitiveInformation($providerName);

		return $this;
	}

	/**
	 * @param array $data
	 * @return bool
	 * @throws PaymentGatewayException
	 */
	protected function encryptExtra(array $data = []): bool
	{
		if (!function_exists('openssl_public_encrypt')) {
			throw new PaymentGatewayException('OpenSSL PHP module is not loaded');
		}

		$encrypted = null;

		$extra = serialize($data);
		$result = openssl_public_encrypt($extra, $encrypted, $this->encryptPublicKey);
		$this->data['extra'] = $this->urlSafeEncode($encrypted);
		return $result;
	}

	/**
	 * @param string $encryptPublicKey
	 * @return Init
	 */
	public function setEncryptKey(string $encryptPublicKey): Init
	{
		$this->encryptPublicKey = $encryptPublicKey;
		return $this;
	}

	/**
	 * @param $providerName
	 */
	protected function removeSensitiveInformation(string $providerName)
	{
		if (!($providerName == PaymentGateway::PROVIDER_OTP && !empty($this->data['otpCardPocketId']))) {
			unset($this->data['otpCardPocketId']);
		}

		if (!(in_array($providerName, self::$oneClickProviders) && isset($this->data['oneClickPayment']))) {
			unset($this->data['oneClickPayment']);
		}

		if (!(in_array($providerName, self::$oneClickProviders) && isset($this->data['oneClickReferenceId']))) {
			unset($this->data['oneClickReferenceId']);
		}

		if (isset($this->data['oneClickForcedRegistration'])) {
			unset($this->data['oneClickForcedRegistration']);
		}

		unset($this->data['otpCardNumber']);
		unset($this->data['otpExpiration']);
		unset($this->data['otpCvc']);
		unset($this->data['otpConsumerRegistrationId']);
		unset($this->data['mkbSzepCardNumber']);
		unset($this->data['mkbSzepCvv']);
	}
}
