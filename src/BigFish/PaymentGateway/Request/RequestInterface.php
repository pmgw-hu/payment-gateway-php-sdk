<?php

namespace BigFish\PaymentGateway\Request;

interface RequestInterface
{
	/**
	 * @return array
	 */
	public function getData(): array;

	/**
	 * @return string
	 */
	public function getMethod(): \string;

	/**
	 * @return array
	 */
	public function getUcFirstData(): array;
}