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
use BigFish\PaymentGateway\Transport\RestTransport;
use BigFish\PaymentGateway\Transport\SoapTransport;

/**
 * Class PaymentGateway
 * @package BigFish
 */
class PaymentGateway
{
	/**
	 * Version
	 */
	const VERSION = '2.3.0';

	/**
	 * SDK Name
	 */
	const NAME = 'PHP-SDK';

	/**
	 * Providers
	 */
	const PROVIDER_ABAQOOS = 'ABAQOOS';
	const PROVIDER_BORGUN = 'Borgun';
	const PROVIDER_CIB = 'CIB';
	const PROVIDER_ESCALION = 'Escalion';
	const PROVIDER_FHB = 'FHB';
	const PROVIDER_KHB = 'KHB';
	const PROVIDER_KHB_SZEP = 'KHBSZEP';
	const PROVIDER_MKB_SZEP = 'MKBSZEP';
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
	 * @return RestTransport|SoapTransport
	 * @throws PaymentGatewayException
	 */
	protected function getTransport()
	{
		switch ($this->config->getApiType()) {
			case Config::TRANSPORT_TYPE_REST_API:
				return new RestTransport($this->config);
				break;
			case Config::TRANSPORT_TYPE_SOAP_API:
				return new SoapTransport($this->config);
				break;
			default:
				throw new PaymentGatewayException('Unknown transport type');
		}
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