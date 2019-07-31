<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Settlement extends InitBaseAbstract
{
	const REQUEST_TYPE = 'Settlement';

	/**
	 * @param int $limit
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setLimit(int $limit): self
	{
		return $this->setData($limit, 'limit');
	}

	/**
	 * @param int $offset
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setOffset(int $offset): self
	{
		return $this->setData($offset, 'offset');
	}

	/**
	 * @param bool $value
	 * @return $this
	 */
	public function setGetItems(bool $value): self
	{
		return $this->setData($value, 'getItems');
	}

	/**
	 * @param bool $value
	 * @return $this
	 */
	public function setGetBatches(bool $value): self
	{
		return $this->setData($value, 'getBatches');
	}

	/**
	 * @param string $transferNotice
	 * @return $this
	 */
	public function setTransferNotice(string $transferNotice): self
	{
		return $this->setData($transferNotice, 'transferNotice');
	}

	/**
	 * @param string $date
	 * @return $this
	 */
	public function setSettlementDate(string $date): self
	{
		return $this->setData($date, 'settlementDate');
	}

	/**
	 * @param string $terminalId
	 * @return $this
	 */
	public function setTerminalId(string $terminalId): self
	{
		return $this->setData($terminalId, 'terminalId');
	}

	/**
	 * Set settlement transaction currency
	 *
	 * @param string $currency Three-letter ISO currency code (e.g. HUF, USD etc.)
	 * @return $this
	 */
	public function setTransactionCurrency(string $currency): self
	{
		return $this->setData($currency, 'transactionCurrency');
	}
}
