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
 * Payment link create request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class PaymentLinkCreate extends RequestAbstract
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
	 * Amount
	 * 
	 * @var float
	 * @access public
	 */
	public $amount;

	/**
	 * Minimum amount
	 *
	 * @var float
	 * @access public
	 */
	public $minimumAmount;

	/**
	 * Maximum amount
	 *
	 * @var float
	 * @access public
	 */
	public $maximumAmount;

	/**
	 * Currency code
	 * 
	 * @var string
	 * @access public
	 */
	public $currency = 'HUF';

	/**
	 * Multiple transactions
	 *
	 * @var boolean
	 * @access public
	 */
	public $multipleTransactions = false;

	/**
	 * Language code
	 * 
	 * @var string
	 * @access public
	 */
	public $language = 'HU';

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
	 * Auto commit state
	 * 
	 * @var boolean
	 * @access public
	 */
	public $autoCommit = true;

	/**
	 * Expiration time
	 * 
	 * @var string
	 * @access public
	 */
	public $expirationTime;

	/**
	 * Notification URL
	 * 
	 * @var string
	 * @access public
	 */
	public $notificationUrl;

	/**
	 * Notification email
	 * 
	 * @var string
	 * @access public
	 */
	public $notificationEmail;

	/**
	 * Email notification only success
	 * 
	 * @var bool
	 * @access public
	 */
	public $emailNotificationOnlySuccess = false;

	/**
	 * Information form
	 *
	 * @var string
	 * @access public
	 */
	public $infoForm;

	/**
	 * General terms and conditions url
	 *
	 * @var string
	 * @access public
	 */
	public $gtcUrl;

	/**
	 * Privacy policy url
	 *
	 * @var string
	 * @access public
	 */
	public $privacyPolicyUrl;

	/**
	 * Redirect url
	 *
	 * @var string
	 * @access public
	 */
	public $redirectUrl;

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
	 * Construct payment link create request instance
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
	 * Set the identifier of the selected payment provider
	 *
	 * @param string $providerName Identifier of the selected payment provider
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setProviderName($providerName)
	{
		$this->providerName = $providerName;
		return $this;
	}

	/**
	 * Set payment transaction amount
	 *
	 * @param float $amount Transaction amount
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setAmount($amount)
	{
		$this->amount = $amount;
		$this->minimumAmount = null;
		$this->maximumAmount = null;
		return $this;
	}

	/**
	 * Set payment transaction flexible amount
	 *
	 * @param float $minimumAmount Transaction minimum amount
	 * @param float|null $maximumAmount Transaction maximum amount
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 */
	public function setFlexibleAmount($minimumAmount, $maximumAmount = null)
	{
		$this->amount = null;
		$this->minimumAmount = $minimumAmount;
		$this->maximumAmount = $maximumAmount;
		return $this;
	}

	/**
	 * Set payment transaction currency
	 * 
	 * @param string $currency Three-letter ISO currency code (e.g. HUF, USD etc.)
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setCurrency($currency)
	{
		$this->currency = $currency;
		return $this;
	}

	/**
	 * Set multiple transactions
	 *
	 * @param boolean $multipleTransactions true or false
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setMultipleTransactions($multipleTransactions = true)
	{
		$this->multipleTransactions = (($multipleTransactions === true || $multipleTransactions == "true") ? true : false);
		return $this;
	}

	/**
	 * Set the language
	 * 
	 * @param string $language Language (e.g. HU, EN, DE etc.)
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate 
	 * @access public
	 */
	public function setLanguage($language)
	{
		$this->language = (($language) ? $language : 'HU');
		return $this;
	}	

	/**
	 * Set the identifier of the order in your system
	 * 
	 * @param mixed $orderId Order identifier
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate 
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
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate 
	 * @access public
	 */
	public function setUserId($userId)
	{
		$this->userId = $userId;
		return $this;
	}

	/**
	 * If true verifies the availability of funds and captures funds in one step.
	 * If false verifies the availability of funds and reserves them for later capture.
	 * 
	 * @param boolean $autoCommit true or false
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setAutoCommit($autoCommit = true)
	{
		$this->autoCommit = (($autoCommit === true || $autoCommit == "true") ? "true" : "false");
		return $this;
	}

	/**
	 * Set Expiration Time
	 * 
	 * @param string $expirationTime
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setExpirationTime($expirationTime)
	{
		$this->expirationTime = trim($expirationTime);
		return $this;
	}

	/**
	 * Set Notification URL
	 * 
	 * @param string $notificationUrl
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setNotificationUrl($notificationUrl)
	{
		$this->notificationUrl = trim($notificationUrl);
		return $this;
	}

	/**
	 * Set Notification Email
	 * 
	 * @param string $notificationEmail
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setNotificationEmail($notificationEmail)
	{
		$this->notificationEmail = trim($notificationEmail);
		return $this;
	}

	/**
	 * Set email notification only success
	 * 
	 * @param boolean $emailNotificationOnlySuccess true or false
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setEmailNotificationOnlySuccess($emailNotificationOnlySuccess = true)
	{
		$this->emailNotificationOnlySuccess = (($emailNotificationOnlySuccess === true || $emailNotificationOnlySuccess == "true") ? true : false);
		return $this;
	}

	/**
	 * Set information form
	 *
	 * @param string $infoForm
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setInfoForm($infoForm)
	{
		$this->infoForm = trim($infoForm);
		return $this;
	}

	/**
	 * Set general terms and conditions url
	 *
	 * @param string $gtcUrl
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setGtcUrl($gtcUrl)
	{
		$this->gtcUrl = trim($gtcUrl);
		return $this;
	}

	/**
	 * Set privacy policy url
	 *
	 * @param string $privacyPolicyUrl
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setPrivacyPolicyUrl($privacyPolicyUrl)
	{
		$this->privacyPolicyUrl = trim($privacyPolicyUrl);
		return $this;
	}

	/**
	 * Set redirect url
	 *
	 * @param string $redirectUrl
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setRedirectUrl($redirectUrl)
	{
		$this->redirectUrl = trim($redirectUrl);
		return $this;
	}

	/**
	 * Set extra data
	 * 
	 * @param array $extra Extra information
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setExtra(array $extra = array())
	{
		if (!empty($extra)) {
			$this->extra = $this->urlSafeEncode(json_encode($extra));
		}

		return $this;
	}

	/**
	 * @param Info $infoObject
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
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
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @throws Exception
	 */
	public function setInfo(array $info = array())
	{
		$this->info = $this->urlSafeEncode(json_encode($info));
		return $this;
	}
	/**
	 * Set module name
	 *
	 * @param string $moduleName
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
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
	 * @param string $moduleVersion
	 * @return \BigFish\PaymentGateway\Request\PaymentLinkCreate
	 * @access public
	 */
	public function setModuleVersion($moduleVersion)
	{
		$this->moduleVersion = $moduleVersion;
		return $this;
	}
}
