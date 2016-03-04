<?php
namespace BigFish\PaymentGateway\Request;

interface RedirectLocationInterface
{
	/**
	 * @return string
	 */
	public function getRedirectUrl(): string;
}