<?php

namespace BigFish\PaymentGateway\Common;

interface BaseInterface
{
	/**
	 * @return array
	 */
	public function getData(): array;

	/**
	 * @return array
	 */
	public function getUcFirstData(): array;
}
