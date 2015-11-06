<?php

namespace BigFish\PaymentGateway\Request;

interface RequestInterface
{
	/**
	 * @return array
	 */
	public function getData(): array;
}