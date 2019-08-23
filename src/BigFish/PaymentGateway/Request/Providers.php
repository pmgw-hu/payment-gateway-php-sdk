<?php

namespace BigFish\PaymentGateway\Request;


class Providers extends RequestAbstract
{
	const REQUEST_TYPE = 'Providers';

	/**
	 * @param string $storeName
	 * @return $this
	 */
	public function setStoreName(string $storeName): self
	{
		return $this->setData($storeName, 'storeName');
	}
}
