<?php
/**
 * BIG FISH Payment Gateway (https://www.paymentgateway.hu)
 * PHP SDK
 *
 * @link https://github.com/bigfish-hu/payment-gateway-php-sdk.git
 * @copyright (c) 2019, BIG FISH Internet-technology Ltd. (http://bigfish.hu)
 */

namespace BigFish\PaymentGateway\Info;


use BigFish\PaymentGateway;

class Info extends InfoAbstract
{
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
		foreach ($this->data as $key => $value) {
			$pathArray = explode('/', $key);
			$temp = &$finalData;

			foreach($pathArray as $key) {
				$temp = &$temp[$key];
			}
			$temp = $value;
			unset($temp);
		}

		return $finalData[$this->getStructurePath()];
	}

	/**
	 * @return string
	 */
	public function getStructurePath()
	{
		return PaymentGateway::PATH_INFO;
	}
}
