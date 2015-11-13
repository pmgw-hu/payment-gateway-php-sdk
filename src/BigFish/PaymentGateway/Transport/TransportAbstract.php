<?php

namespace BigFish\PaymentGateway\Transport;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Config;
use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Transport\Response\ResponseInterface;

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
	 * @param RequestInterface $request
	 */
	protected function prepareRequest(RequestInterface $request)
	{
		if (
			$request instanceof PaymentGateway\Request\Init ||
			$request instanceof PaymentGateway\Request\OneClickOptions ||
			$request instanceof PaymentGateway\Request\Providers
		) {
			$request->setStoreName($this->config->getStoreName());
		}

		if ($request instanceof PaymentGateway\Request\Init) {
			$request->setEncryptKey($this->config->getEncryptPublicKey());
			$request->setExtra();
		}
	}

	/**
	 * @param ResponseInterface $response
	 */
	protected function convertOutResponse(ResponseInterface $response)
	{
		$charset = $this->config->getOutCharset();
		if ($charset != Config::CHARSET_UTF8) {
			$response->convert($charset);
		}
	}
}