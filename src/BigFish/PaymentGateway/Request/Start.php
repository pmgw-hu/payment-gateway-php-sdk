<?php

namespace BigFish\PaymentGateway\Request;


class Start extends SimpleRequestAbstract implements RedirectLocationInterface
{
	const REQUEST_TYPE = 'Start';

	/**
	 * @return string
	 */
	public function getRedirectUrl(): string
	{
		return  '/Start?' . http_build_query($this->getUcFirstData());
	}
}