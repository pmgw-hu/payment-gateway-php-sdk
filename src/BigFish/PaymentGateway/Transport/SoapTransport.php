<?php

namespace BigFish\PaymentGateway\Transport;

use BigFish\PaymentGateway\Request\RequestInterface;

class SoapTransport extends TransportAbstract
{
	/**
	 * @param RequestInterface $requestInterface
	 * @return ResponseInterface
	 */
	public function sendRequest(RequestInterface $requestInterface): ResponseInterface
	{

	}
}