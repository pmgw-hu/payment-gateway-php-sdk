<?php

namespace BigFish\PaymentGateway\Common;


use BigFish\PaymentGateway\Exception\PaymentGatewayException;

abstract class BaseAbstract implements BaseInterface
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
	protected function setData(string $value, string $fieldName)
	{
		if ($maxSize = $this->getFieldMaxLength($fieldName)) {
			$this->checkFieldLength($maxSize, $fieldName, $value);
		}

		$this->data[$fieldName] = $value;
	}

	/**
	 * @param int $maxLength
	 * @param string $fieldName
	 * @param string $value
	 * @throws PaymentGatewayException
	 */
	protected function checkFieldLength(int $maxLength, string $fieldName, string $value)
	{
		if (\mb_strlen($value) > $maxLength) {
			throw new PaymentGatewayException(
				sprintf(
					'%s is longer than permitted. Max value is: %d',
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
	protected function getFieldMaxLength(string $fieldName)
	{
		return null;
	}
}
