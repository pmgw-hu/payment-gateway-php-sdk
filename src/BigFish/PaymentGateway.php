<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2015, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish;

use BigFish\PaymentGateway\Config;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;
use BigFish\PaymentGateway\Request\RedirectLocationInterface;
use BigFish\PaymentGateway\Request\RequestInterface;
use BigFish\PaymentGateway\Transport\Response\Response;
use BigFish\PaymentGateway\Transport\Response\ResponseInterface;
use BigFish\PaymentGateway\Transport\SystemTransport;

/**
 * Class PaymentGateway
 * @package BigFish
 */
class PaymentGateway
{
	/**
	 * Version
	 */
	const VERSION = '3.0.0';

	/**
	 * SDK Name
	 */
	const NAME = 'PHP7-SDK';

	/**
	 * Providers
	 */
	const PROVIDER_ABAQOOS = 'ABAQOOS';
	const PROVIDER_BARION2 = 'Barion2';
	const PROVIDER_BBARUHITEL = 'BBAruhitel';
	const PROVIDER_BORGUN = 'Borgun';
	const PROVIDER_BORGUN2 = 'Borgun2';
	const PROVIDER_CIB = 'CIB';
	const PROVIDER_ESCALION = 'Escalion';
	const PROVIDER_FHB = 'FHB';
	const PROVIDER_GP = 'GP';
	const PROVIDER_IPG = 'IPG';
	const PROVIDER_KHB = 'KHB';
	const PROVIDER_KHB_SZEP = 'KHBSZEP';
	const PROVIDER_MKB_SZEP = 'MKBSZEP';
	const PROVIDER_OTP = 'OTP';
	const PROVIDER_OTP_TWO_PARTY = 'OTP2';
	const PROVIDER_OTP_MULTIPONT = 'OTPMultipont';
	const PROVIDER_OTP_SIMPLE = 'OTPSimple';
	const PROVIDER_OTP_SIMPLE_WIRE = 'OTPSimpleWire';
	const PROVIDER_OTPAY = 'OTPay';
	const PROVIDER_OTPAY_MASTERPASS = 'OTPayMP';
	const PROVIDER_PAYPAL = 'PayPal';
	const PROVIDER_PAYSAFECARD = 'PSC';
	const PROVIDER_PAYSAFECASH = 'Paysafecash';
	const PROVIDER_PAYU2 = 'PayU2';
	const PROVIDER_PAYUREST = 'PayURest';
	const PROVIDER_SAFERPAY = 'Saferpay';
	const PROVIDER_SMS = 'SMS';
	const PROVIDER_SOFORT = 'Sofort';
	const PROVIDER_UNICREDIT = 'UniCredit';
	const PROVIDER_VIRPAY = 'Virpay';
	const PROVIDER_WIRECARD_QPAY = 'QPAY';

	/**
	 * Valid OneClickPayment providers
	 *
	 * @var array
	 */
	public static $oneClickProviders = [
		PaymentGateway::PROVIDER_ESCALION,
		PaymentGateway::PROVIDER_OTP_SIMPLE,
		PaymentGateway::PROVIDER_SAFERPAY,
		PaymentGateway::PROVIDER_PAYPAL,
		PaymentGateway::PROVIDER_BARION2,
		PaymentGateway::PROVIDER_BORGUN2,
		PaymentGateway::PROVIDER_PAYUREST,
		PaymentGateway::PROVIDER_GP,
		PaymentGateway::PROVIDER_VIRPAY,
	];

	/**
	 * @var Config
	 */
	private $config;

	/**
	 * PaymentGateway constructor
	 *
	 * @param Config $config
	 */
	public function __construct(Config $config)
	{
		$this->config = $config;
	}

	/**
	 * Send request to payment gateway
	 *
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
	 * @return SystemTransport
	 * @throws PaymentGatewayException
	 */
	protected function getTransport()
	{
		return new SystemTransport($this->config);
	}

	/**
	 * @param $code
	 */
	protected function terminate($code)
	{
		exit($code);
	}

	/**
	 * Get request redirect url
	 *
	 * @param RedirectLocationInterface $redirectLocation
	 * @return string
	 */
	public function getRedirectUrl(RedirectLocationInterface $redirectLocation)
	{
		return $this->config->getUrl() . $redirectLocation->getRedirectUrl();
	}
}
