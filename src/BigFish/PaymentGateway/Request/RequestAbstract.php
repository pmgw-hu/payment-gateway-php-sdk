<?php

namespace BigFish\PaymentGateway\Request;

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
	 * @throws PaymentGatewayException
	 */
	protected function saveData(string $value, string $fieldName)
	{
		if ($maxSize = $this->getFieldMaxSize($fieldName)) {
			$this->checkFieldSize($maxSize, $fieldName, $value);
		}

		$this->data[$fieldName] = $value;
	}

	/**
	 * @param int $maxLength
	 * @param string $fieldName
	 * @param string $value
	 * @throws PaymentGatewayException
	 */
	protected function checkFieldSize(int $maxLength, string $fieldName, string $value)
	{
		if (\mb_strlen($value) > $maxLength) {
			throw new PaymentGatewayException(
				sprintf(
					'%s is longer than permitted. Max value is: %i',
					$fieldName,
					$maxLength
				)
			);
		}
	}

	/**
	 * @param string $fieldName
	 * @return null|int
	 */
	protected function getFieldMaxSize(string $fieldName)
	{
		return null;
	}
}
