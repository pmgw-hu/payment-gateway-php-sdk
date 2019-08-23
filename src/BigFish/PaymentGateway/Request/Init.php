<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Init extends InitAbstract
{
	const REQUEST_TYPE = 'Init';

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
	protected static $oneClickProviders = [
		PaymentGateway::PROVIDER_ESCALION,
		PaymentGateway::PROVIDER_OTP_SIMPLE,
		PaymentGateway::PROVIDER_SAFERPAY,
		PaymentGateway::PROVIDER_PAYPAL,
		PaymentGateway::PROVIDER_BARION2,
		PaymentGateway::PROVIDER_BORGUN2,
		PaymentGateway::PROVIDER_PAYUREST,
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
	 * @param string $mppPhoneNumber
	 * @return $this
	 */
	public function setMppPhoneNumber(string $mppPhoneNumber): self
	{
		return $this->setData($mppPhoneNumber, 'mppPhoneNumber');
	}

	/**
	 * @param string $otpCardNumber
	 * @return $this
	 */
	public function setOtpCardNumber(string $otpCardNumber): self
	{
		return $this->setData($otpCardNumber, 'otpCardNumber');
	}

	/**
	 * @param string $otpExpiration
	 * @return $this
	 */
	public function setOtpExpiration(string $otpExpiration): self
	{
		return $this->setData($otpExpiration, 'otpExpiration');
	}

	/**
	 * @param string $otpCvc
	 * @return $this
	 */
	public function setOtpCvc(string $otpCvc): self
	{
		return $this->setData($otpCvc, 'otpCvc');
	}

	/**
	 * @param string $otpCardPocketId
	 * @return $this
	 */
	public function setOtpCardPocketId(string $otpCardPocketId): self
	{
		return $this->setData($otpCardPocketId, 'otpCardPocketId');
	}

	/**
	 * @param string $otpConsumerRegistrationId
	 * @return $this
	 */
	public function setOtpConsumerRegistrationId(string $otpConsumerRegistrationId): self
	{
		return $this->setData($otpConsumerRegistrationId, 'otpConsumerRegistrationId');
	}

	/**
	 * @param string $mkbSzepCafeteriaId
	 * @return $this
	 */
	public function setMkbSzepCafeteriaId(string $mkbSzepCafeteriaId): self
	{
		return $this->setData($mkbSzepCafeteriaId, 'mkbSzepCafeteriaId');
	}

	/**
	 * @param string $mkbSzepCardNumber
	 * @return $this
	 */
	public function setMkbSzepCardNumber(string $mkbSzepCardNumber): self
	{
		return $this->setData($mkbSzepCardNumber, 'mkbSzepCardNumber');
	}

	/**
	 * @param string $mkbSzepCvv
	 * @return $this
	 */
	public function setMkbSzepCvv(string $mkbSzepCvv): self
	{
		return $this->setData($mkbSzepCvv, 'mkbSzepCvv');
	}

	public function setOneClickPayment(): self
	{
		return $this->setData(true, 'oneClickPayment');
	}

	/**
	 * @return $this
	 */
	public function setOneClickForcedRegistration(): self
	{
		return $this->setData(true, 'oneClickForcedRegistration');
	}

	/**
	 * @param string $oneClickReferenceId
	 * @return $this
	 */
	public function setOneClickReferenceId(string $oneClickReferenceId): self
	{
		return $this->setData($oneClickReferenceId, 'oneClickReferenceId');
	}

	/**
	 * @param bool $value
	 * @return $this
	 */
	public function setAutoCommit(bool $value = true): self
	{
		return $this->setData($value, 'autoCommit');
	}

	/**
	 * Card data handling on BIG FISH Payment Gateway payment page or Merchant website
	 * Works with MKBSZEP provider
	 *
	 * @param boolean $gatewayPaymentPage true or false
	 * @return $this
	 * @access public
	 */
	public function setGatewayPaymentPage(bool $gatewayPaymentPage): self
	{
		$this->gatewayPaymentPage = $gatewayPaymentPage;
		return $this;
	}

	/**
	 * @param array $extra
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setExtra(array $extra = []): self
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
	 * @return $this
	 */
	public function setEncryptKey(string $encryptPublicKey): self
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
