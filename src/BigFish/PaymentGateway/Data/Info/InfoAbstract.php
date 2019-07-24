<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Common\BaseAbstract;

abstract class InfoAbstract extends BaseAbstract implements InfoInterface
{
	/**
	 * @var array
	 */
	protected $maxLength = array();

	/**
	 * @return null|string
	 */
	public function getStructurePath(): string
	{
		return null;
	}

	/**
	 * @param string $fieldName
	 * @return null|int
	 */
	protected function getFieldMaxLength(string $fieldName)
	{
		if (isset($this->maxLength[$fieldName])) {
			return $this->maxLength[$fieldName];
		}
		return parent::getFieldMaxLength($fieldName);
	}
}
