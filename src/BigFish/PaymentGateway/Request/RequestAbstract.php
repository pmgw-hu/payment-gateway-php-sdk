<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway\Common\BaseAbstract;

abstract class RequestAbstract extends BaseAbstract implements RequestInterface
{
	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return '';
	}

	/**
	 * @param string $fieldName
	 * @return null|int
	 */
	protected function getFieldMaxLength(string $fieldName)
	{
		return null;
	}
}
