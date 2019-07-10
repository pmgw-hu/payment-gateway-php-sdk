<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 * 
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2015, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */
namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception;
use BigFish\PaymentGateway\Data\Info;

/**
 * Initialization request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class Init extends RequestAbstract
{
	/**
	 * Store name
	 * 
	 * @var string
	 * @access public
	 */
	public $storeName;

	/**
	 * Provider name
	 * 
	 * @var string
	 * @access public
	 */
	public $providerName;

	/**
	 * Response URL
	 * 
	 * @var string
	 * @access public
	 */
	public $responseUrl;

	/**
	 * Notification URL
	 * 
	 * @var string
	 * @access public
	 */
	public $notificationUrl;

	/**
	 * Amount
	 * 
	 * @var float
	 * @access public
	 */
	public $amount;

	/**
	 * Order ID
	 * 
	 * @var string
	 * @access public
	 */
	public $orderId;

	/**
	 * User ID
	 * 
	 * @var string
	 * @access public
	 */
	public $userId;

	/**
	 * Currency code
	 * 
	 * @var string
	 * @access public
	 */
	public $currency = 'HUF';

	/**
	 * Language code
	 * 
	 * @var string
	 * @access public
	 */
	public $language = 'HU';

	/**
	 * Phone number (MPP, OTPay)
	 * 
	 * @var string
	 * @access public
	 */
	public $mppPhoneNumber;

	/**
	 * Credit card number (OTP)
	 * 
	 * @var string
	 * @access public
	 */
	public $otpCardNumber;

	/**
	 * Credit card expiration date (OTP)
	 * 
	 * @var string
	 * @access public
	 */
	public $otpExpiration;

	/**
	 * Credit card CVC code (OTP)
	 * 
	 * @var string
	 * @access public 
	 */
	public $otpCvc;

	/**
	 * Pocket ID (OTP)
	 * 
	 * @var string
	 * @access public
	 */
	public $otpCardPocketId;

	/**
	 * Consumer Registration Id (OTP)
	 * 
	 * @var string
	 * @access public
	 */
	public $otpConsumerRegistrationId;
	
	/**
	 * Cafeteria ID (MKBSZEP)
	 * 
	 * @var integer
	 * @access public
	 */
	public $mkbSzepCafeteriaId;
	
	/**
	 * Card number (MKBSZEP)
	 * 
	 * @var string
	 * @access public
	 */
	public $mkbSzepCardNumber;

	/**
	 * Card CVV (MKBSZEP)
	 * 
	 * @var string
	 * @access public 
	 */
	public $mkbSzepCvv;
	
	/**
	 * One-click payment state (Escalion, OTP Simple, Saferpay, PayPal, Barion2, Borgun2, GP, Virpay, PayU REST)
	 * 
	 * @var boolean
	 * @access public
	 */
	public $oneClickPayment = false;

	/**
	 * One Click Payment with forced registration (Escalion, OTP Simple, Saferpay, PayPal, Barion2, Borgun2, GP, Virpay, PayU REST)
	 *
	 * @var boolean
	 * @access public
	 */
	public $oneClickForcedRegistration = false;

	/**
	 * One Click Payment Reference Id (Escalion, OTP Simple, Saferpay, Barion2, Borgun2, GP, Virpay, PayU REST)
	 * 
	 * @var string
	 * @access public
	 */
	public $oneClickReferenceId;	
	
	/**
	 * Auto commit state
	 * 
	 * @var boolean
	 * @access public
	 */
	public $autoCommit = true;

	/**
	 * Extra data
	 * 
	 * @var string
	 * @access public
	 */
	public $extra;

	/**
	 * Info data
	 *
	 * @var Info | null
	 * @access public
	 */
	public $info;

	/**
	 * Valid OneClickPayment providers
	 * 
	 * @var array 
	 * @access protected
	 * @static
	 */
	protected static $oneClickProviders = array(
		PaymentGateway::PROVIDER_ESCALION,
		PaymentGateway::PROVIDER_OTP_SIMPLE,
		PaymentGateway::PROVIDER_SAFERPAY,
		PaymentGateway::PROVIDER_PAYPAL,
		PaymentGateway::PROVIDER_BARION2,
		PaymentGateway::PROVIDER_BORGUN2,
		PaymentGateway::PROVIDER_GP,
		PaymentGateway::PROVIDER_VIRPAY,
		PaymentGateway::PROVIDER_PAYUREST,
	);
	
	/**
	 * BIG FISH Payment Gateway payment page (MKBSZEP)
	 * 
	 * @var boolean
	 * @access public
	 */
	public $gatewayPaymentPage = false;

	/**
	 * Module name
	 *
	 * @var string
	 * @access public
	 */
	public $moduleName;

	/**
	 * Module version
	 *
	 * @var string
	 * @access public
	 */
	public $moduleVersion;

	/**
	 * Construct new Init request instance
	 * 
	 * @access public
	 * @throws \BigFish\PaymentGateway\Exception
	 */
	public function __construct()
	{
		$this->storeName = PaymentGateway::getConfig()->storeName;
		$this->moduleName = PaymentGateway::getConfig()->moduleName;
		$this->moduleVersion = PaymentGateway::getConfig()->moduleVersion;
	}

	/**
	 * Set module name
	 *
	 * @param $moduleName
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setModuleName($moduleName)
	{
		$this->moduleName = $moduleName;
		return $this;
	}

	/**
	 * Set module version
	 *
	 * @param $moduleVersion
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setModuleVersion($moduleVersion)
	{
		$this->moduleVersion = $moduleVersion;
		return $this;
	}

	/**
	 * Set the identifier of the selected payment provider
	 *
	 * @param string $providerName Identifier of the selected payment provider
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setProviderName($providerName)
	{
		$this->providerName = $providerName;
		return $this;
	}

	/**
	 * Set the URL where Users will be sent back after payment
	 * 
	 * @param string $responseUrl Response URL
	 * (e.g. http://www.yourdomain.com/response.php, http://www.yourdomain.com/response.php?someparam=somevalue etc.)
	 * @return \BigFish\PaymentGateway\Request\Init 
	 * @access public
	 */
	public function setResponseUrl($responseUrl)
	{
		$this->responseUrl = $responseUrl;
		return $this;
	}

	/**
	 * Set Notification URL
	 * 
	 * @param string $notificationUrl
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setNotificationUrl($notificationUrl)
	{
		$this->notificationUrl = trim($notificationUrl);
		return $this;
	}

	/**
	 * Set payment transaction amount
	 * 
	 * @param float $amount Transaction amount
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setAmount($amount)
	{
		$this->amount = $amount;
		return $this;
	}

	/**
	 * Set the identifier of the order in your system
	 * 
	 * @param mixed $orderId Order identifier
	 * @return \BigFish\PaymentGateway\Request\Init 
	 * @access public
	 */
	public function setOrderId($orderId)
	{
		$this->orderId = $orderId;
		return $this;
	}

	/**
	 * Set the identifier of the user in your system
	 * 
	 * @param mixed $userId User identifier
	 * @return \BigFish\PaymentGateway\Request\Init 
	 * @access public
	 */
	public function setUserId($userId)
	{
		$this->userId = $userId;
		return $this;
	}

	/**
	 * Set payment transaction currency
	 * 
	 * @param string $currency Three-letter ISO currency code (e.g. HUF, USD etc.)
	 * @return \BigFish\PaymentGateway\Request\Init 
	 * @access public
	 */
	public function setCurrency($currency)
	{
		$this->currency = (($currency) ? $currency : 'HUF');
		return $this;
	}

	/**
	 * Set the language
	 * 
	 * @param string $language Language (e.g. HU, EN, DE etc.)
	 * @return \BigFish\PaymentGateway\Request\Init 
	 * @access public
	 */
	public function setLanguage($language)
	{
		$this->language = (($language) ? $language : 'HU');
		return $this;
	}

	/**
	 * Set the Mobile Payment or MasterCard Mobile identifier
	 * Works with MPP, MPP2 and OTPay providers
	 * 
	 * @param string $mppPhoneNumber Mobile Payment identifier (e.g. 123456789) or phone number of the user (e.g. 36301234567)
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setMppPhoneNumber($mppPhoneNumber)
	{
		$this->mppPhoneNumber = $mppPhoneNumber;
		return $this;
	}

	/**
	 * Set the card number of the user
	 * Works with OTP2 provider
	 * 
	 * @param string $otpCardNumber Card number (e.g. 1111222233334444 or 1111 2222 3333 4444)
	 * @return \BigFish\PaymentGateway\Request\Init 
	 * @access public
	 */
	public function setOtpCardNumber($otpCardNumber)
	{
		$this->otpCardNumber = $otpCardNumber;
		return $this;
	}

	/**
	 * Set the card expiration date
	 * Works with OTP2 provider
	 * 
	 * @param string $otpExpiration Expiration date - mm/yy (e.g. 0512 or 05/12)
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setOtpExpiration($otpExpiration)
	{
		$this->otpExpiration = $otpExpiration;
		return $this;
	}

	/**
	 * Set the card verification code
	 * Works with OTP2 provider
	 * 
	 * @param string $otpCvc Verification code (e.g. 123)
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setOtpCvc($otpCvc)
	{
		$this->otpCvc = $otpCvc;
		return $this;
	}

	/**
	 * Set the Pocket Id of the user
	 * Works with OTP provider
	 *
	 * @param string $otpCardPocketId Pocket Id
	 * (e.g. 03)
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setOtpCardPocketId($otpCardPocketId)
	{
		$this->otpCardPocketId = $otpCardPocketId;
		return $this;
	}

	/**
	 * Set Consumer Registration Id
	 * Works with OTP provider
	 *
	 * @param string $otpConsumerRegistrationId Consumer Registration Id
	 * (e.g. 03)
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setOtpConsumerRegistrationId($otpConsumerRegistrationId)
	{
		$this->otpConsumerRegistrationId = $otpConsumerRegistrationId;
		return $this;
	}
	
	/**
	 * Set cafeteria id
	 * Works with MKBSZEP provider
	 * 
	 * @param integer $mkbSzepCafeteriaId
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setMkbSzepCafeteriaId($mkbSzepCafeteriaId)
	{
		$this->mkbSzepCafeteriaId = (int)$mkbSzepCafeteriaId;
		return $this;
	}
	
	/**
	 * Set the card number of the user
	 * Works with MKBSZEP provider
	 * 
	 * @param string $mkbSzepCardNumber Card number (e.g. 1111222233334444 or 1111 2222 3333 4444)
	 * @return \BigFish\PaymentGateway\Request\Init 
	 * @access public
	 */
	public function setMkbSzepCardNumber($mkbSzepCardNumber)
	{
		$this->mkbSzepCardNumber = $mkbSzepCardNumber;
		return $this;
	}
	
	/**
	 * Set the card verification value
	 * Works with MKBSZEP provider
	 * 
	 * @param string $mkbSzepCvv Verification code (e.g. 123)
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setMkbSzepCvv($mkbSzepCvv)
	{
		$this->mkbSzepCvv = $mkbSzepCvv;
		return $this;
	}
	
	/**
	 * Enable or disable One Click Payment of the user
	 * Works with Escalion, OTP Simple, Saferpay, PayPal, Barion2, Borgun2, GP, Virpay, PayU REST provider
	 *
	 * @param boolean $oneClickPayment true or false
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setOneClickPayment($oneClickPayment = false)
	{
		$this->oneClickPayment = (($oneClickPayment === true || $oneClickPayment == "true") ? true : false);
		return $this;
	}

	/**
	 * Enable or disable One Click Payment with forced registration
	 * Works with Escalion, OTP Simple, Saferpay, PayPal, Barion2, Borgun2, GP, Virpay, PayU REST provider
	 *
	 * @param boolean $oneClickForcedRegistration true or false
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setOneClickForcedRegistration($oneClickForcedRegistration = false)
	{
		$this->oneClickForcedRegistration = (($oneClickForcedRegistration === true || $oneClickForcedRegistration == "true") ? true : false);
		return $this;
	}

	/**
	 * Set One Click Payment Reference Id
	 * Works with Escalion, OTP Simple, Saferpay, Barion2, Borgun2, GP, Virpay, PayU REST providers
	 *
	 * @param string $oneClickReferenceId
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setOneClickReferenceId($oneClickReferenceId)
	{
		$this->oneClickReferenceId = $oneClickReferenceId;
		return $this;
	}	
	
	/**
	 * If true verifies the availability of funds and captures funds in one step.
	 * If false verifies the availability of funds and reserves them for later capture.
	 * 
	 * @param boolean $autoCommit true or false
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setAutoCommit($autoCommit = true)
	{
		$this->autoCommit = (($autoCommit === true || $autoCommit == "true") ? "true" : "false");
		return $this;
	}

	/**
	 * Card data handling on BIG FISH Payment Gateway payment page or Merchant website
	 * Works with MKBSZEP provider
	 *
	 * @param boolean $gatewayPaymentPage true or false
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 */
	public function setGatewayPaymentPage($gatewayPaymentPage = false)
	{
		$this->gatewayPaymentPage = (($gatewayPaymentPage === true || $gatewayPaymentPage == "true") ? true : false);
		return $this;
	}

	/**
	 * @param Info $infoObject
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @throws Exception
	 */
	public function setInfoObject($infoObject)
	{
		if (!$infoObject instanceof Info) {
			throw new Exception('Invalid info parameter');
		}

		$this->setInfo($infoObject->getData());
		return $this;
	}

	/**
	 * @param array $info
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @throws Exception
	 */
	public function setInfo(array $info = array())
	{
		$this->info = $this->urlSafeEncode(json_encode($info));
		return $this;
	}

	/**
	 * Set extra data
	 * 
	 * @param array $extra Extra information (Except OTP2 provider)
	 * @return \BigFish\PaymentGateway\Request\Init
	 * @access public
	 * @throws Exception
	 */
	public function setExtra(array $extra = array())
	{
		if ((in_array($this->providerName, self::$oneClickProviders) && isset($this->oneClickForcedRegistration) && $this->oneClickForcedRegistration)) {
			$extra['oneClickForcedRegistration'] = true;
		}

		if (in_array($this->providerName, array(PaymentGateway::PROVIDER_OTP, PaymentGateway::PROVIDER_OTP_TWO_PARTY)) && !empty($this->otpConsumerRegistrationId)) {
			$this->encryptExtra(array(
				'otpConsumerRegistrationId' => $this->otpConsumerRegistrationId
			));
		} elseif ($this->providerName == PaymentGateway::PROVIDER_OTP_TWO_PARTY) {
			if (
				!empty($this->otpCardNumber) &&
				!empty($this->otpExpiration) &&
				!empty($this->otpCvc)
			) {
				$this->encryptExtra(array(
					'otpCardNumber' => $this->otpCardNumber,
					'otpExpiration' => $this->otpExpiration,
					'otpCvc' => $this->otpCvc
				));
			}
		} else if ($this->providerName == PaymentGateway::PROVIDER_MKB_SZEP) {
			if (
				!empty($this->mkbSzepCardNumber) &&
				!empty($this->mkbSzepCvv)
			) {
				$this->encryptExtra(array(
					'mkbSzepCardNumber' => $this->mkbSzepCardNumber,
					'mkbSzepCvv' => $this->mkbSzepCvv
				));
			}
		} else if (!empty($extra)) {
			$this->extra = $this->urlSafeEncode(json_encode($extra));
		}

		if (!($this->providerName == PaymentGateway::PROVIDER_OTP && !empty($this->otpCardPocketId))) {
			unset($this->otpCardPocketId);
		}

		if (!(in_array($this->providerName, self::$oneClickProviders) && isset($this->oneClickPayment) && $this->oneClickPayment)) {
			unset($this->oneClickPayment);
		}
		
		if (!(in_array($this->providerName, self::$oneClickProviders) && isset($this->oneClickReferenceId) && strlen($this->oneClickReferenceId))) {
			unset($this->oneClickReferenceId);
		}
		
		unset($this->otpCardNumber);
		unset($this->otpExpiration);
		unset($this->otpCvc);
		unset($this->otpConsumerRegistrationId);
		unset($this->mkbSzepCardNumber);
		unset($this->mkbSzepCvv);
		unset($this->oneClickForcedRegistration);

		return $this;
	}

	/**
	 * Encrypt extra data
	 *
	 * @param array $data
	 * @return void
	 * @access public
	 * @throws Exception
	 */
	public function encryptExtra(array $data = array())
	{
		if (!function_exists('openssl_public_encrypt')) {
			throw new Exception('OpenSSL PHP module is not loaded');
		}

		$encrypted = null;

		$extra = json_encode($data);

		openssl_public_encrypt($extra, $encrypted, PaymentGateway::getConfig()->encryptPublicKey);

		$this->extra = $this->urlSafeEncode($encrypted);
	}

	/**
	 * Get object parameters
	 * 
	 * @return string
	 * @access public
	 * @throws Exception
	 */
	public function getParams()
	{
		$this->setExtra();
		
		return parent::getParams();
	}
}
