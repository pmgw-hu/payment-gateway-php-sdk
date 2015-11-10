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
	const PROVIDER_BARION = 'Barion';
	const PROVIDER_BORGUN = 'Borgun';
	const PROVIDER_CIB = 'CIB';
	const PROVIDER_ESCALION = 'Escalion';
	const PROVIDER_FHB = 'FHB';
	const PROVIDER_KHB = 'KHB';
	const PROVIDER_KHB_SZEP = 'KHBSZEP';
	const PROVIDER_MKB_SZEP = 'MKBSZEP';
	const PROVIDER_MASTERCARD_MOBILE = 'MPP2';
	const PROVIDER_OTP = 'OTP';
	const PROVIDER_OTP_TWO_PARTY = 'OTP2';
	const PROVIDER_OTP_MULTIPONT = 'OTPMultipont';
	const PROVIDER_OTPAY = 'OTPay';
	const PROVIDER_OTPAY_MASTERPASS = 'OTPayMP';
	const PROVIDER_PAYPAL = 'PayPal';
	const PROVIDER_PAYU = 'PayU';
	const PROVIDER_PAYU2 = 'PayU2';
	const PROVIDER_PAYU_CASH = 'PayUCash';
	const PROVIDER_PAYU_WIRE = 'PayUWire';
	const PROVIDER_SMS = 'SMS';
	const PROVIDER_SOFORT = 'Sofort';
	const PROVIDER_UNICREDIT = 'UniCredit';
	const PROVIDER_WIRECARD_QPAY = 'QPAY';

	/**
	 * API request type constants
	 */
	const REQUEST_INIT = 'Init';
	const REQUEST_START = 'Start';
	const REQUEST_RESULT = 'Result';
	const REQUEST_CLOSE = 'Close';
	const REQUEST_DETAILS = 'Details';
	const REQUEST_LOG = 'Log';
	const REQUEST_REFUND = 'Refund';
	const REQUEST_INIT_RP = 'InitRP';
	const REQUEST_START_RP = 'StartRP';
	const REQUEST_FINALIZE = 'Finalize';
	const REQUEST_ONE_CLICK_OPTIONS = 'OneClickOptions';
	const REQUEST_INVOICE = 'Invoice';
	const REQUEST_PROVIDERS = 'Providers';

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
		}

		return $this->getTransport()->sendRequest($request);
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