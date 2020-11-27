<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2018, BIG FISH Payment Services Ltd.
 */
namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

/**
 * SettlementRefund request class
 *
 * @package PaymentGateway
 * @subpackage Request
 */
class SettlementRefund extends RequestAbstract
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
	 * Terminal ID
	 *
	 * @var string
	 * @access public
	 */
	public $terminalId;

	/**
	 * Refund settlement date
	 *
	 * @var string
	 * @access public
	 */
	public $refundSettlementDate;

	/**
	 * Refund settlement ID
	 *
	 * @var string
	 * @access public
	 */
	public $refundSettlementId;

	/**
	 * Get batches
	 *
	 * @var boolean
	 * @access public
	 */
	public $getBatches = true;

	/**
	 * Get items
	 *
	 * @var boolean
	 * @access public
	 */
	public $getItems = true;

	/**
	 * Limit
	 *
	 * @var integer
	 * @access public
	 */
	public $limit;

	/**
	 * Offset
	 *
	 * @var integer
	 * @access public
	 */
	public $offset;

	/**
	 * Construct new SettlementRefund request instance
	 *
	 * @throws \BigFish\PaymentGateway\Exception
	 * @return void
	 * @access public
	 */
	public function __construct()
	{
		$this->storeName = PaymentGateway::getConfig()->storeName;
	}

	/**
	 * Set the identifier of the selected payment provider
	 *
	 * @param string $providerName Identifier of the selected payment provider
	 * @return \BigFish\PaymentGateway\Request\SettlementRefund
	 * @access public
	 */
	public function setProviderName($providerName)
	{
		$this->providerName = $providerName;
		return $this;
	}

	/**
	 * Set terminal ID
	 *
	 * @param string $terminalId Terminal ID
	 * @return \BigFish\PaymentGateway\Request\SettlementRefund
	 * @access public
	 */
	public function setTerminalId($terminalId)
	{
		$this->terminalId = $terminalId;
		return $this;
	}

	/**
	 * Set refund settlement date
	 *
	 * @param string $refundSettlementDate Refund settlement date
	 * @return \BigFish\PaymentGateway\Request\SettlementRefund
	 * @access public
	 */
	public function setRefundSettlementDate($refundSettlementDate)
	{
		$this->refundSettlementDate = $refundSettlementDate;
		return $this;
	}

	/**
	 * Set refund settlement ID
	 *
	 * @param string $refundSettlementId Refund settlement ID
	 * @return \BigFish\PaymentGateway\Request\SettlementRefund
	 * @access public
	 */
	public function setRefundSettlementId($refundSettlementId)
	{
		$this->refundSettlementId = $refundSettlementId;
		return $this;
	}

	/**
	 * Set get batches
	 *
	 * @param boolean $getBatches Get batches: true or false
	 * @return \BigFish\PaymentGateway\Request\SettlementRefund
	 * @access public
	 */
	public function setGetBatches($getBatches = true)
	{
		$this->getBatches = (($getBatches === false || $getBatches === "false") ? false : true);
		return $this;
	}

	/**
	 * Set get items
	 *
	 * @param boolean $getItems Get items: true or false
	 * @return \BigFish\PaymentGateway\Request\SettlementRefund
	 * @access public
	 */
	public function setGetItems($getItems = true)
	{
		$this->getItems = (($getItems === false || $getItems === "false") ? false : true);
		return $this;
	}

	/**
	 * Set transaction items limit
	 *
	 * @param integer $limit Limit
	 * @return \BigFish\PaymentGateway\Request\SettlementRefund
	 * @access public
	 */
	public function setLimit($limit)
	{
		$this->limit = (int)$limit;
		return $this;
	}

	/**
	 * Set transaction items offset
	 *
	 * @param integer $offset Offset
	 * @return \BigFish\PaymentGateway\Request\SettlementRefund
	 * @access public
	 */
	public function setOffset($offset)
	{
		$this->offset = (int)$offset;
		return $this;
	}
}
