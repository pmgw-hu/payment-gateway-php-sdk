<?php

namespace BigFish\PaymentGateway\Request;


class Invoice extends SimpleRequestAbstract
{
	const REQUEST_TYPE = 'Invoice';

	/**
	 * @param array $invoiceData
	 * @return $this
	 */
	public function setInvoiceData(array $invoiceData)
	{
		return $this->setData($invoiceData, 'invoiceData');
	}
}