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
use BigFish\PaymentGateway\Exception;

/**
 * Recurring payment initialization request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class InitRP extends RequestAbstract
{
	/**
	 * Payment Gateway reference transaction ID
	 * 
	 * @var string
	 * @access public
	 */
	public $referenceTransactionId;

	/**
	 * Response URL
	 * 
	 * @var string
	 * @access public
	 */
	public $responseUrl;

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
	public $currency;

	/**
	 * Store name
	 * 
	 * @var string
	 * @access public
	 */
	public $storeName;

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
	 * Info data
	 *
	 * @var string|null
	 * @access public
	 */
	public $info;

	/**
	 * Construct new recurring payment Init request instance
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
	 * @return \BigFish\PaymentGateway\Request\InitRP
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
	 * @return \BigFish\PaymentGateway\Request\InitRP
	 * @access public
	 */
	public function setModuleVersion($moduleVersion)
	{
		$this->moduleVersion = $moduleVersion;
		return $this;
	}

	/**
	 * Set the reference Payment Gateway transaction ID
	 * 
	 * @param string $referenceTransactionId Identifier of the reference transaction ID
	 * @return \BigFish\PaymentGateway\Request\InitRP
	 * @access public
	 */
	public function setReferenceTransactionId($referenceTransactionId)
	{
		$this->referenceTransactionId = $referenceTransactionId;
		return $this;
	}

	/**
	 * Set the URL where Users will be sent back after payment
	 * 
	 * @param string $responseUrl Response URL
	 * (e.g. http://www.yourdomain.com/response.php, http://www.yourdomain.com/response.php?someparam=somevalue etc.)
	 * @return \BigFish\PaymentGateway\Request\InitRP 
	 * @access public
	 */
	public function setResponseUrl($responseUrl)
	{
		$this->responseUrl = $responseUrl;
		return $this;
	}

	/**
	 * Set payment transaction amount
	 * 
	 * @param float $amount Transaction amount
	 * @return \BigFish\PaymentGateway\Request\InitRP
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
	 * @return \BigFish\PaymentGateway\Request\InitRP 
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
	 * @return \BigFish\PaymentGateway\Request\InitRP 
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
	 * @return \BigFish\PaymentGateway\Request\InitRP 
	 * @access public
	 */
	public function setCurrency($currency)
	{
		$this->currency = $currency;
		return $this;
	}

	/**
	 * @param Info $infoObject
	 * @return \BigFish\PaymentGateway\Request\InitRP
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
	 * @return \BigFish\PaymentGateway\Request\InitRP
	 * @throws Exception
	 */
	public function setInfo(array $info = array())
	{
		$this->info = $this->urlSafeEncode(json_encode($info));
		return $this;
	}
}
