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
use BigFish\PaymentGateway\Request\OneClickTokenCancel as OneClickTokenCancelRequest;
use BigFish\PaymentGateway\Request\Invoice as InvoiceRequest;
use BigFish\PaymentGateway\Request\Providers as ProvidersRequest;
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
	const VERSION = '2.6.4';

	/**
	 * API type constants
	 * 
	 */
	const API_SOAP = 'SOAP';

	const API_REST = 'REST';

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

	const REQUEST_ONE_CLICK_TOKEN_CANCEL = 'OneClickTokenCancel';

	const REQUEST_INVOICE = 'Invoice';
	
	const REQUEST_PROVIDERS = 'Providers';
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

	const PROVIDER_BORGUN = 'Borgun';

	const PROVIDER_CIB = 'CIB';

	const PROVIDER_ESCALION = 'Escalion';

	const PROVIDER_FHB = 'FHB';

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

	const PROVIDER_PAYU2 = 'PayU2';

	const PROVIDER_SAFERPAY = 'Saferpay';

	const PROVIDER_SMS = 'SMS';

	const PROVIDER_SOFORT = 'Sofort';

	const PROVIDER_UNICREDIT = 'UniCredit';

	const PROVIDER_WIRECARD_QPAY = 'QPAY';
		
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
	 * @var string 
	 * @access protected
	 * @static
	 */
	protected static $gatewayUrlProduction = 'https://www.paymentgateway.hu';

	/**
	 * Test service URL
	 * 
	 * @var string 
	 * @access protected
	 * @static
	 */
	protected static $gatewayUrlTest = 'https://test.paymentgateway.hu';

	/**
	 * Configuration
	 * 
	 * @var \BigFish\PaymentGateway\Config
	 * @access protected
	 * @static
	 */
	protected static $config;

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
	 * Transaction initialization
	 * 
	 * @param \BigFish\PaymentGateway\Request\Init $request Init request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
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
	 */
	public static function oneClickOptions(OneClickOptionsRequest $request)
	{
		return self::sendRequest(self::REQUEST_ONE_CLICK_OPTIONS, $request);
	}

	/**
	 * One Click Token Cancel
	 * 
	 * @param \BigFish\PaymentGateway\Request\OneClickTokenCancel $request OneClickTokenCancel request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 */
	public static function oneClickTokenCancel(OneClickTokenCancelRequest $request)
	{
		return self::sendRequest(self::REQUEST_ONE_CLICK_TOKEN_CANCEL, $request);
	}

	/**
	 * Get invoice
	 * 
	 * @param \BigFish\PaymentGateway\Request\Invoice $request
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
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
	 */
	public static function details(DetailsRequest $request)
	{
		return self::sendRequest(self::REQUEST_DETAILS, $request);
	}
	
	/**
	 * Query transaction log from Payment Gateway
	 * 
	 * @param \BigFish\PaymentGateway\Request\Log $request Log request object
	 * @return \BigFish\PaymentGateway\Response Payment Gateway response object
	 * @access public
	 * @static
	 */
	public static function log(LogRequest $request)
	{
		return self::sendRequest(self::REQUEST_LOG, $request);
	}
	
	/**
	 * Get service URL
	 * 
	 * @return string
	 * @access public
	 * @static
	 */
	protected static function getUrl()
	{
		if (self::getConfig()->testMode === true) {
			return self::$gatewayUrlTest;
		} else {
			return self::$gatewayUrlProduction;
		}
	}

	/**
	 * Uppercase object properties
	 * 
	 * @param object $object
	 * @return void 
	 * @access protected
	 * @static
	 */
	public static function ucfirstProps($object)
	{
		foreach (get_object_vars($object) as $key => $value) {
			unset($object->{$key});

			$object->{ucfirst($key)} = $value;
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
		switch (self::getConfig()->useApi) {
			case self::API_SOAP:
				return self::sendSoapRequest($method, $request);
			case self::API_REST:
				return self::sendRestRequest($method, $request);
			default:
				throw new Exception(sprintf('Invalid API type (%s)', self::getConfig()->useApi));
		}
	}

	/**
	 * Send SOAP request
	 * 
	 * @param string $method
	 * @param \BigFish\PaymentGateway\Request\RequestAbstract $request
	 * @return \BigFish\PaymentGateway\Response
	 * @access private
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	private static function sendSoapRequest($method, Request $request)
	{
		if (!class_exists('SoapClient')) {
			throw new Exception('SOAP PHP module is not loaded');
		}

		$wsdl = self::getUrl() . '/api/soap/?wsdl';

		try {
			$client = new \SoapClient($wsdl, array(
				'soap_version' => SOAP_1_2,
				'cache_wsdl' => WSDL_CACHE_BOTH,
				'exceptions' => true,
				'trace' => true,
				'login' => self::getConfig()->storeName,
				'password' => self::getConfig()->apiKey,
				'user_agent' => self::getUserAgent($method),
			));

			self::prepareRequest($method, $request);

			$soapResult = $client->__call($method, array(array('request' => $request)));
			
			$soapResponse = $soapResult->{$method . 'Result'};
			
			self::ucfirstProps($soapResponse);
			
			return new Response($soapResponse);
		} catch (\SoapFault $e) {
			throw new Exception($e->getMessage());
		}
	}

	/**
	 * Send REST request
	 * 
	 * @param string $method
	 * @param \BigFish\PaymentGateway\Request\RequestAbstract $request
	 * @return \BigFish\PaymentGateway\Response
	 * @access private
	 * @static
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	private static function sendRestRequest($method, Request $request)
	{
		if (!function_exists('curl_init')) {
			throw new Exception('cURL PHP module is not loaded');
		}

		$url = self::getUrl() . '/api/rest/';

		self::prepareRequest($method, $request);

		$ch = curl_init();

		if (!$ch) {
			throw new Exception('cURL initialization error');
		}

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
		curl_setopt($ch, CURLOPT_REFERER, self::getHttpHost());

		$postData = array(
			'method' => $method,
			'json' => json_encode(get_object_vars($request)),
		);
		
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
		curl_setopt($ch, CURLOPT_USERAGENT, self::getUserAgent($method));

		$httpResponse = curl_exec($ch);

		if ($httpResponse === false) {
			$e = new Exception(sprintf('Communication error: %s', curl_error($ch)));

			curl_close($ch);

			throw $e;
		}

		curl_close($ch);

		return new Response($httpResponse);
	}

	/**
	 * Prepare request
	 * 
	 * @param string $method
	 * @param \BigFish\PaymentGateway\Request\RequestAbstract $request
	 * @return void
	 * @access private
	 * @static
	 */
	private static function prepareRequest($method, Request $request)
	{
		$request->encodeValues();

		if ($method == self::REQUEST_INIT) {
			/** @var \BigFish\PaymentGateway\Request\Init $request */
			$request->setExtra();
		}

		if (self::getConfig()->useApi == self::API_REST) {
			self::ucfirstProps($request);
		}
	}

	/**
	 * Get authorization header
	 * 
	 * @return string
	 * @access private
	 * @static
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
	 */
	private static function getUserAgent($method)
	{
		switch (self::getConfig()->useApi) {
			case self::API_SOAP:
				$clientType = 'SOAP';
				break;
			case self::API_REST:
				$clientType = 'Rest';
				break;
		}

		return sprintf('BIG FISH Payment Gateway %s Client v%s (%s - %s)', $clientType, self::VERSION, $method, self::getHttpHost());
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
		return $_SERVER['HTTP_HOST'];
	}

}
