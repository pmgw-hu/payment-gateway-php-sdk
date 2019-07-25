<?php

namespace BigFish\PaymentGateway\Transport;


use BigFish\PaymentGateway\Config;
use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Transport\Response\ResponseInterface;

interface TransportInterface
{
	/**
	 * TransportInterface constructor.
	 * @param Config $config
	 */
	public function __construct(Config $config);

	/**
	 * @param RequestInterface $request
	 * @return ResponseInterface
	 */
	public function sendRequest(RequestInterface $request): ResponseInterface;
}
