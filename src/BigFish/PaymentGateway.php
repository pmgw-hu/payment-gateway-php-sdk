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
		if ($this->config->useApi()) {
			$transport = new RestTransport($this->config);
		} else {
			$transport = new SoapTransport($this->config);
		}

		return $transport->sendRequest($request);
	}

}