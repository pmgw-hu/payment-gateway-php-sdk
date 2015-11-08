<?php

namespace BigFish;


use BigFish\PaymentGateway\Config;
use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Transport\ResponseInterface;
use BigFish\PaymentGateway\Transport\RestTransport;
use BigFish\PaymentGateway\Transport\SoapTransport;

class PaymentGateway
{
	/**
	 * @var Config
	 */
	private $config;

	/**
	 * PaymentGateway constructor.
	 * @param Config $config
	 */
	public function __construct(Config $config)
	{
		$this->config = $config;
	}

	/**
	 * @param RequestInterface $request
	 * @return ResponseInterface
	 */
	public function send(RequestInterface $request): ResponseInterface
	{
		return $this->getTransport()->sendRequest($request);
	}

	/**
	 * @return RestTransport|SoapTransport
	 */
	protected function getTransport()
	{
		if ($this->config->useApi()) {
			return new RestTransport($this->config);
		}
		return new SoapTransport($this->config);
	}

}