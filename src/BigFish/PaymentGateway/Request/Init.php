<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Init extends InitRP
{
	/**
	 * Languages
	 */
	const DEFAULT_LANG = 'HU';

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
		PaymentGateway::PROVIDER_ESCALION,
		PaymentGateway::PROVIDER_PAYU
	);

	/**
	 * @var string
	 */
	protected $encryptPublicKey;

	/**
	 * @param string $storeName
	 * @return Init
	 */
	public function setStoreName(\string $storeName)
	{
		$this->checkLengthAndSaveData($storeName, 'storeName', 20);
		return $this;
	}

	/**
	 * @param string $notificationUrl
	 * @return Init
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
	 * @return Init
	 */
	public function setLanguage(\string $language = '')
	{
		if (!$language) {
			$language = static::DEFAULT_LANG;
		}
		$this->checkLengthAndSaveData($language, 'language', 2);
		return $this;
	}

	/**
	 * @param string $mppPhoneNumber
	 * @return Init
	 */
	public function setMppPhoneNumber(\string $mppPhoneNumber)
	{
		$this->checkLengthAndSaveData($mppPhoneNumber, 'mppPhoneNumber', 32);
		return $this;
	}

	/**
	 * @param string $otpCardNumber
	 * @return Init
	 */
	public function setOtpCardNumber(\string $otpCardNumber)
	{
		$this->data['otpCardNumber'] = $otpCardNumber;
		$this->checkLengthAndSaveData($otpCardNumber, 'otpCardNumber', 16);
		return $this;
	}

	/**
	 * @param string $otpExpiration
	 * @return Init
	 */
	public function setOtpExpiration(\string $otpExpiration)
	{
		$this->checkLengthAndSaveData($otpExpiration, 'otpExpiration', 4);
		return $this;
	}

	/**
	 * @param string $otpCvc
	 * @return Init
	 */
	public function setOtpCvc(\string $otpCvc)
	{
		$this->checkLengthAndSaveData($otpCvc, 'otpCvc', 3);
		return $this;
	}

	/**
	 * @param string $otpCardPocketId
	 * @return Init
	 */
	public function setOtpCardPocketId(\string $otpCardPocketId)
	{
		$this->checkLengthAndSaveData($otpCardPocketId, 'otpCardPocketId', 2);
		return $this;
	}

	/**
	 * @param string $otpConsumerRegistrationId
	 * @return Init
	 */
	public function setOtpConsumerRegistrationId(\string $otpConsumerRegistrationId)
	{
		$this->data['otpConsumerRegistrationId'] = $otpConsumerRegistrationId;
		return $this;
	}

	/**
	 * @param string $mkbSzepCafeteriaId
	 * @return Init
	 */
	public function setMkbSzepCafeteriaId(\string $mkbSzepCafeteriaId)
	{
		$this->data['mkbSzepCafeteriaId'] = $mkbSzepCafeteriaId;
		return $this;
	}

	/**
	 * @param string $mkbSzepCardNumber
	 * @return Init
	 */
	public function setMkbSzepCardNumber(\string $mkbSzepCardNumber)
	{
		$this->data['mkbSzepCardNumber'] = $mkbSzepCardNumber;
		return $this;
	}

	/**
	 * @param string $mkbSzepCvv
	 * @return Init
	 */
	public function setMkbSzepCvv(\string $mkbSzepCvv)
	{
		$this->checkLengthAndSaveData($mkbSzepCvv, 'mkbSzepCvv', 3);
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
	 * @param string $oneClickReferenceId
	 * @return Init
	 */
	public function setOneClickReferenceId(\string $oneClickReferenceId)
	{
		$this->data['oneClickReferenceId']= $oneClickReferenceId;
		return $this;
	}

	/**
	 * @return Init
	 */
	public function setAutoCommit()
	{
		$this->data['autoCommit'] = true;
		return $this;
	}

	/**
	 * @return Init
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
		return PaymentGateway::REQUEST_INIT;
	}

	/**
	 * @param array $extra
	 * @return Init
	 * @throws PaymentGatewayException
	 */
	public function setExtra(array $extra = array())
	{
		$providerName = $this->data['providerName'];

		if (
			in_array($providerName, array(PaymentGateway::PROVIDER_OTP, PaymentGateway::PROVIDER_OTP_TWO_PARTY)) &&
			!empty($this->data['otpConsumerRegistrationId'])
		) {
			$this->encryptExtra(array(
					'otpConsumerRegistrationId' => $this->data['otpConsumerRegistrationId']
			));
		} elseif ($providerName == PaymentGateway::PROVIDER_OTP_TWO_PARTY) {
			if (
					!empty($this->data['otpCardNumber']) &&
					!empty($this->data['otpExpiration']) &&
					!empty($this->data['otpCvc'])
			) {
				$this->encryptExtra(array(
						'otpCardNumber' => $this->data['otpCardNumber'],
						'otpExpiration' => $this->data['otpExpiration'],
						'otpCvc' => $this->data['otpCvc']
				));
			}
		} elseif ($providerName == PaymentGateway::PROVIDER_MKB_SZEP) {
			if (
					!empty($this->data['mkbSzepCardNumber']) &&
					!empty($this->data['mkbSzepCvv'])
			) {
				$this->encryptExtra(array(
						'mkbSzepCardNumber' => $this->data['mkbSzepCardNumber'],
						'mkbSzepCvv' => $this->data['mkbSzepCvv']
				));
			}
		} elseif (!empty($extra)) {
			$this->data['extra'] = $this->urlSafeEncode(json_encode($extra));
		}

		$this->removeSensitiveInformation($providerName);

		return $this;
	}

	/**
	 * @param array $data
	 * @throws PaymentGatewayException
	 */
	protected function encryptExtra(array $data = array())
	{
		if (!function_exists('openssl_public_encrypt')) {
			throw new PaymentGatewayException('OpenSSL PHP module is not loaded');
		}

		$encrypted = null;

		$extra = serialize($data);
		openssl_public_encrypt($extra, $encrypted, $this->encryptPublicKey);
		$this->data['extra'] = $this->urlSafeEncode($encrypted);
	}

	/**
	 * @param string $encryptPublicKey
	 * @return Init
	 */
	public function setEncryptKey(\string $encryptPublicKey)
	{
		$this->encryptPublicKey = $encryptPublicKey;
		return $this;
	}

	/**
	 * URL safe encode (base64)
	 *
	 * @param string $string
	 * @return string
	 */
	protected function urlSafeEncode(\string $string): \string
	{
		return str_replace(array('+', '/', '='), array('-', '_', '.'), base64_encode($string));
	}

	/**
	 * @param $providerName
	 */
	protected function removeSensitiveInformation(\string $providerName)
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

		unset($this->data['otpCardNumber']);
		unset($this->data['otpExpiration']);
		unset($this->data['otpCvc']);
		unset($this->data['otpConsumerRegistrationId']);
		unset($this->data['mkbSzepCardNumber']);
		unset($this->data['mkbSzepCvv']);
	}

}
