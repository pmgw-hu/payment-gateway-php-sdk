<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

abstract class InitAbstract extends RequestAbstract
{
	/**
	 * @var array
	 */
	protected $maxSize = array(
		'orderId' => 255,
		'userId' => 255,
		'currency' => 3,
		'providerName' => 20
	);

	/**
	 * Set the URL where Users will be sent back after payment
	 *
	 * @param string $responseUrl Response URL
	 * (e.g. http://www.yourdomain.com/response.php, http://www.yourdomain.com/response.php?someparam=somevalue etc.)
	 * @return static
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
	 * @return static
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
	 * @return static
	 */
	public function setOrderId(\string $orderId)
	{
		$this->saveData($orderId, 'orderId');
		return $this;
	}

	/**
	 * Set the identifier of the user in your system
	 *
	 * @param mixed $userId User identifier
	 * @return static
	 */
	public function setUserId(\string $userId)
	{
		$this->saveData($userId, 'userId');
		return $this;
	}

	/**
	 * Set payment transaction currency
	 *
	 * @param string $currency Three-letter ISO currency code (e.g. HUF, USD etc.)
	 * @return static
	 */
	public function setCurrency(\string $currency = '')
	{
		if (!$currency) {
			$currency = PaymentGateway\Config::DEFAULT_CURRENCY;
		}
		$this->saveData($currency, 'currency');
		return $this;
	}

	/**
	 * @param string $providerName
	 * @return static
	 */
	public function setProviderName(\string $providerName)
	{
		$this->saveData($providerName, 'providerName');
		return $this;
	}

	/**
	 * @param string $fieldName
	 * @return null|int
	 */
	protected function getFieldMaxSize(\string $fieldName)
	{
		if (isset($this->maxSize[$fieldName])) {
			return $this->maxSize[$fieldName];
		}
		return parent::getFieldMaxSize($fieldName);
	}
}