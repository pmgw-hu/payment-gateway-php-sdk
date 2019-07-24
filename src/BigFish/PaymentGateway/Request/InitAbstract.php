<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Data\Info;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

abstract class InitAbstract extends InitBasicAbstract
{
	/**
	 * @var array
	 */
	protected $maxLength = array(
		'storeName' => 20,
		'orderId' => 255,
		'userId' => 255,
		'currency' => 3,
		'providerName' => 20
	);

	/**
	 * Set the default values from the constants.
	 *
	 * InitAbstract constructor.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Set the URL where Users will be sent back after payment
	 *
	 * @param string $responseUrl Response URL
	 * (e.g. http://www.yourdomain.com/response.php, http://www.yourdomain.com/response.php?someparam=somevalue etc.)
	 * @return static
	 * @throws PaymentGatewayException
	 */
	public function setResponseUrl(string $responseUrl)
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
	public function setAmount(float $amount)
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
	public function setOrderId(string $orderId)
	{
		$this->setData($orderId, 'orderId');
		return $this;
	}

	/**
	 * Set the identifier of the user in your system
	 *
	 * @param mixed $userId User identifier
	 * @return static
	 */
	public function setUserId(string $userId)
	{
		$this->setData($userId, 'userId');
		return $this;
	}

	/**
	 * Set payment transaction currency
	 *
	 * @param string $currency Three-letter ISO currency code (e.g. HUF, USD etc.)
	 * @return static
	 */
	public function setCurrency(string $currency = ''): InitAbstract
	{
		if (!$currency) {
			$currency = PaymentGateway\Config::DEFAULT_CURRENCY;
		}
		$this->setData($currency, 'currency');
		return $this;
	}

	/**
	 * @param PaymentGateway\Data\Info $infoObject
	 * @return InitAbstract
	 */
	public function setInfoObject(Info $infoObject): InitAbstract
	{
		return $this->setInfo($infoObject->getData());
	}

	/**
	 * @param array $info
	 * @return $this
	 */
	public function setInfo(array $info = array()): InitAbstract
	{
		$this->data['info'] = $this->urlSafeEncode(json_encode($info));

		return $this;
	}

	/**
	 * URL safe encode (base64)
	 *
	 * @param string $string
	 * @return string
	 */
	protected function urlSafeEncode(string $string): string
	{
		return str_replace(array('+', '/', '='), array('-', '_', '.'), base64_encode($string));
	}
}