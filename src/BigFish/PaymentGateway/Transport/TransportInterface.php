<?php

namespace BigFish\PaymentGateway\Transport;


use BigFish\PaymentGateway\Config;
use BigFish\PaymentGateway\Request\RequestInterface;

interface TransportInterface
{

	/**
	 * TransportInterface constructor.
	 * @param Config $config
	 */
	public function __construct(Config $config);

	/**
	 * @param RequestInterface $requestInterface
	 * @return ResponseInterface
	 */
	public function sendRequest(RequestInterface $requestInterface): ResponseInterface;

}