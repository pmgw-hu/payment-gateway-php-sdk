<?php

namespace BigFish\PaymentGateway\Request;


class Finalize extends SimpleRequestAbstract implements RedirectLocationInterface
{
	const REQUEST_TYPE = 'Finalize';

	/**
	 * @param float $amount
	 * @return $this
	 */
	public function setAmount(float $amount)
	{
		return $this->setData($amount, 'amount');
	}

	/**
	 * @return string
	 */
	public function getRedirectUrl(): string
	{
		return '/Finalize?' . http_build_query($this->getUcFirstData());
	}
}