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
	const PROVIDER_SAFERPAY = 'Saferpay';
	const PROVIDER_SMS = 'SMS';
	const PROVIDER_SOFORT = 'Sofort';
	const PROVIDER_UNICREDIT = 'UniCredit';
	const PROVIDER_VIRPAY = 'Virpay';
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
	const REQUEST_ONE_CLICK_TOKEN_CANCEL = 'OneClickTokenCancel';
	const REQUEST_ONE_CLICK_TOKEN_CANCEL_ALL = 'OneClickTokenCancelAll';
	const REQUEST_INVOICE = 'Invoice';
	const REQUEST_PROVIDERS = 'Providers';
	const REQUEST_PAYMENT_LINK_CREATE = 'PaymentLinkCreate';
	const REQUEST_PAYMENT_LINK_CANCEL = 'PaymentLinkCancel';
	const REQUEST_PAYMENT_LINK_DETAILS = 'PaymentLinkDetails';
	const REQUEST_SETTLEMENT = 'Settlement';

	/**
	 * Info block structures paths
	 *
	 */
	const PATH_INFO = 'Info';
	const PATH_INFO_CUSTOMER_GENERAL = 'Info/Customer/General';
	const PATH_INFO_CUSTOMER_STORE_SPECIFIC = 'Info/Customer/StoreSpecific';
	const PATH_INFO_CUSTOMER_BROWSER = 'Info/Customer/Browser';
	const PATH_INFO_ORDER_GENERAL = 'Info/Order/General';
	const PATH_INFO_ORDER_SHIPPING_DATA = 'Info/Order/ShippingData';
	const PATH_INFO_ORDER_BILLING_DATA = 'Info/Order/BillingData';
	const PATH_INFO_ORDER_PRODUCT_ITEMS = 'Info/Order/ProductItems';
	const PATH_INFO_ORDER_RECURRING_PAYMENT = 'Info/Order/RecurringPayment';

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