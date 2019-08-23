<?php

namespace BigFish\PaymentGateway\Request;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

trait ExtraTrait
{
	/**
	 * Extra data
	 *
	 * @var string
	 * @access public
	 */
	public $extra;

	/**
	 * @var string
	 */
	protected $encryptPublicKey;

	/**
	 * @param array $extra
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setExtra(array $extra = []): self
	{
		$providerName = $this->data['providerName'];
		$encryptData = [];

		if (in_array($providerName, PaymentGateway::$oneClickProviders) && isset($this->data['oneClickForcedRegistration'])) {
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
				!$this->getPaymentPageProperty() &&
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

	protected function getPaymentPageProperty(): bool
	{
		if (property_exists($this, 'gatewayPaymentPage')) {
			return $this->gatewayPaymentPage;
		}
		return false;
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

		if (!(in_array($providerName, PaymentGateway::$oneClickProviders) && isset($this->data['oneClickPayment']))) {
			unset($this->data['oneClickPayment']);
		}

		if (!(in_array($providerName, PaymentGateway::$oneClickProviders) && isset($this->data['oneClickReferenceId']))) {
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