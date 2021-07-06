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
 * Payout request class
 *
 * @package PaymentGateway
 * @subpackage Request
 */
class Payout extends RequestAbstract
{

	/**
	 * Payout type
	 *
	 * @var string
	 * @access public
	 */
	public $payoutType;

	/**
	 * Reference Payment Gateway transaction ID
	 *
	 * @var string
	 * @access public
	 */
	public $referenceTransactionId;

	/**
	 * Payout amount
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
	 * Construct new Payout request instance
	 *
	 * @return void
	 * @throws Exception
	 * @access public
	 */
	public function __construct()
	{
		$this->moduleName = PaymentGateway::getConfig()->moduleName;
		$this->moduleVersion = PaymentGateway::getConfig()->moduleVersion;
	}

	/**
	 * Set payout type
	 *
	 * @param string $payoutType
	 * @return Payout
	 * @access public
	 */
	public function setPayoutType($payoutType)
	{
		$this->payoutType = $payoutType;
		return $this;
	}

	/**
	 * Set reference Payment Gateway transaction ID
	 *
	 * @param string $referenceTransactionId Identifier of the reference transaction ID
	 * @return Payout
	 * @access public
	 */
	public function setReferenceTransactionId($referenceTransactionId)
	{
		$this->referenceTransactionId = $referenceTransactionId;
		return $this;
	}

	/**
	 * Set payout amount
	 *
	 * @param float $amount Payout amount
	 * @return Payout
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
	 * @return Payout
	 * @access public
	 */
	public function setOrderId($orderId)
	{
		$this->orderId = $orderId;
		return $this;
	}

	/**
	 * @param Info $infoObject
	 * @return Payout
	 * @throws Exception
	 * @access public
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
	 * @return Payout
	 * @access public
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
	 * @return Payout
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
	 * @return Payout
	 * @access public
	 */
	public function setModuleVersion($moduleVersion)
	{
		$this->moduleVersion = $moduleVersion;
		return $this;
	}
}
