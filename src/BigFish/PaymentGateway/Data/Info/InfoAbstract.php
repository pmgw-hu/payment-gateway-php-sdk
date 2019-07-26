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
	protected $maxLength = array();

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
	 * @return $this
	 * @throws Exception
	 */
	protected function setData($value, $fieldName)
	{
		$this->data[$fieldName] = $value;
		return $this;
	}
}