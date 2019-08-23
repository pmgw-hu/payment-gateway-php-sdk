<?php

namespace BigFish\PaymentGateway\Common;


abstract class BaseAbstract implements BaseInterface
{
	/**
	 * @var array
	 */
	protected $data = [];

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
		$this->data[$fieldName] = $value;
		return $this;
	}
}
