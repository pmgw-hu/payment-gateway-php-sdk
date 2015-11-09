<?php

namespace BigFish;


use BigFish\PaymentGateway\Config;
use BigFish\PaymentGateway\Request\RedirectLocationInterface;
use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Transport\Response;
use BigFish\PaymentGateway\Transport\ResponseInterface;
use BigFish\PaymentGateway\Transport\RestTransport;
use BigFish\PaymentGateway\Transport\SoapTransport;

class PaymentGateway
{
	const VERSION = '2.3.0';

	/**
	 * Providers
	 */
	const PROVIDER_ABAQOOS = 'ABAQOOS';
	const PROVIDER_Barion = 'Barion';
	const PROVIDER_Borgun = 'Borgun';
	const PROVIDER_CIB = 'CIB';
	const PROVIDER_Escalion = 'Escalion';
	const PROVIDER_FHB = 'FHB';
	const PROVIDER_KHB = 'KHB';
	const PROVIDER_KHBSZEP = 'KHBSZEP';
	const PROVIDER_MKBSZEP = 'MKBSZEP';
	const PROVIDER_MPP2 = 'MPP2';
	const PROVIDER_OTP = 'OTP';
	const PROVIDER_OTP2 = 'OTP2';
	const PROVIDER_OTPay = 'OTPay';
	const PROVIDER_OTPayMP  = 'OTPayMP';
	const PROVIDER_OTPMultipont = 'OTPMultipont';
	const PROVIDER_PayPal = 'PayPal';
	const PROVIDER_PayU = 'PayU';
	const PROVIDER_PayUCash = 'PayUCash';
	const PROVIDER_PayUWire = 'PayUWire';
	const PROVIDER_QPAY = 'QPAY';
	const PROVIDER_SMS = 'SMS';
	const PROVIDER_Sofort = 'Sofort';
	const PROVIDER_UniCredit = 'UniCredit';

	/**
	 * @var Config
	 */
	private $config;

	/**
	 * PaymentGateway constructor.
	 * @param Config $config
	 */
	public function __construct(Config $config)
	{
		$this->config = $config;
	}

	/**
	 * @param RequestInterface $request
	 * @return ResponseInterface
	 */
	public function send(RequestInterface $request): ResponseInterface
	{
		if ($request instanceof RedirectLocationInterface) {
			header('Location: ' . $this->getRedirectUrl($request));
			$this->terminate(0);
			return new Response();
		} else {
			return $this->getTransport()->sendRequest($request);
		}
	}

	/**
	 * @return RestTransport|SoapTransport
	 */
	protected function getTransport()
	{
		if ($this->config->useApi()) {
			return new RestTransport($this->config);
		}
		return new SoapTransport($this->config);
	}

	/**
	 * @param $code
	 */
	protected function terminate($code)
	{
		exit($code);
	}

	/**
	 * @param RedirectLocationInterface $redirectLocationInterface
	 * @return string
	 */
	public function getRedirectUrl(RedirectLocationInterface $redirectLocationInterface)
	{
		return $this->config->getUrl() . $redirectLocationInterface->getRedirectUrl();
	}

}