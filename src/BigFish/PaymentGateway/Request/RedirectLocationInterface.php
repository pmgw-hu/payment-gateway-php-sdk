<?php
namespace BigFish\PaymentGateway\Request;

interface RedirectLocationInterface
{
	public function getRedirectUrl();
}