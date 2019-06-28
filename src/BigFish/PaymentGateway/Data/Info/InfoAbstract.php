<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Exception;

abstract class InfoAbstract implements InfoInterface
{
	/**
	 * @var array
	 */
	protected $maxSize = array();

	/**
	 * @var array
	 */
	protected $data = array();

	/**
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return null;
	}

	/**
	 * @return array
	 */
	public function getUcFirstData()
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
	 * @throws Exception
	 */
	protected function setData($value, $fieldName)
	{
		if ($maxSize = $this->getFieldMaxSize($fieldName)) {
			$this->checkFieldLength($maxSize, $fieldName, $value);
		}
		$this->data[$fieldName] = $value;
	}

	/**
	 * @param int $maxLength
	 * @param string $fieldName
	 * @param string $value
	 * @throws Exception
	 */
	protected function checkFieldLength($maxLength, $fieldName, $value)
	{
		if (\mb_strlen($value) > $maxLength) {
			throw new Exception(
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
	protected function getFieldMaxSize($fieldName)
	{
		if (isset($this->maxSize[$fieldName])) {
			return $this->maxSize[$fieldName];
		}

		return null;
	}
}