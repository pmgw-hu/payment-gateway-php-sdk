<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Data\Info;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

abstract class InitAbstract extends InitBaseAbstract
{
	/**
	 * Set the URL where Users will be sent back after payment
	 *
	 * @param string $responseUrl Response URL
	 * (e.g. http://www.yourdomain.com/response.php, http://www.yourdomain.com/response.php?someparam=somevalue etc.)
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setResponseUrl(string $responseUrl): self
	{
		if (filter_var($responseUrl, FILTER_VALIDATE_URL) === false) {
			throw new PaymentGatewayException('Invalid response url');
		}
		return $this->setData($responseUrl, 'responseUrl');
	}

	/**
	 * Set payment transaction amount
	 *
	 * @param float $amount Transaction amount
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setAmount(float $amount): self
	{
		if ($amount <= 0) {
			throw new PaymentGatewayException('Only positive numbers allowed.');
		}
		return $this->setData($amount, 'amount');
	}

	/**
	 * Set the identifier of the order in your system
	 *
	 * @param mixed $orderId Order identifier
	 * @return $this
	 */
	public function setOrderId(string $orderId): self
	{
		return $this->setData($orderId, 'orderId');
	}

	/**
	 * Set the identifier of the user in your system
	 *
	 * @param mixed $userId User identifier
	 * @return $this
	 */
	public function setUserId(string $userId): self
	{
		return $this->setData($userId, 'userId');
	}

	/**
	 * Set payment transaction currency
	 *
	 * @param string $currency Three-letter ISO currency code (e.g. HUF, USD etc.)
	 * @return $this
	 */
	public function setCurrency(string $currency): self
	{
		return $this->setData($currency, 'currency');
	}

	/**
	 * @param PaymentGateway\Data\Info $info
	 * @return InitAbstract
	 */
	public function setInfo(Info $info): self
	{
		return $this->setData($this->urlSafeEncode(json_encode($info->getData())), 'info');
	}

	/**
	 * URL safe encode (base64)
	 *
	 * @param string $string
	 * @return string
	 */
	protected function urlSafeEncode(string $string): string
	{
		return str_replace(['+', '/', '='], ['-', '_', '.'], base64_encode($string));
	}
}