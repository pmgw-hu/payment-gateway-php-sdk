<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

abstract class RequestAbstract implements RequestInterface
{
	/**
	 * @var array
	 */
	protected $data = array();

	/**
	 * @return array
	 */
	public function getData(): array
	{
		return $this->data;
	}

	/**
	 * @return array
	 */
	public function getUcFirstData(): array
	{
		$data = array();
		foreach ($this->getData() as $key => $item) {
			$data[ucfirst($key)] = $item;
		}
		return $data;
	}

	/**
	 * @param string $value
	 * @param string $fieldName
	 * @param int $maxLength
	 * @throws PaymentGatewayException
	 */
	protected function checkLengthAndSaveData(\string $value, \string $fieldName, \int $maxLength)
	{
		$this->checkFieldSize($maxLength, $fieldName, $value);
		$this->data[$fieldName] = $value;
	}

	/**
	 * @param int $maxLength
	 * @param string $fieldName
	 * @param string $value
	 * @throws PaymentGatewayException
	 */
	protected function checkFieldSize(\int $maxLength, \string $fieldName, \string $value)
	{
		if (strlen($value) > $maxLength) {
			throw new PaymentGatewayException(
				sprintf(
					'%s is longer than permitted. Max value is: %i',
					$fieldName,
					$maxLength
				)
			);
		}
	}
}
