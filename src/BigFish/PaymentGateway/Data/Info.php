<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/pmgw-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2024, BIG FISH Payment Services Ltd.
 */

namespace BigFish\PaymentGateway\Data;


use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Data\Info\InfoAbstract;
use BigFish\PaymentGateway\Data\Info\InfoOrderProductItem;

class Info
{
	/**
	 * @var array
	 */
	protected $data = array();

	/**
	 * @param InfoAbstract $infoObject
	 * @return Info
	 */
	public function setData($infoObject)
	{
		if ($infoObject instanceof InfoOrderProductItem) {
			if (!isset($this->data[$infoObject->getStructurePath()])) {
				$this->data[$infoObject->getStructurePath()] = array();
			}
			array_push($this->data[$infoObject->getStructurePath()], $infoObject->getUcFirstData());
			return $this;
		}

		if ($infoObject instanceof InfoAbstract) {
			$this->data[$infoObject->getStructurePath()] = $infoObject->getUcFirstData();
		}

		return $this;
	}

	/**
	 * @return array
	 */
	public function getData()
	{
		$finalData = array();

		foreach ($this->data as $pathString => $value) {
			$pathArray = explode('/', $pathString);
			$temp = &$finalData;

			foreach($pathArray as $key) {
				$temp = &$temp[$key];
			}
			$temp = $value;
			unset($temp);
		}

		return isset($finalData[$this->getStructurePath()]) ? $finalData[$this->getStructurePath()] : array();
	}

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO;
	}
}
