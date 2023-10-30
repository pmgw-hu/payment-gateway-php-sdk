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
 * Settlement request class
 * 
 * @package PaymentGateway
 * @subpackage Request
 */
class Settlement extends RequestAbstract
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
	 * Settlement date
	 * 
	 * @var string
	 * @access public
	 */
	public $settlementDate;

	/**
	 * Transfer notice
	 * 
	 * @var string
	 * @access public
	 */
	public $transferNotice;

	/**
	 * Transaction currency
	 * 
	 * @var string
	 * @access public
	 */
	public $transactionCurrency;

	/**
	 * Settlement batch ID
	 *
	 * @var integer
	 * @access public
	 */
	public $settlementBatchId;

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
	 * Construct new Settlement request instance
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
	 * @return \BigFish\PaymentGateway\Request\Settlement
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
	 * @return \BigFish\PaymentGateway\Request\Settlement
	 * @access public
	 */
	public function setTerminalId($terminalId)
	{
		$this->terminalId = $terminalId;
		return $this;
	}

	/**
	 * Set settlement date
	 *
	 * @param string $settlementDate Settlement date
	 * @return \BigFish\PaymentGateway\Request\Settlement
	 * @access public
	 */
	public function setSettlementDate($settlementDate)
	{
		$this->settlementDate = $settlementDate;
		return $this;
	}

	/**
	 * Set transfer Notice
	 *
	 * @param string $transferNotice Transfer notice
	 * @return \BigFish\PaymentGateway\Request\Settlement
	 * @access public
	 */
	public function setTransferNotice($transferNotice)
	{
		$this->transferNotice = $transferNotice;
		return $this;
	}

	/**
	 * Set transaction currency
	 *
	 * @param string $transactionCurrency Transaction currency
	 * @return \BigFish\PaymentGateway\Request\Settlement
	 * @access public
	 */
	public function setTransactionCurrency($transactionCurrency)
	{
		$this->transactionCurrency = $transactionCurrency;
		return $this;
	}

	/**
	 * Set settlement batch ID
	 *
	 * @param integer $settlementBatchId Settlement batch ID
	 * @return \BigFish\PaymentGateway\Request\Settlement
	 * @access public
	 */
	public function setSettlementBatchId($settlementBatchId)
	{
		$this->settlementBatchId = (int)$settlementBatchId;
		return $this;
	}

	/**
	 * Set get batches
	 *
	 * @param boolean $getBatches Get batches: true or false
	 * @return \BigFish\PaymentGateway\Request\Settlement
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
	 * @return \BigFish\PaymentGateway\Request\Settlement
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
	 * @return \BigFish\PaymentGateway\Request\Settlement
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
	 * @return \BigFish\PaymentGateway\Request\Settlement
	 * @access public
	 */
	public function setOffset($offset)
	{
		$this->offset = (int)$offset;
		return $this;
	}
}
