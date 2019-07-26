<?php

namespace BigFish\PaymentGateway\Common;


use BigFish\PaymentGateway\Exception\PaymentGatewayException;

abstract class BaseAbstract implements BaseInterface
{
	/**
	 * @var array
	 */
	protected $data = [];

    /**
     * @var array
     */
	protected $maxLength = [];

	public function getData(): array
	{
		return $this->data;
	}

	public function getUcFirstData(): array
	{
		$data = [];
		foreach ($this->getData() as $key => $item) {
			$data[ucfirst($key)] = $item;
		}
		return $data;
	}

    /**
     * @param mixed $value
     * @param string $fieldName
     * @return $this
     */
    protected function setData($value, string $fieldName): self
	{
		if ($maxSize = $this->getFieldMaxLength($fieldName)) {
			$this->checkFieldLength($maxSize, $fieldName, $value);
		}

		$this->data[$fieldName] = $value;
		return $this;
	}

	/**
	 * @param int $maxLength
	 * @param string $fieldName
	 * @param mixed $value
	 * @throws PaymentGatewayException
	 */
	protected function checkFieldLength(int $maxLength, string $fieldName, $value)
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
		return $this->maxLength[$fieldName] ?? null;
	}
}
