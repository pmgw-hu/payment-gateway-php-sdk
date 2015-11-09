<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class InitPR extends RequestAbstract
{
	/**
	 * Set the reference Payment Gateway transaction ID
	 *
	 * @param string $referenceTransactionId Identifier of the reference transaction ID
	 * @return $this
	 */
	public function setReferenceTransactionId(\string $referenceTransactionId)
	{
		$this->data['referenceTransactionId'] = $referenceTransactionId;
		return $this;
	}

	/**
	 * Set the URL where Users will be sent back after payment
	 *
	 * @param string $responseUrl Response URL
	 * (e.g. http://www.yourdomain.com/response.php, http://www.yourdomain.com/response.php?someparam=somevalue etc.)
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
	 * Set payment transaction amount
	 *
	 * @param float $amount Transaction amount
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
	 * Set the identifier of the order in your system
	 *
	 * @param mixed $orderId Order identifier
	 * @return $this
	 */
	public function setOrderId(\string $orderId)
	{
		$this->checkLengthAndSaveData($orderId, 'orderId', 255);
		return $this;
	}

	/**
	 * Set the identifier of the user in your system
	 *
	 * @param mixed $userId User identifier
	 * @return $this
	 */
	public function setUserId(\string $userId)
	{
		$this->checkLengthAndSaveData($userId, 'userId', 255);
		return $this;
	}

	/**
	 * Set payment transaction currency
	 *
	 * @param string $currency Three-letter ISO currency code (e.g. HUF, USD etc.)
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
	 * @param string $providerName
	 * @return $this
	 */
	public function setProviderName(\string $providerName)
	{
		$this->checkLengthAndSaveData($providerName, 'providerName', 20);
		return $this;
	}

	/**
	 * @return string
	 */
	public function getMethod(): \string
	{
		return RequestAbstract::REQUEST_INIT_RP;
	}
}