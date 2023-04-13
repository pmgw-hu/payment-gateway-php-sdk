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
use BigFish\PaymentGateway\Exception;
use BigFish\PaymentGateway\Request\RequestAbstract as Request;
use BigFish\PaymentGateway\Request\Init as InitRequest;
use BigFish\PaymentGateway\Request\Start as StartRequest;
use BigFish\PaymentGateway\Request\Result as ResultRequest;
use BigFish\PaymentGateway\Request\Close as CloseRequest;
use BigFish\PaymentGateway\Request\Refund as RefundRequest;
use BigFish\PaymentGateway\Request\InitRP as InitRPRequest;
use BigFish\PaymentGateway\Request\StartRP as StartRPRequest;
use BigFish\PaymentGateway\Request\Finalize as FinalizeRequest;
use BigFish\PaymentGateway\Request\Details as DetailsRequest;
use BigFish\PaymentGateway\Request\Log as LogRequest;
use BigFish\PaymentGateway\Request\OneClickOptions as OneClickOptionsRequest;
use BigFish\PaymentGateway\Request\GetPaymentRegistrations as GetPaymentRegistrationsRequest;
use BigFish\PaymentGateway\Request\OneClickTokenCancel as OneClickTokenCancelRequest;
use BigFish\PaymentGateway\Request\CancelPaymentRegistration as CancelPaymentRegistrationRequest;
use BigFish\PaymentGateway\Request\OneClickTokenCancelAll as OneClickTokenCancelAllRequest;
use BigFish\PaymentGateway\Request\CancelAllPaymentRegistrations as CancelAllPaymentRegistrationsRequest;
use BigFish\PaymentGateway\Request\Invoice as InvoiceRequest;
use BigFish\PaymentGateway\Request\Providers as ProvidersRequest;
use BigFish\PaymentGateway\Request\PaymentLinkCreate as PaymentLinkCreateRequest;
use BigFish\PaymentGateway\Request\PaymentLinkCancel as PaymentLinkCancelRequest;
use BigFish\PaymentGateway\Request\PaymentLinkDetails as PaymentLinkDetailsRequest;
use BigFish\PaymentGateway\Request\Settlement as SettlementRequest;
use BigFish\PaymentGateway\Request\SettlementRefund as SettlementRefundRequest;
use BigFish\PaymentGateway\Request\Payout as PayoutRequest;
use BigFish\PaymentGateway\Request\PayWallPaymentInit as PayWallPaymentInitRequest;
use BigFish\PaymentGateway\Request\PayWallPaymentUpdate as PayWallPaymentUpdateRequest;
use BigFish\PaymentGateway\Request\PayWallPaymentDetails as PayWallPaymentDetailsRequest;
use BigFish\PaymentGateway\Response;

/**
 * BIG FISH Payment Gateway main class (client)
 *
 * @package PaymentGateway
 */
class PaymentGateway
{
	/**
	 * SDK Name
	 *
	 */
	const NAME = 'PHP-SDK';

	/**
	 * SDK Version
	 *
	 */
	const VERSION = '3.18.0';

	/**
	 * API request type constants
	 *
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

	const REQUEST_GET_PAYMENT_REGISTRATIONS = 'GetPaymentRegistrations';

	const REQUEST_ONE_CLICK_TOKEN_CANCEL = 'OneClickTokenCancel';

	const REQUEST_CANCEL_PAYMENT_REGISTRATION = 'CancelPaymentRegistration';

	const REQUEST_ONE_CLICK_TOKEN_CANCEL_ALL = 'OneClickTokenCancelAll';

	const REQUEST_CANCEL_ALL_PAYMENT_REGISTRATIONS = 'CancelAllPaymentRegistrations';

	const REQUEST_INVOICE = 'Invoice';

	const REQUEST_PROVIDERS = 'Providers';

	const REQUEST_PAYMENT_LINK_CREATE = 'PaymentLinkCreate';

	const REQUEST_PAYMENT_LINK_CANCEL = 'PaymentLinkCancel';

	const REQUEST_PAYMENT_LINK_DETAILS = 'PaymentLinkDetails';

	const REQUEST_SETTLEMENT = 'Settlement';

	const REQUEST_SETTLEMENT_REFUND = 'SettlementRefund';

	const REQUEST_PAYOUT = 'Payout';

	const REQUEST_PAYWALL_PAYMENT_INIT = 'PayWallPaymentInit';

	const REQUEST_PAYWALL_PAYMENT_UPDATE = 'PayWallPaymentUpdate';

	const REQUEST_PAYWALL_PAYMENT_DETAILS = 'PayWallPaymentDetails';

	/**
	 * Result code constants
	 *
	 */
	const RESULT_CODE_SUCCESS = 'SUCCESSFUL';

	const RESULT_CODE_ERROR = 'ERROR';

	const RESULT_CODE_PENDING = 'PENDING';

	const RESULT_CODE_USER_CANCEL = 'CANCELED';

	const RESULT_CODE_TIMEOUT = 'TIMEOUT';

	const RESULT_CODE_OPEN = 'OPEN';

	/**
	 * Provider name constants
	 *
	 */
	const PROVIDER_ABAQOOS = 'ABAQOOS';

	const PROVIDER_BARION = 'Barion';

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

	const PROVIDER_OTPARUHITEL = 'OTPAruhitel';

	const PROVIDER_OTPAY = 'OTPay';

	const PROVIDER_OTPAY_MASTERPASS = 'OTPayMP';

	const PROVIDER_PAYPAL = 'PayPal';

	const PROVIDER_PAYPALREST = 'PayPalRest';

	const PROVIDER_PAYSAFECARD = 'PSC';

	const PROVIDER_PAYSAFECASH = 'Paysafecash';

	const PROVIDER_PAYU2 = 'PayU2';

	const PROVIDER_PAYUREST = 'PayURest';

	const PROVIDER_RAIFFEISENPAY = 'RaiffeisenPay';

	const PROVIDER_SAFERPAY = 'Saferpay';

	const PROVIDER_SMS = 'SMS';

	const PROVIDER_SOFORT = 'Sofort';

	const PROVIDER_UNICREDIT = 'UniCredit';

	const PROVIDER_VIRPAY = 'Virpay';

	const PROVIDER_VIVAWALLET = 'VivaWallet';

	const PROVIDER_WIRECARD = 'Wirecard';

	const PROVIDER_WIRECARD_QPAY = 'QPAY';

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
	 * Payment registration types
	 */
	const PAYMENT_REGISTRATION_TYPE_LEGACY = 'OLD';
	const PAYMENT_REGISTRATION_TYPE_CUSTOMER_INITIATED = 'CIT';
	const PAYMENT_REGISTRATION_TYPE_MERCHANT_INITIATED = 'MIT';

	/**
	 * Payout types
	 */
	const PAYOUT_TYPE_FUNDS_DISBURSEMENT = 'B2P';
	const PAYOUT_TYPE_GAMBLING = 'WIN';

	/**
	 * Default store name
	 *
	 */
	const SDK_TEST_STORE_NAME = 'sdk_test';

	/**
	 * Default API key
	 *
	 */
	const SDK_TEST_API_KEY = '86af3-80e4f-f8228-9498f-910ad';

	/**
	 * Default public key used for encryption
	 *
	 */
	const SDK_TEST_ENCRYPT_PUBLIC_KEY = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCpRN6hb8pQaDen9Qjt18P2FqSc
F2uhjKfd0DZ1t0HWtvYMmJGfM6+wgjQGDHHc4LAcLIHF1TQVLCYdbyLzsOTRUhi4
UFsW18IBznoEAx2wxiTCyzxtONpIkr5HD2E273UbXvVKA2hig2BgpOA2Poil9xtO
XIm63iVw6gjP2qDnNwIDAQAB
-----END PUBLIC KEY-----';

	/**
	 * Production service URL
	 *
	 */
	const GATEWAY_URL_PRODUCTION = 'https://system.paymentgateway.hu';

	/**
	 * Test service URL
	 *
	 */
	const GATEWAY_URL_TEST = 'https://system-test.paymentgateway.hu';

	/**
	 * Configuration
	 *
	 * @var \BigFish\PaymentGateway\Config
	 * @access protected
	 * @static
	 */
	protected static $config;

	/**
	 * @var bool
	 */
	protected static $debugCommunication = false;


	/**
	 * Set configuration
	 *
	 * @param \BigFish\PaymentGateway\Config $config
	 * @return boolean
	 * @access public
	 * @static
	 */
	public static function setConfig(Config $config = null)
	{
		if (is_null($config)) {
			$config = new Config();
		}

		self::$config = $config;

		return self::$config instanceof Config;
	}

	/**
	 * Get configuration
	 *
	 * @return \BigFish\PaymentGateway\Config
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function getConfig()
	{
		if (self::$config instanceof Config || self::setConfig()) {
			return self::$config;
		}
		throw new Exception('Payment Gateway configuration has not been set');
	}

	/**
	 * @return bool
	 */
	public static function isDebugCommunication()
	{
		return self::$debugCommunication;
	}

	/**
	 * @param bool $debugCommunication
	 */
	public static function setDebugCommunication($debugCommunication)
	{
		self::$debugCommunication = (bool)$debugCommunication;
	}

	/**
	 * Transaction initialization
	 *
	 * @param \BigFish\PaymentGateway\Request\Init $request Init request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function init(InitRequest $request)
	{
		return self::sendRequest(self::REQUEST_INIT, $request);
	}

	/**
	 * Start payment process, redirects the user to Payment Gateway
	 *
	 * @param \BigFish\PaymentGateway\Request\Start $request Start request object
	 * @return void
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function start(StartRequest $request)
	{
		header('Location: ' . self::getStartUrl($request));
		exit();
	}

	/**
	 * Get payment start URL
	 *
	 * @param \BigFish\PaymentGateway\Request\Start $request Start request object
	 * @return string
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function getStartUrl(StartRequest $request)
	{
		return self::getUrl() . '/Start?' . $request->getParams();
	}

	/**
	 * Query transaction results from Payment Gateway
	 *
	 * @param \BigFish\PaymentGateway\Request\Result $request Result request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function result(ResultRequest $request)
	{
		return self::sendRequest(self::REQUEST_RESULT, $request);
	}

	/**
	 * Close a previously started transaction
	 *
	 * @param \BigFish\PaymentGateway\Request\Close $request Close request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function close(CloseRequest $request)
	{
		return self::sendRequest(self::REQUEST_CLOSE, $request);
	}

	/**
	 * Refund a transaction
	 *
	 * @param \BigFish\PaymentGateway\Request\Refund $request Refund request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function refund(RefundRequest $request)
	{
		return self::sendRequest(self::REQUEST_REFUND, $request);
	}

	/**
	 * Recurring payment transaction initialization
	 *
	 * @param \BigFish\PaymentGateway\Request\InitRP $request Recurring payment init request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function initRP(InitRPRequest $request)
	{
		return self::sendRequest(self::REQUEST_INIT_RP, $request);
	}

	/**
	 * Start recurring payment transaction
	 *
	 * @param \BigFish\PaymentGateway\Request\StartRP $request Recurring payment start request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function startRP(StartRPRequest $request)
	{
		return self::sendRequest(self::REQUEST_START_RP, $request);
	}

	/**
	 * Finalize a transaction
	 *
	 * @param \BigFish\PaymentGateway\Request\Finalize $request Finalize request object
	 * @return void
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function finalize(FinalizeRequest $request)
	{
		header('Location: ' . self::getFinalizeUrl($request));
		exit();
	}

	/**
	 * Get payment finalize URL
	 *
	 * @param \BigFish\PaymentGateway\Request\Finalize $request Finalize request object
	 * @return string
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function getFinalizeUrl(FinalizeRequest $request)
	{
		return self::getUrl() . '/Finalize?' . $request->getParams();
	}

	/**
	 * Get one click payment options
	 *
	 * @param \BigFish\PaymentGateway\Request\OneClickOptions $request
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function oneClickOptions(OneClickOptionsRequest $request)
	{
		return self::sendRequest(self::REQUEST_ONE_CLICK_OPTIONS, $request);
	}

	/**
	 * Get Payment Registrations
	 *
	 * @param \BigFish\PaymentGateway\Request\GetPaymentRegistrations $request
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function getPaymentRegistrations(GetPaymentRegistrationsRequest $request)
	{
		return self::sendRequest(self::REQUEST_GET_PAYMENT_REGISTRATIONS, $request);
	}

	/**
	 * One Click Token Cancel
	 *
	 * @param \BigFish\PaymentGateway\Request\OneClickTokenCancel $request OneClickTokenCancel request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function oneClickTokenCancel(OneClickTokenCancelRequest $request)
	{
		return self::sendRequest(self::REQUEST_ONE_CLICK_TOKEN_CANCEL, $request);
	}

	/**
	 * Cancel Payment Registration
	 *
	 * @param \BigFish\PaymentGateway\Request\CancelPaymentRegistration $request CancelPaymentRegistration request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function cancelPaymentRegistration(CancelPaymentRegistrationRequest $request)
	{
		return self::sendRequest(self::REQUEST_CANCEL_PAYMENT_REGISTRATION, $request);
	}

	/**
	 * One Click Token Cancel All
	 *
	 * @param \BigFish\PaymentGateway\Request\OneClickTokenCancelAll $request OneClickTokenCancelAll request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function oneClickTokenCancelAll(OneClickTokenCancelAllRequest $request)
	{
		return self::sendRequest(self::REQUEST_ONE_CLICK_TOKEN_CANCEL_ALL, $request);
	}

	/**
	 * Cancel All Payment Registrations
	 *
	 * @param \BigFish\PaymentGateway\Request\CancelAllPaymentRegistrations $request CancelAllPaymentRegistrations request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function cancelAllPaymentRegistrations(CancelAllPaymentRegistrationsRequest $request)
	{
		return self::sendRequest(self::REQUEST_CANCEL_ALL_PAYMENT_REGISTRATIONS, $request);
	}

	/**
	 * Get invoice
	 *
	 * @param \BigFish\PaymentGateway\Request\Invoice $request
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function invoice(InvoiceRequest $request)
	{
		return self::sendRequest(self::REQUEST_INVOICE, $request);
	}

	/**
	 * Get providers
	 *
	 * @param \BigFish\PaymentGateway\Request\Providers $request
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function providers(ProvidersRequest $request)
	{
		return self::sendRequest(self::REQUEST_PROVIDERS, $request);
	}

	/**
	 * Query transaction details from Payment Gateway
	 *
	 * @param \BigFish\PaymentGateway\Request\Details $request Details request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function details(DetailsRequest $request)
	{
		return self::sendRequest(self::REQUEST_DETAILS, $request);
	}

	/**
	 * Payment link create
	 *
	 * @param \BigFish\PaymentGateway\Request\PaymentLinkCreate $request Payment link create request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function paymentLinkCreate(PaymentLinkCreateRequest $request)
	{
		return self::sendRequest(self::REQUEST_PAYMENT_LINK_CREATE, $request);
	}

	/**
	 * Payment link cancel
	 *
	 * @param \BigFish\PaymentGateway\Request\PaymentLinkCancel $request Payment link cancel request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function paymentLinkCancel(PaymentLinkCancelRequest $request)
	{
		return self::sendRequest(self::REQUEST_PAYMENT_LINK_CANCEL, $request);
	}

	/**
	 * Payment link details
	 *
	 * @param \BigFish\PaymentGateway\Request\PaymentLinkDetails $request Payment link details request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function paymentLinkDetails(PaymentLinkDetailsRequest $request)
	{
		return self::sendRequest(self::REQUEST_PAYMENT_LINK_DETAILS, $request);
	}

	/**
	 * Get Settlement data
	 *
	 * @param \BigFish\PaymentGateway\Request\Settlement $request Settlement request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function settlement(SettlementRequest $request)
	{
		return self::sendRequest(self::REQUEST_SETTLEMENT, $request);
	}

	/**
	 * Get Settlement refund data
	 *
	 * @param \BigFish\PaymentGateway\Request\SettlementRefund $request Settlement refund request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function settlementRefund(SettlementRefundRequest $request)
	{
		return self::sendRequest(self::REQUEST_SETTLEMENT_REFUND, $request);
	}

	/**
	 * Payout
	 *
	 * @param \BigFish\PaymentGateway\Request\Payout $request
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function payout(PayoutRequest $request)
	{
		return self::sendRequest(self::REQUEST_PAYOUT, $request);
	}

	/**
	 * Query transaction log from Payment Gateway
	 *
	 * @param \BigFish\PaymentGateway\Request\Log $request Log request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function log(LogRequest $request)
	{
		return self::sendRequest(self::REQUEST_LOG, $request);
	}

	/**
	 * Initialize PayWall payment
	 *
	 * @param \BigFish\PaymentGateway\Request\PayWallPaymentInit $request PayWall payment init request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function payWallPaymentInit(PayWallPaymentInitRequest $request)
	{
		return self::sendRequest(self::REQUEST_PAYWALL_PAYMENT_INIT, $request);
	}

	/**
	 * Update PayWall payment
	 *
	 * @param \BigFish\PaymentGateway\Request\PayWallPaymentUpdate $request PayWall payment update request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function payWallPaymentUpdate(PayWallPaymentUpdateRequest $request)
	{
		return self::sendRequest(self::REQUEST_PAYWALL_PAYMENT_UPDATE, $request);
	}

	/**
	 * PayWall payment details
	 *
	 * @param \BigFish\PaymentGateway\Request\PayWallPaymentDetails $request PayWall payment details request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public static function payWallPaymentDetails(PayWallPaymentDetailsRequest $request)
	{
		return self::sendRequest(self::REQUEST_PAYWALL_PAYMENT_DETAILS, $request);
	}

	/**
	 * Get service URL
	 *
	 * @return string
	 * @access protected
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	protected static function getUrl()
	{
		if (self::getConfig()->testMode === true) {
			return self::getConfig()->gatewayUrlTest;
		} else {
			return self::GATEWAY_URL_PRODUCTION;
		}
	}

	/**
	 * Send request
	 *
	 * @param string $method
	 * @param \BigFish\PaymentGateway\Request\RequestAbstract $request
	 * @return \BigFish\PaymentGateway\Response
	 * @access private
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	private static function sendRequest($method, Request $request)
	{
		if (!function_exists('curl_init')) {
			throw new Exception('cURL PHP module is not loaded');
		}

		$url = self::getUrl() . '/api/payment/';

		$request->encodeValues();

		if ($request instanceof InitRequest || $request instanceof PaymentLinkCreateRequest) {
			$request->setExtra();
		}

		$request->ucfirstProps();

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(self::getAuthorizationHeader()));

		if ($method == self::REQUEST_CLOSE || $method == self::REQUEST_REFUND) {
			/**
			 * OTPay close and refund (extra timeout)
			 *
			 */
			curl_setopt($ch, CURLOPT_TIMEOUT, 600);
		} else {
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		}

		curl_setopt($ch, CURLOPT_MAXREDIRS, 4);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$httpHost = self::getHttpHost();

		if (!empty($httpHost)) {
			curl_setopt($ch, CURLOPT_REFERER, $httpHost);
		}

		$postData = array(
			'method' => $method,
			'json' => json_encode(get_object_vars($request)),
		);

		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($ch, CURLOPT_USERAGENT, self::getUserAgent($method));

		if (self::isDebugCommunication()) {
			curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		}

		if (self::getConfig()->gatewayProxy != '') {
			curl_setopt($ch, CURLOPT_PROXY, self::getConfig()->gatewayProxy);
		}

		$httpResponse = curl_exec($ch);

		if ($httpResponse === false) {
			$e = new Exception(sprintf('Communication error: %s', curl_error($ch)));

			curl_close($ch);

			throw $e;
		}

		$sdkDebugInfo = array();

		if (self::isDebugCommunication()) {
			$sdkDebugInfo = array(
				'curl_getinfo' => curl_getinfo($ch),
				'post_data' => $postData
			);
		}

		curl_close($ch);

		return new Response($httpResponse, $sdkDebugInfo);
	}

	/**
	 * Get authorization header
	 *
	 * @return string
	 * @access private
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	private static function getAuthorizationHeader()
	{
		return 'Authorization: Basic ' . base64_encode(self::getConfig()->storeName . ':' . self::getConfig()->apiKey);
	}

	/**
	 * Get user agent string
	 *
	 * @param string $method
	 * @return string
	 * @access private
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	private static function getUserAgent($method)
	{
		return sprintf('%s | %s | %s | %s', $method, self::getHttpHost(), 'PHP', phpversion());
	}

	/**
	 * Get HTTP host
	 *
	 * @return string
	 * @access private
	 * @static
	 */
	private static function getHttpHost()
	{
		if (isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST'])) {
			return $_SERVER['HTTP_HOST'];
		}

		if (function_exists('php_uname')) {
			return php_uname('n');
		}

		return 'localhost';
	}

}
