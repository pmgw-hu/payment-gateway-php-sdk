<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Settlement extends InitBasicAbstract
{
	const MAX_LIMIT = 1000;

	public function __construct()
	{
		parent::__construct();
		$this->setGetItems(true);
	}

	/**
	 * @var array
	 */
	protected $maxLength = [
		'storeName' => 20,
		'providerName' => 20,
		'terminalId' => 64,
		'settlementDate' => 10,
		'transferNotice' => 255,
		'transactionCurrency' => 3
	];

	/**
	 * @param int $limit
	 * @return Settlement
	 * @throws PaymentGatewayException
	 */
	public function setLimit(int $limit = 250): Settlement
	{
		if ($limit > Settlement::MAX_LIMIT) {
			throw new PaymentGatewayException('Invalid limit');
		}

		return $this->setData($limit, 'limit');
	}

	/**
	 * @param int $offset
	 * @return Settlement
	 * @throws PaymentGatewayException
	 */
	public function setOffset(int $offset): Settlement
	{
		return $this->setData($offset, 'offset');
	}

	/**
	 * @param bool $value
	 * @return Settlement
	 */
	public function setGetItems(bool $value = true): Settlement
	{
		return $this->setData($value, 'getItems');
	}

	/**
	 * @param bool $value
	 * @return Settlement
	 */
	public function setGetBatches(bool $value = true): Settlement
	{
		return $this->setData($value, 'getBatches');
	}

	/**
	 * @param string $transferNotice
	 * @return Settlement
	 */
	public function setTransferNotice(string $transferNotice): Settlement
	{
		return $this->setData($transferNotice, 'transferNotice');
	}

	/**
	 * @param string $date
	 * @return Settlement
	 */
	public function setSettlementDate(string $date): Settlement
	{
		return $this->setData($date, 'settlementDate');
	}

	/**
	 * @param string $terminalId
	 * @return Settlement
	 */
	public function setTerminalId(string $terminalId): Settlement
	{
		return $this->setData($terminalId, 'terminalId');
	}

	/**
	 * Set settlement transaction currency
	 *
	 * @param string $currency Three-letter ISO currency code (e.g. HUF, USD etc.)
	 * @return static
	 */
	public function setTransactionCurrency(string $currency = '')
	{
		if (!$currency) {
			$currency = PaymentGateway\Config::DEFAULT_CURRENCY;
		}
		return $this->setData($currency, 'transactionCurrency');
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_SETTLEMENT;
	}
}
