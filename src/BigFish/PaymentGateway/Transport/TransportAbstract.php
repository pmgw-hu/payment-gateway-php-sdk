<?php

namespace BigFish\PaymentGateway\Transport;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Config;
use BigFish\PaymentGateway\Request\RequestInterface;

abstract class TransportAbstract implements TransportInterface
{
	/**
	 * @var Config
	 */
	protected $config;

	/**
	 * TransportInterface constructor.
	 * @param Config $config
	 */
	public function __construct(Config $config)
	{
		$this->config = $config;
	}

	/**
	 * Get user agent string
	 *
	 * @return string
	 * @access private
	 * @static
	 */
	protected function getUserAgent()
	{
		return sprintf(
			'BIG FISH Payment Gateway %s Client (php7) v%s - %s',
			$this->getClientType(),
			PaymentGateway::VERSION,
			$this->getHttpHost()
		);
	}

	/**
	 * @return string
	 */
	abstract function getClientType(): \string;

	/**
	 * @return string
	 */
	protected function getHttpHost(): \string
	{
		return $_SERVER['HTTP_HOST'];
	}

	/**
	 * @param RequestInterface $requestInterface
	 */
	protected function initRequest(RequestInterface $requestInterface)
	{
		if (
			$requestInterface instanceof PaymentGateway\Request\Init ||
			$requestInterface instanceof PaymentGateway\Request\OneClickOptions ||
			$requestInterface instanceof PaymentGateway\Request\Providers
		) {
			$requestInterface->setStoreName($this->config->getStoreName());
		}

		if ($requestInterface instanceof PaymentGateway\Request\Init) {
			$requestInterface->setEncryptKey($this->config->getEncryptPublicKey());
			$requestInterface->setExtra();
		}
	}
}