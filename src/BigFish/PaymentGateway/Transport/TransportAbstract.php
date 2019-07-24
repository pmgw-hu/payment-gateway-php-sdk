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
	 * @param $method string
	 * @return string
	 * @access private
	 * @static
	 */
	protected function getUserAgent(string $method): string
	{
		return sprintf('%s | %s | %s | %s', $method, $this->getHttpHost(), 'PHP', phpversion());
	}

	/**
	 * @return string
	 */
	abstract function getClientType(): string;

	/**
	 * @return string
	 */
	protected function getHttpHost(): string
	{
		return $_SERVER['HTTP_HOST'];
	}

	/**
	 * @param RequestInterface $request
	 */
	protected function prepareRequest(RequestInterface $request)
	{
		if (
			$request instanceof PaymentGateway\Request\InitAbstract ||
			$request instanceof PaymentGateway\Request\Providers ||
			$request instanceof PaymentGateway\Request\OneClickOptions ||
			$request instanceof PaymentGateway\Request\OneClickTokenCancelAll
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
