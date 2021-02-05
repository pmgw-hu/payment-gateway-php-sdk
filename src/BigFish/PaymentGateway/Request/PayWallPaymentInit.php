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
use BigFish\PaymentGateway\Data\Info;
use BigFish\PaymentGateway\Data\PayWallSettings;
use BigFish\PaymentGateway\Exception;

/**
 * PayWall payment initialization request class
 *
 * @package PaymentGateway
 * @subpackage Request
 */
class PayWallPaymentInit extends RequestAbstract
{
	/**
	 * Store name
	 *
	 * @var string
	 * @access public
	 */
	public $storeName;

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
	 * Cancel URL
	 *
	 * @var string
	 * @access public
	 */
	public $cancelUrl;

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
	 * Auto commit state
	 *
	 * @var boolean
	 * @access public
	 */
	public $autoCommit = true;

	/**
	 * PayWall settings
	 *
	 * @var string
	 * @access public
	 */
	public $settings;

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
	 * Construct new PayWall payment initialization request instance
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
	 * @param string $moduleName
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
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
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
	 * @access public
	 */
	public function setModuleVersion($moduleVersion)
	{
		$this->moduleVersion = $moduleVersion;
		return $this;
	}

	/**
	 * Set the URL where Users will be sent back after payment
	 *
	 * @param string $responseUrl Response URL
	 * (e.g. http://www.yourdomain.com/response.php, http://www.yourdomain.com/response.php?someparam=somevalue etc.)
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
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
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
	 * @access public
	 */
	public function setNotificationUrl($notificationUrl)
	{
		$this->notificationUrl = trim($notificationUrl);
		return $this;
	}

	/**
	 * Set Cancel URL
	 *
	 * @param string $cancelUrl
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
	 * @access public
	 */
	public function setCancelUrl($cancelUrl)
	{
		$this->cancelUrl = trim($cancelUrl);
		return $this;
	}

	/**
	 * Set payment transaction amount
	 *
	 * @param float $amount Transaction amount
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
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
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
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
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
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
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
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
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
	 * @access public
	 */
	public function setLanguage($language)
	{
		$this->language = (($language) ? $language : 'HU');
		return $this;
	}

	/**
	 * If true verifies the availability of funds and captures funds in one step.
	 * If false verifies the availability of funds and reserves them for later capture.
	 *
	 * @param boolean $autoCommit true or false
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
	 * @access public
	 */
	public function setAutoCommit($autoCommit = true)
	{
		$this->autoCommit = (($autoCommit === true || $autoCommit === "true") ? "true" : "false");
		return $this;
	}

	/**
	 * @param array $settings
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
	 * @access public
	 */
	public function setSettings(array $settings = array())
	{
		$this->settings = $this->urlSafeEncode(json_encode($settings));
		return $this;
	}

	/**
	 * @param Info $settingsObject
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
	 * @access public
	 * @throws Exception
	 */
	public function setSettingsObject($settingsObject)
	{
		if (!$settingsObject instanceof PayWallSettings) {
			throw new Exception('Invalid PayWall settings parameter');
		}

		$this->setSettings($settingsObject->getData());
		return $this;
	}


	/**
	 * Set extra data
	 *
	 * @param array $extra Extra information
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
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
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
	 * @access public
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
	 * @return \BigFish\PaymentGateway\Request\PayWallPaymentInit
	 * @access public
	 * @throws Exception
	 */
	public function setInfo(array $info = array())
	{
		$this->info = $this->urlSafeEncode(json_encode($info));
		return $this;
	}
}
