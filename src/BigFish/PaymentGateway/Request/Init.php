<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Init extends InitPR
{
	/**
	 * Languages
	 */
	const LANG_HU = 'HU';

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
			$language = static::LANG_HU;
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
		return PaymentGateway::REQUEST_INIT;
	}

	/**
	 * @param array $extra
	 * @return $this
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
		} else if ($providerName == PaymentGateway::PROVIDER_MKB_SZEP) {
			if (
					!empty($this->data['mkbSzepCardNumber']) &&
					!empty($this->data['mkbSzepCvv'])
			) {
				$this->encryptExtra(array(
						'mkbSzepCardNumber' => $this->data['mkbSzepCardNumber'],
						'mkbSzepCvv' => $this->data['mkbSzepCvv']
				));
			}
		} else if (!empty($extra)) {
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
	 */
	public function setEncryptKey(\string $encryptPublicKey)
	{
		$this->encryptPublicKey = $encryptPublicKey;
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
